<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Series;
use App\Book;
use App\Promotion;
use App\Purchase;
use App\User;
// use Auth;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$events = array();
		$user = Auth::user();

		$promotions = Promotion::where('user_id', $user->id)->get();
		foreach ($promotions as $promotion) {
			$event = new \StdClass;
			$event->title = $promotion->name;
			$event->start = $promotion->start_date;
			$event->end = $promotion->end_date;
			$event->allDay = true;
			$event->url = url('/promotion/' . $promotion->id . '/edit');
			$event->backgroundColor = "#4549da";
			$events[] = $event;
		}

		$purchases = Purchase::where('user_id', $user->id)->get();
		foreach ($purchases as $purchase) {
			$promotion = Promotion::find($purchase->promotion_id);
			$event = new \StdClass;
			$event->title = $purchase->promo_site . " - " . $promotion->name;
			$event->start = $purchase->date_booked;
			$event->end = $purchase->date_booked;
			$event->allDay = true;
			$event->url = url('/purchase/' . $purchase->id . '/edit');
			$event->backgroundColor = (strlen($promotion->color) > 0) ? $promotion->color : "";
			$events[] = $event;
		}

		return view('home', compact('events'));
	}
}
