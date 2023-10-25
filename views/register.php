<!-- modale connexion -->

<?php if (isset($formErrors['general'])) { ?>
    <p class="error"><?= $formErrors['general'] ?></p>
<?php } ?>

<div class="successMessage">
    <?php if (isset($success)) { ?>
        <p class="success"><?= $success ?></p>
        <p class="success">Vous pouvez <a href="connexion">vous connecter</a> dès maintenant.</p>
    <?php } ?>
</div>



<div class="loginRegisterContainer">
    <h1>Inscription</h1>
    <div class="formConnexion">
        <form id="registerForm" action="inscription" method="post">

            <label for="username">Nom d'utilisateur</label>
            <div class="email">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="username" id="username" placeholder="Globox" value="<?= @$_POST['username'] ?>">
            </div>
            <?php if (isset($formErrors['username'])) { ?>
                <p class="error"><?= $formErrors['username'] ?></p>
            <?php } ?>

            <label for="email">Adresse e-mail</label>
            <div class="email">
                <i class="fa-solid fa-at"></i>
                <input type="email" name="email" id="email" placeholder="globox@gmail.com" value="<?= @$_POST['email'] ?>">
            </div>
            <?php if (isset($formErrors['email'])) { ?>
                <p class="error"><?= $formErrors['email'] ?></p>
            <?php } ?>

            <label for="password">Mot de passe</label>
            <div class="email">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="********">
            </div>
            <?php if (isset($formErrors['password'])) { ?>
                <p class="error"><?= $formErrors['password'] ?></p>
            <?php } ?>

            <label for="passwordConfirm">Confirmation du mot de passe</label>
            <div class="email">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="********">
            </div>
            <?php if (isset($formErrors['passwordConfirm'])) { ?>
                <p class="error"><?= $formErrors['passwordConfirm'] ?></p>
            <?php } ?>

            <label for="birthdate">Date de naissance</label>
            <div class="email">
                <i class="fa-solid fa-calendar-days"></i>
                <input type="date" name="birthdate" id="birthdate" value="<?= @$_POST['birthdate'] ?>">
            </div>
            <?php if (isset($formErrors['birthdate'])) { ?>
                <p class="error"><?= $formErrors['birthdate'] ?></p>
            <?php } ?>
            <div class="connexion">
                <input class="btnLogin" type="submit" value="Inscription">
            </div>

        </form>
    </div>
</div>