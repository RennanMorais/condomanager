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

        <div class="modal" tabindex="-1" role="dialog" id="forgotreg-modal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

              <div class="modal-body" id="modal-content">

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-info" id="modal-close">Fechar</button>
              </div>

            </div>
          </div>
        </div>

      </div>

    </div>

    <script type="text/javascript" src="<?=$base;?>/assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/all.min.js"></script>
    <script type="text/javascript">
        //Script para alteração dinamica do modal
        $('#forgot-btn').on('click', function () {

        $.ajax({url: "<?=$base;?>/forgot", success: function(result){
          $("#modal-content").html(result);
        }});

        $('#forgotreg-modal').show('fade');
        });

        $('#reg-btn').on('click', function () {

        $.ajax({url: "<?=$base;?>/registro", success: function(result){
          $("#modal-content").html(result);
        }});

        $('#forgotreg-modal').show('fade');
        });

        $('#modal-close').on('click', function() {
        $('#forgotreg-modal').hide('fade');
        });
    </script>
  </body>
</html>