<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=false)
    {
        $user = Auth::user();
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=false)
    {
        $user = Auth::user();

        return view('users.edit')->withUser($user);
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
        $this->validate($request, array(
            'name' => 'required|max:255|min:3',
            'dob' => 'required|date',
            'email' => 'required|email|max:255',
            ));

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->dob = Carbon::createFromFormat('d/m/Y', $request->input('dob'))->format('Y-m-d');
        $user->phone = $request->input('phone');
        $user->mobile = $request->input('mobile');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->suburb = $request->input('suburb');

        $user->save();

        if(Auth::id() == $id){
            return redirect()->route('user-details.show');
        }else{
            return redirect()->route('user-details.show', $user->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
