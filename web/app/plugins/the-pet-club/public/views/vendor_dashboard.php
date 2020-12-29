<?php 

if(empty($preference))
   return;

?>
<h3>Hola <?php echo $user_name; ?>.</h3>
<p>
   Queremos conocerte un poco mejor, 
   por favor proporciona los datos 
   que te pedimos a continuación
</p>
<div id="tpc_reg_forms">
    <ul class="nav">
       <li>
           <a class="nav-link" href="#step-1">
              Dirección
           </a>
       </li>
       <li>
           <a class="nav-link" href="#step-2">
              Contacto
           </a>
       </li>
       <li>
           <a class="nav-link" href="#step-3">
              Casa
           </a>
       </li>
       <li>
           <a class="nav-link" href="#step-4">
              Servicios
           </a>
       </li>
    </ul>
 
    <div class="tab-content">

      <script
         src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"
         data-preference-id="<?php echo $preference->id; ?>">
      </script>

      <div id="step-1" class="tab-pane" role="tabpanel">
            <h5>Dirección</h5>
            <p>Requerimos tu dirección para poder conectarte con clientes cerca de ti.</p>
            <form class="tpc-form" id="tpc_keeper_address_form">
               <div class="form-group">
                  <label class="tpc-form__label" for="tpc_street">Calle y número.</label>
                  <input class="tpc-form__input" type="text" name="tpc_street">
                  <label class="tpc-form__label" for="tpc_zip_code">Código postal</label>
                  <input class="tpc-form__input" type="text" name="tpc_zip_code">
                  <label class="tpc-form__label" for="tpc_colony">Colonia</label>
                  <input id="region_1" class="tpc-form__input" type="text" name="tpc_colony">
                  <?php wp_nonce_field( 'register_keeper_address', 'tpc_keeper_address_id', false ); ?>
                  <input type="hidden" name="action" value="tpc_register_keeper_address">
                  <input class="tpc-form__button" type="submit" value="Guardar">
               </div>
            </form>  
       </div>
       <div id="step-2" class="tab-pane" role="tabpanel">
            <h5>Contacto</h5>
            <p>Requerimos tu información de contacto.</p>
            <form class="tpc-form" id="tpc_keeper_contact_form">
               <div class="form-group">
                  <label class="tpc-form__label" for="tpc_home_phone">Teléfono de casa</label>
                  <input class="tpc-form__input" type="text" name="tpc_home_phone">
                  <label class="tpc-form__label" for="tpc_cellphone">Teléfono celular</label>
                  <input class="tpc-form__input" type="text" name="tpc_cellphone">
                  <?php wp_nonce_field( 'register_keeper_contact', 'tpc_keeper_contact_id', false ); ?>
                  <input type="hidden" name="action" value="tpc_register_keeper_contact">
                  <input class="tpc-form__button" type="submit" value="Guardar">
               </div>
            </form>  
       </div>
       <div id="step-3" class="tab-pane" role="tabpanel">
            <h3>Sube algunas imagenes para conocerte mejor.</h3>
            <a href="#" id="tpc_open_attachment_uploader" class="btn btn-primary">Subir imagenes</a>
            <h3>Tu casa</h3>
            <p>Requerimos tu información acerca del espacio donde cuidarás a las mascotas.</p>
            <form class="tpc-form" id="tpc_keeper_home_form">
               <div class="form-group">
                  <fieldset class="form-group">
                     <legend>Vives en:</legend>
                     <div class="radio-home-error"></div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="tpc_home" value="Casa">
                        <label class="form-check-label tpc-form__radio-label" for="tpc_home">
                           Casa
                        </label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="tpc_home" value="Apartmento">
                        <label class="form-check-label tpc-form__radio-label" for="tpc_home">
                           Apartamento
                        </label>
                     </div>
                  </fieldset>
                  <fieldset class="form-group">
                     <legend>Estado civil:</legend>
                     <div class="radio-home-error"></div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="tpc_marital_status" value="Casado">
                        <label class="form-check-label tpc-form__radio-label" for="tpc_marital_status">
                           Casado
                        </label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="tpc_marital_status" value="Soltero">
                        <label class="form-check-label tpc-form__radio-label" for="tpc_marital_status">
                           Soltero
                        </label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="tpc_marital_status" value="otro">
                        <label class="form-check-label tpc-form__radio-label" for="tpc_marital_status">
                           Otro
                        </label>
                     </div>
                  </fieldset>
                  <fieldset class="form-group">
                     <legend>Tu familia:</legend>
                     <p>¿Hay niños o mascotas en tu casa? Selecciona una o varias opciones.</p>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tpc_kids" value="Niños">
                        <label class="form-check-label" for="tpc_kids">Niños</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tpc_pets" value="Mascotas">
                        <label class="form-check-label" for="tpc_pets">Mascotas</label>
                     </div>
                  </fieldset>
                  <fieldset class="form-group">
                     <legend>Habilidades especiales:</legend>
                     <p>¿Tienes alguna habilidad especial? Selecciona una o varias opciones.</p>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tpc_injection" value="Aplica inyecciones">
                        <label class="form-check-label" for="tpc_injection">Aplicación de inyecciones</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tpc_special_care" value="Cuidados especiales">
                        <label class="form-check-label" for="tpc_special_care">Cuidados especiales</label>
                     </div>
                  </fieldset>
                  <input type="hidden" name="tpc_attachments" id="tpc_attachments">
                  <?php wp_nonce_field( 'register_keeper_home_info', 'tpc_keeper_house_id', false ); ?>
                  <input type="hidden" name="action" value="tpc_register_keeper_house_info">
                  <input class="tpc-form__button" type="submit" value="Guardar">
               </div>
            </form> 
       </div>
       <div id="step-4" class="tab-pane" role="tabpanel">
            <h3>Los servicios que ofreces.</h3>
            <p>Manejamos precios fijos, y una comisión del __%.</p>
            <h5>Selecciona una imagen para que aparezca en la parte principal de tu perfil.</h5>
            <a href="#" id="tpc_open_thumbnail_uploader" class="btn btn-primary">Seleccionar</a><br><br>
            <form class="tpc-form" id="tpc_keeper_services">
               <div class="form-group">
                  <fieldset class="form-group">
                     <legend>Selecciona los servicios que ofrecerás</legend>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tpc_lodging" value="true">
                        <label class="form-check-label" for="tpc_lodging">
                           Hospedaje ($200.00)
                        </label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tpc_day_care" value="true">
                        <label class="form-check-label" for="tpc_day_care">
                           Guardería ($180.00)
                        </label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tpc_hour_walk" value="true">
                        <label class="form-check-label" for="tpc_hour_walk">
                           Paseo x hora ($180.00)
                        </label>
                     </div>
                     <!--<div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tpc_half_walk" value="true">
                        <label class="form-check-label" for="tpc_half_walk">
                           Paseo 30 min ($80.00)
                        </label>
                     </div>-->
                  </fieldset>
                  <fieldset class="form-group">
                     <legend>Selecciona las máscotas que atenderás.</legend>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tpc_dog" value="true">
                        <label class="form-check-label" for="tpc_dog">
                           Perro
                        </label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tpc_cat" value="true">
                        <label class="form-check-label" for="tpc_cat">
                           Gato
                        </label>
                     </div>
                  </fieldset>
                  <fieldset class="form-group">
                     <legend>Cuentanos un poco más de ti y tus servicios. (Entre 10 y 250 caracteres)</legend>
                     <div>
                        <textarea name="tpc_description" id="tpc_description" cols="30" rows="10" required></textarea>
                     </div>
                  </fieldset>
                  <input type="hidden" name="tpc_thumbnail" id="tpc_thumbnail">
                  <?php wp_nonce_field( 'register_keeper_services', 'tpc_keeper_services_id', false ); ?>
                  <input type="hidden" name="action" value="tpc_register_keeper_services">
                  <input class="tpc-form__button" type="submit" value="Guardar">
               </div>
            </form> 
       </div>
    </div>
</div>
 

