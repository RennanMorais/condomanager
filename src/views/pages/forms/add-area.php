<form action="<?=$base;?>/app/area_comum/add_area" method="POST">

<h6>Novo Área Comum</h6>

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
            <div class="input-group-text">Condomínios</div>
        </div>
        <select class="form-control" name="condominio" id="select-cond">
            <option value="">Selecione...</option>
            <?php foreach($condominios as $condominiosItem):?>
            <option value="<?=$condominiosItem->nome;?>"><?=$condominiosItem->nome;?></option>
            <?php endforeach;?>
        </select>
    </div>
</div>

<div class='form-group'>
    <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span> Adicionar</button>         
</div>

</form>