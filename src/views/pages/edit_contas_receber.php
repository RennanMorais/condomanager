<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'contas_pagar', 'activeMasterMenu' => 'financeiro']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Contas a Receber</h1>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div class="container">
          
        <form id="form" action="<?=$base;?>/app/contas_receber/edit_conta_receber/save" method="POST">

            <h6>Editar Dados</h6>

            <input type="hidden" name="id" value="<?=$conta_receber_item['id']?>">

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nome</div>
                    </div>
                    <input type="text" class="form-control" name='name' value="<?=$conta_receber_item['nome']?>" required/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Categoria</div>
                    </div>
                    <select class="form-control" name="categoria">
                        <option value="<?=$conta_receber_item['id_categoria']?>"><?=$conta_receber_item['categoria']?></option>
                        <?php foreach($categorias as $categoriaItem):?>
                        <option value="<?=$categoriaItem->id;?>"><?=$categoriaItem->nome;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">R$</div>
                    </div>
                    <input type="text" class="form-control" id="field-valor" name='valor' value="<?=$conta_receber_item['valor']?>" required/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Data de Vencimento</div>
                    </div>
                    <input type="date" class="form-control" id="field-valor" name='data_vencimento' value="<?=$conta_receber_item['data_vencimento']?>" required/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Condomínio</div>
                    </div>
                    <select class="form-control" name="condominio">
                        <option value="<?=$conta_receber_item['id_condominio']?>"><?=$conta_receber_item['condominio']?></option>
                        <?php foreach($condominios as $condominioItem):?>
                        <option value="<?=$condominioItem->id;?>"><?=$condominioItem->nome;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Pago</div>
                    </div>
                    <select class="form-control" name="pago_status">
                        <option value="<?=$conta_receber_item['pago_status']?>"><?=$conta_receber_item['pago_status']?></option>
                        <option value="Não">Não</option>
                        <option value="Sim">Sim</option>
                    </select>
                </div>
            </div>

            <div class='form-group'>
                <button type="submit" class="btn btn-info"><span class="fa fa-save"></span> Salvar</button>
                <a href="<?=$base;?>/app/contas_receber" class="btn btn-info"><i class="fa fa-arrow-left"></i> Voltar</a>          
            </div>

        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $render('footer'); ?>