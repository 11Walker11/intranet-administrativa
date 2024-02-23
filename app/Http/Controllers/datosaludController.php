<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;
use App\Models\Enfermedades;
use App\Models\Datosalud;
use Session;

class datosaludController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporteD()
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $datosaluds = \DB::table('datosaluds')
        ->join('pacientes','pacientes.id','=','datosaluds.idpa')
        ->join('enfermedades','enfermedades.id','=','datosaluds.idenf')
        ->select('datosaluds.id as idds','pacientes.nombrep as paciente','pacientes.id','datosaluds.peso','datosaluds.estatura','datosaluds.imc',
        'datosaluds.edad','datosaluds.sexo','enfermedades.nombre as enfermedad','enfermedades.id')
        ->get();
        //return $datosaluds;

        return view('datosalud.index')
            ->with('datosaluds',$datosaluds);
        }else{
            Session::flash('ERROR',"Es necesario logearse antes de continuar");
            return redirect()->route('login');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createD()
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $pacientes = Pacientes::all();
        $enfermedades = Enfermedades::all();
        return view('datosalud.create')
            ->with('pacientes',$pacientes)
            ->with('enfermedades',$enfermedades);
        }else{
            Session::flash('ERROR',"Es necesario logearse antes de continuar");
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeD(Request $request)
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $this->validate($request,[
            'nombre'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'idpa'=>'required',
            'peso'=>'required',
            'estatura'=>'required',
            'imc'=>'required',
            'edad'=>'required',
            'sexo'=>'required',
            'idenf'=>'required',
        
        ]);
        
        $datosaluds = new Datosalud();

        $datosaluds->idpa = $request->get('idpa');
        $datosaluds->peso = $request->get('peso');
        $datosaluds->estatura = $request->get('estatura');
        $datosaluds->imc = $request->get('imc');
        $datosaluds->edad = $request->get('edad');
        $datosaluds->sexo = $request->get('sexo');
        $datosaluds->idenf = $request->get('idenf');
        $datosaluds->save();

        Session::flash('mensaje',"El registro $request->nombre ha sido dado de alta correctamente");
        return redirect()->route('reporteDatosalud');
        }else{
            Session::flash('ERROR',"Es necesario logearse antes de continuar");
            return redirect()->route('login');
        }
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
    public function editD($id)
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $datosaluds = \DB::table('datosaluds')
        ->join('pacientes','pacientes.id','=','datosaluds.idpa')
        ->join('enfermedades','enfermedades.id','=','datosaluds.idenf')
        ->select('datosaluds.id as idds','pacientes.nombrep as paciente','pacientes.id','datosaluds.peso','datosaluds.estatura','datosaluds.imc',
        'datosaluds.edad','datosaluds.sexo','datosaluds.idpa','datosaluds.idenf','enfermedades.nombre as enfermedad','enfermedades.id')
        ->where('datosaluds.id','=',$id)
        ->get();
        //return $datosaluds;
        
        $idrtengo = $datosaluds[0]->idpa;
        $pacientes = Pacientes::where('pacientes.id','!=',$idrtengo)
                                ->get();
        $idttengo = $datosaluds[0]->idenf;
        $enfermedades = Enfermedades::where('enfermedades.id','!=',$idttengo)
                                ->get();
        return view('datosalud.edit')
            ->with('datosaluds',$datosaluds[0])
            ->with('pacientes',$pacientes)
            ->with('enfermedades',$enfermedades);
        }else{
            Session::flash('ERROR',"Es necesario logearse antes de continuar");
            return redirect()->route('login');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateD(Request $request)
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $this->validate($request,[
            'nombre'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'idpa'=>'required',
            'peso'=>'required',
            'estatura'=>'required',
            'imc'=>'required',
            'edad'=>'required',
            'sexo'=>'required',
            'idenf'=>'required',
        
        ]);
        
        $datosaluds = Datosalud::find($request->id);

        $datosaluds->idpa = $request->get('idpa');
        $datosaluds->peso = $request->get('peso');
        $datosaluds->estatura = $request->get('estatura');
        $datosaluds->imc = $request->get('imc');
        $datosaluds->edad = $request->get('edad');
        $datosaluds->sexo = $request->get('sexo');
        $datosaluds->idenf = $request->get('idenf');
        $datosaluds->save();

        Session::flash('mensaje',"El registro $request->nombre ha sido dado de alta correctamente");
        return redirect()->route('reporteDatosalud');
        }else{
            Session::flash('ERROR',"Es necesario logearse antes de continuar");
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyD($id)
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $datosaluds = Datosalud::find($id);
        $datosaluds->delete();

        Session::flash('mensaje', "El producto con clave $id ha sido eliminado correctamente");
        return redirect()->route('reporteDatosalud');
        }else{
            Session::flash('ERROR',"Es necesario logearse antes de continuar");
            return redirect()->route('login');
        }
    }
}
