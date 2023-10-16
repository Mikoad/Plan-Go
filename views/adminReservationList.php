<main>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Description</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservationList as $rl) { ?>
                <tr>
                    <td><?= $rl->name ?></td>
                    <td><?= $rl->price ?></td>
                    <td><?= $rl->description ?></td>
                    <td><a href="modifier-réservation-<?= $rl->id ?>">Modifier</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>