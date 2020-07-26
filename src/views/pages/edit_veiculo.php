<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'veiculos', 'activeMasterMenu' => 'condominio']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Veículos</h1>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div class="container">
          
        <form id="form" action="<?=$base;?>/app/veiculos/edit_veiculo/save" method="POST">

            <h6>Editar dados</h6>

            <input type="hidden" name="id" value="<?=$veiculo['id'];?>">

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Condomínios</div>
                    </div>
                    <select class="form-control" name="condominio" id="combo-condominio">
                        <option value="<?=$veiculo['id_condominio'];?>"><?=$veiculo['condominio'];?></option>
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
                        <option value="<?=$veiculo['id_predio'];?>"><?=$veiculo['predio'];?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Morador</div>
                    </div>
                    <select class="form-control" name="morador" id="combo-morador">
                        <option value="<?=$veiculo['id_morador'];?>"><?=$veiculo['morador'];?></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Tipo</div>
                    </div>
                    <select class="form-control" name="tipo">
                        <option value="<?=$veiculo['tipo'];?>"><?=$veiculo['tipo'];?></option>
                        <option value="Carro">Carro</option>
                        <option value="Moto">Moto</option>
                        <option value="Van">Van</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Marca</div>
                    </div>
                    <input type="text" class="form-control" name='marca' required value="<?=$veiculo['marca'];?>"/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Modelo</div>
                    </div>
                    <input type="text" class="form-control" name='modelo' required value="<?=$veiculo['modelo'];?>"/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Placa</div>
                    </div>
                    <input type="text" class="form-control" name='placa' required value="<?=$veiculo['placa'];?>"/>
                </div>
            </div>

            <div class='form-group'>
                <button type="submit" class="btn btn-info"><span class="fa fa-save"></span> Salvar</button>
                <a href="<?=$base;?>/app/veiculos" class="btn btn-info"><i class="fa fa-arrow-left"></i> Voltar</a>          
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
    carrega_combobox();
    carrega_comboOnChange();
});

function carrega_comboOnChange() 
{
    $('#combo-condominio').on('change', function()
    {
        var valCond = $('#combo-condominio').val();

        $.ajax({
            url: "<?=$base;?>/app/getpredios",
            method: "POST",
            data: {id_cond: valCond},
            dataType: "json",
            success: function (data)
            {
                
                //console(data);
                var html = '';
                for (var count = 0; count < data.length; count++){
                    html += '<option value="' + data[count].id + '">' + data[count].nome + '</option>';
                }
                
                $('#combo-predio').html('<option value="">Selecionar...</option>');
                $('#combo-predio').append(html);

            }
        });
        
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
}

function carrega_combobox() 
{
    var valCond = $('#combo-condominio').val();

    $.ajax({
        url: "<?=$base;?>/app/getpredios",
        method: "POST",
        data: {id_cond: valCond},
        dataType: "json",
        success: function (data)
        {
            
            //console(data);
            var html = '';
            for (var count = 0; count < data.length; count++){
                html += '<option value="' + data[count].id + '">' + data[count].nome + '</option>';
            }
            
            $('#combo-predio').append(html);

        }
    });
    
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
}

</script>