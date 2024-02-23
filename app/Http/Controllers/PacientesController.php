<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Pacientes;


class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = \DB::table('pacientes')
        ->select('pacientes.id as idpa', 'pacientes.ruta','pacientes.nombrep','pacientes.apellidop','pacientes.apellidom','pacientes.edad',
        'pacientes.estado','pacientes.correo','pacientes.telefono','pacientes.calle','pacientes.colonia',
        'pacientes.activo','pacientes.noexp')
        ->get();
        //return $pacientes;
        return view('pacientes.index')
        ->with('pacientes',$pacientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombrep'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'apellidop'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
            'apellidom'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
            'edad'=>'required|numeric',
            'estado'=>'required',
            'correo'=>'required|email',
            'telefono'=>'regex:/^[0-9]{10}$/',
            'calle'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
            'colonia'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
            'activo'=>'required',
            'noexp'=>'required|numeric',
            'foto'=>'mimes:jpg,png,gif,jpeg'
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
            $img2 = "sinfoto.jpg";
        }

        $paciente = new Pacientes();

        $paciente->nombrep = $request->get('nombrep');
        $paciente->apellidop = $request->get('apellidop');
        $paciente->apellidom = $request->get('apellidom');
        $paciente->edad = $request->get('edad');
        $paciente->estado = $request->get('estado');
        $paciente->correo = $request->get('correo');
        $paciente->telefono = $request->get('telefono');
        $paciente->calle = $request->get('calle');
        $paciente->colonia = $request->get('colonia');
        $paciente->activo = $request->get('activo');
        $paciente->noexp = $request->get('noexp');
        $paciente->ruta = $img2;

        $paciente->save();

        return redirect('/pacientes');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pacientes = Pacientes::find($id);
        return view('pacientes.edit')
        ->with('pacientes',$pacientes);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombrep'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'apellidop'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
            'apellidom'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
            'edad'=>'required|numeric',
            'estado'=>'required',
            'correo'=>'required|email',
            'telefono'=>'regex:/^[0-9]{10}$/',
            'calle'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
            'colonia'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
            'activo'=>'required',
            'noexp'=>'required|numeric',
            'foto'=>'mimes:jpg,png,gif,jpeg'
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
            $img2 = "sinfoto.jpg";
        }

        $pacientes = new Pacientes();

        $pacientes->nombrep = $request->get('nombrep');
        $pacientes->apellidop = $request->get('apellidop');
        $pacientes->apellidom = $request->get('apellidom');
        $pacientes->edad = $request->get('edad');
        $pacientes->estado = $request->get('estado');
        $pacientes->correo = $request->get('correo');
        $pacientes->telefono = $request->get('telefono');
        $pacientes->calle = $request->get('calle');
        $pacientes->colonia = $request->get('colonia');
        $pacientes->activo = $request->get('activo');
        $pacientes->noexp = $request->get('noexp');
        $pacientes->ruta = $img2;

        $pacientes->save();

        return redirect('/pacientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pacientes = Pacientes::find($id);
        $pacientes->delete();

        return redirect('/pacientes');
    }
}
