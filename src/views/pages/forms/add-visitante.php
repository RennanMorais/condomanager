<form action="<?=$base;?>/app/visitantes/add_visitante" method="POST">

    <h6>Novo Visitante</h6>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Nome</div>
            </div>
            <input type="text" class="form-control" name='nome' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Tipo de Documento</div>
            </div>
            <select class="form-control" name="tipo-doc" id="tipo-doc">
                <option value="">Selecionar...</option>
                <option value="RG">RG</option>
                <option value="CPF">CPF</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Número do documento</div>
            </div>
            <input type="text" class="form-control" name='documento' id="documento" disabled required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Condomínios</div>
            </div>
            <select class="form-control" name="condominio" id="combo-condominio">
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
                <div class="input-group-text">Prédio</div>
            </div>
            <select class="form-control" name="predio" id="combo-predio">
                <option value="">Selecionar...</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Morador</div>
            </div>
            <select class="form-control" name="morador" id="combo-morador">
                <option value="">Selecionar...</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Data Entrada</div>
            </div>
            <input type="date" class="form-control" name='data-entrada' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Hora Entrada</div>
            </div>
            <input type="time" class="form-control" name='hora-entrada' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Data Saída</div>
            </div>
            <input type="date" class="form-control" name='data-saida' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Hora Saída</div>
            </div>
            <input type="time" class="form-control" name='hora-saida' required/>
        </div>
    </div>

    <div class='form-group'>
        <button type="submit" class="btn btn-info"><span class="fa fa-plus"></span> Adicionar</button>         
    </div>

</form>