

<?php
/* Agregar funciones de combox provincia  */

$baseUrl = Yii::app()->theme->baseUrl;

include 'protected/extensions/validacion/config.inc.php';


    
$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
$id_usuario = $modelUser['usu_id'];
$tar_id = $_GET['tar_id'];
//$accion = $_GET['accion'];

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

                    <form action="<?php echo Yii::app()->BaseUrl?>/bitacora/registrointeropera" method="POST" data-parsley-validate="true" name="form-wizard">
                        
                            
                            <!-- begin wizard step-1 -->
                            <div class="wizard">
                                <fieldset>
                                    <legend class="pull-left width-full">Interoperabilidad:</legend>
                                    <!-- begin row -->
                                    <div class="row">

                                        <!-- begin col-12 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Instituciones</label>
                                               <?php

                                                    $consulta_institucion = "select * from institucion order by ins_funcion_ejecutiva desc,ins_nombre";

                                                    $resultado_institucion = pg_query($con, $consulta_institucion) or die("Error en la Consulta SQL");
                                                    $numReg = pg_num_rows($resultado_institucion);
                                                  
                                                    echo "<select class='form-control' data-parsley-group='wizard-step-1' name='id_institucion' id='id_institucion' required>";
                                                    echo "<option value=''>Selecciona una institucion...</option>";
                                                    while ($fila=pg_fetch_array($resultado_institucion)) 
                                                    {
                                                    echo "<option value=".$fila['ins_id'].">".$fila['ins_nombre']."</option>";
                                                    }
                                                    echo "</select>";
                                                   
                                                ?>

                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                        <!-- begin col-12 -->
                                        <div class="col-md-6">
                                        <input type="submit" value="Enviar y Guardar" class="buttons btn-info">
                                        <input type="hidden" name="interopera" value="1">
                                        <input type="hidden" name="tar_id" value="<?php echo $tar_id?>">
                                        </div>
                                        
                                </fieldset>
                            </div>
                     </form>
                            <!-- end wizard step-1 -->
                            <br>

                             <table class="table table-hover">

                                <thead>
                                    <tr>
                                     <h5><strong>Instituciones</strong></h5>
                                 </tr>

                                    <tr>
                                        <th>Institución</th>
                                        <th>Acciones</th>
                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                   <?php
                                        foreach ($datosInteropera as $datosInteroperaD){
                                        ?>
                                    <tr class="odd gradeA">
                                        <form action="<?php echo Yii::app()->BaseUrl?>/bitacora/eliminarinteropera" method="POST" data-parsley-validate="true" name="form-wizard">
                                                <td>
                                                <?php  echo $datosInteroperaD["ins_nombre"] ;?>
                                                </td>
                                                <td>
                                                <div>
                                                    <?php
                                                  
                                                    ?>    
                                                        <input type="submit" value="Eliminar" class="buttons btn-info"></div>
                                                        <input type="hidden" name="eliminar_interopera" value="1">
                                                        <input type="hidden" name="tarin_id" value="<?php echo $datosInteroperaD["tarin_id"] ;?>">
                                                        <input type="hidden" name="tar_id" value="<?php  echo $tar_id?>">
                                                    <?php 
                                                        
                                                    ?>
                                                
                                                </td>
                                        </form>
                                    </tr>
                                    <?php } ?>
                                      

                                </table>
                                                  
                                            </td>
                                        </tr> 
                                    </tbody>
                                </table>
                            
                            
                        </div>
                   
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->
