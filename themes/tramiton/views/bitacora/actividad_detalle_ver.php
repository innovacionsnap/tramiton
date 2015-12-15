

<?php
/* Agregar funciones de combox provincia  */

$baseUrl = Yii::app()->theme->baseUrl;

include("config.inc.php");

   
    
$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
$id_usuario = $modelUser['usu_id'];
//$tar_id = $_GET['tar_id'];
//echo $tar_id;

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

                            <!-- begin wizard step-1 -->
                            <div class="profile">
                                <fieldset>
                                    <legend class="pull-left width-full">Actividad</legend>
                                    <!-- begin row -->
                                    <div class= "profile-info">
                                        <tbody>
                                            <table>

                                                <?php 
                                                foreach ($datosActividad_Ver as $datosActividad_Ver_detalle){ 
                                                    ?>
                                                <tr class="highlight">
                                                    <td class="field"><strong>Nombre</strong></td>
                                                    <td>&nbsp;&nbsp;<?php echo $datosActividad_Ver_detalle["acc_nombre"]?></td>
                                                </tr>
                                                <tr class="highlight">
                                                    <td class="field"><strong>Descripción:</strong></td>
                                                    <td>&nbsp;&nbsp;<?php echo $datosActividad_Ver_detalle["acc_descripcion"]?></td>
                                                </tr>
                                                <tr class="highlight">
                                                    <td class="field"><strong>Estado</strong></td>
                                                    <td>&nbsp;&nbsp; 
                                                        <?php  
                                                            if ($datosActividad_Ver_detalle["acc_estado"]==1){?>
                                                                
                                                                Verde
                                                            <?php 
                                                            }
                                                            elseif ($datosActividad_Ver_detalle["acc_estado"]==2){
                                                                echo "naranja";}
                                                            if ($datosActividad_Ver_detalle["acc_estado"]==3){
                                                                echo "rojo";
                                                            }

                                                        
                                                            # code...
                                                         ?>
                                                    </td>
                                                    
                                                </tr>
                                                <tr class="highlight">
                                                    <td class="field"><strong>Fecha Registro:</strong></td>
                                                    <td>&nbsp;&nbsp;<?php echo $datosActividad_Ver_detalle["acc_fecharegistro"]?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </table>
                                        </tbody>

                                </fieldset>
                            </div>
                            <!-- end wizard step-1 -->
                               
             
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content -->
