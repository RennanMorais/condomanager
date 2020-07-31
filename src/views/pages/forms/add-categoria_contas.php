<form action="<?=$base;?>/app/categoria_contas/add_categoria_contas" method="POST">

<h6>Nova Categoria</h6>

<div class="form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">Categoria</div>
        </div>
        <input type="text" class="form-control" name='name' required/>
    </div>
</div>

<div class='form-group'>
    <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span> Adicionar</button>         
</div>

</form>