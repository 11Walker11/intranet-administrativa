<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;
use App\Models\Consultas;
use App\Models\Usuarios;
use Session;

class consultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporteC()
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $consultas = \DB::table('consultas')
        ->join('pacientes','pacientes.id','=','consultas.idpa')
        ->join('usuarios','usuarios.id','=','consultas.idusu')
        ->select('consultas.id as idco','consultas.ruta','pacientes.nombrep as paciente','pacientes.id','consultas.fecha','consultas.costo',
        'usuarios.nombre as usuario','usuarios.id')
        ->get();
        //return $consultas;

        return view('consultas.index')
            ->with('consultas',$consultas);
        }else{
            Session::flash('ERROR',"Es necesario loguearse antes de continuar");
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createC()
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $pacientes = Pacientes::all();
        $usuarios = Usuarios::all();
        return view('consultas.create')
            ->with('pacientes',$pacientes)
            ->with('usuarios',$usuarios);
        }else{
            Session::flash('ERROR',"Es necesario loguearse antes de continuar");
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeC(Request $request)
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $this->validate($request,[
            'idpa'=>'required',
            'fecha'=>'required|date',
            'idusu'=>'required',
            'costo'=>'required|numeric',
            'foto'=>'mimes:jpg,png,jpeg'
        ]);
        $file = $request->file('foto');
        if($file!="")
        {
          $ldate = date('Ymd_His_');
          $img = $file->getClientOriginalName();
          $img2 = $ldate.$img;
          \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2 = "consultas.jpg";
        }

        $consultas = new Consultas();

        $consultas->idpa = $request->get('idpa');
        $consultas->fecha = $request->get('fecha');
        $consultas->idusu = $request->get('idusu');
        $consultas->costo = $request->get('costo');
        $consultas->ruta = $img2;
        $consultas->save();

        Session::flash('mensaje',"El registro $request->idco ha sido dado de alta correctamente");
        return redirect()->route('reporteConsultas');
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
    public function editC($id)
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $consultas = \DB::table('consultas')
        ->join('pacientes','pacientes.id','=','consultas.idpa')
        ->join('usuarios','usuarios.id','=','consultas.idusu')
        ->select('consultas.id as idco','pacientes.nombrep as paciente','consultas.ruta','pacientes.id','consultas.idpa','consultas.fecha','consultas.idusu','consultas.costo',
        'usuarios.nombre as usuario','usuarios.id')
        ->where('consultas.id','=',$id)
        ->get();
        //return $consultas;
        $idrtengo = $consultas[0]->idpa;
        $pacientes = Pacientes::where('pacientes.id','!=',$idrtengo)
                                ->get();
        $idttengo = $consultas[0]->idusu;
        $usuarios = Usuarios::where('usuarios.id','!=',$idttengo)
                                ->get();

        return view('consultas.edit')
            ->with('consultas',$consultas[0])
            ->with('pacientes',$pacientes)
            ->with('usuarios',$usuarios);
        }else{
            Session::flash('ERROR',"Es necesario loguearse antes de continuar");
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
    public function updateC(Request $request)
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $this->validate($request,[
            'idpa'=>'required',
            'fecha'=>'required|date',
            'idusu'=>'required',
            'costo'=>'required|numeric',
            'foto'=>'mimes:jpg,png,jpeg'
        ]);
        $file = $request->file('foto');
        if($file!="")
        {
          $ldate = date('Ymd_His_');
          $img = $file->getClientOriginalName();
          $img2 = $ldate.$img;
          \Storage::disk('local')->put($img2, \File::get($file));
        }
        else{
            $img2 = "consultas.png";
        }

        $consultas = Consultas::find($request->id);

        $consultas->idpa = $request->get('idpa');
        $consultas->fecha = $request->get('fecha');
        $consultas->idusu = $request->get('idusu');
        $consultas->costo = $request->get('costo');
        if($file!="")
        {
            $consultas->ruta = $img2;
        }
        $consultas->save();

        Session::flash('mensaje',"El registro $request->idco ha sido dado de alta correctamente");
        return redirect()->route('reporteConsultas');
        }else{
            Session::flash('ERROR',"Es necesario loguearse antes de continuar");
            return redirect()->route('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyC($id)
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $consultas = Consultas::find($id);
        $consultas->delete();

        Session::flash('mensaje', "El producto con clave $id ha sido eleiminado correctamente");
        return redirect()->route('reporteConsultas');
        }else{
            Session::flash('ERROR',"Es necesario logearse antes de continuar");
            return redirect()->route('login');
        }
    }
}
