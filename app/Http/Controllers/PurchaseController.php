<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Serie;
use App\Book;
use App\Promotion;
use App\Purchase;

class PurchaseController extends Controller
{	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth');
    } 
	 
    public function index()
    {
        $user = Auth::user();
        // if ($user->permission < 5) {
        //     $purchases = Purchase::orderBy('date_booked', 'desc')->get();
        // } else {
        $purchases = Purchase::where('user_id', $user->id)->orderBy('date_booked', 'desc')->get();
        // }
		
		foreach($purchases as $purchase) {
			$serie = Serie::find($purchase->serie_id);
			$book = Book::find($purchase->book_id);
			$promotion = Promotion::find($purchase->promotion_id);
			
			$purchase->date_booked = $this->convert_date($purchase->date_booked, true);
			
			$purchase->serie = $serie;
			$purchase->book = $book;
			$purchase->promotion = $promotion;
			
			$profit = 0;
			$profit = $purchase->number_sold * $promotion->price_during_sale * $promotion->profit_rate / 100;
            $profit += $purchase->kenp_reads * $purchase->kenp_rate;
			
			$purchase->profit = $profit;
			$purchase->roi = $profit - $purchase->spend_cost;
		}
		
        return view('purchase/list_purchase', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$selected_serie = "";
		$selected_book = "";
		$selected_promotion = "";
		if(isset($_GET["serie_id"], $_GET["book_id"], $_GET["promotion_id"])) {
			$selected_serie = $_GET["serie_id"];
			$selected_book = $_GET["book_id"];
			$selected_promotion = $_GET["promotion_id"];
		}
		
		$user = Auth::user();
        // if ($user->permission < 5) {
        //     $series = Serie::orderBy('name', 'ASC')->get();
        //     $books = Book::orderBy('title', 'ASC')->get();
        //     $promotions = Promotion::orderBy('name', 'ASC')->get();
        // } else {
        $series = Serie::where('user_id', $user->id)->orderBy('name', 'ASC')->get();
        $books = Book::where('user_id', $user->id)->orderBy('title', 'ASC')->get();
        $promotions = Promotion::where('user_id', $user->id)->orderBy('name', 'ASC')->get();
        // }

        return view('purchase/create_purchase', compact('series', 'books', 'promotions', 'selected_serie', 'selected_book', 'selected_promotion'));
    }

	private function convert_date($d, $reverse = false) {
		$crd_1 = $d;
		
		if(!$reverse) {
			if(strlen($crd_1) > 0 && strpos($crd_1, "/") !== false) {
				$crd_1 = explode("/", $crd_1);
				if(count($crd_1) > 2) {
					$crd_1 = $crd_1[2] . "-" . $crd_1[0] . "-" . $crd_1[1];
				} else {
					return $d;
				}
			}
		} else {
			if(strlen($crd_1) > 0 && strpos($crd_1, "-") !== false) {
				$crd_1 = explode("-", $crd_1);
				if(count($crd_1) > 2) {
					$crd_1 = $crd_1[1] . "/" . $crd_1[2] . "/" . $crd_1[0];
				} else {
					return $d;
				}
			}
		}
		return $crd_1;
	}
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase = new Purchase;
		$purchase->book_id = $request->input('book_id');
		$purchase->serie_id = $request->input('serie_id');
		$purchase->promotion_id = $request->input('promotion_id');
		$purchase->promo_site = $request->input('promo_site');
		$purchase->date_booked = $this->convert_date($request->input('date_booked'));
		$purchase->approved = $request->input('approved');
		$purchase->scheduled = $request->input('scheduled');
		$purchase->paid = $request->input('paid');
		$purchase->spend_cost = ($request->input('spend_cost') != null) ? $request->input('spend_cost') : 0;
		$purchase->number_sold = ($request->input('number_sold') != null) ? $request->input('number_sold') : 0;
		$purchase->kenp_reads = ($request->input('kenp_reads') != null) ? $request->input('kenp_reads') : 0;
		$purchase->kenp_rate = ($request->input('kenp_rate') != null) ? $request->input('kenp_rate') : 0.0045;
		$purchase->start_date = $this->convert_date($request->input('start_date'));
		$purchase->end_date = $this->convert_date($request->input('end_date'));
        
        $purchase->user_id = Auth::id();
        
		$purchase->save();

        return redirect('/purchase')->with('flash_message', "Purchase created successfully.")->with('flash_type','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = Purchase::find($id);
		$purchase->date_booked = $this->convert_date($purchase->date_booked, true);
		
        // $user = Auth::user();
        // if ($user->permission < 5) {
        //     $series = Serie::orderBy('name', 'ASC')->lists('name', 'id');
        //     $books = Book::orderBy('title', 'ASC')->lists('title', 'id');
        //     $promotions = Promotion::orderBy('name', 'ASC')->lists('name', 'id');
        // } else {
        //     $series = Serie::where('user_id', $user->id)->orderBy('name', 'ASC')->lists('name', 'id');
        //     $books = Book::where('user_id', $user->id)->orderBy('title', 'ASC')->lists('title', 'id');
        //     $promotions = Promotion::where('user_id', $user->id)->orderBy('name', 'ASC')->lists('name', 'id');
        // }
        
        $user_id = $purchase->user_id;
        $series = Serie::where('user_id', $user_id)->orderBy('name', 'ASC')->pluck('name', 'id');
        $books = Book::where('user_id', $user_id)->orderBy('title', 'ASC')->pluck('title', 'id');
        $promotions = Promotion::where('user_id', $user_id)->orderBy('name', 'ASC')->pluck('name', 'id');
		
        return view('purchase/edit_purchase', compact('purchase', 'series', 'books', 'promotions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $purchase = Purchase::find($id);
        
		$purchase->book_id = $request->input('book_id');
		$purchase->serie_id = $request->input('serie_id');
		$purchase->promotion_id = $request->input('promotion_id');
		$purchase->promo_site = $request->input('promo_site');
		$purchase->date_booked = $this->convert_date($request->input('date_booked'));
		$purchase->approved = $request->input('approved');
		$purchase->scheduled = $request->input('scheduled');
		$purchase->paid = $request->input('paid');
		$purchase->spend_cost = ($request->input('spend_cost') != null) ? $request->input('spend_cost') : 0;
		$purchase->number_sold = ($request->input('number_sold') != null) ? $request->input('number_sold') : 0;
		$purchase->kenp_reads = ($request->input('kenp_reads') != null) ? $request->input('kenp_reads') : 0;
		$purchase->kenp_rate = ($request->input('kenp_rate') != null) ? $request->input('kenp_rate') : 0.0045;
        $purchase->start_date = $this->convert_date($request->input('start_date'));
		$purchase->end_date = $this->convert_date($request->input('end_date'));

		$purchase->save();
		
		return redirect('/purchase')->with("flash_message", "Purchase updated successfully.")->with('flash_type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        Purchase::destroy($id);
		return redirect("/purchase")->with("flash_message", "Purchase deleted successfully.")->with('flash_type','success');
    }
}