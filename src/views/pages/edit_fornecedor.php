<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'fornecedores', 'activeMasterMenu' => 'financeiro']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Fornecedores</h1>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div class="container">
          
          <form id="form" action="<?=$base;?>/app/fornecedores/edit_fornecedor/save" method="POST">

              <h6>Editar Dados</h6>

              <input type="hidden" name="id" value="<?=$fornecedor['id'];?>">

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Nome</div>
                      </div>
                      <input type="text" class="form-control" name='name' required value="<?=$fornecedor['nome'];?>"/>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">CNPJ</div>
                      </div>
                      <input type="text" class="form-control" name='cnpj' id="cnpj-field" required value="<?=$fornecedor['cnpj'];?>"/>
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">E-mail</div>
                      </div>
                      <input type="email" class="form-control" name='email' value="<?=$fornecedor['email'];?>"/>
                  </div> 
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Site</div>
                      </div>
                      <input type="text" class="form-control" name='site' value="<?=$fornecedor['site'];?>"/>
                  </div> 
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Endereço</div>
                      </div>
                      <input type="text" class="form-control" name='endereco' required value="<?=$fornecedor['endereco'];?>"/>
                  </div>       
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Número</div>
                      </div>
                      <input type="text" class="form-control" name='numero' required value="<?=$fornecedor['numero'];?>"/>
                  </div>                 
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Complemento</div>
                      </div>
                      <input type="text" class="form-control" name='complemento' value="<?=$fornecedor['complemento'];?>"/>
                  </div>                  
              </div>

              <div class="form-group">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Bairro</div>
                      </div>
                      <input type="text" class="form-control" name='bairro' required value="<?=$fornecedor['bairro'];?>"/>
                  </div> 
              </div>

              <div class='form-group'>
                  <button type="submit" class="btn btn-info btn-login"><span class="fa fa-save"></span> Salvar</button>
                  <a href="<?=$base;?>/app/fornecedores" class="btn btn-info"><i class="fa fa-arrow-left"></i> Voltar</a>       
              </div>

          </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $render('footer'); ?>