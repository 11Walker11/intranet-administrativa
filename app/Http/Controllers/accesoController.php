<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Session;

class accesoController extends Controller
{
    public function login()
    {
      return view('login');
    }

    public function cerrarsesion()
    {
      Session::forget('sesionname');
      Session::forget('sesionidu');
      Session::forget('sesiontipo');
      Session::flush();
      Session::flash('error', 'Session cerrada correctamente');
      return redirect()->route('login');

    }
    public function valida(Request $request)
    {
      $this->validate($request,[
        'correo'=>'required|email',
        'password'=>'required']);

      $psw = md5($request->password);
      $consulta = users::where('correo','=',$request->correo)
                      ->where('password','=',$psw)
                      ->where('activo','=',"si")
                      ->get();
      $cuantos = count($consulta);
      if($cuantos!=0)
      {
        Session::put('sesionname',$consulta[0]->nombre);
        Session::put('sesionidu',$consulta[0]->idu);
        Session::put('sesiontipo',$consulta[0]->tipo);

        /*$sname =   Session::get('sesionname');
        $sidu = Session::get('sesionidu');
        $stipo = Session::get('sesiontipo');
        return $sname . ' '. $sidu . ' '. $stipo;*/

        return redirect()->route('reporteUsuario');
      }
      else{
        Session::flash('error', 'El usuario o el password no son correctos,
        o el usuario no existe');
        return redirect()->route('login');
      }
    }
}
