<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'condominio']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Pagina</h1>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div class="container">
          
        <form action="<?=$base;?>/app/condominios/edit_cond/save" method="POST">

            <h6>Editar Dados</h6>

            <input type="hidden" name="id" value="<?=$condItem['id'];?>">

            <div class="form-group">
                <input type="text" class="form-control" name='name' required placeholder="Nome" value="<?=$condItem['nome'];?>"/>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name='cnpj' id="cnpj-field" required placeholder="CNPJ" value="<?=$condItem['cnpj'];?>"/>
            </div>

            <div class="form-group">
                <input type="email" class="form-control" name='email' placeholder="E-mail" value="<?=$condItem['email'];?>"/>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name='endereco' required placeholder="Endereço" value="<?=$condItem['endereco'];?>"/>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name='numero' required placeholder="Número" value="<?=$condItem['numero'];?>"/>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name='complemento' placeholder="Complemento" value="<?=$condItem['complemento'];?>"/>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name='bairro' required placeholder="Bairro" value="<?=$condItem['bairro'];?>"/>
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