<?php $render('header', ['title' => 'Categoria de Contas']); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'categoria_contas', 'activeMasterMenu' => 'financeiro']); ?>

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
          
        <form id="form" action="<?=$base;?>/app/categoria_contas/edit_categoria_conta/save" method="POST">

            <h6>Nova Categoria</h6>

            <input type="hidden" name="id" value="<?=$categoria_conta_item['id'];?>">

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Categoria</div>
                    </div>
                    <input type="text" class="form-control" name='name' required value="<?=$categoria_conta_item['nome'];?>"/>
                </div>
            </div>

            <div class='form-group'>
                <button type="submit" class="btn btn-info btn-login"><span class="fa fa-save"></span> Salvar</button>
                <a href="<?=$base;?>/app/categoria_contas" class="btn btn-info"><i class="fa fa-arrow-left"></i> Voltar</a>        
            </div>

        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $render('footer'); ?>