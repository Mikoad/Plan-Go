<main>
    <section>
        <div class="headerContainer">
            <img class="imgHeader" src="../assets/img/heeader2.jpg" alt="Paysage" />
            <div class="headerContent">
                <h1>Plan&Go</h1>
                <p>
                    <span>Préparez</span> votre voyage n'a jamais été aussi simple !
                    <span>Recherchez</span> ce qu'il vous plaît,
                    <span>réservez</span> vos activités et logements, et
                    <span>organisez</span>-vous au même endroit.
                </p>
                <!-- au clic, renvoi sur la page de recherche -->
                <a href="recherche"><button class="btn">Réservez</button></a>
            </div>
        </div>
        <div class="contentContainer">
            <h2>Comment ça marche ?</h2>
            <div class="content">
                <h3 class="title">Fonctionnement du site</h3>
                <p class="paragraph">Découvrez la marche à suivre pour pouvoir utiliser Plan&Go comme vous le voulez, vous n'avez plus qu'à faire défiler les instructions avec le bouton ci-dessous !</p>
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
                <p>Ne perdez plus votre temps à chercher des réservations sur un site et vous organiser sur un autre. Plan&Go s'occupe de tout !</p>
            </div>
            <div>
                <img src="assets/img/search.png" alt="">
                <h3>Comparez les prix</h3>
                <p>Rechercher les activités, logements et séances bien-être que vous aimez, comparez les prix et trouvez ce qui vous convient le mieux peu importe votre budget.</p>
            </div>

        </div>
        <div class="advantages secondRow">
            <div>
                <img src="assets/img/calendrier.png" alt="Imaage de calendrier">
                <h3>Gérez votre planning</h3>
                <p>Quand des réservations vous plaisent, ajoutez les directement dans votre planning en un clic et retrouvez les sur votre profil.</p>
            </div>
            <div>
                <img src="assets/img/service-tout-en-un.png" alt="Image serrage de main">
                <h3>Service tout-en-un</h3>
                <p>Recherchez ce qui vous plaît, faîtes vos réservations et organisez-vous au même endroit. Plus de mails éparpillés dans votre boîte mail, Plan&Go vous accompagne de A à Z.</p>
            </div>

        </div>
    </section>

    <!-- section banner + cta -->
    <section class="activity">
        <h2>Commencez dès maintenant !</h2>
        <div class="banner">
            <img src="assets/img/banner-hotel.jpg" alt="">
            <div class="bannerContent">
                <h3>Les meilleurs hôtels au meilleur prix</h3>
                <p>Besoin d'une chambre d'hôtel ? Réservez l'hôtel qui vous convient dès maintenant.</p>
                <form action="recherche-4" method="POST">
                    <input type="hidden" name="category" value="4">
                    <button class=" btn whiteBtn">Voir la liste</button>
                </form>
            </div>
        </div>
        <h3 class="activityTitle">Retrouvez toutes les catégories d'activités</h3>
        <div class="activityCategories">
            <div>
                <form action="recherche-3" method="POST">
                    <input type="hidden" name="category" value="3">
                    <button><img src="assets/img/activity-extrem.jpg" alt="Activités - Sensations fortes"></button>
                </form>

                <h4>Sensations fortes</h4>
            </div>
            <div>
                <form action="recherche-1" method="POST">
                    <input type="hidden" name="category" value="1">
                    <button><img src="assets/img/activity-outside.jpg" alt="">
                    </button>
                </form>

                <h4>De plein air</h4>
            </div>
            <div>
                <form action="recherche-2" method="POST">
                    <input type="hidden" name="category" value="2">
                    <button><img src="assets/img/activity-visit.jpg" alt="">
                    </button>
                </form>

                <h4>Sorties culturelles</h4>
            </div>
        </div>
    </section>
    <div class="littleBannerContainer">
        <h3>Profitez d'un moment de détente</h3>
        <div class="lbContent">
            <div>
                <form action="recherche-7" method="POST">
                    <input type="hidden" name="category" value="7">
                    <button>
                        <img src="assets/img/spa.jpg" alt="Image de Spa" />
                    </button>
                </form>

                <h4>Spa</h4>
            </div>
            <div>
                <form action="recherche-9" method="POST">
                    <input type="hidden" name="category" value="9">
                    <button>
                        <img src="assets/img/retraite.jpg" alt="Image de Retraites Santé" />
                    </button>
                </form>

                <h4>Retraites</h4>
            </div>
            <div>
                <form action="recherche-8" method="POST">
                    <input type="hidden" name="category" value="8">
                    <button>
                        <img src="assets/img/cure.jpg" alt="Image de Cure" />
                    </button>
                </form>

                <h4>Cures</h4>
            </div>
        </div>
    </div>

</main>