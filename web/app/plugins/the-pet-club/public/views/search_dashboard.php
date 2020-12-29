<div class="search">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <p class="search__title">Necesito servicio de:</p>
                <div class="row justify-content-around">
                    <div id="lodging"
                        class="col-12 col-sm-3 col-lg-3 search__item search__item__service">
                        <i class="fas fa-suitcase search__icon"></i>
                        <p class="search__text">Hospedaje</p>
                    </div>
                    <div id="day care" 
                        class="col-12 col-sm-3 col-lg-3 search__item search__item__service">
                        <i class="fas fa-bone search__icon"></i>
                        <p class="search__text">Guardería</p>
                    </div>
                    <div id="walk" 
                        class="col-12 col-sm-3 col-lg-3 search__item search__item__service">
                        <i class="fas fa-paw search__icon"></i>
                        <p class="search__text">Paseo</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <p class="search__title">Para mi:</p>
                <div class="row justify-content-around">
                    <div id="dog" 
                        class="col-5 search__item search__item__pet">
                        <i class="fas fa-dog search__icon"></i>
                        <p class="search__text">Perro</p>
                    </div>
                    <div id="cat" 
                        class="col-5 search__item search__item__pet">
                        <i class="fas fa-cat search__icon"></i>
                        <p class="search__text">Gato</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="search__title">En la colonia:</p>
                <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                    <div class="form-group">
                        <?php wp_nonce_field( 'search_for_keepers', 'tpc_search_id', false ); ?>
                        <input name="post_type" type="hidden" value="keeper">
                        <input id="service" name="tpc_service" type="hidden">
                        <input id="dog_input" name="tpc_dog" type="hidden" value=0>
                        <input id="cat_input" name="tpc_cat" type="hidden" value=0>
                        <input id="region" name="tpc_region" type="text">
                        <input class="tpc-form__button" type="submit" value="Buscar">
                    </div>
                </form> 
            </div>
        </div>
    </div>    
</div>