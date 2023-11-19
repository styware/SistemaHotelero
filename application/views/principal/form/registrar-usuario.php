 <div class="booking-form">
     <?php if(isset($msg)): ?>
        <div class="alert alert-warning"><?php echo $msg ?></div>
        <?php endif; ?>
     <h3>REGISTRAR USUARIO</h3>
     <form action="<?php echo base_url() . 'registrar-usuario' ?>" method="post">

         <div class="form-row">
             <div class="col-md-6 mb-3">
                 <div class="check-date">
                     <label for="name">Nombre:</label>
                     <input type="text" name="nombre" id="name">
                 </div>
             </div>
             <div class="col-md-6 mb-3">
                 <div class="check-date">
                     <label for="last-name">Apellido:</label>
                     <input type="text" name="apellido" id="last-name">
                 </div>
             </div>
         </div>

         <div class="form-row">
             <div class="col-md-6 mb-3">
                 <div class="check-date">
                     <label for="cedula">Identificacion:</label>
                     <input type="number" name="cc" id="cedula">
                 </div>
             </div>
             <div class="col-md-6 mb-3">
                 <div class="check-date">
                     <label for="celular">Numero de telefono:</label>
                     <input type="number" name="telefono" id="celular">
                 </div>
             </div>
         </div>

         <div class="form-row">
             <div class="col-md-6 mb-3">
                 <div class="check-date">
                     <label for="fecha">Fecha de nacimiento:</label>
                     <input type="date" name="f_nacimiento" id="fecha">
                 </div>
             </div>
             <div class="col-md-6 mb-3">
                 <div class="check-date">
                     <label for="correo">Correo:</label>
                     <input type="email" name="correo" id="correo">
                 </div>
             </div>
         </div>

         <div class="form-row">
             <div class="col-md-6 mb-3">
                 <div class="check-date">
                     <label for="clave">Contrseña:</label>
                     <input type="password" name="clave" id="clave">
                 </div>
             </div>
             <div class="col-md-6 mb-3">
                 <div class="check-date">
                     <label for="clave-2">Confirmar Contrseña:</label>
                     <input type="password" name="c_clave" id="clave-2">
                 </div>
             </div>
         </div>

         <button type="submit" value="registrar" name="registrar">REGISTRARME</button>
     </form>
 </div>