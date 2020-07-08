<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CondoSystem | Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link href="<?=$base;?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=$base;?>/assets/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=$base;?>/assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link rel='stylesheet' href='<?=$base;?>/assets/css/login.css' rel="stylesheet" type="text/css"/>

  </head>

  <body class="login-page">

    <div class="login-box">

      <div class="login-logo">
        <a href="<?=$base;?>">
            <img title='CondoSystem' src='<?=$base;?>/assets/images/logo_condo.png' style='max-width: 50%;max-height:170px'/>
        </a>
      </div><!-- /.login-logo -->  
          
      <div class="login-box-body">	
		
        <p class='login-box-msg'>Faça o login para iniciar a sessão</p>

        <form action="" method="POST">    

            <div class="form-group">
              <input type="text" class="form-control" name='email' required placeholder="Email"/>
            </div>
            
            <div class="form-group">
              <input type="password" class="form-control" name='password' required placeholder="Password"/>
            </div>

            <div style="margin-bottom:10px" class='row'>
                <div class='col-xs-12'>
                  <button type="submit" class="btn btn-primary btn-login"><span class="fas fa-lock"></span> Login</button>         
                </div>
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
              <div class="modal-body">

                <p>Modal body text goes here.</p>

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
    <script type="text/javascript" src="<?=$base;?>/assets/js/script.js"></script> 
  </body>
</html>