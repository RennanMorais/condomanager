<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CondoSystem | Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, Users-scalable=no' name='viewport'>

    <link href="<?=$base;?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=$base;?>/assets/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=$base;?>/assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link rel='stylesheet' href='<?=$base;?>/assets/css/login.css' rel="stylesheet" type="text/css"/>

  </head>

  <body class="login-page">

    <div class="login-box">  
          
      <div class="login-box-body">

        <div class="login-logo">
          <a href="<?=$base;?>">
              <img title='CondoSystem' src='<?=$base;?>/assets/images/logo_condo.png' style='max-width: 50%;max-height:170px'/>
          </a>
        </div><!-- /.login-logo -->
		
        <p class='login-box-msg'>Faça o login para iniciar a sessão</p>

        <?php if(!empty($flashDanger)): ?>
          <div class="flash alert alert-danger"><?php echo $flashDanger; ?></div>
        <?php endif; ?>

        <?php if(!empty($flashWarning)): ?>
          <div class="flash alert alert-warning"><?php echo $flashWarning; ?></div>
        <?php endif; ?>

        <?php if(!empty($flashSuccess)): ?>
          <div class="flash alert alert-success"><?php echo $flashSuccess; ?></div>
        <?php endif; ?>

        <form action="<?=$base;?>/login" method="POST">

            <div class="form-group">
              <input type="text" class="form-control" name='email' required placeholder="E-mail"/>
            </div>
            
            <div class="form-group">
              <input type="password" class="form-control" name='password' required placeholder="Password"/>
            </div>

            <div class='form-group'>
                <button type="submit" class="btn btn-info btn-login container-fluid"><span class="fa fa-lock"></span> Login</button>         
            </div>
      
          
            <div class='row'>
                <div class='col-xs-12 forgot-pass'>

                  <p>Esqueceu a senha? <a href="#" id="forgot-btn">Clique aqui</a></p>
                  <p>Ainda não tem uma conta? <a href="#" id="reg-btn">Registre-se</a></p>

                </div>
            </div>
        </form>

        <div class="modal" tabindex="-1" role="dialog" id="registro-modal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

              <div class="modal-body" id="modal-content">
                  <?php $this->render('forms/registro',[
                      'base' => $base,
                  ]); ?>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-info close-btn-registro" id="modal-close">Fechar</button>
              </div>

            </div>
          </div>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id="forgot-modal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

              <div class="modal-body" id="modal-content">
                  <?php $this->render('forms/forgotpass',[
                      'base' => $base,
                  ]); ?>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-info close-btn-forgot" id="modal-close">Fechar</button>
              </div>

            </div>
          </div>
        </div>

      </div>

    </div>

    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/all.min.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery.mask.min.js"></script>
    <script type="text/javascript">
        //Script para alteração dinamica do modal
        //Registro
        $('#reg-btn').on('click', function () {

        $('#registro-modal').show('fade');
        });

        $('.close-btn-registro').on('click', function() {
        $('#registro-modal').hide('fade');
        });

        //Forgot
        $('#forgot-btn').on('click', function () {

        $('#forgot-modal').show('fade');
        });

        $('.close-btn-forgot').on('click', function() {
        $('#forgot-modal').hide('fade');
        });

        //mask para telefone
        $('#phone-field').mask('(00) 00000-0000');
    </script>
  </body>
</html>