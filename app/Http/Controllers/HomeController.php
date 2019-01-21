<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pagos;
use App\Servicios;
use App\Gastos;
use App\Cargo;
use App\Integrantes_cond;
use App\CuentasCobrar;
use App\Cuentas_pagar;
use App\Notificaciones;
use Illuminate\Support\Facades\App;
use App\Facturas;
use App\Apartamento;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function condominios() {
        return view('condominios.index');
    }

    public function persona() {

        $users = User::all();

        return view('persona.index', compact('users'));
    }

    public function nuevapersona() {

        $aptos = Apartamento::all();

        return view('persona.registrar',compact('aptos'));
    }

    public function guardarpersona(Request $request) {

        $persona = new User();
        $ramdon = str_random(10);
        $persona->password = bcrypt($ramdon);
        $persona->name = $request->name;
        $persona->cedula = $request->cedula;
        $persona->email = $request->email;
        $persona->telefono = $request->telefono;
        $persona->apto = $request->apartamento;
        $persona->mykey = $ramdon;



        if ($persona->save()) {
            return redirect('/persona');
        }
    }

    public function nuevopagos() {



        $users = User::all();

        return view('pagos.registropagos', compact('users'));
    }

    public function pagardeuda() {

        return view('pagos.pagardeuda');
    }

    public function pagardeudadelmes(Request $request) {

        $pago = new Pagos();
        $pago->tipo_pago = $request->tipo_pago;
        if (!empty($request->n_ref)) {
            $pago->n_ref = $request->n_ref;
        }
        $pago->monto = $request->monto;
        $pago->user = auth()->user()->id;
        $pago->creator = auth()->user()->id;
        $pago->f_pago = $request->f_pago;
        $pago->banco = $request->banco;
        if ($pago->save()) {
            return redirect('mispagos');
        }
    }

    public function pagos() {

        if (auth()->user()->rol != 4) {
            $pagos = Pagos::all();
            return view('pagos.index', compact('pagos'));
        } else {
            $pagos = CuentasCobrar::where('usuario', auth()->user()->id)->get();
            return view('pagosusuario.index', compact('pagos'));
        }
    }

    public function mispagos() {
        $pagos = Pagos::where('user', auth()->user()->id)->get();
        return view('pagos.mispagos', compact('pagos'));
    }

    public function cargos() {
        $cargo = Cargo::all();

        return view('cargos.index', compact('cargo'));
    }

    public function nuevocargo() {

        return view('cargos.registrocargo');
    }

    public function integrantes() {

         $inte = Integrantes_cond::all();
     

        return view('integrantes.index', compact('inte'));
    }

    public function nuevointegrante() {

        $users = User::all();

        $cargo = Cargo::all();

        return view('integrantes.nuevointegrante', compact('users', 'cargo'));
    }

    public function servicios() {

        $servicios = Servicios::all();

        return view('servicios.index', compact('servicios'));
    }

    public function nuevoservicio() {
        return view('servicios.nuevoservicio');
    }

    public function removepersona($id) {
        $user = User::find($id);
        if ($user->delete()) {
            return redirect()->back();
        }
    }

    public function editarpersona($id) {
        $user = User::find($id);
        $aptos = Apartamento::all();


        return view('persona.editar', compact('user', 'id', 'aptos'));
        //
    }

    public function updatepersona(Request $request) {

        $persona = User::find($request->id);
        $persona->name = $request->name;
        $persona->cedula = $request->cedula;
        $persona->telefono = $request->telefono;
        $persona->apto = $request->apartamento;

        if ($persona->save()) {
            return redirect('/persona');
        }
    }

    public function createpago(Request $request) {

        $pago = new Pagos();
        $pago->tipo_pago = $request->tipo_pago;
        $pago->n_ref = $request->n_ref;
        $pago->monto = $request->monto;
        $pago->user = $request->user;
        $pago->creator = auth()->user()->id;
        $pago->f_pago = $request->f_pago;
         $pago->banco = $request->banco;

        if ($pago->save()) {
            return redirect('/');
        }
    }

    public function createservicio(Request $request) {

        $servicio = new Servicios();
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;

        if ($servicio->save()) {
            return redirect('/servicios');
        }
    }

    public function editarservicio($id) {
        $servicio = Servicios::find($id);

        return view('servicios.editar', compact('servicio', 'id'));
    }

    public function updateservicio(Request $request) {

        $servicio = Servicios::find($request->id);
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        if ($servicio->save()) {
            return redirect('/servicios');
        }
    }

    public function removerpago($id) {
        $pago = Pagos::find($id);
        if ($pago->delete()) {
            return redirect()->back();
        }
    }

    public function removerservicio($id) {
        $servicio = Servicios::find($id);
        if ($servicio->delete()) {
            return redirect()->back();
        }
    }

    public function aprobar($id) {

        $pago = Pagos::find($id);
        $montos_pagado = 0;

        $pagos = Pagos::where('user', $pago->user)->where('aprobado', true)->get();
        if (count($pagos) > 0) {
            foreach ($pagos as $row) {
                $montos_pagado = $montos_pagado + $row->monto;
            }
        }
        $montos_pagado = $montos_pagado + $pago->monto;
        $cobros = CuentasCobrar::where('usuario', $pago->user)->first();

        $pago->aprobado = true;

        if ($pago->save()) {

            $factura = new Facturas();
            $factura->pago = $pago->id;
            $factura->fecha_pago = $pago->f_pago;
            $factura->tipo_pago = $pago->tipo_pago;
            $factura->monto = $pago->monto;
            $factura->detalle_pago = "Factura correspondiente al pago " . $pago->id;

            $factura->save();

            if ($cobros->monto_pagar < $montos_pagado) {
                $cobros->status = true;
                $cobros->save();
            }

            $notificacion = new Notificaciones();
            $notificacion->usuario = $pago->user;
            $notificacion->mensaje = "Se ha aprobado su pago.";
            $notificacion->readed = false;
            $notificacion->save();

            return redirect()->back();
        }
    }

    public function gastos() {

        $gastos = Gastos::all();


        return view('gastos.index', compact('gastos'));
    }

    public function nuevosgastos() {
        
        $serv = Servicios::all();

        return view('gastos.nuevosgastos',compact('serv'));
    }
    public function editargastos($id) {
        
        $gasto = Gastos::find($id);
        
        return view('gastos.editargastos', compact('gasto','id'));
    }
    
    public function removegasto($id){
        $gasto = Gastos::find($id);
        if($gasto->delete()){
            return redirect()->back();
        }
        
    }

    public function detallesgastos() {
        return view('detallesgastos.index');
    }

    public function nuevodegastos() {
        return view('detallesgastos.nuevodegastos');
    }

    public function nuevacpagar() {
        return view('cuentaspagar.nuevacpagar');
    }

    public function detallecpagar() {
        return view('cuentaspagar.index');
    }

    public function cuentascobrar() {

        $gastos = Cuentas_pagar::all();
        return view('cuentascobrar.index', compact('gastos'));
    }

    public function guardargasto(Request $request) {

        $gastos = new Gastos;

        $gastos->nombreg = $request->nombre;
        $gastos->descripcion = $request->descripcion;
        $gastos->fecha = $request->fecha;
        $gastos->monto = $request->monto;
        $gastos->status = true;

        if ($gastos->save()) {
            return redirect('/gastos');
        }
    }

    public function updategasto(Request $request) {

        $gastos = Gastos::find($request->id);
        $gastos->nombreg = $request->nombre;
        $gastos->descripcion = $request->descripcion;
        $gastos->fecha = $request->fecha;
        $gastos->monto = $request->monto;

        if ($gastos->save()) {
            return redirect('/gastos');
        }
    }

    public function crearintegrante(Request $request) {

        $inte = new Integrantes_cond();
        $inte->idcargo = $request->cargo;
        $inte->id_user = $request->user;
        $inte->fecha_inicio = $request->finicio;
        $inte->fecha_fin = $request->ffin;

        if ($inte->save()) {
            return redirect('/integrantes');
        }
    }

    public function crearcargo(Request $request) {

        $cargo = new cargo();

        $cargo->descripcionc = $request->descripcionc;
        $cargo->statusc = false;
        if ($cargo->save()) {
            return redirect('/cargos');
        }
    }

    public function dashboard() {


        return view('dashboard.index');
    }

    public function generarmensual() {

        return view('gastos.mensual');
    }

    public function searchBymes(Request $request) {

        $gastos = Gastos::all();
        $response = array();

        if (count($gastos) > 0) {
            foreach ($gastos as $key) {

                @list($año, $mes, $dia) = explode("-", $key->fecha);
                if ($mes == $request->value) {

                    $field['id'] = $key->id;
                    $field['nombreg'] = $key->nombreg;
                    $field['descripcion'] = $key->descripcion;
                    $field['monto'] = $key->monto;

                    array_push($response, $field);
                }
            }
        }

        return view('gastos.results', compact('response'));
    }

    public function generargastomensual(Request $request) {

        $users = User::all();
        $cantapto= count(Apartamento::all());

        $cuentapagar = new Cuentas_pagar();
        $cuentapagar->mes = $request->mes;

        $cuentapagar->monto = $request->montomensual;
        $cuentapagar->iva = ($cuentapagar->monto * 12) / 100;
        $cuentapagar->montop = $cuentapagar->monto - $cuentapagar->iva;
        $cuentapagar->descripcion_pagar = "Pagar el mes de " . date($request->mes);

        if ($cuentapagar->save()) {

            if (count($users) > 0) {
                foreach ($users as $key) {
                    $cuenta = new CuentasCobrar();
                    $cuenta->usuario = $key->id;
                    $cuenta->mes_cobrar = $request->mes;
                    $cuenta->descripcion_cobrar = "Pagar el mes de " . date($request->mes);  
                    $cuenta->monto_pagar = $request->montomensual / $cantapto;
                    // el iva se esta tomando al 12%
                    $cuenta->iva = ($cuenta->monto_pagar * 12) / 100;
                    $cuenta->montop= $cuenta->monto_pagar - $cuenta->iva;

                    $cuenta->save();

                    $notificacion = new Notificaciones();
                    $notificacion->usuario = $key->id;
                    $notificacion->mensaje = "Pagar el mes de " . date($request->mes);
                    $notificacion->readed = false;
                    $notificacion->save();
                }
            }
        }

        return redirect('cuentascobrar');
    }

    public function cancelarpago($mes) {

        $find = Cuentas_pagar::where('mes', $mes)->first();
        $cobrar = CuentasCobrar::where('mes_cobrar', $mes)->get();

        if (count($cobrar) > 0) {
            foreach ($cobrar as $key) {
                $delete = CuentasCobrar::find($key->id);
                $delete->delete();
            }
        }
        $pago = Cuentas_pagar::find($find->id);
        $pago->delete();
        return redirect()->back();
    }

    public function factura($id) {

        $misfactura = array();
        $factura = Facturas::join('pagos as p', 'p.id', '=', 'facturas.pago')->where('p.user', auth()->user()->id)->get();
        $usuario = "";
        $montototal = 0;
        if (count($factura) > 0) {
            foreach ($factura as $key) {

                list($año, $mes, $dia) = explode("-", $key->fecha_pago);

                if ($id == $mes) {

                    $user = User::find($key->user);
                    $usuario = $user->name;

                    $field['tipo_pago'] = $key->tipo_pago;
                    $field['n_ref'] = $key->n_ref;
                    $field['monto'] = $key->monto;
                    $field['usuario'] = $user->name;
                    $field['detalle_pago'] = $key->detalle_pago;
                    $field['f_pago'] = $key->f_pago;

                    $montototal = $montototal + $key->monto;


                    array_push($misfactura, $field);
                }
            }
        }

        $mes = $this->mes($id);

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('pdf.factura', compact('misfactura', 'mes', 'usuario', 'montototal')));
        return $pdf->stream();
    }

    public function reporte_pagos(Request $request) {

        $reporte = array();

        if (count($request->meses)) {
            foreach ($request->meses as $key) {

                $mispagos = array();
                $pagos = Pagos::all();
                $field['mes'] = $this->mes($key);
                $montototal = 0;
                if (count($pagos) > 0) {
                    foreach ($pagos as $var) {
                        list($año, $mes, $dia) = explode("-", $var->f_pago);
                        if ($mes == $key) {

                            $montototal = $montototal + $var->monto;

                            $user = User::find($var->user);
                            $campo['tipo_pago'] = $var->tipo_pago;
                            $campo['n_ref'] = $var->n_ref;
                            $campo['monto'] = $var->monto;
                            $campo['usuario'] = $user->name;
                            $campo['aprobado'] = $var->aprobado;
                            $campo['f_pago'] = $var->f_pago;
                             $campo['banco'] = $var->banco;

                            array_push($mispagos, $campo);
                        }
                    }
                }
                $field['mispagos'] = $mispagos;
                $field['montototal'] = $montototal;
                array_push($reporte, $field);
            }
        }

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('pdf.pagos', compact('reporte')));
        return $pdf->stream();
    }

    public function reporte_gastos(Request $request) {

        $reporte = array();

        if (count($request->meses)) {
            foreach ($request->meses as $key) {

                $misgastos = array();
                $gastos = Gastos::all();
                $field['mes'] = $this->mes($key);
                $montototal = 0;
                if (count($gastos) > 0) {
                    foreach ($gastos as $var) {
                        list($año, $mes, $dia) = explode("-", $var->fecha);
                        if ($mes == $key) {
                            $montototal = $montototal + $var->monto;
                            $campo['nombreg'] = $var->nombreg;
                            $campo['descripcion'] = $var->descripcion;
                            $campo['monto'] = $var->monto;
                            $campo['fecha'] = $var->fecha;

                            array_push($misgastos, $campo);
                        }
                    }
                }
                $field['misgastos'] = $misgastos;
                $field['montototal'] = $montototal;
                array_push($reporte, $field);
            }
        }

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('pdf.gastos', compact('reporte')));
        return $pdf->stream();
    }

    public function reporte_cuentaspagar() {

        $cuentas = Cuentas_pagar::all();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('pdf.cuentaspagar', compact('cuentas')));
        return $pdf->stream();
    }

    public function reporte_inquilinos() {

        $inquilinos = User::orderBy('apto', 'ASC')->get();
        if (count($inquilinos) > 0) {
            foreach ($inquilinos as $key) {
                $field['apto'] = $key->apto;
                $field['name'] = $key->name;
                $field['cedula'] = $key->cedula;
                $field['email'] = $key->email;
                $field['telefono'] = $key->telefono;
            }
        }

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('pdf.inquilinos', compact('inquilinos')));
        return $pdf->stream();
    }

    public function estadisticas() {

        $gastos = Gastos::all();
        $enero = 0;
        $febrero = 0;
        $marzo = 0;
        $abril = 0;
        $mayo = 0;
        $junio = 0;
        $julio = 0;
        $agosto = 0;
        $septiembre = 0;
        $octubre = 0;
        $noviembre = 0;
        $diciembre = 0;

        $myyear = date('Y');
        if (count($gastos) > 0) {
            foreach ($gastos as $key) {
                list( $year, $month, $day) = explode("-", $key->fecha);
                if ($month == 01 and $year == $myyear) {
                    $enero = $enero + $key->monto;
                }
                if ($month == 01 and $year == $myyear) {
                    $enero = $enero + $key->monto;
                }
                if ($month == 02 and $year == $myyear) {
                    $febrero = $febrero + $key->monto;
                }
                if ($month == 03 and $year == $myyear) {
                    $marzo = $marzo + $key->monto;
                }
                if ($month == 04 and $year == $myyear) {
                    $abril = $abril + $key->monto;
                }
                if ($month == 05 and $year == $myyear) {
                    $mayo = $mayo + $key->monto;
                }
                if ($month == 06 and $year == $myyear) {
                    $junio = $junio + $key->monto;
                }
                if ($month == 07 and $year == $myyear) {
                    $julio = $julio + $key->monto;
                }
                if ($month == 08 and $year == $myyear) {
                    $agosto = $agosto + $key->monto;
                }
                if ($month == 09 and $year == $myyear) {
                    $septiembre = $septiembre + $key->monto;
                }
                if ($month == 10 and $year == $myyear) {
                    $octubre = $octubre + $key->monto;
                }
                if ($month == 11 and $year == $myyear) {
                    $noviembre = $noviembre + $key->monto;
                }
                if ($month == 12 and $year == $myyear) {
                    $diciembre = $diciembre + $key->monto;
                }
            }
        }


        $efectivo = Pagos::where('tipo_pago', 'efectivo')->count();
        $transferencias = Pagos::where('tipo_pago', 'tranferencia')->count();
        $cheques = Pagos::where('tipo_pago', 'cheque')->count();




        return view('estadisticas.index', compact('efectivo', 'transferencias', 'cheques', 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'));
    }

    public function eliminarcargo($id) {
        $cargo = Cargo::find($id);

        if ($cargo->delete()) {

            return redirect()->back();
        }
    }

    public function editarcargo($id) {
        $cargo = Cargo::find($id);

        return view('cargos.editarcargo', compact('id','cargo'));
    }

    public function updatecargo(Request $request) {

        $cargo = Cargo::find($request->id);

        $cargo->descripcionc = $request->descripcionc;
        $cargo->statusc = false;
        if ($cargo->save()) {
            return redirect('/cargos');
        }
    }

     public function apartamento() {

          $aptos = Apartamento::all();
        
        return view('apartamento.index',compact('aptos','cantapto'));
    }

      public function nuevoapto() {
        
        return view('apartamento.nuevoapto');
    }

     public function createapto(Request $request) {

        $aptos= new Apartamento();

        $aptos->piso_apto= $request->npiso;

        $aptos->num_apto= $request->napto;

        $aptos->status_apto= true;


        if ($aptos->save()) {

            return redirect('/apartamento');
        }

    }

}
