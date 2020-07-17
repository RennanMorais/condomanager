<form action="http://localhost/condosoftware/public/login/registro" method="POST">

    <h6>Cadastro</h6>

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

    <div class='form-group'>
        <button type="submit" class="btn btn-info btn-reg"><span class="fa fa-user-plus"></span> Registrar</button>         
    </div>

</form>