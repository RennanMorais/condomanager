<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'morador', 'activeMasterMenu' => 'condominio']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Moradores</h1>
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
                                <th>Nome</th>
                                    <th>Email</th>
                                    <th>RG</th>
                                    <th>CPF</th>
                                    <th>Contato</th>
                                    <th>Tipo</th>
                                    <th>Condomínio</th>
                                    <th>Prédio</th>
                                    <th>Apartamento</th>
                                    <th>Ação</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php foreach($moradores as $moradorItem): ?>
                                <?php if($moradorItem->access === '3'): ?>
                                <tr>
                                    <td><?=$moradorItem->name;?></td>
                                    <td><?=$moradorItem->email;?></td>
                                    <td><?=$moradorItem->rg;?></td>
                                    <td><?=$moradorItem->cpf;?></td>
                                    <td><?=$moradorItem->phone;?></td>
                                    <td><?=$moradorItem->tipo;?></td>
                                    <td><?=$moradorItem->condominio;?></td>
                                    <td><?=$moradorItem->predio;?></td>
                                    <td><?=$moradorItem->apto;?></td>
                                    <td><a href="<?=$base;?>/app/moradores/edit_morador/<?=$moradorItem->id;?>" class="btn btn-outline-success btn-sm" title="Editar Dados"><i class="fa fa-pen"></i></a> <a href="<?=$base;?>/app/moradores/delete_morador?id=<?=$moradorItem->id;?>" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php if(empty($condominios)): ?>
                
                <div class="container-fluid">
                    <h6 class="alert alert-secondary text-center">Nenhum Morador Cadastrado!</h6>
                </div>
            
            <?php endif;?>

            <div class="modal" tabindex="-1" role="dialog" id="condominio-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body" id="modal-content">
                            <?php $this->render('forms/add-morador',[
                                'base' => $base,
                                'condominios' => $condominios,
                                'predios' => $predios
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