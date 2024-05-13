<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Requests;
use App\User;
//'password' => bcrypt($data['password'])
class UserController extends Controller
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
        if (Auth::user()->permission >= 5) {
            return redirect('/');
        }

        $users = User::all();
        
        return view('adminuser/list_user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminuser/create_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->plain_password = $request->input('password');

        $user->bio = $request->input('bio');
        $user->website = $request->input('website');
        $user->facebook = $request->input('facebook');
        $user->twitter = $request->input('twitter');
        $user->amazon_page = $request->input('amazon_page');
        $user->instagram = $request->input('instagram');
        $user->bookbub = $request->input('bookbub');
        $user->goodreads = $request->input('goodreads');
        $user->pinterest = $request->input('pinterest');
        $user->notes = $request->input('notes');

        $user->permission = $request->input('admin') == 'on' ? 1 : 6;

        $user->save();

        return redirect('/user')->with('flash_message', "User {$user->name} created successfully.")->with('flash_type', 'success');
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
        $user = User::find($id);
        
        return view('adminuser/edit_user', compact('user'));
    }

    /**
     * Log as another user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_as(Request $request)
    {
        $user_id = $request->input('user_id');

        if (!Session::has('original_user')) {
            Session::put('original_user', Auth::id());
        }
        Session::put('new_user', $user_id);

        Auth::logout();
        Auth::loginUsingId($user_id);

        return redirect("/")->with("flash_message", "Viewing page as another user.")->with('flash_type', 'success');
    }
    
    /**
     * Return to original user.
     *
     * @return \Illuminate\Http\Response
     */
    public function quit_view()
    {
        $user_id = Session::get('original_user', 0);

        Auth::logout();
        Auth::loginUsingId($user_id);
        
        Session::forget('original_user');
        Session::forget('new_user');

        return redirect("/")->with("flash_message", "No longer viewing as other user.")->with('flash_type', 'info');
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
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $password = $request->input('password');
        if (isset($password) && !empty($password)) {
            $user->password = bcrypt($request->input('password'));
            $user->plain_password = $request->input('password');
        }

        $user->bio = $request->input('bio');
        $user->website = $request->input('website');
        $user->facebook = $request->input('facebook');
        $user->twitter = $request->input('twitter');
        $user->amazon_page = $request->input('amazon_page');
        $user->instagram = $request->input('instagram');
        $user->bookbub = $request->input('bookbub');
        $user->goodreads = $request->input('goodreads');
        $user->pinterest = $request->input('pinterest');
        $user->notes = $request->input('notes');

        $user->save();

        return redirect('/user')->with("flash_message", "User {$user->name} updated successfully.")->with('flash_type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        User::destroy($id);
        
        return redirect("/user")->with("flash_message", "User {$user->name} deleted successfully.")->with('flash_type', 'success');
    }
}
