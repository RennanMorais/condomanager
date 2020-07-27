<form action="<?=$base;?>/app/assembleias/add_assembleia" method="POST">

    <h6>Nova Reserva</h6>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Título</div>
            </div>
            <input type="text" class="form-control" name='titulo' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Descrição</div>
            </div>
            <textarea class="form-control" name='descricao' required></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Data</div>
            </div>
            <input type="date" class="form-control" name='data' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Hora</div>
            </div>
            <input type="time" class="form-control" name='hora' required/>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">Local</div>
            </div>
            <select class="form-control" name="local" id="combo-condominio" required>
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
                <div class="input-group-text">Descrição do Local</div>
            </div>
            <textarea class="form-control" name='descricao_local' required></textarea>
        </div>
    </div>

    <div class='form-group'>
        <button type="submit" class="btn btn-info"><span class="fa fa-save"></span> Agendar</button>         
    </div>

</form>