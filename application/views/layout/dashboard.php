<style type="text/css">
/*    #block4 { 
              border:1px solid #C4C4C4; 
              font-family:Georgia,"Times New Roman",
                  Times,serif; 
    } 
    img.alineadoTextoImagenArriba{
        vertical-align: text-top;  
    }
    img.alineadoTextoImagenCentro{
        vertical-align: middle;
    }
    img.alineadoTextoImagenAbajo{
        vertical-align: text-bottom;  
    }*/
</style>
<?php $this->load->view('layout/header') ?>
<?php
$opciones = $this->loaders->get_menu();
// print_p($opciones);
// exit();
?>
<!--<div>-->    
<div class="form-group">
    <h1 style="color: white; text-shadow: black 0.1em 0.1em 0.2em">Calzature D'Luanas<br/>
        </h1>
     </div>
     
<!--<div class="form-group" style="padding-top: 100px">
    
</div>-->
    <div id="block4" > 
        <div id="imagenPortada">
            <img width="100%"  class="alineadoTextoImagenArriba" src="<?php echo URL_IMG_LOGO . 'portadaAdmin1.jpg' ?>" />
            
        </div> 
    </div>    
<!--</div>-->



<?php $this->load->view('layout/footer') ?>