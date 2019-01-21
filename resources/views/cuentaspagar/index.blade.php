@extends('layouts.template')
@section('content')

<div class="row" style="margin-top: 10px; margin-bottom: 5px">
    <div class="col l12">
        <a href="{{url('nuevacpagar')}}" class="btn waves-light waves-effect blue">Nuevo</a>
    </div>
</div>

<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Cuentas por pagar</div>
                <div class="divider"></div>
                <br>

                <table class="bordered">
                    <thead></thead>
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
                </table>
            </div>   
        </div>
    </div>   
</div>



@endsection