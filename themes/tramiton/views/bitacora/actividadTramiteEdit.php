


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
    $requisito_inicial = $modeltarea["tar_requisitos_ini"];
    $requisito_fin = $modeltarea["tar_requisitos_fin"];
    $funcionario_inicial = $modeltarea["tar_funcionarios_ini"];
    $funcionario_fin = $modeltarea["tar_funcionarios_fin"];
    $tiempo_inicial = $modeltarea["tar_tiempo_ini"];
    $tiempo_fin = $modeltarea["tar_tiempo_fin"];
    $intera_inicial = $modeltarea["tar_intera_ini"];
    $intera_fin = $modeltarea["tar_intera_fin"];

    
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
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label><strong>Sector: </strong></label><br>
                                                <label><?php  $model=Bitacora::model();
                                                $nombreTramite=$model->getSector($tar_id);?></label>
                                                                                                

                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                        <div class="col-md-6">
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

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                
                                                <label>Tipo</label>
                                                <select class='form-control'  name='tar_estandar' id='tar_estandar' required>";
                                                <option value='' >Seleccione una opción</option>
                                                <option value="1" >Leyes y normas con fuerza o condición de ley</option>
                                                <option value="2" >Decretos</option>
                                                <option value="3" >Normas administrativas</option>
                                                
                                                </select>
                                                
                                              </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fecha</label>
                                                <input type="text" class="form-control" name="start" placeholder="Fecha Disposicion" />
                                              </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Motivo</label>
                                                <input type="text" id = "descripcion_tarea" onkeyup = "Validate(this)" name="descripcion_tarea" data-parsley-range="[2,200]" placeholder="Escribir aqui" class="form-control" data-parsley-group="wizard-step-2" required />
                                                
                                              </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Difusión</label>
                                                <input type="text" id = "descripcion_tarea" onkeyup = "Validate(this)" name="descripcion_tarea" data-parsley-range="[2,200]" placeholder="Escribir aqui" class="form-control" data-parsley-group="wizard-step-2" required />
                                              </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Cuerpo Legal</label>
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

                                     

                                        <!-- end col-12 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><strong>Estrategia: </strong></label><br>
                                                <label><?php   if(isset($_GET['tar_id'])){ echo $estrategia_tarea; }?></label>
                                                                                                

                                            </div>
                                        </div>
                                        <!-- end col-12 -->

                                       


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Estandar</label>
                                                <select class='form-control'  name='tar_estandar' id='tar_estandar' required>";
                                                <option value='' >Seleccione una opción</option>
                                                <option value="1" >Automatización</option>
                                                <option value="2" >Levantamiento - Optimización</option>
                                                <option value="3" >Reforma Legal</option>
                                                <option value="4" >Interoperabilidad</option>
                                                </select>
                                                

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

                                         <?php if (isset($_GET['tar_id']) and $_GET['accion']==6){ ?>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Requisito Inicial</label>
                                                <input type="text" id="requisito_inicial" onkeyup="Validate(this)" name="requisito_inicial" placeholder="N° de requisito" class="form-control" value="<?php if(isset($_GET['tar_id'])){ echo $requisito_inicial; }?>" required="" data-parsley-id="3645">
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Funcionario Inicial</label>
                                                <input type="text" id="funcionario_inicial" onkeyup="Validate(this)" name="funcionario_inicial" placeholder="N° de funcionario" class="form-control" value="<?php if(isset($_GET['tar_id'])){ echo $funcionario_inicial; }?>" required="" data-parsley-id="3645">
                                                
                                            </div>
                                        </div>

                                         <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Tiempo Inicial</label>
                                                <input type="text" id="funcionario_inicial" onkeyup="Validate(this)" name="tiempo_inicial" placeholder="N° de horas" class="form-control" required="" value="<?php if(isset($_GET['tar_id'])){ echo $tiempo_inicial; }?>" data-parsley-id="3645">
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Interacciones Inicial</label>
                                                <input type="text" id="intera_inicial" onkeyup="Validate(this)" name="intera_inicial" placeholder="N° de interacciones" class="form-control" value="<?php if(isset($_GET['tar_id'])){ echo $intera_inicial; }?>" required="" data-parsley-id="3645">
                                                
                                            </div>
                                        </div>

                                        <?php } ?>

                                        <?php if (isset($_GET['tar_id']) and $_GET['accion']==7){ ?>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Requisito Final</label>
                                                <input type="text" id="requisito_fin" onkeyup="Validate(this)" name="requisito_fin" placeholder="N° de requisito" class="form-control" value="<?php if(isset($_GET['tar_id'])){ echo $requisito_fin; }?>" required="" data-parsley-id="3645">
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Funcionario Final</label>
                                                <input type="text" id="funcionario_fin" onkeyup="Validate(this)" name="funcionario_fin" placeholder="N° de funcionario" class="form-control" value="<?php if(isset($_GET['tar_id'])){ echo $funcionario_fin; }?>" required="" data-parsley-id="3645">
                                                
                                            </div>
                                        </div>

                                         <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Tiempo Final</label>
                                                <input type="text" id="funcionario_fin" onkeyup="Validate(this)" name="tiempo_fin" placeholder="N° de horas" class="form-control" required="" value="<?php if(isset($_GET['tar_id'])){ echo $tiempo_fin; }?>" data-parsley-id="3645">
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Interacciones Inicial</label>
                                                <input type="text" id="intera_fin" onkeyup="Validate(this)" name="intera_fin" placeholder="N° de interacciones" class="form-control" value="<?php if(isset($_GET['tar_id'])){ echo $intera_fin; }?>" required="" data-parsley-id="3645">
                                                
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
                                    if(isset($_GET['tar_id']) and $_GET['accion']==4){ ?>

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

                                <?php 
                                    if(isset($_GET['tar_id']) and $_GET['accion']==6){ ?>

                                    <input type="hidden" name="editar_tarea" value ="1">
                                    <input type="hidden" name="accion" value ="<?php echo $_GET['accion'] ?>">
                                    <input type="hidden" name="tar_id" value ="<?php if(isset($_GET['tar_id'])){ echo $tar_id; }?>">
                                <?php 
                                     }
                                ?>

                                <?php 
                                    if(isset($_GET['tar_id']) and $_GET['accion']==7){ ?>

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

