<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveNapojRequest;
use App\Napoj;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NapojController extends Controller
{

    public function index()
    {
        return view('operator/menuIS');
    }


    public function create($prevadzka_id)
    {
        return view('operator/pridatNapoj')->with('prevadzka_id', $prevadzka_id);
    }


    public function store(SaveNapojRequest $request)
    {
        $path = $request->obrazok->store('uploads/posts-images');

        $napoj = new Napoj;
        $napoj->id_stala_ponuka = $request->id_stala_ponuka;
        $napoj->popis = $request->popis;
        $napoj->objem = $request->objem;
        $napoj->cena = $request->cena;

        if     ($request->typ == 'normal')     $napoj->typ = 'normal';
        elseif ($request->typ == 'vegan')      $napoj->typ = 'vegan';
        elseif ($request->typ == 'vegetarian') $napoj->typ = 'vegetarian';
        elseif ($request->typ == 'bezlepok')   $napoj->typ = 'bezlepok';
        elseif ($request->typ == 'raw')        $napoj->typ = 'raw';
        elseif ($request->typ == 'fit')        $napoj->typ = 'fit';

        if     ($request->kategoria == 'vino') $napoj->kategoria = 'vino';
        elseif ($request->kategoria == 'pivo') $napoj->kategoria = 'pivo';
        elseif ($request->kategoria == 'kava') $napoj->kategoria = 'kava';
        elseif ($request->kategoria == 'caj')  $napoj->kategoria = 'caj';
        elseif ($request->kategoria == 'drink') $napoj->kategoria = 'drink';
        elseif ($request->kategoria == 'limonada') $napoj->kategoria = 'limonada';

        if ($request->dostupnost == 'ano') $napoj->dostupnost = 'ano';
        else                               $napoj->dostupnost = 'nie';

        if ($request->alko == 'ano') $napoj->alko = 'ano';
        else                         $napoj->alko = 'nie';

        $napoj->obrazok = "/storage/".$path;

        $napoj->save();

        return back()->with('success','Vytvorili ste nový nápoj.');
    }


    public function show($id)
    {
        //
    }


    public function edit(Napoj $napoj)
    {
        return view("operator.upravitNapoj",["napoj" => $napoj]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'typ' => 'required',
            'popis' => 'required',
            'cena' => 'required',
            'dostupnost' => 'required',
            'objem' => 'required',
            'kategoria' => 'required',
            'alko' => 'required',
            'obrazok' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $napoj = Napoj::find($id);
        if (isset($request->obrazok))
        {
            $path = $request->obrazok->store('uploads/posts-images');
            $path = "/storage/".$path;
        }
        else
        {
            $path = $napoj->obrazok;
        }

        //$napoj->id_stala_ponuka = $request->input("id_stala_ponuka");
        $napoj->popis = $request->input("popis");
        $napoj->objem = $request->input("objem");
        $napoj->cena = $request->input("cena");

        if     ($request->typ == 'normal')     $napoj->typ = 'normal';
        elseif ($request->typ == 'vegan')      $napoj->typ = 'vegan';
        elseif ($request->typ == 'vegetarian') $napoj->typ = 'vegetarian';
        elseif ($request->typ == 'bezlepok')   $napoj->typ = 'bezlepok';
        elseif ($request->typ == 'raw')        $napoj->typ = 'raw';
        elseif ($request->typ == 'fit')        $napoj->typ = 'fit';

        if     ($request->kategoria == 'vino') $napoj->kategoria = 'vino';
        elseif ($request->kategoria == 'pivo') $napoj->kategoria = 'pivo';
        elseif ($request->kategoria == 'kava') $napoj->kategoria = 'kava';
        elseif ($request->kategoria == 'caj')  $napoj->kategoria = 'caj';
        elseif ($request->kategoria == 'drink') $napoj->kategoria = 'drink';
        elseif ($request->kategoria == 'limonada') $napoj->kategoria = 'limonada';

        if ($request->dostupnost == 'ano') $napoj->dostupnost = 'ano';
        else                               $napoj->dostupnost = 'nie';

        if ($request->alko == 'ano') $napoj->alko = 'ano';
        else                         $napoj->alko = 'nie';

        $napoj->obrazok = $path;

        $napoj->save();

        //return $request->all(); for debug
        return back()->with('success', 'Nápoj bol úspešne editovaný.');
    }


    public function destroy($id)
    {
      Napoj::destroy($id);

      return back()->with('success', 'Napoj bol vymazaný');
    }
}
