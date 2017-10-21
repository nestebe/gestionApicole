<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b>Bee</b>Hope</a>
      </div>
        
<div class="box box-solid">
            <div class="box-header with-border">


              <h3 class="box-title">Merci de valider votre email</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body clearfix">
              <blockquote class="pull-right">
                <p>Pour activer votre compte vous devez valider votre email en cliquant sur le lien que nous vous avons envoyé</p>
                <p>Merci de vérifier votre boite <strong>spam</strong> si vous n'avez rien recu</p>
              </blockquote>
            </div>
            <!-- /.box-body -->
          </div>
        
        
    </div><!-- /.register-box -->
    <!-- jQuery 2.1.4 -->
    <script src="/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="/assets/plugins/iCheck/icheck.min.js"></script>
    <script src="/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/assets/plugins/jquery-validation/localization/messages_fr.min.js"></script>
    <script>

      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
    
            $("#loginForm").validate({
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        } 
        });
        
      });
    </script>
  </body>
</html>
