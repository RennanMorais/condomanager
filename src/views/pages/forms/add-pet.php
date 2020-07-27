<form action="<?=$base;?>/app/pets/add_pet" method="POST">

    <h6>Novo Pet</h6>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Nome</div>
            </div>
            <input type="text" class="form-control" name='nome' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Tipo</div>
            </div>
            <input type="text" class="form-control" name='tipo' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Sexo</div>
            </div>
            <select class="form-control" name="sexo">
                <option value="">Selecione...</option>
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
                <option value="">Selecione...</option>
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
            <input type="text" class="form-control" name='phone' id="phone-field"/>
        </div>
    </div>

    <div class='form-group'>
        <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span> Adicionar</button>         
    </div>

</form>


<script src="<?=$base;?>/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    
$(document).ready(function()
{
    
    carrega_telefones();
    carrega_telefones_change();

});

function carrega_telefones() {
    
    
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

function carrega_telefones_change() {

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

</script>