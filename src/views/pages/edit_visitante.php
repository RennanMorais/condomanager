<?php $render('header', ['title' => 'Visitantes']); ?>
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

        <div class="container">
          
        <form id="form" action="<?=$base;?>/app/visitantes/edit_visitante/save" method="POST">

            <h6>Editar dados</h6>

            <input type="hidden" name="id" value="<?=$visitante['id']?>">

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nome</div>
                    </div>
                    <input type="text" class="form-control" name='nome' required value="<?=$visitante['nome']?>"/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Tipo de Documento</div>
                    </div>
                    <select class="form-control" name="tipo-doc" id="tipo-doc">
                        <option value="<?=$visitante['tipo_documento']?>"><?=$visitante['tipo_documento']?></option>
                        <option value="RG">RG</option>
                        <option value="CPF">CPF</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Número do documento</div>
                    </div>
                    <input type="text" class="form-control" name='documento' id="documento" required value="<?=$visitante['numero_documento']?>"/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Condomínios</div>
                    </div>
                    <select class="form-control" name="condominio" id="combo-condominio">
                        <option value="<?=$visitante['id_condominio']?>"><?=$visitante['condominio']?></option>
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
                    <select class="form-control" name="predio" id="combo-predio">
                        <option value="<?=$visitante['id_predio']?>"><?=$visitante['predio']?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Morador</div>
                    </div>
                    <select class="form-control" name="morador" id="combo-morador">
                        <option value="<?=$visitante['id_morador']?>"><?=$visitante['morador']?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Data Entrada</div>
                    </div>
                    <input type="date" class="form-control" name='data-entrada' required value="<?=$visitante['data_entrada']?>"/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Hora Entrada</div>
                    </div>
                    <input type="time" class="form-control" name='hora-entrada' required value="<?=date('H:i', strtotime($visitante['hora_entrada']))?>"/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Data Saída</div>
                    </div>
                    <input type="date" class="form-control" name='data-saida' required value="<?=$visitante['data_saida']?>"/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Hora Saída</div>
                    </div>
                    <input type="time" class="form-control" name='hora-saida' required value="<?=date('H:i', strtotime($visitante['hora_saida']))?>"/>
                </div>
            </div>

            <div class='form-group'>
                <button type="submit" class="btn btn-info"><span class="fa fa-save"></span> Salvar</button>
                <a href="<?=$base;?>/app/visitantes" class="btn btn-info"><i class="fa fa-arrow-left"></i> Voltar</a>          
            </div>

        </form>

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