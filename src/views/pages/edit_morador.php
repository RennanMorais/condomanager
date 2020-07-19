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

        <div class="container">

            <form action="<?=$base;?>/app/moradores/edit_morador/save" method="POST">

                <h6>Editar Dados</h6>

                <input type="hidden" name="id" value="<?=$morador['id'];?>">

                <div class="form-group">
                    <input type="text" class="form-control" name='name' required placeholder="Nome" value="<?=$morador['name'];?>"/>
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" name='email' required placeholder="E-mail" value="<?=$morador['email'];?>"/>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name='rg' id="rg-field" required placeholder="RG" value="<?=$morador['rg'];?>"/>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name='cpf' id="cpf-field" required placeholder="CPF" value="<?=$morador['cpf'];?>"/>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name='phone' id="phone-field" placeholder="Telefone/Celular" value="<?=$morador['phone'];?>"/>
                </div>

                <div class="form-group">
                    <span>Tipo</span>
                    <select name="tipo" class="form-control">
                        <option value="<?=$morador['tipo'];?>"><?=$morador['tipo'];?></option>
                        <option value="Morador">Morador</option>
                        <option value="Proprietário">Proprietário</option>
                    </select>
                </div>

                <div class="form-group">
                    <span>Condomínio</span>
                    <select name="condominio" class="form-control">
                        <option value="<?=$morador['condominio'];?>"><?=$morador['condominio'];?></option>
                        <?php foreach($condominios as $condominiosItem):?>
                        <option value="<?=$condominiosItem->nome;?>"><?=$condominiosItem->nome;?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <span>Prédio</span>
                    <select name="predio" class="form-control">
                        <option value="<?=$morador['predio'];?>"><?=$morador['predio'];?></option>
                        <?php foreach($predios as $prediosItem):?>
                        <option value="<?=$prediosItem->nome;?>"><?=$prediosItem->nome;?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name='apto' placeholder="Número do Apto" value="<?=$morador['apto'];?>"/>
                </div>

                <div class='form-group'>
                    <button type="submit" class="btn btn-info"><span class="fa fa-save"></span> Salvar</button>
                    <a href="<?=$base;?>/app/moradores" class="btn btn-info"><i class="fa fa-arrow-left"></i> Voltar</a>        
                </div>

            </form>

        </div>
    <!-- /.container-fluid -->

    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $render('footer'); ?>