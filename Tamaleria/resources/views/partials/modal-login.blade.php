<!-- MODAL LOGIN -->
<div class="wrapper">
    <span class="icon-close">
        <ion-icon name="close"></ion-icon>
    </span>

    <div class="form-box login">
        <h2>Iniciar Sesión</h2>
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="input-box">
                <span class="iconl"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="correo_electronico" id="login_correo_electronico" required>
                <label>Correo electrónico</label>
            </div>

            <div class="input-box">
                <span class="iconl"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="contrasena" id="login_contrasena" required>
                <label>Contraseña</label>
            </div>

            <button type="submit" class="btn-login">Iniciar sesión</button>

            <div class="login-register">
                <p>¿No tienes una cuenta?
                    <a href="{{ url('/register') }}" class="register-link"> Regístrate</a>
                </p>
            </div>
        </form>
    </div>
</div>
