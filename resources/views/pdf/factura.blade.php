<?php
$integrantes = App\Integrantes_cond::limit(1)->orderBy('id','DESC')->first();
$responsable = App\User::find($integrantes->id_user);
?>
<h2>Condominio Yaruma <span style="float: right; font-size: 14px; padding-top: 10px">Fecha: <?php echo date("y/m/d"); ?> <br> <?php echo $responsable->name; ?></span></h2>
<h3>Factura del mes {{$mes}}</h3>
<hr>
<h4>Usuario: {{$usuario}}</h4>
<table style="width: 100%" border='1'>
    <thead>
        <tr style="background-color: black; color: white; text-align: center">

            <th>N° ref</th>
            <th>Forma de pago</th>
            <th>Detalles</th>
            <th>Fecha</th>
            <th>Monto</th>            

        </tr>
    </thead>
    <tbody>
        @if(count($misfactura) > 0)
        @foreach($misfactura as $key)
        <tr>
            <td>{{$key['n_ref']}}</td>
            <td>{{$key['tipo_pago']}}</td>
            <td>{{$key['detalle_pago']}}</td>
            <td>{{$key['f_pago']}}</td>
            <td>{{$key['monto']}}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

<h4 style="text-align: right">Monto Total: Bs. {{$montototal}}</h4>