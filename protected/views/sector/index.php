<h1>Listado de Sectores</h1>

<?php
echo "vista index desde los sectores...";
?>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>VALOR</th>
        <th>VER</th>
        <th>EDITAR</th>
    </tr>
    <?php foreach ($sector as $sec) {?>
    <tr>
        <td><?php echo $sec->sec_id; ?></td>
        <td><?php echo $sec->sec_nombre; ?></td>
        <td><?php echo $sec->sec_estado; ?></td>
        <td><?php echo CHtml::link('Ver', array('view', 'id'=>$sec->sec_id)); ?></td>
        <td><?php echo CHtml::link('Editar', array('edit', 'id'=>$sec->sec_id)); ?></td>
    </tr>
    <?php } ?>
</table>
