<main>

    <section class="updateRes">
        <h1>Paramètres réservation</h1>


        <div class="updateForm">
            <h2>Modifier</h2>

            <form action="modifier-réservations" method="POST" enctype="multipart/form-data">
                <label for="reservation_id">Réservation à modifier</label>
                <select name="reservation_id" id="reservation_id">
                    <?php foreach ($reservationList as $rl) { ?>
                        <option value="<?= $rl->id ?>"><?= $rl->name ?></option>
                    <?php } ?>
                </select>

                <label for="name">Titre de la réservation</label>
                <input type="text" name="name" id="name">
                <?php if (isset($formErrors['name'])) { ?>
                    <p class="error"><?= $formErrors['name'] ?></p>
                <?php } ?>


                <label for="description">Description de la réservation</label>
                <input type="text" name="description" id="description">
                <?php if (isset($formErrors['description'])) { ?>
                    <p class="error"><?= $formErrors['description'] ?></p>
                <?php } ?>

                <label for="price">Prix</label>
                <input type="text" name="price" id="price">
                <?php if (isset($formErrors['price'])) { ?>
                    <p class="error"><?= $formErrors['price'] ?></p>
                <?php } ?>

                <label for="image">Choisir un fichier</label>
                <input type="file" name="image" id="image">
                <?php if (isset($formErrors['image'])) { ?>
                    <p class="error"><?= $formErrors['image'] ?></p>
                <?php } ?>

                <label for="id_reservationsSubTypes">Sous catégorie</label>
                <select name="id_reservationsSubTypes" id="id_reservationsSubTypes">
                    <?php foreach ($subTypeList as $subTypeItem) { ?>
                        <option value="<?= $subTypeItem->id ?>"><?= $subTypeItem->name ?></option>
                    <?php } ?>
                </select>

                <label for="id_cities">Ville</label>
                <select name="id_cities" id="id_cities">
                    <?php foreach ($citiesList as $citiesItem) { ?>
                        <option value="<?= $citiesItem->id ?>"><?= $citiesItem->name ?> - <?= $citiesItem->zipCode ?></option>
                    <?php } ?>
                </select>

                <input type="submit" value="Modifier" name="update">
            </form>
        </div>

        <div class="deleteForm">
            <h2>Supprimer</h2>

            <form action="modifier-réservations" method="POST">
                <label for="reservationDelete">Réservation à supprimer</label>
                <select name="reservationDelete" id="reservationDelete">
                    <?php foreach ($reservationList as $rl) { ?>
                        <option value="<?= $rl->id ?>"><?= $rl->name ?></option>
                    <?php } ?>
                </select>
                <input type="submit" name="delete" value="Supprimer">
            </form>
        </div>
    </section>
</main>