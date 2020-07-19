<form action="<?=$base;?>/app/moradores/add_morador" method="POST">

    <h6>Novo Morador</h6>

    <div class="form-group">
        <input type="text" class="form-control" name='name' required placeholder="Nome"/>
    </div>

    <div class="form-group">
        <input type="email" class="form-control" name='email' required placeholder="E-mail"/>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name='rg' id="rg-field" required placeholder="RG"/>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name='cpf' id="cpf-field" required placeholder="CPF"/>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name='phone' id="phone-field" placeholder="Telefone/Celular"/>
    </div>

    <div class="form-group">
        <span>Tipo</span>
        <select name="tipo" class="form-control">
            <option value="">Selecionar...</option>
            <option value="Morador">Morador</option>
            <option value="Proprietário">Proprietário</option>
        </select>
    </div>

    <div class="form-group">
        <span>Condomínio</span>
        <select name="condominio" class="form-control">
            <option value="">Selecionar...</option>
            <?php foreach($condominios as $condominiosItem):?>
            <option value="<?=$condominiosItem->nome;?>"><?=$condominiosItem->nome;?></option>
            <?php endforeach;?>
        </select>
    </div>

    <div class="form-group">
        <span>Prédio</span>
        <select name="predio" class="form-control">
            <option value="">Selecionar...</option>
            <?php foreach($predios as $prediosItem):?>
            <option value="<?=$prediosItem->nome;?>"><?=$prediosItem->nome;?></option>
            <?php endforeach;?>
        </select>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name='apto' placeholder="Número do Apto"/>
    </div>

    <div class='form-group'>
        <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span> Adicionar</button>         
    </div>

</form>