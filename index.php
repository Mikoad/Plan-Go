<?php 
$title = 'Accueil';
require_once 'controllers/indexController.php';
require_once 'views/parts/header.php'; 
include 'assets/css/style.css';
?>
    <main>
    <section>
    <div class="headerContainer">
        <img class="imgHeader" src="assets/img/heeader2.jpg" alt="Paysage" />
        <div class="headerContent">
          <h1>Plan&Go</h1>
          <p>
            <span>Préparez</span> votre voyage n'a jamais été aussi simple !
            <span>Recherchez</span> ce qu'il vous plaît,
            <span>réservez</span> vos activités et logements, et
            <span>organisez</span>-vous au même endroit.
          </p>
          <button class="btn">C'est parti !</button>
        </div>
      </div>
            <div class="contentContainer">
                <h2>Comment ça marche ?</h2>
                <div class="content">
                    <h3 class="title">Présentation</h3>
                    <p class="paragraph">Plan&Go vous permet d'organiser vos vacances de manière simple et rapide. Faîtes toutes vos réservations d'activités, de logements et de séances bien être au même endroit. Plan&Go vous permet d'organiser vos vacances de manière simple et rapide. Faîtes toutes vos réservations d'activités, de logements et de séances bien être au même endroit. Faîtes toutes vos réservations d'activités, de logements et de séances bien être au même endroit. Plan&Go vous permet d'organiser vos vacances de manière simple et rapide. Faîtes toutes vos réservations d'activités, de logements et de séances bien être au même endroit </p>
                </div>
                <div>
                     <button id="carousel">Suivant <i class="fa-solid fa-chevron-right"></i></button>
                </div>
    
            </div>
            
            </section>
            <!-- <div class="border"></div> -->
    
            <!-- section liste d'avantages -->
            <section class="allServices">
                <h2>Choisissez Plan&Go et profitez de tous ces avantages</h2>
                <div class="advantages">
                    <div>
                        <img src="assets/img/advantage-chrono.jpg" alt="Service rapide">
                        <h3>Gagnez du temps</h3>
                        <p>Doloribus corrupti animi aut expedita dicta! Tempore alias odio enim laborum animi culpa in ut reiciendis, rerum reprehenderit. Aut illum repudiandae pariatur?</p>
                    </div>
                    <div>
                        <img src="assets/img/search.png" alt="">
                        <h3>Comparez les prix</h3>
                        <p>Ratione, tempora. Voluptas, velit voluptatum perferendis facere labore recusandae illum porro modi a ipsa. Molestias iusto aperiam tempora architecto incidunt odio qui!</p>
                    </div>
                    <div>
                        <img src="assets/img/advantage-group.jpg" alt="">
                        <h3>Créez des groupes</h3>
                        <p>Ratione, tempora. Voluptas, velit voluptatum perferendis facere labore recusandae illum porro modi a ipsa. Molestias iusto aperiam tempora architecto incidunt odio qui!</p>
                    </div>
                </div>
                <div class="advantages secondRow">
                    <div>
                        <img src="assets/img/advantage-chrono.jpg" alt="Service rapide">
                        <h3>Gérez votre planning</h3>
                        <p>Doloribus corrupti animi aut expedita dicta! Tempore alias odio enim laborum animi culpa in ut reiciendis, rerum reprehenderit. Aut illum repudiandae pariatur?</p>
                    </div>
                    <div>
                        <img src="assets/img/search.png" alt="">
                        <h3>Service tout-en-un</h3>
                        <p>Ratione, tempora. Voluptas, velit voluptatum perferendis facere labore recusandae illum porro modi a ipsa. Molestias iusto aperiam tempora architecto incidunt odio qui!</p>
                    </div>
                    
                </div>
            </section>
            
            <!-- section banner + cta -->
            <section class="activity">
                <h2>Commencez dès maintenant !</h2>
                <div class="banner">
                    <img src="assets/img/banner-hotel.jpg" alt="">
                <div class="bannerContent">
                    <h3>Les meilleurs logements au meilleur prix</h3>
                    <p> dolor sit amet consectetur, adipisicing elit. Accusamus nihil velit incidunt necessitatibus qua.</p>
                    <button class=" btn whiteBtn">Voir la liste</button>
            </div>
            </div>
            <h3 class="activityTitle">Retrouvez toutes les catégories d'activités</h3>
            <div class="activityCategories">
                <div>
                    <img src="assets/img/top-activity.jpg" alt="">
                    <h4>Les mieux notées</h4>
                </div>
                <div>
                    <img src="assets/img/activity-extrem.jpg" alt="Activités - Sensations fortes">
                    <h4>Sensations fortes</h4>
                </div>
                <div>
                    <img src="assets/img/activity-outside.jpg" alt="">
                    <h4>De plein air</h4>
                </div>
                <div>
                    <img src="assets/img/activity-visit.jpg" alt="">
                    <h4>Sorties culturelles</h4>
                </div>
            </div>
            </section>
    </main>
<?php require_once 'views/parts/footer.php';