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
    carrega_moradoresPorPredioCondominio();
});

</script>