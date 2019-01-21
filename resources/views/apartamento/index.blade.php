@extends('layouts.template')
@section('content')

<div class="row" style="margin-top: 10px; margin-bottom: 5px">
    <div class="col l12">
        <a href="{{url('nuevoapto')}}" class="btn waves-light waves-effect blue">Nuevo apartamento</a>

    </div>
</div>
<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Apartamentos</div>
                <div class="divider"></div>
                <br>

                <table class="table">
                    <thead>
                        <tr class="bg-success">
                            <th >Piso</th>
                            <th >Numero de Apto</th>                

                            <th width="200"></th>
                        </tr>
                    </thead>
                    <tbody>
                     @if(count($aptos) > 0)
                        @foreach($aptos as $key)

                        <tr>
                            <td>{{$key->piso_apto}}</td>
                            <td>{{$key->num_apto}}</td>

                      
                            <td>
                                <a href="" class="btn-flat blue-text "><i class="mdi-editor-border-color"></i></a>                
                                <a href="" class="btn-flat grey-text "><i class="material-icons">delete</i></a>       
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