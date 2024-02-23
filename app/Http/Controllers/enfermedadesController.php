<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enfermedades;
use Session;


class enfermedadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enfermedades = \DB::table('enfermedades')
        ->select('enfermedades.id as idenf','enfermedades.ruta','enfermedades.nombre')
        ->get();
        //return $pacientes;
        return view('enfermedades.index')
        ->with('enfermedades',$enfermedades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enfermedades.create');
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
            'nombre'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
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
            $img2 = "enfermedad.jpg";
        }

        $enfermedades = new Enfermedades();

        $enfermedades->nombre = $request->get('nombre');
        $enfermedades->ruta = $img2;

        $enfermedades->save();

        return redirect('/enfermedades');
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
    public function edit($id)
    {
        //return $pacientes;
        $enfermedades = Enfermedades::find($id);
        return view('enfermedades.edit')
        ->with('enfermedades',$enfermedades);
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
            'nombre'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
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

        $enfermedades = Enfermedades::find($id);
        $enfermedades->nombre = $request->get('nombre');
        if($file!="")
        {
            $enfermedades->ruta = $img2;
        }

        $enfermedades->save();

        return redirect('/enfermedades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enfermedades = Enfermedades::find($id);
        $enfermedades->delete();
        
        return redirect('/enfermedades');
    }
}
