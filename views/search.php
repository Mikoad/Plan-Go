<main>
    <section class="search">

        <div class="searchBar">
            <form action="recherche" method="GET">
                <label for="search" class="labelSearch">Recherche : </label>
                <input type="search" name="search" id="search" placeholder="Rechercher une réservation">
                <input type="submit" value="Rechercher">
            </form>
        </div>
        <!-- POUR LES SELECT, les remplacer par des ul avec le nom des options; avec des li cliquables qui affichent les réservations correspondantes au li. -->
        <!-- OU ALORS, mettre des checkbox avec categ reservations cote à cote, checkbox correspondantes en dessous, le user peut n'en CHOISIR QU'UN puis submit -->
        <div class="allSelect">
            <form action="recherche" method="POST">
                <select id="category" name='category'>
                    <option value="" selected disabled>Catégories</option>
                    <?php foreach ($typesList as $key => $type) { ?>
                        <optgroup label="<?= $type['name'] ?>">

                            <?php foreach ($type['subTypes'] as $key => $subType) { ?>
                                <option value="<?= $key ?>"><?= $subType ?></option>
                            <?php } ?>
                        </optgroup>
                    <?php } ?>
                </select>


                <select id="price" name="price">
                    <option value="" selected disabled>Prix</option>
                    <option value="ASC">Croissant</option>
                    <option value="DESC">Décroissant</option>
                </select>
                <input type="submit" value="Afficher">
            </form>
        </div>


    </section>

    <!-- insérer les réservations via $reservation->getList() -->
    <section class=suggestions>
        <h2>Suggestions</h2>
        <div class="bannerSuggestion">
            <?php foreach ($reservationList as $rl) { ?>
                <div class="cardSuggest">
                    <img src="../<?= $rl->image ?>" alt="<?= $rl->name ?>">
                    <h3><?= $rl->name ?></h3>
                    <p><?= $rl->description ?>...</p>
                    <p><?= $rl->price ?>€</p>
                    <a href="reservation-<?= $rl->id ?>">Voir plus</a>
                    <!-- au clic sur ce bouton, la réservation s'ajoute au planning (table usersreservations) -->
                    <button id="addToPlanning"><i class="fa-solid fa-plus"></i></button>
                </div>
            <?php } ?>
        </div>
    </section>



    </section>
</main>