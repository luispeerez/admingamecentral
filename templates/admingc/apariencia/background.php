<?php
$message = '';
if($this->get("e")){
    $e = $this->get("e");
    $message = '<div class="alert alert-warning" role="alert">Hubo un error intentalo de nuevo</div>';
}else if($this->get("m")) {
    $message = '<div class="alert alert-success" role="alert">Datos guardados correctamente</div>';
}
?>

<h1><i class="fa fa-picture-o"></i> Background activo</h1>
<?php echo $message; ?>
<div class="row">
    <div class="col-lg-6">
        <div class='imagen_i logotipo_i'>
            <p>
                <?php 
                    $logo = $this->background->image;

                 ?>
                <input type="hidden" value="<?php echo (isset($logo))?$logo:'' ?>" id="logo_input" name="logo_input" />
                <input type="file" name="imagen_input_file" id="imagen_input_file_edit" class='single-image edit' title='/apariencia/update_background/,<?php echo 1 ?>'/>
            </p>       
            <p class='uploaded_photos'> 
                <?php 
                if($this->background->imagen){
                    $rand = rand();
                    echo <<<EOD
                    <span class='photo'>
                        <a href='/uploads/background/large/{$this->background->imagen}'>
                            <img src='/uploads/background/tiny/{$this->background->imagen}?r=$rand' alt=''/>
                        </a>
                        <a href='/apariencia/destroy_background/1' class='option_erase'>Borrar</a>
                    </span>             
EOD;
                }
                ?>
            </p>
        </div>
    </div>
</div>
