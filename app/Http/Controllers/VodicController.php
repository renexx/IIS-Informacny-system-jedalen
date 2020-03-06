<?php

namespace App\Http\Controllers;
use App\Vodic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SaveVodicRequest;
use App\Http\Requests\UpdateVodicRequest;
class VodicController extends Controller
{
    //protected $table = "vodic";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /*public function __construct()
     {
       $this->middleware('auth:vodici');
     }*/

    public function index()
    {
        return view("vodicIS");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pridanieVodica");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveVodicRequest $request)
    {
      $vodic = new Vodic;
      $vodic->login = $request->input('login');
      $vodic->meno = $request->input('meno');
      $vodic->priezvisko = $request->input('priezvisko');
      $vodic->mesto = $request->input('mesto');
      $vodic->ulica = $request->input('ulica');
      $vodic->cislo_domu = $request->input('cislo_domu');
      $vodic->psc = $request->input('psc');
      $vodic->password = bcrypt($request->input('password'));
      $vodic->save();
        return redirect('prehladVodici')->with('success', 'Vodič bol vytvorený');
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
    public function edit(Vodic $vodic)
    {
        return view("admin.upravenieVodica",["vodic" => $vodic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVodicRequest $request, $id)
    {
      $vodic =  Vodic::find($id);

      $vodic->login = $request->input('login');
      $vodic->meno = $request->input('meno');
      $vodic->priezvisko = $request->input('priezvisko');
      $vodic->mesto = $request->input('mesto');
      $vodic->ulica = $request->input('ulica');
      $vodic->cislo_domu = $request->input('cislo_domu');
      $vodic->psc = $request->input('psc');
      $vodic->password = bcrypt($request->input('password'));
      $vodic->save();

      //return $request->all(); for debug
      return redirect("prehladVodici")->with('success', 'Vodič bol editovaný');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Vodic::destroy($id);

      return redirect("prehladVodici")->with('success', 'Vodič bol vymazaný');
    }
}
