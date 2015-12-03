<!-- begin login -->
<div class="login login-with-news-feed">
    <!-- begin news-feed -->
    <div class="news-feed">
        <div class="news-image">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/login-bg/bg-9-tramiton.jpg" alt="" />
        </div>
        <div class="news-caption">
            <h4 class="caption-title">Tramiton.to | Trámites Absurdos del Sector Público</h4>
            <p>
                Regístrate para poder ingresar tus propuestas de trámites absurdos.
            </p>
        </div>
    </div>
    <!-- end news-feed -->
    <!-- begin right-content -->
    <div class="right-content">
        <!-- begin login-header -->
        <div class="login-header">
            <div class="row">
                <div class="col-xs-12 col-sm-offset-2 col-sm-4 text-center">
                    <a href="<?php echo Yii::app()->baseUrl; ?>"><h4 class="text-blue-tramiton">Inicio <span class="glyphicon glyphicon-home" aria-hidden="true"></span></h4></a>
                </div>
                <div class="col-xs-12 col-sm-6 text-center">
                    <a href="<?php echo Yii::app()->baseUrl; ?>/site/registro"><h4 class="text-blue-tramiton">Registro <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></h4></a>
                </div>
            </div>
            <div class="brand">
                <span class="fa fa-user text-blue-tramiton"></span> Iniciar sesión
                <!-- <small>responsive bootstrap 3 admin template</small> -->
            </div>
            <div class="icon">
                <i class="fa fa-sign-in"></i>
            </div>
        </div>
        <!-- end login-header -->
        <!-- begin login-content -->
        <div class="login-content">
            <?php $this->renderPartial('_form_login2', array('model_login'=>$model_login)) ?>
        </div>
        <!-- end login-content -->
    </div>
    <!-- end right-container -->
</div>
<!-- end login -->
