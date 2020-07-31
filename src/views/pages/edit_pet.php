<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'pets', 'activeMasterMenu' => 'condominio']); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Pets</h1>
            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

        <div id="form" class="container">
          
        <form action="<?=$base;?>/app/pets/edit_pet/save" method="POST">

            <h6>Editar Dados</h6>
            
            <input type="hidden" name="id" value="<?=$petItem['id'];?>">

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nome</div>
                    </div>
                    <input type="text" class="form-control" name='nome' required value="<?=$petItem['nome'];?>"/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Tipo</div>
                    </div>
                    <input type="text" class="form-control" name='tipo' required value="<?=$petItem['tipo'];?>"/>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Sexo</div>
                    </div>
                    <select class="form-control" name="sexo" id="select-cond">
                        <option value="<?=$petItem['sexo'];?>"><?=$petItem['sexo'];?></option>
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Proprietário</div>
                    </div>
                    <select class="form-control" data name="proprietario" id="combo-morador">
                        <option value="<?=$petItem['id_morador'];?>"><?=$petItem['morador'];?></option>
                        <?php foreach($moradores as $moradorItem):?>
                        <option value="<?=$moradorItem->id;?>"><?=$moradorItem->name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Telefone/Celular</div>
                    </div>
                    <input type="text" class="form-control" name='phone' id="phone-field" value=""/>
                </div>
            </div>

            <div class='form-group'>
                <button type="submit" class="btn btn-info"><span class="fa fa-save"></span> Salvar</button>
                <a href="<?=$base;?>/app/pets" class="btn btn-info"><i class="fa fa-arrow-left"></i> Voltar</a>        
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
    
    carrega_telefones();
    carrega_telefones_change();

});

function carrega_telefones() {
    
    
    var valMorador = $('#combo-morador').val();

    $.ajax({
        url: "<?=$base;?>/app/request/getphone",
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

function carrega_telefones_change() {

    $('#combo-morador').on('change', function()
    {
        var valMorador = $('#combo-morador').val();

        $.ajax({
            url: "<?=$base;?>/app/request/getphone",
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

</script>