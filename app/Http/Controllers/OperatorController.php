<?php

namespace App\Http\Controllers;
use App\Operator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\Rule;
class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //protected $table = "operator";

   /* public function __construct()
    {
        $this->middleware('auth:administrator');
     // $this->middleware('auth:operatori');

    }*/


    public function index()
    {
        return view("menuIS");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pridanieOperatora");
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
          'login' => 'required|unique:operator',
          'password' => 'required|confirmed',
        ]);
        $operator = new Operator;
        $operator->login = $request->input('login');
        $operator->password = bcrypt($request->input('password'));
        $operator->save();
        return redirect("prehladOperatori")->with('success', 'Operator bol vytvorený');
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
    public function edit(Operator $operator)
    {
        return view("admin.upravenieOperatora",["operator" => $operator]);
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

      $this->validate($request,[
        'login' => 'required',
        'password' => 'required|confirmed',
      ]);

      $operator =  Operator::find($id);

      $operator->login = $request->input('login');
      $operator->password = bcrypt($request->input('password'));

      $operator->save();

      //return $request->all(); for debug
      return redirect("prehladOperatori")->with('success', 'Operator bol editovaný');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Operator::destroy($id)){
        \Session::flash('status-success', 'Operator $operator->login bol úspešne vymazaný');

      }
      else{
        \Session::flash('status-fail','Operatora <b>$operator->login</b> sa nepodarilo odstrániť');
      }
        return redirect("prehladOperatori")->with('success', 'Operator bol vymazany');
    }

    Public function planVodici()
    {
        $planVodicov = \App\adminVodici::all();
        return view('operator.plan')->with('planVodicov' , $planVodicov);
    }
}
