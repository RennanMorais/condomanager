<?php $render('header', ['title' => 'Perfil']); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'perfil', 'activeMasterMenu' => 'config']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Meu Perfil</h1>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div class="container">

          <div id="form" class="row">

              <div class="col-sm-6 avatar-content">
                    <img class="perfil-img" src="<?=$base;?>/media/avatars/<?=($loggedUser->avatar != '') ? $loggedUser->avatar:'default.jpg';?>"><br><br>
                    <form action="<?=$base;?>/app/perfil/save?id=<?=$loggedUser->id;?>" method="POST" id="change-avatar-form" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="input-group">
                                <input type="file" class="form-control" name='avatar'/>
                                <div class="input-group-append">
                                    <button type="submit" id="btn-alt-ft" class="btn btn-sm btn-info"><span class="fa fa-save"></span> Salvar Foto</button>
                                </div>
                            </div>
                        </div>

                    </form>
              </div>  

              <div class="col-sm-6">

                <h6><b>Meus Dados</b></h6>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Nome</div>
                        </div>
                        <input type="text" class="form-control" name='name' disabled value="<?=$loggedUser->name;?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">E-mail</div>
                        </div>
                        <input type="text" class="form-control" name='email' disabled value="<?=$loggedUser->email;?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Condomínio</div>
                        </div>
                        <input type="text" class="form-control" name='condominio' disabled value="<?=$loggedUser->condominio;?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Prédio</div>
                        </div>
                        <input type="text" class="form-control" name='predio' disabled value="<?=$loggedUser->predio;?>"/>
                    </div>
                </div>

                <form action="<?=$base;?>/app/perfil/reset_pass" method="POST">

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Nova senha</div>
                            </div>
                            <input type="password" class="form-control" name='senha' id="senha"/>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" id="btn-save-pass" class="btn btn-info"><span class="fa fa-lock"></span> Alterar Senha</button>
                    </div>

                </form>

              </div> <!-- /.coluna -->

            </div> <!-- /.linha -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $render('footer'); ?>