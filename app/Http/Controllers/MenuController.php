<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\DenneMenu;
use App\JedloDenneMenu;
use App\NapojDenneMenu;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use App\Exceptions;

class MenuController extends Controller
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
    public function create($oznacenie)
    {
        return view('operator.pridatDenneMenu')->with("oznacenie", $oznacenie);
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
            'interny_limit' => 'required',
            'oznacenie' => 'required',
        ]);

        $menu = new DenneMenu;

        $menu->interny_limit = $request->interny_limit;
        $menu->oznacenie = $request->oznacenie;

        $menu->save();

        return redirect("/menu/IS/$request->oznacenie")->with('success','Vytvorili ste nové denné menu.');
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
        //
    }

    public function addJedlo($oznacenie, $id_jedlo)
    {
        $id_menu = \App\DenneMenu::all()->where("oznacenie", $oznacenie)->last();
        $interny_limit = $id_menu->interny_limit;
        $id_menu = $id_menu->id_denna_ponuka;

        $pocet_v_menu = \App\JedloDenneMenu::all()->where("id_denna_ponuka", $id_menu)->count() + \App\NapojDenneMenu::all()->where("id_denna_ponuka", $id_menu)->count();
        if ($pocet_v_menu >= $interny_limit)
            return back()->with("error", "Prekročenie interného limitu denného menu.");

        $menu_jedlo = new JedloDenneMenu;
        $menu_jedlo->id_denna_ponuka = $id_menu;
        $menu_jedlo->id_jedlo = $id_jedlo;
        try {
            $menu_jedlo->save();
        } catch (QueryException $e) {
            return back()->with("error", "Jedlo už bolo pridané do denného menu.");
        }
        return back()->with("success", "Jedlo bolo pridané do denného menu.");
    }

    public function addNapoj($oznacenie, $id_napoj)
    {
        $id_menu = \App\DenneMenu::all()->where("oznacenie", $oznacenie)->last();
        $interny_limit = $id_menu->interny_limit;
        $id_menu = $id_menu->id_denna_ponuka;

        $pocet_v_menu = \App\NapojDenneMenu::all()->where("id_denna_ponuka", $id_menu)->count() + \App\JedloDenneMenu::all()->where("id_denna_ponuka", $id_menu)->count();
        if ($pocet_v_menu >= $interny_limit)
            return back()->with("error", "Prekročenie interného limitu denného menu.");

        $menu_napoj = new NapojDenneMenu;
        $menu_napoj->id_denna_ponuka = $id_menu;
        $menu_napoj->id_napoj = $id_napoj;
        try {
            $menu_napoj->save();
        } catch (QueryException $e) {
            return back()->with("error", "Nápoj už bol pridaný do denného menu.");
        }
        return back()->with("success", "Nápoj bol pridaný do denného menu.");
    }

    public function removeJedlo($oznacenie, $id_jedlo)
    {
        $id_menu = \App\DenneMenu::all()->where("oznacenie", $oznacenie)->last();
        $id_menu = $id_menu->id_denna_ponuka;

        //JedloDenneMenu::destroy($id_menu.$id_jedlo);
        $jedlo = \App\JedloDenneMenu::all()->where("id_denna_ponuka", $id_menu);
        foreach ($jedlo as $value) {
            if ($value->id_jedlo == $id_jedlo)
            {
                $jedlo = $value;
                break;
            }
        }
        $jedlo->delete();

        return back()->with("success", "Jedlo bolo odstránené z denného menu.");
    }

    public function removeNapoj($oznacenie, $id_napoj)
    {
        $id_menu = \App\DenneMenu::all()->where("oznacenie", $oznacenie)->last();
        $id_menu = $id_menu->id_denna_ponuka;

        //NapojDenneMenu::destroy($id_menu.$id_napoj);
        $napoj = \App\NapojDenneMenu::all()->where("id_denna_ponuka", $id_menu);
        foreach ($napoj as $value) {
            if ($value->id_napoj == $id_napoj)
            {
                $napoj = $value;
                break;
            }
        }
        $napoj->delete();

        return back()->with("success", "Nápoj bol odstránený z denného menu.");
    }

    public function menu($oznacenie)
    {
        $denne_jedlo = $this->denne_jedlo_funkcia($oznacenie);
        $denny_napoj = $this->denny_napoj_funkcia($oznacenie);

        $meno = \App\Prevadzka::find($oznacenie);
        $jedlo1 = \App\StalaPonuka::find($oznacenie);
        $napoj1 = \App\StalaPonuka::find($oznacenie);

        $premenna1 = \App\Jedlo::all()->where('id_stala_ponuka', $jedlo1->id_stala_ponuka);
        $premenna2 = \App\Napoj::all()->where('id_stala_ponuka', $napoj1->id_stala_ponuka);


        if ($denne_jedlo == NULL){
            $denne_jedlo = array();
        }
        if ($denny_napoj == NULL){
            $denny_napoj = array();
        }
        if(count($premenna1) == 0){
            $jedlo = array();
        }
        else $jedlo = $jedlo1->jedlo()->get();

        if (count($premenna2) == 0){
            $napoj = array();
        }
        else $napoj = $napoj1->napoj()->get();
        return view('zakaznik.menu')->with('jedlo', $jedlo)->with('napoj', $napoj)->with('meno', $meno)->with('denny_napoj', $denny_napoj)->with('denne_jedlo', $denne_jedlo);
    }

    public function menuIS($oznacenie)
    {

        $denne_jedlo = $this->denne_jedlo_funkcia($oznacenie);
        $denny_napoj = $this->denny_napoj_funkcia($oznacenie);

        $meno = \App\Prevadzka::find($oznacenie);
        $jedlo1 = \App\StalaPonuka::find($oznacenie);
        $napoj1 = \App\StalaPonuka::find($oznacenie);

        $premenna1 = \App\Jedlo::all()->where('id_stala_ponuka', $jedlo1->id_stala_ponuka);
        $premenna2 = \App\Napoj::all()->where('id_stala_ponuka', $napoj1->id_stala_ponuka);


        if ($denne_jedlo == NULL){
            $denne_jedlo = array();
        }
        if ($denny_napoj == NULL){
            $denny_napoj = array();
        }
        if(count($premenna1) == 0){
            $jedlo = array();
        }
        else $jedlo = $jedlo1->jedlo()->get();

        if (count($premenna2) == 0){
            $napoj = array();
        }
        else $napoj = $napoj1->napoj()->get();

        return view('operator.menuIS')->with('jedlo', $jedlo)->with('napoj', $napoj)->with('meno', $meno)->with('denny_napoj', $denny_napoj)->with('denne_jedlo', $denne_jedlo);
    }
    public function filtrovat_stalu($oznacenie, $filter)
    {
        $denne_jedlo = $this->denne_jedlo_funkcia($oznacenie);
        $denny_napoj = $this->denny_napoj_funkcia($oznacenie);

        $meno = \App\Prevadzka::find($oznacenie);
        $jedlo_var = \App\StalaPonuka::find($oznacenie)->jedlo()->get();
        $napoj_var = \App\StalaPonuka::find($oznacenie)->napoj()->get();
        $jedlo = $jedlo_var->where('typ', $filter);
        $napoj = $napoj_var->where('typ', $filter);

        return view('zakaznik.menu')->with('jedlo', $jedlo)->with('napoj', $napoj)->with('meno', $meno)->with('denny_napoj', $denny_napoj)->with('denne_jedlo', $denne_jedlo);

    }

    private function denne_jedlo_funkcia($oznacenie)
    {
        $get_key = \App\DenneMenu::all()->where('oznacenie', $oznacenie)->last();
        if($get_key == NULL) return NULL;
        $key = $get_key->id_denna_ponuka;

        $get_jedlo = \App\JedloDenneMenu::all()->where('id_denna_ponuka', $key);
        $denne_jedlo = array();
        foreach($get_jedlo as $var){
            $polozka = \App\Jedlo::all()->where('id_jedlo', $var->id_jedlo);
            array_push($denne_jedlo, $polozka);
        }
        return $denne_jedlo;
    }

    private function denny_napoj_funkcia($oznacenie)
    {
        $get_key = \App\DenneMenu::all()->where('oznacenie', $oznacenie)->last();
        if($get_key == NULL) return NULL;
        $key = $get_key->id_denna_ponuka;
        $get_napoj = \App\NapojDenneMenu::all()->where('id_denna_ponuka', $key);
        $denny_napoj = array();
        foreach($get_napoj as $prem){
            $polozka2 = \App\Napoj::all()->where('id_napoj', $prem->id_napoj);
            array_push($denny_napoj, $polozka2);
        }
        return $denny_napoj;
    }
}
