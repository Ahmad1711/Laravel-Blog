<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin'); 

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'uname'=>'required',
            'email'=>'required|email'
        ]);
        $user=User::create([
            'name'=>$request->uname,
            'email'=>$request->email,
            'password'=>bcrypt('password')
        ]);
        $profile=Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'/uploads/avatars/1569830366E (156).jpg'
        ]);
        session()->flash('success', 'User Was Created Successfully');
        return redirect()->route('user.index');
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
        //
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
        //
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
        $user->profile->delete();
        $user->delete();
        session()->flash('success', 'User Was Delete Successfully');
        return redirect()->route('user.index');
    }

    public function admin($id)
    {
        $user=User::find($id);
        $user->admin=1;
        $user->save();
        session()->flash('success', 'User admin Successfully');
        return redirect()->route('user.index');

    }
    public function notadmin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        session()->flash('success', 'User notadmin Successfully');
        return redirect()->route('user.index');

    }
}

