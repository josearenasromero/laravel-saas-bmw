<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Serie;
use App\Book;
use App\Promotion;
use App\Purchase;

class SerieController extends Controller
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
        //     $series = Serie::all();
        // } else {
        $series = Serie::where('user_id', $user->id)->get();
        // }
        
        return view('serie/list_serie', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serie/create_serie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serie = new Serie;
        $serie->name = $request->input('name');

        $serie->user_id = Auth::id();

        $serie->save();   

        return redirect('/serie')->with('flash_message', "Serie {$serie->name} created successfully.")->with('flash_type','success');
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
        $serie = Serie::find($id);		
		
        return view('serie/edit_serie', compact('serie'));
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
        $serie = Serie::find($id);
        $serie->name = $request->input('name');
        
        $serie->save();
		
		return redirect('/serie')->with("flash_message", "Serie {$serie->name} updated successfully.")->with('flash_type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$purchases = Purchase::where("serie_id", $id)->delete();
		$promotions = Promotion::where("serie_id", $id)->delete();
		$books = Book::where("serie_id", $id)->delete();
		
        $serie = Serie::find($id);
        Serie::destroy($id);
		return redirect("/serie")->with("flash_message", "Serie {$serie->name} deleted successfully.")->with('flash_type','success');
    }
}
