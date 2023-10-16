<main>
    <h1>Paramètres réservation</h1>
    <section class="updateRes">



        <!-- Faire en sorte que l'option Tout du select, affiche toutes les réservations des subtypes correspondant -->
        <h2>Modifier les informations</h2>

        <form action="modifier-réservation-<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">


            <label for="name">Titre de la réservation</label>
            <input type="text" name="name" id="name" value="<?= $reservationInfos->name ?>">
            <?php if (isset($formErrors['name'])) { ?>
                <p class="error"><?= $formErrors['name'] ?></p>
            <?php } ?>


            <label for="description">Description de la réservation</label>
            <input type="text" name="description" id="description" value="<?= $reservationInfos->description ?>">
            <?php if (isset($formErrors['description'])) { ?>
                <p class="error"><?= $formErrors['description'] ?></p>
            <?php } ?>

            <label for="price">Prix</label>
            <input type="text" name="price" id="price" value="<?= $reservationInfos->price ?>">
            <?php if (isset($formErrors['price'])) { ?>
                <p class="error"><?= $formErrors['price'] ?></p>
            <?php } ?>


            <label for="id_reservationsSubTypes">Sous catégorie</label>
            <select name="id_reservationsSubTypes" id="id_reservationsSubTypes">
                <?php foreach ($subTypeList as $subTypeItem) { ?>
                    <option value="<?= $subTypeItem->id ?>" <?= $subTypeItem->id == $reservationInfos->id_reservationsSubTypes ? "selected" : "" ?>><?= $subTypeItem->name ?></option>
                <?php } ?>
            </select>

            <label for="id_cities">Ville</label>
            <select name="id_cities" id="id_cities">
                <?php foreach ($citiesList as $citiesItem) { ?>
                    <option value="<?= $citiesItem->id ?>" <?= $citiesItem->id == $reservationInfos->id_cities ? "selected" : "" ?>><?= $citiesItem->name ?> - <?= $citiesItem->zipCode ?></option>
                <?php } ?>
            </select>

            <input type="submit" value="Modifier" name="update">
        </form>
        <h2>Modifier l'image</h2>
        <form action="modifier-réservation-<?= $_GET['id'] ?>" method="POST">
            <label for="image">Choisir un fichier</label>
            <input type="file" name="image" id="image">
            <?php if (isset($formErrors['image'])) { ?>
                <p class="error"><?= $formErrors['image'] ?></p>
            <?php } ?>
            <input type="submit" value="Modifier" name="updateImg">
        </form>


        <div class="deleteForm">
            <h2>Supprimer</h2>

            <form action="modifier-réservation-<?= $_GET['id'] ?>" method="POST">

                <input type="submit" name="delete" value="Supprimer">
            </form>
        </div>

    </section>
</main>