<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'usuarios', 'activeMasterMenu' => 'config']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Usuários</h1>
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
                    <table class="table table-bordered table-hover table-responsive-md">
                        <thead class="bg-info">
                            <tr>
                                <th>Nome</th>
                                    <th>Email</th>
                                    <th>RG</th>
                                    <th>CPF</th>
                                    <th>Contato</th>
                                    <th>Condomínio</th>
                                    <th>Prédio</th>
                                    <th>Apartamento</th>
                                    <th>Acesso</th>
                                    <th>Ação</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $userItem): ?>
                                <tr>
                                    <td><?=$userItem->name;?></td>
                                    <td><?=$userItem->email;?></td>
                                    <td><?=$userItem->rg;?></td>
                                    <td><?=$userItem->cpf;?></td>
                                    <td><?=$userItem->phone;?></td>
                                    <td><?=$userItem->condominio;?></td>
                                    <td><?=$userItem->predio;?></td>
                                    <td><?=$userItem->apto;?></td>
                                    <td><?=$userItem->nome_access;?></td>
                                    <td style="text-align:center;">
                                        <a href="<?=$base;?>/app/usuarios/edit_usuario/<?=$userItem->id;?>" class="btn btn-outline-success btn-sm" title="Editar Dados"><i class="fa fa-pen"></i></a> 
                                        <button data-toggle="modal" data-target="#del-modal-<?=$userItem->id;?>" class="btn btn-outline-danger btn-sm" title="Desabilitar"><i class="fa fa-user"></i></button>
                                    </td>
                                </tr>

                                <div class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" id="del-modal-<?=$userItem->id;?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-body" id="modal-content">
                                                <h5>Tem certeza que deseja desabilitar: <?=$userItem->name;?>?</h5>
                                            </div>

                                            <div class="modal-footer">
                                                <a href="<?=$base;?>/app/usuarios/disable?id=<?=$userItem->id;?>" class="btn btn-outline-info" title="Excluir"><i></i>Sim</a>
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

            <?php if(empty($users)): ?>           
                <div class="container-fluid">
                    <h6 class="alert alert-secondary text-center">Nenhum Morador Registrado!</h6>
                </div>          
            <?php endif;?>

            <div class="modal" tabindex="-1" role="dialog" id="condominio-modal">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">

                        <div class="modal-body" id="modal-content">
                            <?php $this->render('forms/add-usuario',[
                                'base' => $base,
                                'condominios' => $condominios,
                                'predios' => $predios,
                                'access' => $access
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