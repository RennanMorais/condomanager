<form action="http://localhost/condosoftware/public/login/registro" method="POST">

    <div class="form-group">
        <input type="text" class="form-control" name='name' required placeholder="Nome"/>
    </div>

    <div class="form-group">
        <input type="email" class="form-control" name='email' required placeholder="Email"/>
    </div>

    <div class="form-group">
        <input type="text" class="form-control" name='phone' required placeholder="Telefone/Celular"/>
    </div>
    
    <div class="form-group">
        <input type="password" class="form-control" name='password' required placeholder="Password"/>
    </div>

    <div style="margin-bottom:10px" class='row'>
        <div class='col-xs-12'>
            <button type="submit" class="btn btn-info btn-login"><span class="fas fa-Users-plus"></span> Registrar</button>         
        </div>
    </div>

</form>