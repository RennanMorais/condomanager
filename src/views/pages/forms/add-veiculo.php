<form action="<?=$base;?>/app/veiculos/add_veiculo" method="POST">

<h6>Novo Veículo</h6>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">Condomínios</div>
        </div>
        <select class="form-control" name="condominio" id="combo-condominio">
            <option value="">Selecione...</option>
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
            <option value="">Selecione...</option>
        </select>
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">Morador</div>
        </div>
        <select class="form-control" name="morador" id="combo-morador">
            <option value="">Selecione...</option>
        </select>
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">Tipo</div>
        </div>
        <select class="form-control" name="tipo">
            <option value="">Selecione...</option>
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
        <input type="text" class="form-control" name='marca' required/>
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">Modelo</div>
        </div>
        <input type="text" class="form-control" name='modelo' required/>
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">Placa</div>
        </div>
        <input type="text" class="form-control" name='placa' required/>
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