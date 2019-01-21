@extends('layouts.template')

@section('content')


<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Nueva cuenta por pagar</div>
                <div class="divider"></div>
                <br>


                <form action="{{url('/guardarcpagar')}}" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col l12 input-field">
                            <input required="" type="text" class="validate" name="titulo">
                            <label>Titulo</label>
                        </div>

                        <div class="col l12 input-field">
                            <select name="tipocuenta">
                                <option disabled selected>Selecciona un tipo</option>                                
                            </select>
                            <label>Tipo de cuenta</label>                            
                        </div>


                        <div class="col l6 input-field">
                            <input required="" type="text" class="datepicker" name="fechaini">
                            <label>F. Inicialización</label>                            
                        </div>


                        <div class="col l6 input-field">
                            <input required="" type="text" class="datepicker" name="fechafin">
                            <label>F. Finalizacion</label>                            
                        </div>
                        
                        <div class="col l12 input-field">
                            <input required="" type="text" class="validate" name="Monto">
                            <label>Monto a pagar</label>                            
                        </div>
                        
                        <div class="col l12 input-field">
                            <textarea required="" class="materialize-textarea" name="descripcion" placeholder="Describe la cuenta que se va a pagar..."></textarea>                            
                        </div>

                    </div>
                    <div class="card-action">
                        <a class="btn-flat grey-text"></a>
                        <button type="submit" class="btn waves-light waves-effect blue">Guardar</button>
                    </div>


                </form>


            </div>
        </div>
    </div>
</div>
@endsection