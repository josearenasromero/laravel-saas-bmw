<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;
use App\Services\CommonService;

use App\Serie;
use App\Book;
use App\Purchase;
use App\Promotion;
use App\User;
// use Auth;

class ReportController extends Controller
{

	protected $common_service;

	public function __construct(CommonService $common_service)
	{
		$this->middleware('auth');
		$this->common_service = $common_service;
	}

	private function convert_date($d, $reverse = false)
	{
		$crd_1 = $d;

		if (!$reverse) {
			if (strlen($crd_1) > 0 && strpos($crd_1, "/") !== false) {
				$crd_1 = explode("/", $crd_1);
				if (count($crd_1) > 2) {
					$crd_1 = $crd_1[2] . "-" . $crd_1[0] . "-" . $crd_1[1];
				} else {
					return $d;
				}
			}
		} else {
			if (strlen($crd_1) > 0 && strpos($crd_1, "-") !== false) {
				$crd_1 = explode("-", $crd_1);
				if (count($crd_1) > 2) {
					$crd_1 = $crd_1[1] . "/" . $crd_1[2] . "/" . $crd_1[0];
				} else {
					return $d;
				}
			}
		}
		return $crd_1;
	}

	public function bookhistory()
	{
		if (Auth::user()->permission >= 5) {
			return redirect('/');
		}

		$series = Serie::orderBy('name', 'ASC')->get();
		$books = Book::orderBy('title', 'ASC')->get();

		$reports = array();

		return view('report/bookhistory', compact('series', 'books', 'reports'));
	}

	public function bookhistory_post(Request $request)
	{
		$series = Serie::all();
		$books = Book::all();

		$selected_serie = $request->input('serie_id');
		$selected_book = $request->input('book_id');
		if($selected_book == 'null' || $selected_book == '' || $selected_book == null){
			return redirect('/report/bookhistory');
		}
		$reports = array();
		$report_header = array("serie" => new \StdClass, "book" => new \StdClass);

		$serie = Serie::where("id", $selected_serie)->get();
		$book = Book::where("serie_id", $selected_serie)->where("id", $selected_book)->get();
		if (count($serie) > 0 && count($book) > 0) {
			$serie = $serie[0];
			$book = $book[0];
			$report_header["serie"] = $serie;
			$report_header["book"] = $book;
			$purchases = Purchase::where("serie_id", $selected_serie)->where("book_id", $selected_book)->get();

			foreach ($purchases as $purchase) {
				$promotion = Promotion::find($purchase->promotion_id);

				$purchase->date_booked = $this->convert_date($purchase->date_booked, true);

				$profit = 0;
				$profit = $purchase->number_sold * $promotion->price_during_sale * $promotion->profit_rate / 100;
				$profit += $purchase->kenp_reads * $purchase->kenp_rate;

				$purchase->profit = $profit;
				$purchase->roi = $profit - $purchase->spend_cost;

				$reports[$purchase->promo_site] = $purchase;
				// $reports[] = $purchase;
			}
		}

		return view('report/bookhistory', compact('series', 'books', 'selected_serie', 'selected_book', 'reports', 'report_header'));
	}

	public function promotionhistory()
	{
		if (Auth::user()->permission >= 5) {
			return redirect('/');
		}

		$series = Serie::orderBy('name', 'ASC')->get();
		$books = Book::orderBy('title', 'ASC')->get();

		$reports = array();

		return view('report/promotionhistory', compact(
			'series',
			'books',
			'reports',
		));
	}

	public function promotionhistory_post(Request $request)
	{
		$series = Serie::all();
		$books = Book::all();

		$selected_serie = $request->input('serie_id');
		$selected_book = $request->input('book_id');

		$from_date = $request->input('from_date');
		$to_date = $request->input('to_date');
		if($selected_book == 'null' || $selected_book == '' || $selected_book == null){
			return redirect('/report/promotionhistory');
		}
		$reports = array();
		$report_header = array("serie" => new \StdClass, "book" => new \StdClass);

		$serie = Serie::where("id", $selected_serie)->get();
		$book = Book::where("serie_id", $selected_serie)->where("id", $selected_book)->get();
		if (count($serie) > 0 && count($book) > 0) {
			$serie = $serie[0];
			$book = $book[0];
			$report_header["serie"] = $serie;
			$report_header["book"] = $book;
			$promotions = Promotion::where("serie_id", $selected_serie)->where("book_id", $selected_book);

			if ($from_date) {
				$promotions = $promotions->where("start_date", ">=", $from_date);
			}
			if ($to_date) {
				$promotions = $promotions->where("end_date", "<=", $to_date);
			}

			$promotions = $promotions->get();

			foreach ($promotions as $promotion) {
				$promotion->start_date = $this->convert_date($promotion->start_date, true);
				$promotion->end_date = $this->convert_date($promotion->end_date, true);

				$purchases = Purchase::where("promotion_id", $promotion->id)->get();

				$total_spend_cost = 0;
				$total_number_sold = 0;
				$total_kenp = 0;
				foreach ($purchases as $purchase) {
					$total_spend_cost += $purchase->spend_cost;
					$total_number_sold += $purchase->number_sold;
					$total_kenp += $purchase->kenp_reads * $purchase->kenp_rate;
				}

				$promotion->profit = $total_number_sold * $promotion->price_during_sale * $promotion->profit_rate / 100;
				$promotion->kenp = $total_kenp;
				$promotion->profit += $total_kenp;
				$promotion->roi = $promotion->profit - $total_spend_cost;

				$reports[$promotion->name] = $promotion;
			}
		}

		return view('report/promotionhistory', compact(
			'series',
			'books',
			'selected_serie',
			'selected_book',
			'from_date',
			'to_date',
			'reports',
			'report_header'
		));
	}
}
