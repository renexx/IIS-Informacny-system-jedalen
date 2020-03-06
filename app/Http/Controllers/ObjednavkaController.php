<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ObjednavkaJedlo;
use App\Objednavka;
use App\ObjednavkaNapoj;
use App\Http\Requests\ObjednavkaRequest;
class ObjednavkaController extends Controller
{

    public function index()
    {
        //
    }


    public function create($prevadzka_id, $polozka_id, $typ)
    {
        $polozka_id = (int)$polozka_id;
        return view('zakaznik.udaje')->with("prevadzka_id", $prevadzka_id)->with("polozka_id", $polozka_id)->with("typ", $typ);
    }


    public function store(ObjednavkaRequest $request)
    {
        $objednavka = new Objednavka;
        $objednavka->name = $request->name;
        $objednavka->lastname = $request->lastname;
        $objednavka->stav = "nova";
        $objednavka->mesto = $request->mesto;
        $objednavka->ulica = $request->ulica;
        $objednavka->cislo_domu = $request->cislo_domu;
        $objednavka->psc = $request->psc;
        $objednavka->oznacenie = $request->oznacenie;
        $objednavka->poznamka = $request->poznamka;
        $objednavka->id = $request->id;
        if($request->platba =="hotovost") $objednavka->platba = "hotovost";
        else $objednavka->platba = "karta";

        $objednavka->save();

        if ($request->typ == "jedlo"){
            $objednavka_jedlo = new ObjednavkaJedlo;
            $objednavka_jedlo->id_jedlo = $request->id_jedlo;
            $objednavka_jedlo->id_objednavka = $objednavka->id_objednavka;
            $objednavka_jedlo->save();
        }

        elseif ($request->typ == "napoj"){
            $objednavka_napoj = new ObjednavkaNapoj;
            $objednavka_napoj->id_napoj = $request->id_jedlo;
            $objednavka_napoj->id_objednavka = $objednavka->id_objednavka;
            $objednavka_napoj->save();
        }
        return back()->with("success", "Objednávka bola vykonaná, čakajte na doručenie.");
    }

    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id, $id_vodic)
    {
        $objednavka = \App\Objednavka::find($id);
        $objednavka->stav = "cakajuca";
        #var_dump($objednavka);
        $objednavka->id_vodic = $id_vodic;
        $objednavka->save();
        return back();

    }


    public function destroy($id)
    {
        //
    }

    public function vybavit($id)
    {
        $objednavka = \App\Objednavka::find($id);
        $objednavka->stav = "rozvoz";
        $objednavka->save();
        return back();
    }

    public function dorucit($id)
    {
        $objednavka = \App\Objednavka::find($id);
        $objednavka->stav = "hotovo";
        $objednavka->save();
        return back();
    }


}
