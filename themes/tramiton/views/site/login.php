<!-- begin login -->
<div class="login login-with-news-feed">
    <!-- begin news-feed -->
    <div class="news-feed">
        <div class="news-image">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/login-bg/bg-7.jpg" data-id="login-cover-image" alt="" />
        </div>
        <div class="news-caption">
            <h4 class="caption-title"><i class="logo"></i> Bienvenido a Tramiton..</h4>
            <p>
                Download the Color Admin app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
        </div>
    </div>
    <!-- end news-feed -->
    <!-- begin right-content -->
    <div class="right-content">
        <!-- begin login-header -->
        <div class="login-header">
            <div class="brand">
                <span class="fa fa-user text-success"></span> Iniciar Sesión
                <small>responsive bootstrap 3 admin template</small>
            </div>
            <div class="icon">
                <i class="fa fa-sign-in"></i>
            </div>
        </div>
        <!-- end login-header -->
        <!-- begin login-content -->
        <div class="login-content">
            <?php $this->renderPartial('_form_login', array('model_login'=>$model_login)) ?>
        </div>
        <!-- end login-content -->
    </div>
    <!-- end right-container -->
</div>
<!-- end login -->
