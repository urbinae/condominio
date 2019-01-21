<?php
$integrantes = App\Integrantes_cond::limit(1)->orderBy('id','DESC')->first();
$responsable = App\User::find($integrantes->id_user);
?>
<h2>Condominio Yaruma <span style="float: right; font-size: 14px; padding-top: 10px">Fecha: <?php echo date("y/m/d"); ?> <br> <?php echo $responsable->name; ?></span></h2>
<h3>Reporte de pagos</h3>
<hr>
@if(count($reporte))
@foreach($reporte as $key)
<h4 style="text-align: center; text-decoration: underline">{{$key['mes']}}</h4>
<table border='1' style="width: 100%">
    <thead>
        <tr style="background-color: black; color: white; text-align: center">
            <th>Propietario</th>
            <th>N° referencia</th>
            <th>Forma de pago</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Aprob</th>
        </tr>    
    </thead>
    <tbody>
        @if(count($key['mispagos']) > 0)
        @foreach($key['mispagos'] as $var)
        <tr>
            <td>{{$var['usuario']}}</td>
            <td>{{$var['n_ref']}}</td>
            <td>{{$var['tipo_pago']}}</td>
            <td>Bs. {{$var['monto']}}</td>
            <td>{{$var['f_pago']}}</td>
            <td>{{($var['aprobado'])?'Si':'No'}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6">No hay pagos en este mes</td>
        </tr>
        @endif
    </tbody>
</table>
<h4 style="text-align: right">Monto Total: Bs. {{$key['montototal']}}</h4>
@endforeach
@endif
