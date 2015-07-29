<table width="50%">
<?php 
  include 'config.inc.php';
  $numcolumnas = 2;
  
  $consulta = pg_query($con,"select DISTINCT pro_prob_id, prob_nombre from problema 
where nivp_ip = 1
order by pro_prob_id");
  $total_resultados = pg_num_rows($consulta);
  
   if ($total_resultados>0) {
   ?>	
	<div class="col-md-6">
	    <!-- begin panel-group -->
	    <div class="panel-group m-b-0" id="accordion">
	 <?php   
   
     $i = 1;
	 
     while($fila = pg_fetch_array($consulta)){
     	
       	$pro_prob_id= $fila['pro_prob_id'];
		$prob_nombre= $fila['prob_nombre']; 
       	$resto = ($i % $numcolumnas); 
       	if($resto == 1){ /*si es el primer elemento creamos una nueva fila*/ 
         echo "<tr>";?>
		<!-- begin panel -1 -->
        <div class="panel panel-default">
        	<div class="panel-heading">
            	<h4 class="panel-title">
		     <?php
		     }
		     echo "<td>";
		     echo $fila['prob_nombre']."<br>";
	 			$consulta_problema_2 = "select prob_nombre,nivp_ip, prob_id from problema where nivp_ip = 2 and pro_prob_id =".$pro_prob_id."";
				$resultado_problema_2 = pg_query($con, $consulta_problema_2) or die("Error en la Consulta SQL");
				$numReg2 = pg_num_rows($resultado_problema_2);
				while ($fila_p2=pg_fetch_array($resultado_problema_2)) 
				{
					?>
					<input type="checkbox" name="problematica[]" value="<?php echo $fila_p2['prob_id']?>">&nbsp&nbsp<?php echo $fila_p2['prob_nombre']?><br>	
					<?php 
					
				}
                     
     echo "</td>";
     /*mostramos el valor del campo especificado*/ 
    if($resto == 0){
      /*cerramos la fila*/ 
      echo "</tr>"; 
    }
   $i++; 
 }
 if($resto != 0){
  /*Si en la última fila sobran columnas, creamos celdas vacías*/
   for ($j = 0; $j < ($numcolumnas - $resto); $j++){
     echo "<td></td>"; 
    }
   echo "</tr>";
  } 
}?> 
</table>