<?php
    $num=$_GET['num'] ?? null;
?>
    <section class="contacto-page">
        <h2 class="contacto-title">CONTACTO</h2>
        <div class="contacto-flex">
            <div class="contacto-img">
                <picture class=''>
                   
                    <source class='' srcset='build/img/destacada3.webp' type='image/webp'>
                    <img class='' src='build/img/destacada3.jpg' alt='contacto-im'>
                </picture>
            </div>
            <div class="div-form">
                <?php if($num): ?>
                    <p data-cy="submit-msg" class="chequeado"><?php echo $mensaje= mostrarNotificacion(intval($num));?></p>
                <?php endif; ?>
                <h3>Llenar el Formulario</h3>
                <form data-cy="form-contacto" action="contacto" method="POST" class="form-contacto">
                    <fieldset>
                        <legend>Información Personal</legend>
                        <div class="campos">
                            <label for="nombre" >Nombre:</label>
                            <input data-cy="name" id="nombre" name="contacto[nombre]" type="text" placeholder="Tu nombre"></input>
                        </div>
                       
                        <div class="campos">
                            <label for="">Mensaje:</label>
                            <textarea  data-cy="mensaje" name="contacto[mensaje]" id="" cols="20" rows="5"></textarea>
                        </div>
                    </fieldset>
               
                
                    <fieldset>
                        <legend>Información Propiedad</legend>
                        <div class="campos">
                            <label for="">Venta o compra:</label>
                            <select data-cy="options" name="contacto[tipo]" id="">
                                <option disabled selected value="">-SELECCIONA-</option>
                                <option value="compra">Compra</option>
                                <option value="vende">Venta</option>
                            </select>
                        </div>
                        <div class="campos">
                            <label for="">Precio o Presupuesto</label>
                            <input data-cy="input-precio" type="number" name="contacto[precio]"></input>
                        </div>
                    </fieldset>
                
                
                    <fieldset>
                        <legend>Contacto</legend>
                        <h5>Como desea ser contactado</h5>
                        <div class="flex-tel-email ">
                            <div class="campos tel-email">
                                <label for="">Telefono:</label>
                                <input data-cy="input-contacto" class="contact-tel" name="contacto[contacto]" type="radio" value="telefono" ></input>
                            </div>
                            <div class="campos tel-email contact-email">
                                <label for="">Email:</label>
                                <input data-cy="input-contacto" class="contact-email" name="contacto[contacto]" type="radio" value="email" class="radio"></input>
                            </div>
                        </div>
                        <h5 class="decision"></h5>

                        <div class="campos choosen">
                            
                            
                        </div>
                    </fieldset>
                    <div class="button-overall">
                            <button value="send-contacto" class="">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
   