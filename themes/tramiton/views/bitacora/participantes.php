

<?php
/* Agregar funciones de combox provincia  */

$baseUrl = Yii::app()->theme->baseUrl;

include 'protected/extensions/validacion/config.inc.php';


    
$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
$id_usuario = $modelUser['usu_id'];
$tar_id = $_GET['tar_id'];

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

                    <form action="<?php echo Yii::app()->BaseUrl?>/bitacora/registroparticipante" method="POST" data-parsley-validate="true" name="form-wizard">
                        
                            
                            <!-- begin wizard step-1 -->
                            <div class="wizard">
                                <fieldset>
                                    <legend class="pull-left width-full">Registro de participantes:</legend>
                                    <!-- begin row -->
                                    <div class="row">

                                        <!-- begin col-12 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Participantes</label>
                                                <?php

                                                    $consulta_participante = '(select usu.usu_id, usu.usu_nombre from usuario usu, "AuthAssignment" aut
                                                        where CAST(aut.userid as integer) = usu.usu_id 
                                                        and aut.itemname = \'bitacora\' )
                                                        EXCEPT
                                                        (select usu.usu_id, usu.usu_nombre from usuario usu ,tarea_usuario taru
                                                        where usu.usu_id = taru.usu_id
                                                        and taru.tar_id ='. $tar_id.')'; 
                                                       //    echo  $consulta_participante;


                                                    $consulta_participante = pg_query($con, $consulta_participante) or die("Error en la Consulta SQL");
                                                    $numReg = pg_num_rows($consulta_participante);
                                                  
                                                    echo "<select class='form-control' data-parsley-group='wizard-step-1' name='id_participante' id='id_categoria' required>";
                                                    echo "<option value=''>Selecciona una categoria...</option>";
                                                    while ($fila=pg_fetch_array($consulta_participante)) 
                                                    {
                                                    echo "<option value=".$fila['usu_id'].">".$fila['usu_nombre']."</option>";
                                                    }
                                                    echo "</select>";
                                                   
                                                 ?>

                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                        <!-- begin col-12 -->
                                        <div class="col-md-6">
                                        <input type="submit" value="Enviar y Guardar" class="buttons btn-info">
                                        <input type="hidden" name="insertar_participante" value="1">
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
                                     <h5><strong>Usarios participantes</strong></h5>
                                 </tr>

                                    <tr>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                   <?php
                                        foreach ($datosTarea_Participantes as $datosTarea_Participantes_detalle){
                                        ?>
                                    <tr class="odd gradeA">
                                        <form action="<?php echo Yii::app()->BaseUrl?>/bitacora/eliminarparticipante" method="POST" data-parsley-validate="true" name="form-wizard">
                                                <td>
                                                <?php  echo $datosTarea_Participantes_detalle["usu_nombre"] ;?>
                                                </td>
                                                <td>
                                                <div>
                                                    <?php
                                                    if($datosTarea_Participantes_detalle["taru_creador"]==0){
                                                    ?>    
                                                        <input type="submit" value="Eliminar" class="buttons btn-info"></div>
                                                        <input type="hidden" name="eliminar_participante" value="1">
                                                        <input type="hidden" name="taru_id" value="<?php  echo $datosTarea_Participantes_detalle["taru_id"] ;?>">
                                                        <input type="hidden" name="tar_id" value="<?php  echo $tar_id?>">
                                                    <?php 
                                                        }else{
                                                            echo "Creador tarea";
                                                        }
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
