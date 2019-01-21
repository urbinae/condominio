@extends('layouts.template')
@section('content')

<div class="row" style="margin-top: 10px; margin-bottom: 5px">
    <div class="col l12">
        <a href="{{url('nuevapersona')}}" class="btn waves-light waves-effect blue">Nuevo Propietario</a>
        <a href="{{url('reporte_inquilinos')}}" class="btn waves-light waves-effect blue right"><i class="material-icons">print</i></a>
    </div>
</div>
<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Propietarios</div>
                <div class="divider"></div>
                <br>

                <table class="table">
                    <thead>
                        <tr class="bg-success">
                            <th >Cédula</th>
                            <th >Nombre</th>                
                            <th >email</th>                
                            <th >Teléfono</th>                
                            <th >Apartamento</th>                 
                          <!--  @if(auth()->user()->rol == 1)
                            <th >Acceso</th>             
                            @endif-->
                            <th width="200"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users) > 0)
                        @foreach($users as $key)

                        <tr>
                            <td>{{$key->cedula}}</td>
                            <td>{{$key->name}}</td>
                            <td>{{$key->email}}</td>
                            <td>{{$key->telefono}}</td>

                            <td><?php $un = App\Apartamento::find($key->apto); ?>
                           {{ $un->piso_apto }} - {{ $un->num_apto }}
                                
                            </td>
                          <!--  @if(auth()->user()->rol == 1)
                            <td>{{$key->mykey}}</td>
                            @endif-->
                            <td>
                                <a href="{{url('/editarpersona')."/".$key->id}}" class="btn-flat blue-text "><i class="mdi-editor-border-color"></i></a>                
                                <a href="{{url('/removepersona')."/".$key->id}}" class="btn-flat grey-text "><i class="material-icons">delete</i></a>       
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