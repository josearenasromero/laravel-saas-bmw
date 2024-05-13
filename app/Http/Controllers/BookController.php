<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Serie;
use App\Book;
use App\Promotion;
use App\Purchase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
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
        //     $books = Book::all();
        // } else {
        $books = Book::where('user_id', $user->id)->get();
        // }

        foreach ($books as $book) {
            $serie = Serie::find($book->serie_id);
            $book->kindle_term_end_date = $this->convert_date($book->kindle_term_end_date, true);
            $book->kindle_term_end_expiration_date = $this->convert_date($book->kindle_term_end_expiration_date, true);
            $book->serie = $serie;
        }

        return view('book/list_book', compact('books'));
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
        // } else {
        $series = Serie::where('user_id', $user->id)->orderBy('name', 'ASC')->get();
        // }
        
        return view('book/create_book', compact('series'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book;
        $book->serie_id = $request->input('serie_id');
        $book->title = $request->input('title');
        $book->mini_description = ($request->input('mini_description') != null) ? $request->input('mini_description') : "";
        $book->short_description = ($request->input('short_description') != null) ? $request->input('short_description') : "";
        $book->asin = ($request->input('asin') != null) ? $request->input('asin') : "";

        $book->usual_price = ($request->input('usual_price') != null) ? $request->input('usual_price') : 0;
        $book->kindle_term_end_date = ($request->input('kindle_term_end_date') != null) ? $this->convert_date($request->input('kindle_term_end_date')) : "";

        $exp_date = ($request->input('kindle_term_end_date') != null) ? date('m/d/Y', strtotime('+90 days', strtotime($request->input('kindle_term_end_date')))) : null;

        $book->kindle_term_end_expiration_date = ($exp_date != null) ? $this->convert_date($exp_date) : "";
        $book->other_notes = ($request->input('other_notes') != null) ? $request->input('other_notes') : "";
        $book->status = $request->status;
        $book->amazon_url = $request->amazon_url;
        $book->cover_image = "";
        if ($request->hasFile($request->input('cover_image'))) {
            // $path    = '/home/authorsxp/public_html/bmw/assets/books/images/';
            $path    = "C:/wamp64/www/bmw/public_html/assets/books/images/";

            $image_file = $request->file($request->input('cover_image'));
            $image_file = $image_file["cover_image"];
            $ext                   = $image_file->getClientOriginalExtension();
            $name                  = $image_file->getClientOriginalName();
            $size                  = $image_file->getClientSize();
            $timestamp             = time() . rand();
            $final_file_name = $timestamp . '.' . $ext;
            $image_file->move($path, $final_file_name);
            $book->cover_image = $final_file_name;
        }

        $book->user_id = Auth::id();

        $book->save();

        return redirect('/book')->with('flash_message', "Book {$book->title} created successfully.")->with('flash_type', 'success');
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
        $book = Book::find($id);
        $book->kindle_term_end_date = $this->convert_date($book->kindle_term_end_date, true);
        
        // $user = Auth::user();
        // if ($user->permission < 5) {
        //     $series = Serie::orderBy('name', 'ASC')->lists('name', 'id');
        // } else {
        //     $series = Serie::where('user_id', $user->id)->orderBy('name', 'ASC')->lists('name', 'id');
        // }
        
        
        $user_id = $book->user_id;
        $series = Serie::where('user_id', $user_id)->orderBy('name', 'ASC')->pluck('name', 'id');
        
        return view('book/edit_book', compact('book', 'series'));
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
        $book = Book::find($id);

        $book->serie_id = $request->input('serie_id');
        $book->title = $request->input('title');

        $book->mini_description = ($request->input('mini_description') != null) ? $request->input('mini_description') : "";
        $book->short_description = ($request->input('short_description') != null) ? $request->input('short_description') : "";
        $book->asin = ($request->input('asin') != null) ? $request->input('asin') : "";

        $book->usual_price = ($request->input('usual_price') != null) ? $request->input('usual_price') : 0;
        $book->kindle_term_end_date = ($request->input('kindle_term_end_date') != null) ? $this->convert_date($request->input('kindle_term_end_date')) : "";

        $exp_date = ($request->input('kindle_term_end_date') != null) ? date('m/d/Y', strtotime('+90 days', strtotime($request->input('kindle_term_end_date')))) : null;

        $book->kindle_term_end_expiration_date = ($exp_date != null) ? $this->convert_date($exp_date) : "";
        $book->other_notes = ($request->input('other_notes') != null) ? $request->input('other_notes') : "";
        $book->status = $request->status;
        $book->amazon_url = $request->amazon_url;
        //$book->cover_image = "";
        if ($request->hasFile($request->input('cover_image'))) {
            $path    = '/home/authorsxp/public_html/bmw/assets/books/images/';
            //$path    = "L:/wamp64/www/upwork/amy/public_html/assets/books/images/";

            $image_file = $request->file($request->input('cover_image'));
            $image_file = $image_file["cover_image"];
            $ext                   = $image_file->getClientOriginalExtension();
            $name                  = $image_file->getClientOriginalName();
            $size                  = $image_file->getClientSize();
            $timestamp             = time() . rand();
            $final_file_name = $timestamp . '.' . $ext;
            $image_file->move($path, $final_file_name);
            $book->cover_image = $final_file_name;
        }

        $book->save();

        return redirect('/book')->with("flash_message", "Book {$book->title} updated successfully.")->with('flash_type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchases = Purchase::where("book_id", $id)->delete();
        $promotions = Promotion::where("book_id", $id)->delete();

        $book = Book::find($id);
        Book::destroy($id);
        return redirect("/book")->with("flash_message", "Book {$book->title} deleted successfully.")->with('flash_type', 'success');
    }

    public function custombook(){

        $user = Auth::user();
        $books = Book::where('user_id',$user->id)->get();
        $last_year = date("Y-01-01", strtotime("last year"));
        foreach ($books as $book) {
            $promotion_site = Purchase::select(DB::raw("CONCAT(purchase.promo_site,' (',DATE_FORMAT(purchase.date_booked,'%m/%d/%Y'),')') as concat"))
                                        //->join('promotion','purchase.promotion_id','=','promotion.id')
                                        ->where('purchase.book_id',$book->id)
                                    //    ->where('purchase.date_booked','>=',$last_year)
                                    //  ->where('start_date','>=',$last_year)
                                    //  ->where('end_date','<=', $now)
                                        ->get(['name','date_booked','id']);
            $promo_site_names = array_column($promotion_site->toArray(),'concat');
            $end_date = new Carbon($book->kindle_term_end_date);
            $promo_date = date('Y-m-d', strtotime($end_date . " -90 days"));
            if(!$book->status){
                $promotions = Promotion::where('book_id',$book->id)->where('start_date','<=', $promo_date)->exists();
                $book->status = "AVAILABLE";
                if($promotions){
                    $book->status = "USED";
                }
            }
            $book->promo_site = "";
            if($promo_site_names){
                $book->promo_site = join(", ",$promo_site_names);
            }
            // $book->end_date = $end_date->quarter;
            $book->kindle_term_end_date = $this->convert_date($book->kindle_term_end_date, true);
            $book->kindle_term_end_expiration_date = $this->convert_date($book->kindle_term_end_expiration_date, true);
        }
        
        return view('book/custom_book', compact('books'));
        
    }

    public function inline_edit(Request $request) {
        
        if($request->input === null){
            return json_encode(['msg' => 'invalid']);
        }
        
        $book = Book::findOrFail($request->id);
        if($request->name == 'status'){
            $book->status = $request->input;
        }
        if($request->name == 'kindle_term_end_date'){
            $book->kindle_term_end_date = $this->convert_date($request->input);
        }
        if($request->name == 'other_notes'){
            $book->other_notes = $request->input;
        }
        $book->save();
        return json_encode(['msg' => 'success', 'data' => $request]);
    }
}
