<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\JedloDenneMenu;
use Illuminate\Http\Request;

class JedloDenneMenuController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {

    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id_denna_ponuka, $id_jedlo)
    {
        JedloDenneMenu::destroy($id_denna_ponuka)->where('id_jedlo', $id_jedlo);

        return redirect("prehladVodici")->with('success', 'Vodič bol vymazaný');
    }
}
