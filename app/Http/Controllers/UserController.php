<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backoffice.user.all', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('backoffice.user.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nickname' => 'required',
            'email' => 'required',
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required'
        ]);

        // store profil
        $profil = new Profil();
        $profil->name = $request->name;
        $profil->age = $request->age;
        $profil->phone = $request->phone;
        $profil->created_at = now();
        $profil->save();

        // create
        $user = new User();
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->profil_id = $profil->id;
        $user->created_at = now();
        $user->save();

        return redirect()->route('users.index')->with('message', 'le user à bien été créer.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backoffice.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backoffice.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nickname' => 'required',
            'email' => 'required',
            'name' => 'required',
            'age' => 'required',
            'phone' => 'required'
        ]);

        // store profil
        $profil = $user->profil;
        $profil->name = $request->name;
        $profil->age = $request->age;
        $profil->phone = $request->phone;
        $profil->updated_at = now();
        $profil->save();

        // create
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->profil_id = $profil->id;
        $user->updated_at = now();
        $user->save();

        return redirect()->route('users.index')->with('message', 'le user à bien été édité.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        $user->profil->delete();
        return redirect()->back()->with("sucessMessage", "Le user à bien été supprimé");
    }
}
