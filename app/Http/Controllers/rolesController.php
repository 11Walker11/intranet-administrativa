<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use Session;


class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = \DB::table('roles')
        ->select('roles.id as idrol','roles.ruta','roles.nombre')
        ->get();
        //return $pacientes;
        return view('roles.index')
        ->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
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
            $img2 = "roles.png";
        }

        $roles = new Roles();

        $roles->nombre = $request->get('nombre');
        $roles->ruta = $img2;

        $roles->save();

        return redirect('/roles');
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

        $roles = Roles::find($id);
        //return $pacientes;
        
        return view('roles.edit')
        ->with('roles',$roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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

        $roles = Roles::find($request->id);
        $roles->nombre = $request->get('nombre');
        if($file!="")
        {
            $roles->ruta = $img2;
        }

        $roles->save();

        return redirect('/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $roles = Roles::find($id);
        $roles->delete();
        return redirect('/roles');
    }
}

