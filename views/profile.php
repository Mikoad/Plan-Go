<?php

?>
<main>
    <section class="profil">
        <h1>Mon Profil</h1>
        <p class="welcomeMessage"><?= 'Bonjour ' . $_SESSION['user']['username']; ?> ! Bienvenue sur votre profil. Ici vous retrouverez toutes vos informations et vos planning ! </p>
        <div class="profileInfos">
            <h2>Mes informations</h2>

            <p>Nom d'utilisateur : <?= $userDetails->username ?></p>
            <p>Adresse email : <?= $userDetails->email ?></p>
            <div class="accountBtn">
                <button id="updateBtn">Modifier mon profil</button>
                <button id="deleteBtn">Supprimer mon compte</button>
            </div>

        </div>


        <div class="updateUser">
            <form action="profil" method="POST">
                <h3>Modifier mes informations</h3>
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" value="<?= $userDetails->username ?>">
                <?php if (isset($formErrors['username'])) { ?>
                    <p class="error"><?= $formErrors['username'] ?></p>
                <?php } ?>

                <label for="email">Adresse email :</label>
                <input type="email" name="email" id="email" value="<?= $userDetails->email ?>">
                <?php if (isset($formErrors['email'])) { ?>
                    <p class="error"><?= $formErrors['email'] ?></p>
                <?php } ?>

                <button><input type="submit" value="Modifier" name="updateInfos"></button>
            </form>

            <form action="profil" method="POST" name="updatePassword">
                <h3>Modifier mon mot de passe</h3>
                <label for="currentPassword">Mot de passe actuel</label>
                <input type="password" name="currentPassword" id="currentPassword">
                <?php if (isset($formErrors['currentPassword'])) { ?>
                    <p class="error"><?= $formErrors['currentPassword'] ?></p>
                <?php } ?>


                <label for="newPassword">Nouveau mot de passe</label>
                <input type="password" name="newPassword" id="newPassword">
                <?php if (isset($formErrors['newPassword'])) { ?>
                    <p class="error"><?= $formErrors['newPassword'] ?></p>
                <?php } ?>


                <label for="passwordConfirm">Confirmez le nouveau mot de passe</label>
                <input type="password" name="passwordConfirm" id="passwordConfirm">
                <?php if (isset($formErrors['passwordConfirm'])) { ?>
                    <p class="error"><?= $formErrors['passwordConfirm'] ?></p>
                <?php } ?>


                <button><input type="submit" value="Modifier" name="updatePassword"></button>
            </form>
        </div>
        <!-- <div class="deleteAccount">

        </div> -->
        <div class="planning">
            <h2>Planning</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Titre de la réservation</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <!-- faire une div ou tableau avec a droite la date de réservation au milieu le titre et la description et à gauche le prix puis organiser par ordre de date  -->
        </div>


        <div class="logout">
            <a href="/deconnexion">Déconnexion</a>
        </div>

    </section>
</main>