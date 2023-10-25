<div class="loginRegisterContainer">
    <h1>Se connecter</h1>
    <div class="formConnexion">
        <form action="connexion" method="POST">
            <label for="email">Adresse mail</label>
            <div class="email">
                <i class="fa-solid fa-user"></i>
                <input type="email" name="email" id="email" placeholder="jeandupont@gmail.com" required />
            </div>
            <!-- affichage de l'erreur si elle existe  -->
            <?php if (isset($formErrors['email'])) { ?>
                <p class="error"><?= $formErrors['email'] ?></p>
            <?php } ?>


            <label for="password">Mot de passe</label>
            <div class="password">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="password" required />
            </div>
            <!-- affichage de l'erreur si elle existe  -->
            <?php if (isset($formErrors['password'])) { ?>
                <p class="error"><?= $formErrors['password'] ?></p>
            <?php } ?>



            <div class="connexion">
                <input class="btnLogin" type="submit" value="Se connecter">
                <p>Vous n'avez pas encore de compte ?</p>
                <!-- bouton qui redirige vers la page d'inscription -->
                <button class="btnAccount" onclick="window.location.href='inscription'">Créer un compte</button>
            </div>
        </form>
    </div>
</div>