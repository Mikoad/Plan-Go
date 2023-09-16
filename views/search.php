<main>
    <section class="search">
        <div class="searchBar">
            <label for="search">Recherche</label>
            <input type="search" name="search" id="search" placeholder="Saisissez une ville">
        </div>

        <div class="allSelect">
            <select id="">
                <option value="" selected disabled>Top</option>
                <option value="">Top Activités</option>
                <option value="">Top Logements</option>
                <option value="">Top Bien-être</option>
            </select>
            <select id="">
                <option value="" selected disabled>Activités</option>
                <option value="">De plein air</option>
                <option value="">Culturelles</option>
                <option value="">Sensations fortes</option>
            </select>
            <select id="">
                <option value="" selected disabled>Logements</option>
                <option value="">Hôtels</option>
                <option value="">Camping</option>
                <option value="">Gîtes</option>
            </select>
            <select id="">
                <option value="" selected disabled>Bien-être</option>
                <option value="">Spa</option>
                <option value="">Cures</option>
                <option value="">Retraites</option>
            </select>
            <div id="filterBtn">
                <button><img src="../assets/img/filtre.png" alt="filtres"></button>
            </div>
        </div>
    </section>

    <!-- insérer les réservations via $reservation->getList() -->
    <section class=suggestions>
        <h2>Suggestions</h2>
        <div class="bannerSuggestion">
            <?php foreach ($reservationList as $rl) { ?>
                <div class="cardSuggest">
                    <img src="assets/img/<?= $rl->image ?>" alt="<?= $rl->name ?>">
                    <h3><?= $rl->name ?></h3>
                    <p><?= $rl->description ?></p>
                    <p><?= $rl->price ?>€</p>
                </div>
            <?php } ?>
        </div>
    </section>


    </section>
</main>