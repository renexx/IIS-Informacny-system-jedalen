<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
class PagesController extends Controller
{
    public function header()
    {
        return view('header');
    }

    public function index()
    {
        $prevadzky = \App\Prevadzka::all();
        return view('index')->with('prevadzky', $prevadzky);
    }


    public function sledovat()
    {
        $id = \Auth::user()->id;
        $objednavka = \App\Objednavka::all()->where('id', $id)->sortByDesc('id_objednavka');
        $objednavka_last = $objednavka->first();
        $objednavka = $objednavka->slice(1,count($objednavka));
       // return $objednavka_last;
        return view('zakaznik.sledovat')->with('objednavka', $objednavka)->with('objednavka_last', $objednavka_last);
    }

    public function udaje()
    {
        return view('zakaznik.udaje');
    }



    public function vstupIS()
    {
        return view('vstupIS');
    }


    public function plan()
    {
        $objednavky = \App\Objednavka::all()->where('stav', "nova");
        $planVodicov = \App\adminVodici::all();
        return view('operator.plan')->with('planVodicov' , $planVodicov)->with('objednavky', $objednavky);
    }

    public function prevadzkyIS()
    {
        $prevadzky = \App\Prevadzka::all();

        return view('operator.prevadzkyIS')->with('prevadzky', $prevadzky);
    }

    public function pridatPolozku()
    {
        return view('operator.pridatJedlo');
    }

    public function ukoncit()
    {
        $prevadzky = \App\Prevadzka::all();
        return view('operator.ukoncit')->with('prevadzky', $prevadzky);
    }

    public function upravit()
    {
        return view('operator.upravit');
    }

    public function vodicIS()
    {
        $id = \Auth::guard('vodici')->id();
        $objednavky = \App\Objednavka::all()->where("id_vodic", $id);
        $objednavky_cakajuce = $objednavky->where('stav', "cakajuca");

        $objednavky_rozvoz = $objednavky->where('stav', "rozvoz");
        return view('vodic.vodicIS')->with("objednavky_cakajuce", $objednavky_cakajuce)->with("objednavky_rozvoz", $objednavky_rozvoz);
    }

    public function adminIS()
    {
        return view('admin.admin');
    }

    Public function prehladUzivatelia()
    {
        $prehladUzivatelov = \App\adminUzivatelia::all();
        return view('admin.admin-uzivatelia')->with('prehladUzivatelov', $prehladUzivatelov);
    }

    Public function prehladObj()
    {
        $prehladObjed = \App\Objednavka::all();
        return view('operator.prehladObjednavok')->with('prehladObjed', $prehladObjed);
    }

    Public function prehladOperatori()
    {
        $prehladOperatorov = \App\adminOperatori::all();
        return view('admin.admin-operatori')->with('prehladOperatorov', $prehladOperatorov);
    }

    Public function prehladVodici()
    {
        $prehladVodicov = \App\adminVodici::all();
        return view('admin.admin-vodici')->with('prehladVodicov' , $prehladVodicov);
    }


    Public function operatorIS()
    {
        return view('operator.operatorIS');
    }




}
