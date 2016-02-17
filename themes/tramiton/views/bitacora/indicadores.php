


<?php
/* Agregar funciones de combox provincia  */

$baseUrl = Yii::app()->theme->baseUrl;

include("config.inc.php");

   
    
$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
$id_usuario = $modelUser['usu_id'];
$tar_id = $_GET['tar_id'];

//$acc_id = $_GET['acc_id'];


if(isset($_GET['acc_id'])){

    $acc_id = $_GET['acc_id'];
    $modelaccion = Accion::model()->findByPk($acc_id);
    $nombre_accion = $modelaccion["acc_nombre"];
    $descripcion_accion = $modelaccion["acc_descripcion"];
    $estado = $modelaccion["acc_estado"];
    $nivel = $modelaccion["acc_nivel"];
    //$nivel_color = "";

   

    
}
 
?>


<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<?php //echo $baseUrl; ?>


<style>
    body{
        padding-top: 0px;
    }
    .row{
        padding: 0px;
    }
    #content{
        padding-top: 0px !important;
    }
    .btn-comentario{
        /*margin-top: 30px;*/
        /*margin-left: -10px;*/
    }
    .tarea{
        resize: none;
        border-radius: 8px;
    }
    #contenido{
        padding-top: 0px;
        padding-bottom: 0px;
    }
    #footer, .pace, #headerTramiton{
        display:none;
    }
    .page-header{
        margin-top: 10px;
        margin-bottom: 0px;
    }
</style>
<!-- begin #content -->
<div id="content" class="content" style="margin-left: 50px; margin-right: 20px">

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            
                <div class="panel-body">


                    <form action="<?php echo Yii::app()->BaseUrl?>/bitacora/registroaccion" method="POST" data-parsley-validate="true" name="form-wizard">
                         <!-- begin wizard step-1 -->
                            <div>
                                <fieldset>
                                    <legend class="pull-left width-full">Indicadores Iniciales</legend>
                                    <!-- begin row -->
                                    <div class="row">

                                        <!-- begin col-5 -->
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label>Funcionarios</label>
                                                <input type="text" id = "nombre_actividad" onkeyup = "Validate(this)" name="nombre_actividad" placeholder="Escribir aqui" class="form-control"  required />
                                                

                                            </div>
                                        </div>
                                        <!-- end col-5 -->
                                         <!-- begin col-5 -->
                                        <div class="col-md-1">
                                            <div>
                                                <label></label>
                                                <input type="submit" value="Guardar" class="btn btn-primary btn-xs m-r-5">
                                                

                                            </div>
                                        </div>
                                        <!-- end col-5 -->
                                     
                                        
                                </fieldset>
                                
                             
                                
                                
                                
                                
                                
                                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                                <input type="hidden" name="url" value="<?php echo $baseUrl ?>">
                            </div>
                            <!-- end wizard step-1 -->
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->

