<?php $render('header'); ?>
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
                  <img class="perfil-img" src="<?=$base;?>/media/avatars/<?=($loggedUser->avatar != '') ? $loggedUser->avatar:'default.jpg';?>">
              </div>  

              <div class="col-sm-6">

                <h6>Meus Dados</h6>

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

                <form action="<?=$base;?>/app/perfil/save?id=<?=$loggedUser->id;?>" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <div class="input-group-text">Alterar Foto</div>
                          </div>
                          <input type="file" class="form-control" name='avatar'/>
                      </div>
                  </div>

                  <div class='form-group'>
                      <button type="submit" class="btn btn-info"><span class="fa fa-save"></span> Salvar</button>         
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