<?php if ( $errors->count() > 0 ){ ?>
    <div class="alert alert-block alert-danger fade in">
        <button type="button" class="close close-sm" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <?php foreach( $errors->messages() as $smesage ){ ?>
            <p> {!! $smesage[0] !!} </p>
        <?php  } ?>
    </div>
<?php } ?> 
     
       <?php if(Session::has('error_message')) { ?>
              
          <div class="alert alert-block alert-danger fade in">
              <button type="button" class="close close-sm" data-dismiss="alert">
                  <i class="fa fa-times"></i>
              </button>
              
                <p> {{ Session::get('error_message') }} </p>
               
          </div>

           <!-- <div class="fv-plugins-message-container"><div data-field="billing_city" data-validator="notEmpty" class="fv-help-block">City 1 is required</div></div> -->
               
                <?php } ?>  
                
           <?php if(Session::has('success_message')) { ?>

            

                <div class="alert alert-custom alert-success fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">{{ Session::get('success_message') }}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>

                        
                <?php }  ?>

                


               