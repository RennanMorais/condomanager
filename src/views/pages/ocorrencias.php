<?php $render('header', ['title' => 'Ocorrências']); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'ocorrencias', 'activeMasterMenu' => 'condominio']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Ocorrências</h1>
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
          
            <table class="table table-bordered table-hover table-responsive-lg table-center">
                <thead class="bg-info">
                    <tr>
                        <th>Id</th>
                        <th>Data</th>
                        <th>Descrição</th>
                        <th>Condominio</th>
                        <th>Morador</th>
                        <th>Contato</th>
                        <th>Status</th>
                        <th>Mensagem</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($ocorrencias as $ocorrenciaItem): ?>
                    <tr>
                        <td><?=$ocorrenciaItem->id;?></td>
                        <td><?=date('d/m/Y', strtotime($ocorrenciaItem->data));?></td>
                        <td><?=$ocorrenciaItem->descricao;?></td>
                        <td><?=$ocorrenciaItem->condominio;?></td>
                        <td><?=$ocorrenciaItem->morador;?></td>
                        <td><?=$ocorrenciaItem->contato;?></td>
                        <td><?=$ocorrenciaItem->status;?></td>
                        <td><?=$ocorrenciaItem->feedback;?></td>
                        <td style="text-align:center;">
                            <?php if($ocorrenciaItem->status == 'Em Andamento'): ?>
                            <button data-toggle="modal" data-target="#finalizar-modal-<?=$ocorrenciaItem->id;?>" class="btn btn-outline-success btn-sm" title="Finalizar"><i class="fa fa-check-double"></i></button>
                            <?php endif; ?>
                            <?php if($ocorrenciaItem->status == 'Pendente'):?>
                            <a href="<?=$base;?>/app/ocorrencias/aceitar?id=<?=$ocorrenciaItem->id;?>" class="btn btn-outline-primary btn-sm" title="Aceitar"><i class="fa fa-check"></i></a>
                            <?php endif; ?>
                            <a href="<?=$base;?>/app/ocorrencias/edit_ocorrencia/<?=$ocorrenciaItem->id;?>" class="btn btn-outline-warning btn-sm" title="Editar Dados"><i class="fa fa-pen"></i></a>
                            <button data-toggle="modal" data-target="#del-modal-<?=$ocorrenciaItem->id;?>" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>

                    <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="finalizar-modal-<?=$ocorrenciaItem->id;?>">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                
                                <form action="<?=$base;?>/app/ocorrencias/finalizar" method="POST">
                                    <div class="modal-body" id="modal-content">
                                        <h5>Mensagem</h5>
                                        <input type="hidden" name="id" value="<?=$ocorrenciaItem->id;?>">
                                        <textarea class="form-control" name="mensagem" cols="50" rows="5"></textarea>
                                    </div>
    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline-info" title="Excluir"><i></i>Finalizar</button>
                                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="del-modal-<?=$ocorrenciaItem->id;?>">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-body" id="modal-content">
                                    <h5>Tem certeza que deseja excluir a Ocorrência Id: <?=$ocorrenciaItem->id;?>?</h5>
                                </div>

                                <div class="modal-footer">
                                    <a href="<?=$base;?>/app/ocorrencias/delete_ocorrencia?id=<?=$ocorrenciaItem->id;?>" class="btn btn-outline-info" title="Excluir"><i></i>Sim</a>
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Não</button>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
                </tbody>
            </table>
            <?php if(empty($ocorrencias)): ?>
        
                <div class="container-fluid">
                    <h6 class="alert alert-secondary text-center">Nenhuma Ocorrência Registrada!</h6>
                </div>
            
            <?php endif;?>

            <div class="modal" tabindex="-1" role="dialog" id="condominio-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body" id="modal-content">
                            <?php $this->render('forms/add-ocorrencia',[
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