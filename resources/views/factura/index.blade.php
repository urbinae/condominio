@extends('layouts.template')


@section('content')
<div class="card">
    <div class="card-content">
        <div class="card-title">
            Factura            
        </div>

        <table class="table">
            <thead>
            <th>id</th>
            <th>tipo</th>
            <th>referencia</th>
            <th>monto</th>
            <th>fecha</th>
            </thead>
            <tbody>
                @foreach($pagosalcobro as $key)
                <tr>
                    <td>{{$key['id']}}</td>
                    <td>{{$key['tipo_pago']}}</td>
                    <td>{{$key['n_ref']}}</td>
                    <td>{{$key['monto']}}</td>
                    <td>{{$key['f_pago']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="row">
            <div class="col l12">
                <h4 class="blue-text">Monto Total: Bs. {{$montototal}}</h4>
            </div>
        </div>

    </div>    
</div>
@endsection
