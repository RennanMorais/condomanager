<form action="<?=$base;?>/app/ocorrencias/add_ocorrencia" method="POST">

    <h6>Nova Ocorrência</h6>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Data</div>
            </div>
            <input type="date" class="form-control" name='data' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Descrição</div>
            </div>
            <textarea class="form-control" name='descricao' required></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Condomínio</div>
            </div>
            <select class="form-control" name="condominio" id="combo-condominio" required>
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
                <div class="input-group-text">Morador</div>
            </div>
            <select class="form-control" name="morador" id="combo-morador" required>
                <option value="">Selecionar...</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Contato</div>
            </div>
            <input type="text" class="form-control" name='phone' id="phone-field" required/>
        </div>
    </div>

    <div class='form-group'>
        <button type="submit" class="btn btn-info"><span class="fa fa-paper-plane"></span> Enviar</button>         
    </div>

</form>

<script src="<?=$base;?>/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    
$(document).ready(function()
{
    carrega_areasOnChange();
});

function carrega_areasOnChange() 
{
    $('#combo-condominio').on('change', function()
    {
        var valCond = $('#combo-condominio').val();

        $.ajax({
            url: "<?=$base;?>/app/request/getmorador",
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