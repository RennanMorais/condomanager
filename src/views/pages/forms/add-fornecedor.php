<form action="<?=$base;?>/app/fornecedores/add_fornecedor" method="POST">

    <h6>Novo Fornecedor</h6>

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
                <div class="input-group-text">CNPJ</div>
            </div>
            <input type="text" class="form-control" name='cnpj' id="cnpj-field" required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">E-mail</div>
            </div>
            <input type="email" class="form-control" name='email'/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Site</div>
            </div>
            <input type="text" class="form-control" name='site'/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Endereço</div>
            </div>
            <input type="text" class="form-control" name='endereco' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Número</div>
            </div>
            <input type="text" class="form-control" name='numero' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Complemento</div>
            </div>
            <input type="text" class="form-control" name='complemento'/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Bairro</div>
            </div>
            <input type="text" class="form-control" name='bairro' required/>
        </div>
    </div>

    <div class='input-group'>
        <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span> Adicionar</button>         
    </div>

</form>