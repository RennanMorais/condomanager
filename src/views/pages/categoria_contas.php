<?php $render('header', ['title' => 'Categoria de Contas']); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'categoria_contas', 'activeMasterMenu' => 'financeiro']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Categoria de Contas</h1>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div class="container-fluid">
          
            <div class="row">
                <div class="col-sm-12">
                    <button id="add" class="btn btn-outline-success" style="margin-bottom:10px">Adicionar Novo</button>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-info">
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($categoria_contas as $categoria_item): ?>
                            <tr>
                                <td><?=$categoria_item->id;?></td>
                                <td><?=$categoria_item->nome;?></td>
                                <td style="text-align:center;">
                                    <a href="<?=$base;?>/app/categoria_contas/edit_categoria_conta/<?=$categoria_item->id;?>" class="btn btn-outline-success btn-sm" title="Editar Dados"><i class="fa fa-pen"></i></a>
                                    <button data-toggle="modal" data-target="#del-modal-<?=$categoria_item->id;?>" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="del-modal-<?=$categoria_item->id;?>">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-body" id="modal-content">
                                            <h5>Tem certeza que deseja excluir: <?=$categoria_item->nome;?>?</h5>
                                        </div>

                                        <div class="modal-footer">
                                            <a href="<?=$base;?>/app/categoria_contas/delete_cat?id=<?=$categoria_item->id;?>" class="btn btn-outline-info" title="Excluir"><i></i>Sim</a>
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Não</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php if(empty($categoria_contas)): ?>
                
                <div class="container-fluid">
                    <h6 class="alert alert-secondary text-center">Nenhum Item Cadastrado!</h6>
                </div>
            
            <?php endif;?>

            <div class="modal" tabindex="-1" role="dialog" id="condominio-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body" id="modal-content">
                            <?php $this->render('forms/add-categoria_contas',[
                                'base' => $base
                            ]); ?>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" id="modal-close">Fechar</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $render('footer'); ?>