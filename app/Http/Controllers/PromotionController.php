<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Serie;
use App\Book;
use App\Promotion;
use App\Purchase;

class PromotionController extends Controller
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
        //     $promotions = Promotion::all();
        // } else {
        $promotions = Promotion::where('user_id', $user->id)->get();
        // }
		
		foreach($promotions as $promotion) {
			$serie = Serie::find($promotion->serie_id);
			$book = Book::find($promotion->book_id);
			
			$promotion->start_date = $this->convert_date($promotion->start_date, true);
			$promotion->end_date = $this->convert_date($promotion->end_date, true);
			
			$promotion->serie = $serie;
			$promotion->book = $book;
			
			$purchases = Purchase::where("promotion_id", $promotion->id)->get();
			
			$total_spend_cost = 0;
			$total_number_sold = 0;
			foreach($purchases as $purchase) {
				$total_spend_cost += $purchase->spend_cost;
				$total_number_sold += $purchase->number_sold;
			}
			
			$promotion->profit = $total_number_sold * $promotion->price_during_sale * $promotion->profit_rate / 100;
			$promotion->roi = $promotion->profit - $total_spend_cost;
		}
		
        return view('promotion/list_promotion', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$user = Auth::user();
        // if ($user->permission < 5) {
        //     $series = Serie::orderBy('name', 'ASC')->get();
        //     $books = Book::orderBy('title', 'ASC')->get();
        // } else {
        $series = Serie::where('user_id', $user->id)->orderBy('name', 'ASC')->get();
        $books = Book::where('user_id', $user->id)->orderBy('title', 'ASC')->get();
        // }
        
        return view('promotion/create_promotion', compact('series', 'books'));
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
        $promotion = new Promotion;
		$promotion->book_id = $request->input('book_id');
		$promotion->serie_id = $request->input('serie_id');
		$promotion->title = $request->input('title_hidden');
		$promotion->name = $request->input('name');
		$promotion->color = $request->input('color');
		$promotion->start_date = $this->convert_date($request->input('start_date'));
		$promotion->end_date = $this->convert_date($request->input('end_date'));
		$promotion->price_during_sale = $request->input('price_during_sale');
		$promotion->usual_price = $request->input('usual_price');
		$promotion->profit_rate = $request->input('profit_rate');

        $promotion->user_id = Auth::id();
        
		$promotion->save();

        return redirect('/promotion')->with('flash_message', "Promotion {$promotion->name} created successfully.")->with('flash_type','success');
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
        $promotion = Promotion::find($id);
		$promotion->start_date = $this->convert_date($promotion->start_date, true);
		$promotion->end_date = $this->convert_date($promotion->end_date, true);
		
        // $user = Auth::user();
        // if ($user->permission < 5) {
        //     $series = Serie::orderBy('name', 'ASC')->lists('name', 'id');
        //     $books = Book::orderBy('title', 'ASC')->lists('title', 'id');
        // } else {
        //     $series = Serie::where('user_id', $user->id)->orderBy('name', 'ASC')->lists('name', 'id');
        //     $books = Book::where('user_id', $user->id)->orderBy('title', 'ASC')->lists('title', 'id');
        // }
        
        $user_id = $promotion->user_id;
        $series = Serie::where('user_id', $user_id)->orderBy('name', 'ASC')->pluck('name', 'id');
        $books = Book::where('user_id', $user_id)->orderBy('title', 'ASC')->pluck('title', 'id');
		
        return view('promotion/edit_promotion', compact('promotion', 'series', 'books'));
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
        $promotion = Promotion::find($id);
        
		$promotion->book_id = $request->input('book_id');
		$promotion->serie_id = $request->input('serie_id');
		$promotion->title = $request->input('title_hidden');
		$promotion->name = $request->input('name');
		$promotion->color = $request->input('color');
		$promotion->start_date = $this->convert_date($request->input('start_date'));
		$promotion->end_date = $this->convert_date($request->input('end_date'));
		$promotion->price_during_sale = $request->input('price_during_sale');
		$promotion->usual_price = $request->input('usual_price');
		$promotion->profit_rate = $request->input('profit_rate');
		
		$promotion->save();
		
		return redirect('/promotion')->with("flash_message", "Promotion {$promotion->name} updated successfully.")->with('flash_type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$purchases = Purchase::where("promotion_id", $id)->delete();
		
        $promotion = Promotion::find($id);
        Promotion::destroy($id);
		return redirect("/promotion")->with("flash_message", "Promotion {$promotion->name} deleted successfully.")->with('flash_type','success');
    }
}