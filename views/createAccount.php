<!-- modale create account -->
<link rel="stylesheet" href="../assets/css/register.css">
<div class="modalContainer">
      <h1>Inscription</h1>
      <div class="formConnexion">
        <form action="" method="POST">
            

          <label for="firstname">Prénom</label>
          <div class="email">
          <i class="fa-solid fa-pen"></i>
            <input
              type="text"
              name="firstname"
              id="firstname"
              placeholder="Jean"
            />
          </div>
          <label for="lastname">Nom de famille</label>
          <div class="email">
          <i class="fa-solid fa-pen"></i>
            <input
              type="text"
              name="lastname"
              id="lastname"
              placeholder="Dupont"
            />
          </div>
          <label for="email">Adresse mail</label>
          <div class="email">
            <i class="fa-solid fa-user"></i>
            <input
              type="email"
              name="email"
              id="email"
              placeholder="jeandupont@gmail.com"
            />
          </div>

          <label for="password">Mot de passe</label>
          <div class="password">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" id="password" />
          </div>
          <label for="password">Confirmez votre mot de passe</label>
          <div class="password">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" id="password" />
          </div>

          <div class="connexion">
            <button type="submit" class="btnLogin">Valider</button>
          </div>
        </form>
      </div>
    </div>
    <script
      src="https://kit.fontawesome.com/17e72c725f.js"
      crossorigin="anonymous"
    ></script>