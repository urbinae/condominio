
@extends('layouts.template')
@section('content')
<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Mis Pagos</div>
                <div class="divider"></div>
                <br>

                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-success">
                            <th >Propietario</th>
                            <th >Tipo de pago</th>
                            <th >Número de Referencia</th>
                            <th >Monto</th>
                            <th >Fecha de pago</th>                            
                            <th></th>            
                        </tr> 
                    </thead>
                    <tbody>
                        @if(count($pagos) > 0)
                        @foreach($pagos as $key)
                        <?php $user = \App\User::find($key->user); ?>
                        <tr>
                            <td>{{$user->name}} <br> {{$user->cedula}}</td>
                            <td>{{$key->tipo_pago}}</td>
                            <td>{{$key->n_ref}}</td>
                            <td>{{$key->monto}} Bs.</td>
                            <td>{{date("d-m-Y",strtotime($key->f_pago))}}</td>                            
                            <td>                                
                                <a href="{{url('/removerpago')."/".$key->id}}" class="btn-flat grey-text"><i class="material-icons">cancel</i></a>                    
                            </td>
                        </tr>
                        @endforeach

                        @endif
                    </tbody>

                </table>

            </div>   
        </div>
    </div>
</div>

@endsection