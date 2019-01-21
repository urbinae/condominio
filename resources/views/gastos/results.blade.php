<?php $mimonto = 0; ?>
<table>    
    <tr>
        <th>N°</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Monto</th>        
    </tr>
    <?php $i = 1; ?>
    @if(count($response) > 0)
    @foreach($response as $key)
    <?php $mimonto = $mimonto + $key['monto']; ?>
    <tr>
        <td>{{$i}}</td>
        <td>{{$key['nombreg']}}</td>
        <td>{{$key['descripcion']}}</td>
        <td>{{$key['monto']}}</td>
    </tr>
    <?php $i++; ?>
    @endforeach
    <input type="hidden" name="montomensual" value="{{$mimonto}}">
    @endif
</table>