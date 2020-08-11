<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'contas_pagar', 'activeMasterMenu' => 'financeiro']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Contas a Pagar</h1>
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
                                <th>Nome</th>
                                <th>Categoria</th>
                                <th>Valor</th>
                                <th>Data de Vencimento</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($contas_pagar as $contas_pagar_item): ?>
                            <tr>
                                <td><?=$contas_pagar_item->nome;?></td>
                                <td><?=$contas_pagar_item->categoria;?></td>
                                <td>R$ <?=$contas_pagar_item->valor;?></td>
                                <td><?=date('d/m/Y', strtotime($contas_pagar_item->data_vencimento));?></td>
                                <td><?=$contas_pagar_item->pago_status;?></td>
                                <td style="text-align:center;">
                                    <a href="<?=$base;?>/app/contas_pagar/edit_conta_pagar/<?=$contas_pagar_item->id;?>" class="btn btn-outline-success btn-sm" title="Editar Dados"><i class="fa fa-pen"></i></a>
                                    <button data-toggle="modal" data-target="#del-modal-<?=$contas_pagar_item->id;?>" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="del-modal-<?=$prediosItem->id;?>">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <div class="modal-body" id="modal-content">
                                            <h5>Tem certeza que deseja excluir: <?=$contas_pagar_item->nome;?>?</h5>
                                        </div>

                                        <div class="modal-footer">
                                            <a href="<?=$base;?>/app/predios/delete_prd?id=<?=$contas_pagar_item->id;?>" class="btn btn-outline-info" title="Excluir"><i></i>Sim</a>
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

            <?php if(empty($contas_pagar)): ?>
                
                <div class="container-fluid">
                    <h6 class="alert alert-secondary text-center">Nenhum Item Cadastrado!</h6>
                </div>
            
            <?php endif;?>

            <div class="modal" tabindex="-1" role="dialog" id="condominio-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body" id="modal-content">
                            <?php $this->render('forms/add-contas_pagar',[
                                'base' => $base,
                                'categorias' => $categorias
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