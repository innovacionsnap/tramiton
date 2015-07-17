<!-- begin #about -->
<div id="about" class="content" data-scrollview="true">
    <!-- begin container -->
    <div class="container" data-animation="true" data-animation-type="fadeInDown">
        <div class="content-title"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_1.png" /></div>

        <div class="jumbotron m-b-0 text-center">
            <h1><?php echo $msgSuccess['titulo']; ?></h1>
            <p><?php echo $msgSuccess['mensaje']; ?></p>
            <?php if($msgSuccess['esLink']): ?>
            <p>
                <a href="<?php echo $msgSuccess['url']; ?>" target="_blank"><button class="btn btn-success btn-lg"><?php echo $msgSuccess['tituloLink']; ?></button></a>
            </p>
            <?php endif; ?>
        </div>
    </div>
    <!-- end container -->
</div>
<!-- end #about -->

<!-- Modal login   -->

<div class="modal fade" id="login-modal">
    <div class="modal-dialog snap_modal_contenedor">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Ingrese al sistema</h4>
            </div>
            <div class="modal-body">
                <?php $this->renderPartial('_form_login', array('model_login'=>$model_login)) ?>
            </div>
            
        </div>
    </div>
</div>