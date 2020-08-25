<?php $render('header', ['title' => 'Assembleias']); ?>
<?php $render('aside', ['loggedUser' => $loggedUser]); ?>

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

        <div class="container">
          
        <form id="form" action="<?=$base;?>/app/assembleias/edit_assembleia/save" method="POST">

        <h6>Editar Dados</h6>

        <input type="hidden" name="id" value="<?=$assembleia['id'];?>">

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Título</div>
                </div>
                <input type="text" class="form-control" name='titulo' required value="<?=$assembleia['titulo'];?>"/>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Descrição</div>
                </div>
                <textarea class="form-control" name='descricao' required><?=$assembleia['descricao'];?></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Data</div>
                </div>
                <input type="date" class="form-control" name='data' required value="<?=$assembleia['data'];?>"/>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Hora</div>
                </div>
                <input type="time" class="form-control" name='hora' required value="<?=date('H:i', strtotime($assembleia['hora']));?>"/>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Local</div>
                </div>
                <select class="form-control" name="local" id="combo-condominio" required>
                    <option value="<?=$assembleia['local'];?>"><?=$assembleia['local_condominio'];?></option>
                    <?php foreach($condominios as $condominiosItem):?>
                    <option value="<?=$condominiosItem->id;?>"><?=$condominiosItem->nome;?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">Descrição do Local</div>
                </div>
                <textarea class="form-control" name='descricao_local' required><?=$assembleia['descricao_local'];?></textarea>
            </div>
        </div>

        <div class='form-group'>
            <button type="submit" class="btn btn-info btn-login"><span class="fa fa-save"></span> Salvar</button>
            <a href="<?=$base;?>/app/assembleias" class="btn btn-info"><i class="fa fa-arrow-left"></i> Voltar</a>         
        </div>

        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $render('footer'); ?>