<?php 
require_once 'views/parts/header.php';
$title = 'Recherche';
?>
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
                <option value="" selected disabled>Activité</option>
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
        </div>
    </section>

    <section class="suggestions">
        <div>

        </div>
    </section>
</main>