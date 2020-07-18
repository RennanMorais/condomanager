<form action="<?=$base;?>/app/condominios/add_cond" method="POST">

    <h6>Novo Condomínio</h6>

    <div class="form-group">
        <input type="text" class="form-control" name='name' required placeholder="Nome"/>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name='cnpj' id="cnpj-field" required placeholder="CNPJ"/>
    </div>

    <div class="form-group">
        <input type="email" class="form-control" name='email' placeholder="E-mail"/>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name='endereco' required placeholder="Endereço"/>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name='numero' required placeholder="Número"/>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name='complemento' placeholder="Complemento"/>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name='bairro' required placeholder="Bairro"/>
    </div>

    <div class='form-group'>
        <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span> Adicionar</button>         
    </div>

</form>