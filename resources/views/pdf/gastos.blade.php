<?php
$integrantes = App\Integrantes_cond::limit(1)->orderBy('id','DESC')->first();
$responsable = App\User::find($integrantes->id_user);
?>
<h2>Condominio Yaruma <span style="float: right; font-size: 14px; padding-top: 10px">Fecha: <?php echo date("y/m/d"); ?> <br> <?php echo $responsable->name; ?></span></h2>
<h3>Reporte de gastos</h3>
<hr>
@if(count($reporte))
@foreach($reporte as $key)
<h4 style="text-align: center; text-decoration: underline">{{$key['mes']}}</h4>
<table border='1' style="width: 100%">
    <thead>
        <tr style="background-color: black; color: white; text-align: center">            
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Monto</th>
            <th>Fecha</th>            
        </tr>    
    </thead>
    <tbody>
        @if(count($key['misgastos']) > 0)
        @foreach($key['misgastos'] as $var)
        <tr>
            <td>{{$var['nombreg']}}</td>
            <td>{{$var['descripcion']}}</td>            
            <td>Bs. {{$var['monto']}}</td>
            <td>{{$var['fecha']}}</td>            
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="4">No hay gastos en este mes</td>
        </tr>
        @endif
    </tbody>
</table>
<h4 style="text-align: right">Monto Total: Bs. {{$key['montototal']}}</h4>
@endforeach
@endif
