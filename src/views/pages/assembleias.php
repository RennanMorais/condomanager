<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'assembleia', 'activeMasterMenu' => 'condominio']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Assembleias</h1>
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
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Local</th>
                                <th>Descrição do Local</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($assembleias as $assembleiasItem): ?>
                                <tr>
                                    <td><?=$assembleiasItem->titulo?></td>
                                    <td><?=$assembleiasItem->descricao?></td>
                                    <td><?=date('d/m/Y', strtotime($assembleiasItem->data));?></td>
                                    <td><?=date('H:i', strtotime($assembleiasItem->hora));?></td>
                                    <td><?=$assembleiasItem->local_condominio?></td>
                                    <td><?=$assembleiasItem->descricao_local?></td>
                                    <td style="text-align:center;">
                                        <a href="<?=$base;?>/app/assembleias/edit_assembleia/<?=$assembleiasItem->id?>" class="btn btn-outline-success btn-sm" title="Editar Dados"><i class="fa fa-pen"></i></a>
                                        <button data-toggle="modal" data-target="#del-modal-<?=$assembleiasItem->id?>" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="del-modal-<?=$assembleiasItem->id?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-body" id="modal-content">
                                                <h6>Tem certeza que deseja excluir: <?=$assembleiasItem->titulo;?>?</h6>
                                            </div>

                                            <div class="modal-footer">
                                                <a href="<?=$base;?>/app/assembleias/delete_assembleia?id=<?=$assembleiasItem->id?>" class="btn btn-outline-info" title="Excluir"><i></i>Sim</a>
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

            <?php if(empty($assembleias)): ?>
                
                <div class="container-fluid">
                    <h6 class="alert alert-secondary text-center">Nenhuma Assembleia Registrada!</h6>
                </div>
            
            <?php endif;?>

            <div class="modal" tabindex="-1" role="dialog" id="condominio-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body" id="modal-content">
                            <?php $this->render('forms/add-assembleia',[
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