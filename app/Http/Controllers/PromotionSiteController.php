<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\PromotionSite;

class PromotionSiteController extends Controller
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
        //     $promotion_sites = PromotionSite::all();
        // } else {
        $promotion_sites = PromotionSite::where('user_id', $user->id)->get();
        // }
		
        return view('promotionsite/list_promotionsite', compact('promotion_sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotionsite/create_promotionsite');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promotion_site = new PromotionSite;
		$promotion_site->promo_site = $request->input('promo_site');
		$promotion_site->link = $request->input('link');
		$promotion_site->cost = $request->input('cost');
		$promotion_site->notes = $request->input('notes');

        $promotion_site->user_id = Auth::id();
        
		$promotion_site->save();

        return redirect('/promotionsite')->with('flash_message', "Promotion Site {$promotion_site->promo_site} created successfully.")->with('flash_type','success');
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
        $promotion_site = PromotionSite::find($id);

		return view('promotionsite/edit_promotionsite', compact('promotion_site'));
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
        $promotion_site = PromotionSite::find($id);
        
		$promotion_site->promo_site = $request->input('promo_site');
		$promotion_site->link = $request->input('link');
		$promotion_site->cost = $request->input('cost');
		$promotion_site->notes = $request->input('notes');
		
		$promotion_site->save();
		
		return redirect('/promotionsite')->with("flash_message", "Promotion Site {$promotion_site->promo_site} updated successfully.")->with('flash_type','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$promotion_site = PromotionSite::find($id);
        PromotionSite::destroy($id);
		return redirect("/promotionsite")->with("flash_message", "Promotion Site {$promotion_site->promo_site} deleted successfully.")->with('flash_type','success');
    }
}