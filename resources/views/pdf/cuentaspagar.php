<?php
$integrantes = App\Integrantes_cond::limit(1)->orderBy('id','DESC')->first();
$responsable = App\User::find($integrantes->id_user);
?>
<h2>Condominio Yaruma <span style="float: right; font-size: 14px; padding-top: 10px">Fecha: <?php echo date("y/m/d"); ?> <br> <?php echo $responsable->name; ?></span></h2>
<h3>Cuentas por pagar</h3>
<hr>
<table border='1' style="width: 100%">
    <thead>
        <tr style="background-color: black; color: white; text-align: center">
            <th>Mes</th>
            <th>Descripcion</th>
            <th>Monto</th>
            <th>Iva</th>
            <th>Monto Total</th>                           
        </tr>    
    </thead>
    <tbody>        
        <?php
        $functions = new \App\Http\Controllers\Controller();
        if (count($cuentas) > 0) {
            foreach ($cuentas as $var) {
                ?>
                <tr>
                    <td><?php echo $functions->mes($var->mes); ?></td>
                    <td><?php echo $var->descripcion_pagar; ?></td> 
                    <td><?php echo $var->montop; ?></td>
                    <td><?php echo $var->iva; ?></td>                   
                    <td>Bs. <?php echo $var->monto; ?></td>                    
                </tr>
                <?php
            }
        }
        ?>        
        
    </tbody>
</table>
