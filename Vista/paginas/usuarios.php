<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php
        // put your code here
         include_once '../Modelo/CM_usuario.php';
        // put your code here
        $obj=new Usuario();
        $usuarios=$obj->obtenerUsuarios();
        if($usuarios!=false){
        
        ?>
  
<div class="contenedortabla">
    
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>CI</th>
                <th colspan="">Acciones</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $u) {  ?>  
            <tr>
                <td><?php echo $u["id_usuario"]; ?> </td>
                <td><?php echo $u["usuario"]; ?></td>
                <td><?php echo $u["nombre"]; ?></td>   
                <td><?php echo $u["ci"]; ?></td>   
                <td colspan="">
                    <a href="../Controlador/CC_usuarios.php?accion=eliminar_Xadmin&id_usuario=<?php echo $u["id_usuario"]?>&usuario_admin=<?php echo $_SESSION['usuario']?>&id_usuario_admin=<?php echo $_SESSION['id_usuario']?>" class="btn btn-danger">Eliminar</a> 
                    
                    <a href="?opcion=6&tipo_contenido=usuario&id_usuario=<?php echo $u["id_usuario"]?>" class="btn btn-primary">Detalles</a>
              
                
                
                </td>
            </tr>
          <?php }  ?> 
        </tbody>
    </table>

    
</div>

    <?php
        }else{
            
            
        
?>
 <h2>No existe ningun usuario que mostrar</h2>   
        <?php } ?>
