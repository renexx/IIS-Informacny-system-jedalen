<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveJedloRequest;
use App\Jedlo;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JedloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('operator/menuIS');
    }


    public function create($prevadzka_id)
    {
        return view('operator.pridatJedlo')->with("prevadzka_id", $prevadzka_id);
    }


    public function store(SaveJedloRequest $request)
    {
        $path = $request->obrazok->store('uploads/posts-images');

        $jedlo = new Jedlo;
        $jedlo->id_stala_ponuka = $request->id_stala_ponuka;
        $jedlo->popis = $request->popis;
        $jedlo->hmotnost = $request->hmotnost;
        $jedlo->cena = $request->cena;

        if     ($request->typ == 'normal')     $jedlo->typ = 'normal';
        elseif ($request->typ == 'vegan')      $jedlo->typ = 'vegan';
        elseif ($request->typ == 'vegetarian') $jedlo->typ = 'vegetarian';
        elseif ($request->typ == 'bezlepok')   $jedlo->typ = 'bezlepok';
        elseif ($request->typ == 'raw')        $jedlo->typ = 'raw';
        elseif ($request->typ == 'fit')        $jedlo->typ = 'fit';

        if     ($request->kategoria == 'polievka')  $jedlo->kategoria = 'polievka';
        elseif ($request->kategoria == 'predjedlo') $jedlo->kategoria = 'predjedlo';
        elseif ($request->kategoria == 'hlavne')    $jedlo->kategoria = 'hlavne';
        elseif ($request->kategoria == 'priloha')   $jedlo->kategoria = 'priloha';
        elseif ($request->kategoria == 'dezert')    $jedlo->kategoria = 'dezert';
        elseif ($request->kategoria == 'salat')     $jedlo->kategoria = 'salat';
        elseif ($request->kategoria == 'snack')     $jedlo->kategoria = 'snack';

        if ($request->dostupnost == 'ano') $jedlo->dostupnost = 'ano';
        else                               $jedlo->dostupnost = 'nie';

        $jedlo->obrazok = "/storage/".$path;

        $jedlo->save();

        return back()->with('success','Vytvorili ste nové jedlo.');
    }


    public function show($id)
    {
        //
    }


    public function edit(Jedlo $jedlo)
    {
        return view("operator.upravitJedlo",["jedlo" => $jedlo]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'typ' => 'required',
            'popis' => 'required',
            'cena' => 'required',
            'dostupnost' => 'required',
            'hmotnost' => 'required',
            'kategoria' => 'required',
            'obrazok' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $jedlo = Jedlo::find($id);
        if (isset($request->obrazok))
        {
            $path = $request->obrazok->store('uploads/posts-images');
            $path = "/storage/".$path;
        }
        else
        {
            $path = $jedlo->obrazok;
        }

        //$jedlo->id_stala_ponuka = $request->input("id_stala_ponuka");
        $jedlo->popis = $request->input("popis");
        $jedlo->hmotnost = $request->input("hmotnost");
        $jedlo->cena = $request->input("cena");

        if     ($request->typ == 'normal')     $jedlo->typ = 'normal';
        elseif ($request->typ == 'vegan')      $jedlo->typ = 'vegan';
        elseif ($request->typ == 'vegetarian') $jedlo->typ = 'vegetarian';
        elseif ($request->typ == 'bezlepok')   $jedlo->typ = 'bezlepok';
        elseif ($request->typ == 'raw')        $jedlo->typ = 'raw';
        elseif ($request->typ == 'fit')        $jedlo->typ = 'fit';

        if     ($request->kategoria == 'polievka')  $jedlo->kategoria = 'polievka';
        elseif ($request->kategoria == 'predjedlo') $jedlo->kategoria = 'predjedlo';
        elseif ($request->kategoria == 'hlavne')    $jedlo->kategoria = 'hlavne';
        elseif ($request->kategoria == 'priloha')   $jedlo->kategoria = 'priloha';
        elseif ($request->kategoria == 'dezert')    $jedlo->kategoria = 'dezert';
        elseif ($request->kategoria == 'salat')     $jedlo->kategoria = 'salat';
        elseif ($request->kategoria == 'snack')     $jedlo->kategoria = 'snack';

        if ($request->dostupnost == 'ano') $jedlo->dostupnost = 'ano';
        else                               $jedlo->dostupnost = 'nie';

        $jedlo->obrazok = $path;

        $jedlo->save();

        //return $request->all(); for debug
        return back()->with('success', 'Jedlo bolo úspešne editované.');
    }


    public function destroy($id)
    {
      Jedlo::destroy($id);

      return back()->with('success', 'Jedlo bolo vymazané');
    }
}
