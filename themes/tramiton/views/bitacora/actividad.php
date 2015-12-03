
<?php
    $baseUrl = Yii::app()->theme->baseUrl;

    include("config.inc.php");

   
    //usuario 

        $modelUser = Usuario::model() -> findByPk(Yii::app() -> user -> id);
        $id_usuario = $modelUser['usu_id'];

?>



<!-- begin #content -->
        <div id="content" class="content">
           
           
            <!-- begin row -->
            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        
                        <div class="panel-body">
                            
                            
                            <form action="<?php echo $baseUrl; ?>/views/bitacora/final_bitacora.php" method="POST" data-parsley-validate="true" name="form-wizard">
                                <div id="wizard">

                                  <ol>
                                        <li>
                                            Institucion
                                            <small>Ingresar datos de Institucion responsable.</small>
                                        </li>
                                        <li>
                                            Tarea
                                            <small>Detalle tarea a ser ingresada.</small>
                                        </li>
                                       
                                        <li>
                                           Finalizar
                                            <small>Enviar y pulicar .</small>
                                        </li>
                                        
                                    </ol>  
                                  
                                    <!-- begin wizard step-1 -->
                                   
                                       <!-- begin wizard step-1 -->
                                    <div class="wizard-step-1">
                                        <fieldset>
                                        
                                            <!-- begin row -->
                                            <div class="row">
                                                
                                                <!-- begin col-12 -->
                                                
                                                <div class="col-md-12">
                                                     <div class="form-group block1">
                                                        <label>Categoria</label>
                                                        <?php

                                                            $consulta_categoria = "SELECT * FROM categoria";    
        
                                                            $resultado_categoria = pg_query($con, $consulta_categoria) or die("Error en la Consulta SQL");
                                                            $numReg = pg_num_rows($resultado_categoria);
                                                          
                                                            echo "<select class='form-control' data-parsley-group='wizard-step-1' name='id_categoria' id='id_categoria' required>";
                                                            echo "<option value=''>Selecciona una categoria...</option>";
                                                            while ($fila=pg_fetch_array($resultado_categoria)) 
                                                            {
                                                            echo "<option value=".$fila['cat_id'].">".$fila['cat_nombre']."</option>";
                                                            }
                                                            echo "</select>";
                                                           
                                                        ?>
                                                        
                                                    </div>
                                                 
                                                 
                                                    <div class="form-group block1">
                                                        <label>Institucion responsable:</label>
                                                        
                                                        <?php

                                                            $consulta_institucion = "SELECT * FROM institucion";    
        
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

                                                    

                                                    <div class="form-group block1">
                                                        <label>Usuario responsable:</label>
                                                        
                                                        <?php

                                                            $consulta_usuario = 'select * from usuario usu, "AuthAssignment" aut where CAST(aut.userid as integer) = usu.usu_id and aut.itemname = \'Bitacora\' ';    
        
                                                            $resultado_usuario = pg_query($con, $consulta_usuario) or die("Error en la Consulta SQL");
                                                            $numReg = pg_num_rows($resultado_usuario);
                                                          
                                                            echo "<select class='form-control' data-parsley-group='wizard-step-1' name='id_usuario_responsable' id='id_usuario_responsable' required>";
                                                            echo "<option value=''>Selecciona una usuario...</option>";
                                                            while ($fila_usuario=pg_fetch_array($resultado_usuario)) 
                                                            {
                                                            echo "<option value=".$fila_usuario['usu_id'].">".$fila_usuario['usu_nombre']."</option>";
                                                            }
                                                            echo "</select>";
                                                   
                                                        ?>
                                                        
                                                    </div>
                                                    
                                                   
                                                </div>
                                                <!-- end col-12 -->
                                            </div>
                                            <!-- end row -->
                                        </fieldset>
                                    </div>
                                    <!-- end wizard step-1 -->
                                  
                                 
                                    <!-- begin wizard step-2 -->
                                    <div class="wizard-step-2">
                                        <div class="form-group">
                                              <label>Tarea</label>
                                              <input type="text" id = "nombre_tarea" onkeyup = "Validate(this)" name="nombre_tarea" placeholder="Escribir aqui" class="form-control" data-parsley-group="wizard-step-2" required />
                                                        
                                        </div>
                                        <div class="form-group ">
                                                <label>Descripcion</label>
                                                <input type="text" id = "descripcion_tarea" onkeyup = "Validate(this)" name="descripcion_tarea" data-parsley-range="[2,200]" placeholder="Escribir aqui" class="form-control" data-parsley-group="wizard-step-2" required />
                                                        
                                        </div>
                                        <div class="form-group">
                                            <label>Fechas</label>
                                            <div class="input-group input-daterange">
                                                <input type="text" class="form-control" name="start" placeholder="Fecha Inicio" />
                                                <span class="input-group-addon">a</span>
                                                <input type="text" class="form-control" name="end" placeholder="Fecha Fin" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Meta</label>
                                            <div class="controls">
                                                 <textarea class="form-control" id="meta_tarea" onkeyup = "Validate(this)" name="meta_tarea" rows="4" data-parsley-range="[20,200]" placeholder="Escribir aqui" data-parsley-group="wizard-step-2" required></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- end wizard step-2 -->
                                    <!-- begin wizard step-3 -->
                                   
                                    <!-- end wizard step-2 -->
                                    <!-- begin wizard step-4 -->
                                    <div class="wizard-step-4">
                                        <div class="jumbotron m-b-0 text-center">
                                            <h1>Gracias por ingresar su tarea</h1>
                                         
                                                <input type="submit" value="Enviar y Guardar" class="btn btn-success btn-lg">
                                                <input type="hidden" name="insertar_tarea" value="1">
                                                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                                                <input type="hidden" name="url" value="<?php echo $baseUrl ?>">
                                        </div>
                                    </div>
                                    <!-- end wizard step-2 -->
                                 
                                    
                                  
                                </div>
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


        


        
    <script>
        $(document).ready(function() {
            App.init();
            FormWizardValidation.init();
        });
    </script>

