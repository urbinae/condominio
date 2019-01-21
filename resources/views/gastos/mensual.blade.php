@extends('layouts.template')
@section('content')
<form action="{{url('/generargastomensual')}}" method="post">
    {{ csrf_field() }}  
    <div class="row">
        <div class="col l12">
            <div class="card">
                <div class="card-content" style="height: 600px">
                    <div class="card-title">Generar gastos mensuales</div>
                    <div class="divider"></div>
                    <br>


                    <div class="col l12 input-field">
                        <select name="mes" onchange="search(this.value)">                            
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>                            
                        </select>
                        <label>Buscar por mes</label>
                    </div>
                    <div class="row">
                        <div class="col l12 result" style="overflow: auto; max-height: 300px">
                            <table class="table">    
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Monto</th>        
                                </tr>
                                <tr>
                                    <td>Seleccione el mes antes</td>
                                </tr>   

                            </table>
                        </div>
                    </div>                    

                </div>   
                <div class="card-action">
                    <button type="submit" class="btn indigo darken-4">Generar</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    function search(id) {
        var mes = '<?php echo url('searchpermes'); ?>';
        $.post(mes, {value: id}, function (response) {
            $('.result').html(response);
        });

    }
</script>

@endsection