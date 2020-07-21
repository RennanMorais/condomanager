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
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Nome</div>
                        </div>
                        <input type="text" class="form-control" name='name' required value="<?=$morador['name'];?>"/>
                    </div>                   
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">E-mail</div>
                        </div>
                        <input type="email" class="form-control" name='email' required value="<?=$morador['email'];?>"/>
                    </div>                  
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">RG</div>
                        </div>
                        <input type="text" class="form-control" name='rg' id="rg-field" required value="<?=$morador['rg'];?>"/>
                    </div>                 
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">CPF</div>
                        </div>
                        <input type="text" class="form-control" name='cpf' id="cpf-field" required value="<?=$morador['cpf'];?>"/>
                    </div>                    
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Telefone/Celular</div>
                        </div>
                        <input type="text" class="form-control" name='phone' id="phone-field" value="<?=$morador['phone'];?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Tipo</div>
                        </div>
                        <select name="tipo" class="form-control">
                            <option value="<?=$morador['tipo'];?>"><?=$morador['tipo'];?></option>
                            <option value="Morador">Morador</option>
                            <option value="Proprietário">Proprietário</option>
                        </select>
                    </div>                
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Condomínios</div>
                        </div>
                        <select name="condominio" class="form-control">
                            <option value="<?=$morador['condominio'];?>"><?=$morador['condominio'];?></option>
                            <?php foreach($condominios as $condominiosItem):?>
                            <option value="<?=$condominiosItem->id;?>"><?=$condominiosItem->nome;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Prédio</div>
                        </div>
                        <select name="predio" class="form-control">
                            <option value="<?=$morador['predio'];?>"><?=$morador['predio'];?></option>
                            <?php foreach($predios as $prediosItem):?>
                            <option value="<?=$prediosItem->id;?>"><?=$prediosItem->nome;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>                   
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Apartamento</div>
                        </div>
                        <input type="text" class="form-control" name='apto' placeholder="Número do Apto" value="<?=$morador['apto'];?>"/>
                    </div>                    
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