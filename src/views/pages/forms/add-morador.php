<form action="<?=$base;?>/app/moradores/add_morador" method="POST">

    <h6>Novo Morador</h6>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Nome</div>
            </div>
            <input type="text" class="form-control" name='name' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">E-mail</div>
            </div>
            <input type="email" class="form-control" name='email' required/>
        </div>      
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">RG</div>
            </div>
            <input type="text" class="form-control" name='rg' id="rg-field" required/>
        </div>    
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">CPF</div>
            </div>
            <input type="text" class="form-control" name='cpf' id="cpf-field" required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Telefone/Celular</div>
            </div>
            <input type="text" class="form-control" name='phone' id="phone-field"/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Tipo</div>
            </div>
            <select name="tipo" class="form-control">
                <option value="">Selecionar...</option>
                <option value="Morador">Morador</option>
                <option value="Proprietário">Proprietário</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Condomínio</div>
            </div>
            <select name="condominio" id="combo-condominio" class="form-control">
                <option value="">Selecionar...</option>
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
                <option value="">Selecionar...</option>
            </select>
        </div>       
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Apartamento</div>
            </div>
            <input type="text" class="form-control" name='apto'/>
        </div>       
    </div>

    <div class='form-group'>
        <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span> Adicionar</button>         
    </div>

</form>
<script src="<?=$base;?>/assets/js/jquery.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function()
    {
        //Carrega condominios e predios de acordo como condominio
        $('#combo-condominio').on('change', function()
        {
            var valCond = $('#combo-condominio').val();

            $.ajax({
                url: "<?=$base;?>/app/moradores",
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
                    
                    $('#combo-predio').html(html);

                }
            });
        });

    });
</script>