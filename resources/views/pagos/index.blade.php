@extends('layouts.template')
@section('content')
<div class="row" style="margin-top: 10px; margin-bottom: 5px">
    <div class="col l12">
        <a href="{{url('nuevopago')}}" class="btn waves-light waves-effect blue">Nuevo Pago</a>
        <a class="btn waves-light waves-effect blue right modal-trigger" href="#printpagos"><i class="material-icons">print</i></a>
    </div>
</div>
<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Pagos</div>
                <div class="divider"></div>
                <br>

                <table class="table table-bordered">
                    <thead>
                        <tr class="bg-success">
                            <th >Propietario</th>
                            <th >Tipo de pago</th>
                            <th >banco</th>
                            <th >Número de Referencia</th>
                            <th >Monto</th>
                            <th >Fecha de pago</th>
                            <th >Estatus</th>
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
                            <td>{{$key->banco}}</td>
                            <td>{{$key->n_ref}}</td>
                            <td>{{$key->monto}} Bs.</td>
                            <td>{{date("d-m-Y",strtotime($key->f_pago))}}</td>
                            <td>@if($key->aprobado) {{"Aprobado"}} @else {{"En espera"}} @endif</td>
                            <td>
                                @if(!$key->aprobado)
                                <a href="{{url('/aprobar')."/".$key->id}}" class="btn-flat blue-text"><i class="material-icons">check</i></a>                                                    
                                <a href="{{url('/removerpago')."/".$key->id}}" class="btn-flat grey-text"><i class="material-icons">cancel</i></a>                    
                                @endif
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
<div class="modal" id="printpagos">
    <form action="{{url('/reporte_pagos')}}" method="post">
        {{ csrf_field() }}
        <div class="modal-content" >

            <h5 class="grey-text">Reporte de pagos por mes</h5>
            <span style="font-size: 12px" class="grey-text">Seleccione los meses para el reporte</span>
            <div class="divider"></div>
            <br>
            <div class="row">
                <div class="col l3">
                    <input type="checkbox" name="meses[]" value="01" id="enero" />
                    <label for="enero">Enero</label>
                </div>
                <div class="col l3">
                    <input type="checkbox" name="meses[]" value="02" id="febrero" />
                    <label for="febrero">Febrero</label>
                </div>    
                <div class="col l3">
                    <input type="checkbox" name="meses[]" value="03" id="marzo" />
                    <label for="marzo">Marzo</label>
                </div>   
                <div class="col l3">
                    <input type="checkbox" name="meses[]" value="04" id="abril" />
                    <label for="abril">Abril</label>
                </div>   
                <div class="col l3">
                    <input type="checkbox" name="meses[]" value="05" id="mayo" />
                    <label for="mayo">Mayo</label>
                </div>   
                <div class="col l3">
                    <input type="checkbox" name="meses[]" value="06" id="junio" />
                    <label for="junio">Junio</label>
                </div>  
                <div class="col l3">
                    <input type="checkbox" name="meses[]" value="07" id="julio" />
                    <label for="julio">Julio</label>
                </div>  
                <div class="col l3">
                    <input type="checkbox" name="meses[]" value="08" id="agosto" />
                    <label for="agosto">Agosto</label>
                </div>  

                <div class="col l3">
                    <input type="checkbox" name="meses[]" value="09" id="Septiempre" />
                    <label for="Septiempre">Septiempre</label>
                </div>  
                <div class="col l3">
                    <input type="checkbox" name="meses[]" value="10" id="Octubre" />
                    <label for="Octubre">Octubre</label>
                </div>  
                <div class="col l3">
                    <input type="checkbox" name="meses[]" value="11" id="Noviembre" />
                    <label for="Noviembre">Noviembre</label>
                </div>  
                <div class="col l3">
                    <input type="checkbox" name="meses[]" value="12" id="Diciembre" />
                    <label for="Diciembre">Diciembre</label>
                </div>  
            </div>

        </div>
        <div class="modal-footer">

            <button type="submit" class="btn blue waves-effect waves-light right">Generar</button>

        </div>
    </form>
</div>
@endsection