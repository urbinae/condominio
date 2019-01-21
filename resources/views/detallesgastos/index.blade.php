@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <h3 class="title">Detalles de gastos </h3>

        <hr>
        <table class="table table-bordered">
            <tr class="bg-success">
                <th >Nombre gasto o servicio</th>
                <th >monto</th>                
                <th> fecha </th>
                <th> </th>
             
            </tr>


            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a class="btn indigo darken-4"><i class="glyphicon glyphicon-edit"></i></a>                    
                                
                    <a class="btn indigo darken-4"><i class="glyphicon glyphicon-trash"></i></a>                    
                </td>
            </tr>
        </div>   
</div>


@endsection