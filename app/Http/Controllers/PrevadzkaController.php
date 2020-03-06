<?php

namespace App\Http\Controllers;

use App\DenneMenu;
use App\Http\Controllers\Controller;
use App\Http\Requests\SavePrevadzkaRequest;
use App\Prevadzka;
use App\StalaPonuka;
use Illuminate\Http\Request;
use Illuminate\View\View;


class PrevadzkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prevadzky = \App\Prevadzka::all();

        return view('index')->with('prevadzky', $prevadzky);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operator.novaP');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePrevadzkaRequest $request)
    {
        $path = $request->obrazok->store('uploads/posts-images');

        $prevadzky = new Prevadzka;
        $prevadzky->nazov = $request->nazov;
        $prevadzky->mesto = $request->mesto;
        $prevadzky->ulica = $request->ulica;
        $prevadzky->cislo_domu = $request->cislo_domu;
        $prevadzky->psc = $request->psc;
        $prevadzky->uzv_objednavok = $request->uzv_objednavok;
        $prevadzky->koniec_objednavok = "nie";
        $prevadzky->obrazok = "/storage/".$path;

        $prevadzky->save();

        $stalaponuka = New StalaPonuka;
        $stalaponuka->oznacenie = $prevadzky->oznacenie;
        $stalaponuka->save();

        $dennaponuka = New DenneMenu;
        $dennaponuka->oznacenie = $prevadzky->oznacenie;
        $dennaponuka->interny_limit = $request->interny_limit;
        $dennaponuka->save();
        return back()->with('success','Vytvorili ste novú prevádzku.');
    }

    public function ukoncitObj($id)
    {
        $prevadzky = Prevadzka::find($id);
        $prevadzky->koniec_objednavok = "ano";
        $prevadzky->save();
        return back();
    }

    public function spustitObj($id)
    {
        $prevadzky = Prevadzka::find($id);
        $prevadzky->koniec_objednavok = "nie";
        $prevadzky->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prevadzka $prevadzky)
    {
        return view("operator.upravit",["prevadzky" => $prevadzky]);
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
       // $prevadzka->update($request->all());
       $this->validate($request,[
           'nazov' => 'required',
           'mesto' => 'required',
           'ulica' => 'required',
           'cislo_domu' => 'required',
           'psc' => 'required',
           'uzv_objednavok' => 'required',
           'obrazok' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       $prevadzky = Prevadzka::find($id);
       if (isset($request->obrazok))
       {
           $path = $request->obrazok->store('uploads/posts-images');
           $path = "/storage/".$path;
       }
       else
       {
           $path = $prevadzky->obrazok;
       }

        $prevadzky->nazov = $request->input('nazov');
        $prevadzky->mesto = $request->input('mesto');
        $prevadzky->ulica = $request->input('ulica');
        $prevadzky->cislo_domu = $request->input('cislo_domu');
        $prevadzky->psc = $request->input('psc');
        $prevadzky->uzv_objednavok = $request->input('uzv_objednavok');
        $prevadzky->obrazok = $path;

        $prevadzky->save();

        //return $request->all(); for debug
        return back()->with('success', 'Prevádzka bola úspešne editovaná.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      Prevadzka::destroy($id);

      return redirect("prevadzkyIS")->with('success', 'Prevadzka bola vymazana');
    }
}
