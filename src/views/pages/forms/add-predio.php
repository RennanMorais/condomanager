<form action="<?=$base;?>/app/predios/add_predio" method="POST">

<h6>Novo Prédio</h6>

<div class="form-group">
    <input type="text" class="form-control" name='name' required placeholder="Nome ou Número do prédio"/>
</div>

<div class="form-group">
    <select class="form-control" name="condominio" id="select-cond">
        <option value="">Selecione...</option>
        <?php foreach($condominios as $condominiosItem):?>
        <option value="<?=$condominiosItem->nome;?>"><?=$condominiosItem->nome;?></option>
        <?php endforeach;?>
    </select>
</div>

<div class='form-group'>
    <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span> Adicionar</button>         
</div>

</form>