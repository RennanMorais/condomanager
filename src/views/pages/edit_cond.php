<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'condominio', 'activeMasterMenu' => 'condominio']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Condomínios</h1>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div class="container">
          
          <form id="form-reservas" action="<?=$base;?>/app/condominios/edit_cond/save" method="POST">

              <h6>Editar Dados</h6>

              <input type="hidden" name="id" value="<?=$condItem['id'];?>">

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Nome</div>
                      </div>
                      <input type="text" class="form-control" name='name' required value="<?=$condItem['nome'];?>"/>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">CNPJ</div>
                      </div>
                      <input type="text" class="form-control" name='cnpj' id="cnpj-field" required value="<?=$condItem['cnpj'];?>"/>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">E-mail</div>
                      </div>
                      <input type="email" class="form-control" name='email' value="<?=$condItem['email'];?>"/>
                  </div> 
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Endereço</div>
                      </div>
                      <input type="text" class="form-control" name='endereco' required value="<?=$condItem['endereco'];?>"/>
                  </div>       
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Número</div>
                      </div>
                      <input type="text" class="form-control" name='numero' required value="<?=$condItem['numero'];?>"/>
                  </div>                 
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Complemento</div>
                      </div>
                      <input type="text" class="form-control" name='complemento' value="<?=$condItem['complemento'];?>"/>
                  </div>                  
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Bairro</div>
                      </div>
                      <input type="text" class="form-control" name='bairro' required value="<?=$condItem['bairro'];?>"/>
                  </div> 
              </div>

              <div class='form-group'>
                  <button type="submit" class="btn btn-info btn-login"><span class="fa fa-save"></span> Salvar</button>
                  <a href="<?=$base;?>/app/condominios" class="btn btn-info"><i class="fa fa-arrow-left"></i> Voltar</a>       
              </div>

          </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $render('footer'); ?>