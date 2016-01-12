
<?php
/* Agregar funciones de combox provincia  */

$baseUrl = Yii::app()->theme->baseUrl;

include 'protected/extensions/validacion/config.inc.php';

   
    
$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
$id_usuario = $modelUser['usu_id'];
$tar_id = $_GET['tar_id'];
// echo $tar_id;

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
                                    <legend class="pull-left width-full">Actividad</legend>
                                    <!-- begin row -->
                                    <div class="row">

                                        <!-- begin col-12 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" id = "nombre_actividad" onkeyup = "Validate(this)" name="nombre_actividad" placeholder="Escribir aqui" class="form-control"  required />
                                                

                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                        <!-- begin col-12 -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <select class='form-control' name='estado_actividad' id='estado_actividad' required>";
                                                <option value='' >Selecciona el estado</option>
                                                <option value="1" class="label-success">Verde</option>
                                                <option value="2" class="label-warning">Naranja</option>
                                                <option value="3" class="label-danger">Rojo</option>
                                                </select>
                                                

                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                        <!-- begin col-12 -->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <select class='form-control'  name='nivel_actividad' id='nivel_actividad' required>";
                                                <option value='' >Selecciona el estado</option>
                                                <option value="0"  >0 %</option>
                                                <option value="10" >10 %</option>
                                                <option value="20" >20 %</option>
                                                <option value="30" >30 %</option>
                                                <option value="40" >40 %</option>
                                                <option value="50" >50 %</option>
                                                <option value="60" >60 %</option>
                                                <option value="70" >70 %</option>
                                                <option value="80" >80 %</option>
                                                <option value="90" >90 %</option>
                                                <option value="100" >100 %</option>
                                                </select>
                                                

                                            </div>
                                        </div>
                                        <!-- end col-12 -->

                                         <!-- begin col-12 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea class="form-control" id = "descripcion_actividad" onkeyup = "Validate(this)" name="descripcion_actividad" rows="4" data-parsley-range="[20,200]" placeholder="Detalle actividad" required></textarea>
                                                

                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                     </div>
                                    <!-- end row -->
                                </fieldset>
                                
                             
                                <input type="submit" value="Enviar y Guardar" class="btn btn-success btn-lg">
                                <input type="hidden" name="insertar_actividad_detalle" value="1">
                                <input type="hidden" name="tar_id" value="<?php echo $tar_id ?>">
                                
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
