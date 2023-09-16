<form action="réservations" method="POST" enctype="multipart/form-data">
    <label for="name">Titre de la réservation</label>
    <input type="text" name="name" id="name">

    <label for="description">Description de la réservation</label>
    <input type="text" name="description" id="description">

    <label for="price">Prix</label>
    <input type="text" name="price" id="price">

    <label for="image">Choisir un fichier</label>
    <input type="file" name="image" id="image">

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

    <input type="submit" value="Soumettre" name="add">
</form>