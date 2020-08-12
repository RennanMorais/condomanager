<form action="<?=$base;?>/app/contas_receber/add_contas_receber" method="POST">

<h6>Nova Conta a Receber</h6>

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
            <div class="input-group-text">Categoria</div>
        </div>
        <select class="form-control" name="categoria">
            <option value="">Selecionar...</option>
            <?php foreach($categorias as $categoriaItem):?>
            <option value="<?=$categoriaItem->id;?>"><?=$categoriaItem->nome;?></option>
            <?php endforeach;?>
        </select>
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">R$</div>
        </div>
        <input type="text" class="form-control" id="field-valor" name='valor' required/>
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">Data de Vencimento</div>
        </div>
        <input type="date" class="form-control" id="field-valor" name='data_vencimento' required/>
    </div>
</div>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">Condomínio</div>
        </div>
        <select class="form-control" name="condominio">
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
            <div class="input-group-text">Pago</div>
        </div>
        <select class="form-control" name="pago_status">
            <option value="Não">Não</option>
            <option value="Sim">Sim</option>
        </select>
    </div>
</div>

<div class='form-group'>
    <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span> Adicionar</button>         
</div>

</form>