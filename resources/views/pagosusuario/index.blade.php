
@extends('layouts.template')
@section('content')

<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Cobros</div>
                <div class="divider"></div>
                <br>

                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-success">
                            <th >Mes</th>                            
                            <th >Descripcion</th>
                            <th >Monto</th> 
                            <th >Iva</th> 
                            <th >Monto Total</th>                            
                            <th >Estatus</th>
                            <th >Aprobacion</th>
                            <th>Pagar</th>            
                        </tr> 
                    </thead>
                    <tbody>
                        @if(count($pagos) > 0)
                        @foreach($pagos as $key)
                        <?php $user = \App\User::find($key->usuario); ?>
                        <?php
                        $pagado = 0;
                        $pagosmes = App\Pagos::where('user', auth()->user()->id)->get();
                        if (count($pagosmes) > 0) {
                            foreach ($pagosmes as $var) {
                                $pagado = $pagado + $var->monto;
                            }
                        }
                        ?>
                        <tr>
                            <td>{{$key->mes_cobrar}}</td>
                            <td>{{$key->descripcion_cobrar}}</td>
                            <td>Bs. {{$key->montop}}</td>
                            <td>Bs. {{$key->iva}}</td>
                            <td>Bs. {{$key->monto_pagar - $pagado}}</td>                                                        
                            <td>
                                @if(($key->monto_pagar - $pagado) < 0)
                                Pagado
                                @else
                                Por pagar
                                @endif

                            </td>
                            <td>
                            @if($key->status)
                            <a href="{{url('factura')."/".$key->mes_cobrar}}" class="btn-flat"><i class="material-icons blue-text">library_books</i></a>
                            @else
                            <a  class="btn-flat disabled" ><i class="material-icons">library_books</i></a>
                            @endif
                            </td>
                            <td>
                                <a href="{{url('/pagardeuda')."/".$key->mes_cobrar}}" class="btn-flat blue-text"><i class="material-icons">attach_money</i></a>                                                    
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