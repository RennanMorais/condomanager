<?php $render('header'); ?>
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

        <div id="form" class="container">

        <form action="<?=$base;?>/app/ocorrencias/edit_ocorrencia/save" method="POST">

            <h6>Editar Dados</h6>

            <input type="hidden" name="id" value="<?=$ocorrencia['id'];?>">

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Data</div>
                    </div>
                    <input type="date" class="form-control" name='data' required value="<?=$ocorrencia['data']?>"/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Descrição</div>
                    </div>
                    <textarea class="form-control" name='descricao' required><?=$ocorrencia['descricao']?></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Condomínio</div>
                    </div>
                    <select class="form-control" name="condominio" id="combo-condominio" required>
                        <option value="<?=$ocorrencia['id_condominio']?>"><?=$ocorrencia['condominio']?></option>
                        <?php foreach($condominios as $condominiosItem):?>
                        <option value="<?=$condominiosItem->id;?>"><?=$condominiosItem->nome;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Morador</div>
                    </div>
                    <select class="form-control" name="morador" id="combo-morador" required>
                        <option value="<?=$ocorrencia['id_morador']?>"><?=$ocorrencia['morador']?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Contato</div>
                    </div>
                    <input type="text" class="form-control" name='phone' id="phone-field" required value="<?=$ocorrencia['contato']?>"/>
                </div>
            </div>

            <div class='form-group'>
                <button type="submit" class="btn btn-info"><span class="fa fa-save"></span> Salvar</button>
                <a href="<?=$base;?>/app/ocorrencias" class="btn btn-info"><i class="fa fa-arrow-left"></i> Voltar</a>         
            </div>

        </form>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php $render('footer'); ?>

<script type="text/javascript">

$(document).ready(function()
{
    carrega_combo();
    carrega_OnChange();
});

function carrega_OnChange() 
{
    $('#combo-condominio').on('change', function()
    {
        var valCond = $('#combo-condominio').val();

        $.ajax({
            url: "<?=$base;?>/app/getmorador",
            method: "POST",
            data: {id_cond: valCond},
            dataType: "json",
            success: function (data)
            {
                
                //console(data);
                var html = '';
                for (var count = 0; count < data.length; count++){
                    html += '<option value="' + data[count].id + '">' + data[count].name + '</option>';
                }
                
                $('#combo-morador').html('<option value="">Selecionar...</option>');
                $('#combo-morador').append(html);

            }
        });

    });

    $('#combo-morador').on('change', function()
    {
        var valMorador = $('#combo-morador').val();

        $.ajax({
            url: "<?=$base;?>/app/getphone",
            method: "POST",
            data: {id_morador: valMorador},
            dataType: "json",
            success: function (data)
            {
                
                //console(data);
                var phone = data.phone;
                
                //alert(phone);
                $('#phone-field').val(phone);

            }
        });
    });
}

function carrega_combo() 
{
    var valCond = $('#combo-condominio').val();

    $.ajax({
        url: "<?=$base;?>/app/getmorador",
        method: "POST",
        data: {id_cond: valCond},
        dataType: "json",
        success: function (data)
        {
            
            //console(data);
            var html = '';
            for (var count = 0; count < data.length; count++){
                html += '<option value="' + data[count].id + '">' + data[count].name + '</option>';
            }
            
            $('#combo-morador').append(html);

        }
    });

    var valMorador = $('#combo-morador').val();

    $.ajax({
        url: "<?=$base;?>/app/getphone",
        method: "POST",
        data: {id_morador: valMorador},
        dataType: "json",
        success: function (data)
        {
            
            //console(data);
            var phone = data.phone;
            
            //alert(phone);
            $('#phone-field').val(phone);

        }
    });
}

</script>