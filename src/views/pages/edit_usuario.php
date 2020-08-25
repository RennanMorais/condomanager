<?php $render('header'); ?>
<?php $render('aside', ['loggedUser' => $loggedUser, 'activeMenu' => 'morador', 'activeMasterMenu' => 'condominio']); ?>

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

        <div class="container">

            <form id="form" action="<?=$base;?>/app/usuarios/edit_usuario/save" method="POST">

                <h6>Editar Dados</h6>

                <input type="hidden" name="id" value="<?=$user['id'];?>">

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Nome</div>
                        </div>
                        <input type="text" class="form-control" name='name' value="<?=$user['name'];?>"/>
                    </div>                   
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">E-mail</div>
                        </div>
                        <input type="email" class="form-control" name='email' value="<?=$user['email'];?>"/>
                    </div>                  
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">RG</div>
                        </div>
                        <input type="text" class="form-control" name='rg' id="rg-field" value="<?=$user['rg'];?>"/>
                    </div>                 
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">CPF</div>
                        </div>
                        <input type="text" class="form-control" name='cpf' id="cpf-field" value="<?=$user['cpf'];?>"/>
                    </div>                    
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Telefone/Celular</div>
                        </div>
                        <input type="text" class="form-control" name='phone' id="phone-field" value="<?=$user['phone'];?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Tipo</div>
                        </div>
                        <select name="tipo" class="form-control">
                            <option value="<?=$user['tipo'];?>"><?=$user['tipo'];?></option>
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
                        <select name="condominio" class="form-control" id="combo-condominio">
                            <option value="<?=$user['id_condominio'];?>"><?=$user['condominio'];?></option>
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
                        <select name="predio" class="form-control" id="combo-predio">
                            <option value="<?=$user['id_predio'];?>"><?=$user['predio'];?></option>
                        </select>
                    </div>                   
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Apartamento</div>
                        </div>
                        <input type="text" class="form-control" name='apto' placeholder="Número do Apto" value="<?=$user['apto'];?>"/>
                    </div>                    
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Acesso</div>
                        </div>
                        <select name="access" class="form-control" required id="combo-acesso">
                            <option value="<?=$user['id_access'];?>"><?=$user['nome_access'];?></option>
                            <?php foreach($access as $accessItem):?>
                            <option value="<?=$accessItem->id;?>"><?=$accessItem->access;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>                   
                </div>

                <div class='form-group'>
                    <button type="submit" class="btn btn-info"><span class="fa fa-save"></span> Salvar</button>
                    <a href="<?=$base;?>/app/usuarios" class="btn btn-info"><i class="fa fa-arrow-left"></i> Voltar</a>        
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
    carrega_predios();
    carrega_prediosOnChange();
});

function carrega_predios()
{
    var valCond = $('#combo-condominio').val();

    $.ajax({
        url: "<?=$base;?>/app/request/getpredios",
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
            
            $('#combo-morador').html('<option value="">Selecionar...</option>');
            $('#combo-predio').append(html);

        }
    });
}

function carrega_prediosOnChange() {
    $('#combo-condominio').on('change', function()
    {
        var valCond = $('#combo-condominio').val();

        $.ajax({
            url: "<?=$base;?>/app/request/getpredios",
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
                
                $('#combo-morador').html('<option value="">Selecionar...</option>');
                $('#combo-predio').html(html);

            }
        });
    });
}

</script>