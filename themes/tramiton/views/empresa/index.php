<style>
    .empresa{
        height:100px;
        color:#325972;
        font-size:24px;
        border:2px solid #325972;
        border-radius: 5px;
        margin-bottom: 20px;
        padding-left: 20px;
        padding-top: 30px;
        padding-right: 20px;
        background:#f5f5f5;

    }
    .content{
        margin-left:0;
    }
    .registro{
        float:right;
        font-size:15px;
        
    }
</style>
<div class="content">
    <div class="row">
        <h1>Mis Empresas</h1>
        <?php foreach ($empresas as $empresa): ?>
            <div class="empresa">
                <?php echo $empresa['emp_razon']; ?>
                <div class="registro"><a href="../ciudadano/index?emp=<?php echo $empresa['emp_id']?>">Registrar caso</a></div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

