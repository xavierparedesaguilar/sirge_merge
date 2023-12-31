<?php

use Cake\Auth\DefaultPasswordHasher;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
$this->layout = false;

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo isset($theme['title']) ? $theme['title'] : 'AdminLTE 2 | Log in'; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php echo $this->Html->meta('favicon.ico', '/img/favicon.ico', ['type' => 'icon']); ?>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <?php echo $this->Html->css('AdminLTE./bootstrap/css/bootstrap'); ?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
  <!-- iCheck -->
  <?php echo $this->Html->css('AdminLTE./plugins/iCheck/square/blue'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="<?php echo $this->Url->build('/', true) ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $this->Url->build('/', true) ?>assets/js/global.js"></script>
    <script src="<?php echo $this->Url->build('/', true) ?>assets/packages/jqueryvalidation/dist/jquery.validate.js"></script>

</head>
<!--Head Ends-->
<!--Body-->
<body class="hold-transition login-page">
    <div class="login-box">

        <div class="login-box-body">
            <p class="login-box-msg"><img src="<?php echo $this->Url->build('/', true) ?>img/logo.png" alt="" class="img-responsive"></p>
            <p> <?php echo $this->Flash->render('auth'); ?> </p>
            <p> <?php echo $this->Flash->render(); ?> </p>
        <?php echo $this->Form->create(null, ['id' => "form_login"]); ?>

            <div class="form-group has-feedback">
                <?php echo $this->Form->text('username', ['type' => 'text', 'class' => 'form-control', 'id' => 'usuario', 'placeholder' => 'Usuario']); ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <?php echo $this->Form->password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Contraseña']); ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="loginbox-submit">
                <button type="submit" class="btn btn-success btn-block" id="btnLogin">INICIAR SESIÓN</button>
            </div>
        </div>
        <?php echo $this->Form->end() ?>
    </div>

    <!-- jQuery 2.1.4 -->
    <?php #echo $this->Html->script('/plugins/jQuery/jQuery-2.1.4.min'); ?>
    <!-- Bootstrap 3.3.5 -->
    <?php echo $this->Html->script('/bootstrap/js/bootstrap'); ?>

</body>
</html>