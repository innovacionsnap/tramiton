


<?php
/* Agregar funciones de combox provincia  */

$baseUrl = Yii::app()->theme->baseUrl;

include("config.inc.php");

   
    
$modelUser = Usuario::model()->findByPk(Yii::app()->user->id);
$id_usuario = $modelUser['usu_id'];
$tar_id = $_GET['tar_id'];

//$acc_id = $_GET['acc_id'];


if(isset($_GET['reforma_id'])){

    $rl_id = $_GET['reforma_id'];
    $tramite = $_GET['tar_id'];
    $modelaccion = RefLegal::model()->findByPk($rl_id);
    $rl_cuerpo = $modelaccion["rl_cuerpo"];
    $rl_fecha = $modelaccion["rl_fecha"];
    $rl_tipo = $modelaccion["rl_tipo"];
    $rl_motivo = $modelaccion["rl_motivo"];
    $rl_difusion = $modelaccion["rl_difusion"];

    // $descripcion_accion = $modelaccion["acc_descripcion"];
    // $estado = $modelaccion["acc_estado"];
    // $nivel = $modelaccion["acc_nivel"];
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


                    <form action="<?php echo Yii::app()->BaseUrl?>/bitacora/RegistroReforma" method="POST" data-parsley-validate="true" name="form-wizard">
                         <!-- begin wizard step-1 -->
                            <div>
                                <fieldset>
                                    <legend class="pull-left width-full">Reforma Legal</legend>
                                    <!-- begin row -->
                                    <div class="row">
                                         <!-- begin col-12 -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Cuerpo Legal</label>
                                                <textarea class="form-control" id = "cuerpo_legal" onkeyup = "Validate(this)" name="cuerpo_legal" rows="4" data-parsley-range="[20,200]" placeholder="Detalle actividad" required><?php if(isset($_GET['reforma_id'])){ echo $rl_cuerpo; } ?></textarea>
                                           </div>
                                         </div>
                                        <!-- end col-12 -->

                                         <!-- begin col-12 -->
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Tipo</label>
                                                <select class='form-control'  name='tipo_reforma' id='tipo_reforma' required>";
                                                    <option value='' >Selecciona un tipo</option>
                                                    <option <?php if(isset($_GET['reforma_id'])){?>value = "<?php echo $rl_tipo; ?>" selected = "selected" <?php } ?> >
                                                        <?php if(isset($_GET['reforma_id'])){ echo $rl_tipo;}?></option> 
                                                    <option value="1"  >Leyes y normas con fuerza o condición de ley</option>
                                                    <option value="2" >Decretos</option>
                                                    <option value="3" >Normas administrativas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end col-12 -->

                                         <!-- begin col-12 -->
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Motivo Reforma</label>
                                                <select class='form-control'  name='motivo_reforma' id='motivo_reforma' required>";
                                                    <option value='' >Selecciona un motivo</option>
                                                    <option <?php if(isset($_GET['reforma_id'])){?>value = "<?php echo $rl_motivo; ?>" selected = "selected" <?php } ?> >
                                                        <?php if(isset($_GET['reforma_id'])){ echo $rl_motivo;}?></option> 

                                                    <option value="1" >Eliminación del trámite</option>
                                                    <option value="2" >Simplificación de requisitos</option>
                                                    <option value="3" >Disminución tiempo de respuesta y/o interacciones</option>
                                                    <option value="4" >Mejoramiento de procesos internos</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end col-12 -->

                                       
                                        <!-- begin col-12 -->
                                        <div class="col-md-6">
                                         <label>Fecha Inicio / Cierre</label>
                                            <div class="input-group input-daterange">
                                                <input type="text" class="form-control" name="start" placeholder="Fecha Inicio" value = "<?php if(isset($_GET['reforma_id'])){ echo $rl_fecha; } ?>" />
                                                <span class="input-group-addon">a</span>
                                                <input type="text" class="form-control" name="end" placeholder="Fecha Cierre" />
                                            </div>
                                        </div>
                                        <!-- end col-12 -->
                                       <!-- begin col-12 -->
                                        <div class="col-md-6">
                                             <label>Difusición</label>
                                         <div class="radio">
                                            <label>
                                                <input type="radio" name="difusion_reforma" value="1" id="difusion_reforma" value="1" <?php if(isset($_GET['reforma_id'])){ if($rl_difusion==1){echo "checked";} } ?> />Si
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="difusion_reforma" value="2" id="difusion_reforma" value="0" <?php if(isset($_GET['reforma_id'])){ if($rl_difusion==0){echo "checked";} } ?> /> No
                                            </label>
                                        </div>
                                        </div>
                                        <!-- end col-12 -->

                                     </div>
                                    <!-- end row -->
                                </fieldset>
                                
                             
                                <input type="submit" value="Enviar y Guardar" class="btn btn-success btn-lg">
                                
                                
                                <?php 
                                    if(isset($_GET['acc_id'])){ ?>

                                    <input type="hidden" name="editar_accion" value ="1">
                                    <input type="hidden" name="tar_id" value="<?php echo $tar_id?>">
                                    <input type="hidden" name="acc_id" value ="<?php if(isset($_GET['acc_id'])){ echo $acc_id; }?>">
                                    <!-- <input type="hidden" name="tramite" value ="<?php if(isset($_GET['acc_id'])){ echo "1"; }?>"> -->

                                <?php 
                                     }else{

                                ?>
                                    <input type="hidden" name="tar_id" value="<?php echo $tar_id?>">
                                    <input type="hidden" name="inserta_reforma" value="1">

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

