<div class="modalContainer">
    <h1>Se connecter</h1>
    <div class="formConnexion">
        <form action="connexion" method="POST">
            <label for="email">Adresse mail</label>
            <div class="email">
                <i class="fa-solid fa-user"></i>
                <input type="email" name="email" id="email" placeholder="jeandupont@gmail.com" required />
            </div>
            <p class="error"><?= $formErrors['email'] ?></p>

            <label for="password">Mot de passe</label>
            <div class="password">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="password" required />
            </div>


            <p class="forgotPassword"><a href="">Mot de passe oublié ?</a></p>

            <div class="rememberMe">
                <input type="checkbox" name="rememberMe" id="rememberMe" />
                <label for="rememberMe">Se souvenir de moi</label>
            </div>
            <div class="connexion">
                <button class="btnLogin">Connexion</button>
                <p>Vous n'avez pas encore de compte ?</p>
                <button class="btnAccount">Créer un compte</button>
            </div>
        </form>
    </div>
</div>