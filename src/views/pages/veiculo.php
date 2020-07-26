<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'veiculos', 'activeMasterMenu' => 'condominio']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Veículos</h1>
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
                    <button id="add-cond" class="btn btn-outline-success" style="margin-bottom:10px">Adicionar Novo</button>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover table-responsive-md">
                        <thead class="bg-info">
                            <tr>
                                <th>Condomínio</th>
                                <th>Prédio</th>
                                <th>Morador</th>
                                <th>Tipo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Placa</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($veiculos as $veiculosItem): ?>
                                <tr>
                                    <td><?=$veiculosItem->condominio?></td>
                                    <td><?=$veiculosItem->predio?></td>
                                    <td><?=$veiculosItem->morador?></td>
                                    <td><?=$veiculosItem->tipo?></td>
                                    <td><?=$veiculosItem->marca?></td>
                                    <td><?=$veiculosItem->modelo?></td>
                                    <td><?=$veiculosItem->placa?></td>
                                    <td style="text-align:center;">
                                        <a href="<?=$base;?>/app/veiculos/edit_veiculo/<?=$veiculosItem->id?>" class="btn btn-outline-success btn-sm" title="Editar Dados"><i class="fa fa-pen"></i></a>
                                        <button data-toggle="modal" data-target="#del-modal-<?=$veiculosItem->id?>" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="del-modal-<?=$veiculosItem->id?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-body" id="modal-content">
                                                <h6>Tem certeza que deseja excluir: <?=$veiculosItem->marca." ".$veiculosItem->modelo." - Placa: ".$veiculosItem->placa;?></h6>
                                                <h6>Do morador: <?=$veiculosItem->morador;?>?</h6>
                                            </div>

                                            <div class="modal-footer">
                                                <a href="<?=$base;?>/app/veiculos/delete_veiculo?id=<?=$veiculosItem->id?>" class="btn btn-outline-info" title="Excluir"><i></i>Sim</a>
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

            <?php if(empty($veiculos)): ?>
                
                <div class="container-fluid">
                    <h6 class="alert alert-secondary text-center">Nenhum Veículo Cadastrado!</h6>
                </div>
            
            <?php endif;?>

            <div class="modal" tabindex="-1" role="dialog" id="condominio-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body" id="modal-content">
                            <?php $this->render('forms/add-veiculo',[
                                'condominios' => $condominios,
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