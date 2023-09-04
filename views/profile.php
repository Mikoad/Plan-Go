
<?php 
session_start();

?>
<main>
    <h1>Mon Profil</h1>
    <div class="profileInfos">
        <p><?='Bonjour ' . $_SESSION['user']['username'];?></p>
    </div>
    
    <a href="/deconnexion">Déconnexion</a>
</main>