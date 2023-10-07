<!-- View de la réservation seule sur une page -->
<main>
    <section class="reservationDetails">
        <h2></h2>
        <?php foreach ($reservationById as $r) { ?>
            <div class="reservation">
                <div class="imgReservation">
                    <h2><?= $r->name ?></h2>
                    <img src="<?= $r->image ?>" alt="<?= $r->name ?>">
                </div>
                <div class="description">
                    <h3>A propos</h3>
                    <p><?= $r->description ?></p>
                    <p>A partir de <span><?= $r->price ?>€</span></p>
                    <button id="addToPlanning"><i class="fa-solid fa-plus"></i></button>
                </div>

            </div>




        <?php } ?>
    </section>
</main>