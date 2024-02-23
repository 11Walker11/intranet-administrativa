<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\Roles;
use App\Models\Pacientes;
use App\Models\Enfermedades;
use App\Models\Datosalud;
use Session;


class usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporteU()
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $usuarios = \DB::table('usuarios')
        ->join('roles','roles.id','=','usuarios.idrol')
        ->select('usuarios.id as idusu','usuarios.ruta','usuarios.nombre','usuarios.apellidop','usuarios.apellidom','usuarios.telefono',
        'usuarios.correo','roles.nombre as roles','roles.id as idrol')
        ->get();
        //return $usuarios;
        return view('usuarios.index')
            ->with('usuarios',$usuarios);
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
    public function createU()
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $roles = roles::all();
        return view('usuarios.create')
            ->with('roles',$roles);
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
    public function storeU(Request $request)
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $this->validate($request,[
            'nombre'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú]+$/',
            'apellidop'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
            'apellidom'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
            'telefono'=>'regex:/^[0-9]{10}$/',
            'correo'=>'required|email',
            'idrol'=>'required',
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
            $img2 = "sinfoto.jpg";
        }

        $usuario = new Usuarios();

        $usuario->nombre = $request->get('nombre');
        $usuario->apellidop = $request->get('apellidop');
        $usuario->apellidom = $request->get('apellidom');
        $usuario->telefono = $request->get('telefono');
        $usuario->correo = $request->get('correo');
        $usuario->idrol = $request->get('idrol');
        $usuario->ruta = $img2;

        $usuario->save();

        Session::flash('mensaje',"El registro $request->nombre ha sido dado de alta correctamente");
        return redirect()->route('reporteUsuario');
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
    public function showU($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editU($id)
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){

        $usuarios = \DB::table('usuarios')
        ->join('roles','roles.id','=','usuarios.idrol')
        ->select('usuarios.id as idusu','usuarios.ruta','usuarios.nombre','usuarios.apellidop','usuarios.apellidom','usuarios.telefono',
        'usuarios.correo','usuarios.idrol','roles.nombre as roles','roles.id as idrol')
        ->where('usuarios.id','=',$id)
        ->get();

        //return $usuario;

        $idrtengo = $usuarios[0]->idrol;
        $roles = Roles::where('roles.id','!=',$idrtengo)
                                ->get();
        
        return view('usuarios.edit')
            ->with('usuarios',$usuarios[0])
            ->with('roles',$roles);
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
    public function updateU(Request $request)
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $this->validate($request,[
            'nombre'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
            'apellido'=>'regex:/^[a-z,A-Z, ,á,é,í,ó,ú,Á,É,Í,Ó,Ú,ñ]+$/',
            'telefono'=>'regex:/^[0-9]{10}$/',
            'correo'=>'required|email',
            'idrol'=>'required',
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

        $usuario = Usuarios::find($request->id);

        $usuario->nombre = $request->get('nombre');
        $usuario->apellidop = $request->get('apellidop');
        $usuario->apellidom = $request->get('apellidom');
        $usuario->telefono = $request->get('telefono');
        $usuario->correo = $request->get('correo');
        $usuario->idrol = $request->get('idrol');
        if($file!="")
        {
            $usuario->ruta = $img2;
        }

        $usuario->save();

        Session::flash('mensaje',"El registro $request->nombre ha sido modificada correctamente");
        return redirect()->route('reporteUsuario');
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
    public function destroyU($id)
    {
        $sidu = Session::get('sesionidu');
        if($sidu!=""){
        $usuario = Usuarios::find($id);
        $usuario->delete();

        Session::flash('mensaje', "El producto con clave $id ha sido eliminado correctamente");
        return redirect()->route('reporteUsuario');
        }else{
            Session::flash('ERROR',"Es necesario logearse antes de continuar");
            return redirect()->route('login');
        }
    }
}
