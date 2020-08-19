<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'visitantes', 'activeMasterMenu' => 'portaria']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Visitantes</h1>
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
                    <table class="table table-bordered table-hover table-responsive-lg">
                        <thead class="bg-info">
                            <tr>
                                <th>Nome</th>
                                <th>Tipo de documento</th>
                                <th>Numero do documento</th>
                                <th>Condomínio</th>
                                <th>Prédio</th>
                                <th>Morador</th>
                                <th>Entrada</th>
                                <th>Hora da Entrada</th>
                                <th>Saída</th>
                                <th>Hora da Saída</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($visitantes as $visitanteItem): ?>
                                
                                <tr>
                                    <td><?=$visitanteItem->nome?></td>
                                    <td><?=$visitanteItem->tipo_documento?></td>
                                    <td><?=$visitanteItem->numero_documento?></td>
                                    <td><?=$visitanteItem->condominio?></td>
                                    <td><?=$visitanteItem->predio?></td>
                                    <td><?=$visitanteItem->morador?></td>
                                    <td><?=date('d/m/Y', strtotime($visitanteItem->data_entrada))?></td>
                                    <td><?=date('H:i', strtotime($visitanteItem->hora_entrada))?></td>
                                    <td><?=date('d/m/Y', strtotime($visitanteItem->data_saida))?></td>
                                    <td><?=date('H:i', strtotime($visitanteItem->hora_saida))?></td>
                                    <td style="text-align:center;">
                                        <a href="<?=$base;?>/app/visitantes/edit_visitante/<?=$visitanteItem->id?>" class="btn btn-outline-success btn-sm" title="Editar Dados"><i class="fa fa-pen"></i></a>
                                        <button data-toggle="modal" data-target="#del-modal-<?=$visitanteItem->id?>" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="del-modal-<?=$visitanteItem->id?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-body" id="modal-content">
                                                <h6>Tem certeza que deseja excluir: <?=$visitanteItem->nome?></h6>
                                            </div>

                                            <div class="modal-footer">
                                                <a href="<?=$base;?>/app/visitantes/delete_visitante?id=<?=$visitanteItem->id?>" class="btn btn-outline-info" title="Excluir"><i></i>Sim</a>
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

            <?php if(empty($visitantes)): ?>
                
                <div class="container-fluid">
                    <h6 class="alert alert-secondary text-center">Nenhum Visitante Cadastrado!</h6>
                </div>
            
            <?php endif;?>

            <div class="modal" tabindex="-1" role="dialog" id="condominio-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body" id="modal-content">
                            <?php $this->render('forms/add-visitante',[
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
<script>
    $(document).ready(function(){
        alterarFormataçãoDoc();
        carrega_moradoresPorPredioCondominio();
    });
</script>