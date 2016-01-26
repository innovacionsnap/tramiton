


<?php
/* Agregar funciones de combox provincia  */

$baseUrl = Yii::app()->theme->baseUrl;

include("config.inc.php");

   
    
$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
$id_usuario = $modelUser['usu_id'];
$tar_id = $_GET['tar_id'];
//echo "problema".$_GET['problema'];

//$acc_id = $_GET['acc_id'];


if(isset($_GET['tar_id'])){

    $tar_id = $_GET['tar_id'];
    $accion = $_GET['accion'];

   

    $modeltarea = Tarea::model()->findByPk($tar_id);
    $nombre_tarea = $modeltarea["tar_nombre"];
    $problema_tarea = $modeltarea["tar_descripcion"];
    $politica_tarea = $modeltarea["tar_politica"];
    $estrategia_tarea = $modeltarea["tar_estrategia"];
    $meta_tarea = $modeltarea["tar_meta"];
    
}
 
?>


<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<?php //echo $baseUrl; ?>



<!-- begin #content -->
<div id="content" class="content" style="margin-left: 50px; margin-right: 20px">

    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            
                <div class="panel-body">


                    <form action="<?php echo Yii::app()->BaseUrl?>/bitacora/RegistroTramite" method="POST" data-parsley-validate="true" name="form-wizard">
                         <!-- begin wizard step-1 -->
                            <div>
                                <fieldset>
                                    <legend class="pull-left width-full">Trámite / Editar - Problema</legend>
                                    <!-- begin row -->
                                    <div class="row">

                                        <!-- begin col-12 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><strong>Trámite: </strong></label><br>
                                                <label><?php $model=Bitacora::model();
                                                $nombreTramite=$model->getInstitucion($nombre_tarea); ?></label>
                                                                                                

                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                        <!-- begin col-12 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><strong>Sector: </strong></label><br>
                                                <label><?php  $model=Bitacora::model();
                                                $nombreTramite=$model->getSector($tar_id);?></label>
                                                                                                

                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><strong>Institucion: </strong></label><br>
                                                <label><?php  $model=Bitacora::model();
                                                $nombreTramite=$model->getInstitucion2($tar_id);?></label>
                                                                                                

                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                        <!-- begin col-12 -->

                                       <?php if (isset($_GET['tar_id']) and $_GET['accion']==1){ ?>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Problema</label>
                                                <textarea value"DOS" class="form-control" id = "tar_descripcion" onkeyup = "Validate(this)" name="tar_descripcion" rows="4" data-parsley-range="[20,200]" placeholder="Detalle el problema de trámite" required><?php if(isset($_GET['tar_id'])){ echo $problema_tarea; } ?></textarea>
                                                

                                            </div>
                                        </div>

                                        <?php } ?>

                                        <?php if (isset($_GET['tar_id']) and $_GET['accion']==2){ ?>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Reforma Legal</label>
                                                <textarea value"DOS" class="form-control" id = "tar_politica" onkeyup = "Validate(this)" name="tar_politica" rows="4" data-parsley-range="[20,200]" placeholder="Detalle la reforma Legal" required><?php if(isset($_GET['tar_id'])){ echo $politica_tarea; } ?></textarea>
                                                

                                            </div>
                                        </div>

                                        <?php } ?>

                                        <?php if (isset($_GET['tar_id']) and $_GET['accion']==3){ ?>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Estrategia</label>
                                                <textarea value"DOS" class="form-control" id = "tar_estrategia" onkeyup = "Validate(this)" name="tar_estrategia" rows="4" data-parsley-range="[20,200]" placeholder="Detalle la estragía a ser utilizada" required><?php if(isset($_GET['tar_id'])){ echo $estrategia_tarea; } ?></textarea>
                                                

                                            </div>
                                        </div>

                                        <?php } ?>

                                        <?php if (isset($_GET['tar_id']) and $_GET['accion']==4){ ?>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Estandar</label>
                                                
                                                

                                            </div>
                                        </div>

                                        <?php } ?>

                                        <?php if (isset($_GET['tar_id']) and $_GET['accion']==5){ ?>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Meta</label>
                                                <textarea value"DOS" class="form-control" id = "tar_meta" onkeyup = "Validate(this)" name="tar_meta" rows="4" data-parsley-range="[20,200]" placeholder="Meta a ser alcanzada" required><?php if(isset($_GET['tar_id'])){ echo $meta_tarea; } ?></textarea>
                                                

                                            </div>
                                        </div>

                                        <?php } ?>

                                       
                                       
                                        <!-- end col-12 -->
                                     </div>
                                    <!-- end row -->
                                </fieldset>
                                
                             
                                <input type="submit" value="Enviar y Guardar" class="btn btn-success btn-lg">
                                
                                
                                <?php 
                                    if(isset($_GET['tar_id']) and $_GET['accion']==1){ ?>

                                    <input type="hidden" name="editar_tarea" value ="1">
                                    <input type="hidden" name="accion" value ="<?php echo $_GET['accion'] ?>">
                                    <input type="hidden" name="tar_id" value ="<?php if(isset($_GET['tar_id'])){ echo $tar_id; }?>">
                                <?php 
                                     }
                                ?>

                                <?php 
                                    if(isset($_GET['tar_id']) and $_GET['accion']==2){ ?>

                                    <input type="hidden" name="editar_tarea" value ="1">
                                    <input type="hidden" name="accion" value ="<?php echo $_GET['accion'] ?>">
                                    <input type="hidden" name="tar_id" value ="<?php if(isset($_GET['tar_id'])){ echo $tar_id; }?>">
                                <?php 
                                     }
                                ?>

                                <?php 
                                    if(isset($_GET['tar_id']) and $_GET['accion']==3){ ?>

                                    <input type="hidden" name="editar_tarea" value ="1">
                                    <input type="hidden" name="accion" value ="<?php echo $_GET['accion'] ?>">
                                    <input type="hidden" name="tar_id" value ="<?php if(isset($_GET['tar_id'])){ echo $tar_id; }?>">
                                <?php 
                                     }
                                ?>
                                

                                <?php 
                                    if(isset($_GET['tar_id']) and $_GET['accion']==5){ ?>

                                    <input type="hidden" name="editar_tarea" value ="1">
                                    <input type="hidden" name="accion" value ="<?php echo $_GET['accion'] ?>">
                                    <input type="hidden" name="tar_id" value ="<?php if(isset($_GET['tar_id'])){ echo $tar_id; }?>">
                                <?php 
                                     }
                                ?>
                                
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

