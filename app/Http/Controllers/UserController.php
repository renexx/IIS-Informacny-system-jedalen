<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\UpdateUserRequest;

use Illuminate\Validation\Rule;
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
    public function edit(User $uzivatel)
    {
        return view("zakaznik.upravenieProfilu",["uzivatel" => $uzivatel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {

      $uzivatel = \App\User::find($id);


      $uzivatel->email = $request->input('email');
      $uzivatel->name = $request->input('name');
      $uzivatel->lastname = $request->input('lastname');
      $uzivatel->mesto = $request->input('mesto');
      $uzivatel->ulica = $request->input('ulica');
      $uzivatel->cislo_domu = $request->input('cislo_domu');
      $uzivatel->psc = $request->input('psc');
      $uzivatel->password = bcrypt($request->input('password'));
      $uzivatel->save();

      return back()->with('success','Profil bol úspešne editovaný');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect("prehladUzivatelia")->with('success', 'Užívateľ bol vymazaný');
    }
}
