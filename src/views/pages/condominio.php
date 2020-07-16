<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'condominio']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Condomínios</h1>
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
                    <button class="btn btn-success" style="margin-bottom:10px">Adicionar Novo</button>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover table-responsive-md">
                        <thead class="bg-info">
                            <tr>
                                <th>Nome</th>
                                    <th>CNPJ</th>
                                    <th>Email</th>
                                    <th>Endereço</th>
                                    <th>Número</th>
                                    <th>Complemento</th>
                                    <th>Bairro</th>
                                    <th>Ação</th>
                                </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nome do condominio</td>
                                <td>1234567891011</td>
                                <td>Email@condominio.com</td>
                                <td>Rua tal de alguma coisa</td>
                                <td>123</td>
                                <td>Sem complemento</td>
                                <td>Algum bairro</td>
                                <td><a href="#" class="btn btn-outline-success btn-sm" title="Editar Dados"><i class="fa fa-pen"></i></a> <a href="#" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Nome do condominio</td>
                                <td>1234567891011</td>
                                <td>Email@condominio.com</td>
                                <td>Rua tal de alguma coisa</td>
                                <td>123</td>
                                <td>Sem complemento</td>
                                <td>Algum bairro</td>
                                <td><a href="#" class="btn btn-outline-success btn-sm" title="Editar Dados"><i class="fa fa-pen"></i></a> <a href="#" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <td>Nome do condominio</td>
                                <td>1234567891011</td>
                                <td>Email@condominio.com</td>
                                <td>Rua tal de alguma coisa</td>
                                <td>123</td>
                                <td>Sem complemento</td>
                                <td>Algum bairro</td>
                                <td><a href="#" class="btn btn-outline-success btn-sm" title="Editar Dados"><i class="fa fa-pen"></i></a> <a href="#" class="btn btn-outline-danger btn-sm" title="Excluir"><i class="fa fa-trash"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal" tabindex="-1" role="dialog" id="forgotreg-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body" id="modal-content">

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