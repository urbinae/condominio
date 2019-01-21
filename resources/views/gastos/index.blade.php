@extends('layouts.template')
@section('content')

<div class="row" style="margin-top: 10px; margin-bottom: 5px">
    <div class="col l12">
        <a href="{{url('nuevosgastos')}}" class="btn waves-light waves-effect blue">Nuevo gastos</a>

        <a class="btn waves-light waves-effect blue right modal-trigger" href="#printgastos" style="margin-left: 10px"><i class="material-icons">print</i></a>
        <a href="{{url('generarmensual')}}" class="btn waves-light waves-effect grey right">Generar pago mensual</a>

    </div>
</div>

<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Gastos</div>
                <div class="divider"></div>
                <br>

                <table class="table bordered">
                    <thead>
                        <tr class="bg-success">
                            <th >Nombre del gasto</th>
                            <th >descripción</th>
                            <th >fecha</th>
                            <th >Monto </th>                
                            <th> </th>

                        </tr>
                    </thead>
                    <tbody>

                        @if(count($gastos) > 0)
                        @foreach($gastos as $key)
                        @if(!empty($key->nombreg))
                        <tr>
                            <td>{{$key->nombreg}}</td>
                            <td>{{$key->descripcion}}</td>
                            <td>{{$key->fecha}}</td>
                            <td>{{$key->monto}}</td>
                            <td>
                                <a href="{{url('/editargastos')."/".$key->id}}" class="btn-flat blue-text"><i class="mdi-editor-border-color"></i></a>                    
                                <a href="{{url('/removegastos')."/".$key->id}}" class="btn-flat grey-text"><i class="material-icons">delete</i></a>                   
                            </td>
                        </tr>

                        @endif
                        @endforeach                   
                        @endif
                    </tbody>
                </table>
            </div> 

        </div>
    </div> 

</div>
<div class="modal" id="printgastos">
    <form action="{{url('/reporte_gastos')}}" method="post">
        {{ csrf_field() }}
        <div class="modal-content" >

            <h5 class="grey-text">Reporte de gastos por mes</h5>
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