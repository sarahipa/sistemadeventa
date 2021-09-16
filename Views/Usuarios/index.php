
<?php include "Views/Templates/header.php" ?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"  >Usuario</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmUsuario();">Nuevo</button>

<table class="table table-light" id="tblUsuarios">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Caja</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>
<div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Nuevo usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuario">
                   <div class="form-group">
                       <label for="usuario">usuario</label>
                       <input id="usuario" class="form-control" type="text" name="usuario" pleaceholder="usuario">
                   </div> 
                   <div class="form-group">
                       <label for="nombre">Nombre</label>
                       <input id="nombre" class="form-control" type="text" name="nombre" pleaceholder="Nombre del usuario">
                   </div> 
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                              <label for="clave">Contraseña</label>
                              <input id="clave" class="form-control" type="password" name="clave" pleaceholder="contraseña">
                            </div> 
                       </div>
                       <div class="col-md-6">
                            <div class="form-group">
                               <label for="confirmar">Confirmar contraseña</label>
                               <input id="confirmar" class="form-control" type="password" name="confirmar" pleaceholder="Confirmar contraseña">
                            </div> 
                       </div>

                   </div>
                   <div class="form-group">
                       <label for="caja">Caja</label>
                       <select id="caja" class="form-control" name="caja">
                           <?php foreach($data['cajas'] as $row) { ?>
                           <option value="<?php echo $row['id']; ?>"><?php echo $row['caja']; ?></option>
                           <?php } ?>
                       </select>
                   </div>
                   <button class="btn btn-primary" type="button" onclick="registrarUser(event);"> Registrar </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "Views/Templates/footer.php" ?>