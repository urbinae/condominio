<?php
$integrantes = App\Integrantes_cond::limit(1)->orderBy('id', 'DESC')->first();
$responsable = App\User::find($integrantes->id_user);
?>
<h2>Condominio Yaruma <span style="float: right; font-size: 14px; padding-top: 10px">Fecha: <?php echo date("y/m/d"); ?> <br> <?php echo $responsable->name; ?></span></h2>
<h3>Propietarios</h3>
<hr>
<table border='1' style="width: 100%">
    <thead>
        <tr style="background-color: black; color: white; text-align: center">
            <th>Apartamento</th>
            <th>Nombre</th>
            <th>cedula</th>
            <th>email</th>
            <th>telefono</th>            
        </tr>    
    </thead>
    <tbody>        
        <?php
        if (count($inquilinos) > 0) {
            foreach ($inquilinos as $var) {
                ?>
                <tr>
                    <td><?php echo $var->apto; ?></td>
                    <td><?php echo $var->name; ?></td>
                    <td><?php echo $var->cedula; ?></td>
                    <td><?php echo $var->email; ?></td>
                    <td><?php echo $var->telefono; ?></td>
                </tr>
                <?php
            }
        }
        ?>        

    </tbody>
</table>