@extends('layouts.template')
@section('content')

<div class="row">
    <div class="col l12">
        <div class="card">
            <div class="card-content">
                <div class="card-title">Nuevo pago</div>
                <div class="divider"></div>
                <br>

                <form action="{{url('/createpago')}}" method="post">
                    {{ csrf_field() }}
                    @if(auth()->user()->rol != 4)
                    <div class="form-group">
                        <label>Inquilino</label>
                        <select name="user" class="form-control">
                            <option>Selecciona al inquilino</option>
                            @if(count($users) > 0)
                            @foreach($users as $key)
                            <option value="{{$key->id}}">{{$key->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>Tipo de Pago</label>
                        <select name="tipo_pago" class="form-control">
                            <option>Selecciona un tipo de pago</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="cheque">Cheque</option>
                            <option value="trasferencia">Trasferencia</option>                
                        </select>
                    </div>
                    <div class="form-group">
                         <label>Banco</label>
                        <select name="banco" class="form-control">>
                              <option value=""></option>
                              <option value="100%BANCO">100%BANCO</option>
                              <option value="ABN AMRO BANK">ABN AMRO BANK</option>
                              <option value="BANCAMIGA BANCO MICROFINANCIERO, C.A.">BANCAMIGA BANCO MICROFINANCIERO, C.A.</option>
                              <option value="BANCO ACTIVO BANCO COMERCIAL, C.A.">BANCO ACTIVO BANCO COMERCIAL, C.A.</option>
                              <option value="BANCO AGRICOLA">BANCO AGRICOLA</option>
                              <option value="BANCO BICENTENARIO">BANCO BICENTENARIO</option>
                              <option value="BANCO CARONI, C.A. BANCO UNIVERSAL">BANCO CARONI, C.A. BANCO UNIVERSAL</option>
                              <option value="BANCO DE DESARROLLO DEL MICROEMPRESARIO">BANCO DE DESARROLLO DEL MICROEMPRESARIO</option>
                              <option value="BANCO DE VENEZUELA S.A.I.C.A.">BANCO DE VENEZUELA S.A.I.C.A.</option>
                              <option value="BANCO DEL CARIBE C.A.">BANCO DEL CARIBE C.A.</option>
                              <option value="BANCO DEL PUEBLO SOBERANO C.A.">BANCO DEL PUEBLO SOBERANO C.A.</option>
                              <option value="BANCO DEL TESORO">BANCO DEL TESORO</option>
                              <option value="BANCO ESPIRITO SANTO, S.A.">BANCO ESPIRITO SANTO, S.A.</option>
                              <option value="BANCO EXTERIOR C.A.">BANCO EXTERIOR C.A.</option>
                              <option value="BANCO INDUSTRIAL DE VENEZUELA.">BANCO INDUSTRIAL DE VENEZUELA.</option>
                              <option value="BANCO INTERNACIONAL DE DESARROLLO, C.A.">BANCO INTERNACIONAL DE DESARROLLO, C.A.</option>
                              <option value="BANCO MERCANTIL C.A.">BANCO MERCANTIL C.A.</option>
                              <option value="BANCO NACIONAL DE CREDITO">BANCO NACIONAL DE CREDITO</option>
                              <option value="BANCO OCCIDENTAL DE DESCUENTO.">BANCO OCCIDENTAL DE DESCUENTO.</option>
                              <option value="BANCO PLAZA">BANCO PLAZA</option>
                              <option value="BANCO PROVINCIAL BBVA">BANCO PROVINCIAL BBVA</option>
                              <option value="BANCO VENEZOLANO DE CREDITO S.A.">BANCO VENEZOLANO DE CREDITO S.A.</option>
                              <option value="BANCRECER S.A. BANCO DE DESARROLLO">BANCRECER S.A. BANCO DE DESARROLLO</option>
                              <option value="BANESCO BANCO UNIVERSAL">BANESCO BANCO UNIVERSAL</option>  
                              <option value="BANFANB">BANFANB</option>
                              <option value="BANGENTE">BANGENTE</option>
                              <option value="BANPLUS BANCO COMERCIAL C.A">BANPLUS BANCO COMERCIAL C.A</option>
                              <option value="CITIBANK.">CITIBANK.</option>
                              <option value="CORP BANCA.">CORP BANCA.</option>
                              <option value="DELSUR BANCO UNIVERSAL">DELSUR BANCO UNIVERSAL</option>
                              <option value="FONDO COMUN">FONDO COMUN</option>
                              <option value="INSTITUTO MUNICIPAL DE CR&#201;DITO POPULAR">INSTITUTO MUNICIPAL DE CR&#201;DITO POPULAR</option>
                              <option value="MIBANCO BANCO DE DESARROLLO, C.A.">MIBANCO BANCO DE DESARROLLO, C.A.</option>
                              <option value="SOFITASA">SOFITASA</option>
                        </select>
                        <em style="color: #b9b9b9; font-size: 12px">No es requerido para los tipos de pagos en efectivo</em>
                    </div>
                    <div class="form-group">
                        <label>Número de Referencia</label>
                        <input type="text" required="" name="n_ref" class="form-control" >
                        <em style="color: #b9b9b9; font-size: 12px">No es requerido para los tipos de pagos en efectivo</em>
                    </div>
                    <div class="form-group">
                        <label>fecha de pago</label>
                        <input type="text" required=""  name="f_pago" class="datepicker">
                    </div>
                    <div class="form-group">
                        <label>Monto</label>
                        <input type="text" name="monto" class="form-control" >
                    </div>       

                    
                    <a href="{{url('/')}}" class="btn-flat grey-text">Cancelar</a>
                    <button type="submit" class="btn  blue right">Guardar</button>
                </form>

            </div>

        </div>
    </div>
</div>


@endsection