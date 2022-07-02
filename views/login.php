
    <main class="logIn">
        <p data-cy="heading-login">Iniciar Sesion</p>
        <?php foreach($errores as $error): ?>
        <p data-cy="error" class="error"><?php echo $error?> </p>
        <?php endforeach;?>
        <form data-cy="login-form" class="form-logIn" action="login" method="POST">
            
            <input data-cy="email-login" name="email" type="email" placeholder="email" >
            <input name="password" type="password" placeholder="password" >
            <input type="submit" value="Ingresar">
        </form>
    </main>
