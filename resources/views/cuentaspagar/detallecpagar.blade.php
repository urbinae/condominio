@extends('layouts.app2')
@section('content')

<div class="row">
    <div class="col s9 offset-s2">
        <h3 class="title">Cuentas por pagar</h3><a class="btn teal accent-3" href="{{url('/nuevacpagar')}}" style="float: right; margin-top:-50px;">Resgistrar nueva</a>

        <hr>
        <table class="bordered">
            <tr class="bg-success">
                <th >Nombre o Razón Social</th>
                <th >Cédula o Rif</th>                
                <th> Número de factura</th>
                <th> Fecha de factura</th>
                <th> Monto</th> 
                <th> Registrado por</th>
                <th> Observación</th>
             
            </tr>


            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a class="btn indigo darken-4"><i class="material-icons">autorenew</i></a>                    
                                
                    <a class="btn indigo darken-4"><i class="material-icons">backspace</i></a>                    
                </td>
            </tr>
        </div>   
</div>


@endsection