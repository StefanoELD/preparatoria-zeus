<?php 
include_once('auth.php');
include_once('config/conexion.php');
include_once('app/controllers/descuento/Modal_descuento.php');
include_once('src/components/parte_superior.php');
?>

<link rel="icon" href="src/assets/images/logo-zeus.png">

<div class="container-page">
    <div>
        <p>Zeus<span> / Descuento</span></p>
        <h3>Descuento</h3>
    </div>
    <button class="turno btn btn-primary" data-bs-toggle="modal" data-bs-target="#Registrar" data-bs-whatever="@mdo" style="cursor: pointer;">Registrar</button>
                        <br>
                        <!-- Tabla -->
                        <div class="container-table" style="background-color: #fff;">
                            <div class="col-md-12">
                            <table class="table table-striped"  id="table_descuento">
                                <thead align="center" class=""  style="color: #fff; background-color:#010133;">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql="SELECT * FROM descuento
                                        ORDER BY estado_de";
                                        $f=mysqli_query($cn, $sql);
                                        while($r=mysqli_fetch_assoc($f)){
                                    ?>
                                        <tr>
                                        <td align="center"><?php echo $r['nombre_de']; ?></td>
                                        <td align="center"><?php echo $r['monto_de']; ?></td>
                                        <td align="center"><?php
                                                $estado = $r['estado_de'];
                                                $button = '<button class="' . ($estado === "ACTIVO" ? 'active-button' : 'inactive-button') . '">' . $estado . '</button>';
                                                echo $button;
                                                ?></td>
                                
                                            <td align="center">
                                                <!-- BOTON EDITAR -->
                                                <a class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#Editar" data-bs-whatever="@mdo" target="_parent" onclick="cargar_editar({ 
                                                    'id_de': '<?php echo $r['id_de']; ?>',
                                                    'nombre_de': '<?php echo $r['nombre_de']; ?>',
                                                    'monto_de': '<?php echo $r['monto_de']; ?>',
                                                    'estado_de': '<?php echo $r['estado_de']; ?>',
                                                });"><i class="fas fa-edit"> </i></a></a>

                                                <!-- BOTON ELIMINAR -->
                                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Eliminar" onclick="cargar_eliminar({ 
                                                    'id_de': '<?php echo $r['id_de']; ?>',
                                                    'nombre_de': '<?php echo $r['nombre_de']; ?>',
                                                    'monto_de': '<?php echo $r['monto_de']; ?>',
                                                    'estado_de': '<?php echo $r['estado_de']; ?>',
                                                });"> <i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="styleSelector"> </div>
    </div>
</div>

<!-- SCRIPT ESTADO -->
<script src="src/assets/js/estado.js"></script>
<!-- STYLE ESTADO -->
<link rel="stylesheet" href="src/assets/css/estado.css">

<?php 

include_once('src/components/parte_inferior.php');
?>

<script src="src/assets/js/datatableIntegration.js"></script>

<script>initializeDataTable('#table_descuento');</script>