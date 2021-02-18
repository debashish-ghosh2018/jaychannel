<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInfo;

class EnterprisesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $you = auth()->user();
        //$members = User::where('user_type', '=', 'Member')->toSql();
        $enterprises = User::where('user_type', '=', 'Enterprise')->get();
        //dd($members);
        return view('admin.dashboard.enterprises.enterprisesList', compact('enterprises', 'you'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //dd($user);
        return view('admin.dashboard.enterprises.enterpriseShow', compact( 'user' ));
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
        return view('admin.dashboard.enterprises.enterpriseEditForm', compact('user'));
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
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],         //'password' => ['string', 'min:3'],
            'address' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'numeric'], 
        ]);
        $user = User::find($id);
        $user->name       = $request->input('name');
        $user->email      = $request->input('email');
        $user->address    = $request->input('address');
        $user->tel        = $request->input('tel');

        $new_password = $request->input('password');
        if(!empty($new_password)){
            $user->password = Hash::make($new_password);
        }
        $user->save();

        $request->session()->flash('message', 'Successfully updated enterprise');
        return redirect()->route('enterprises.index');
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
        if($user){
            $user->delete();
        }
        return redirect()->route('enterprises.index');
    }
}
