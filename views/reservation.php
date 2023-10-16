<!-- View de la réservation seule sur une page -->
<main>
    <section class="reservationDetails">

        <div class="reservation">
            <div class="imgReservation">
                <div class="title-add">
                    <h2><?= $reservationById->name ?></h2>
                    <button id="addToPlanning"><i class="fa-solid fa-plus"></i></button>
                </div>

                <img src="<?= $reservationById->image ?>" alt="<?= $reservationById->name ?>">
            </div>
            <div class="description">
                <h3>A propos</h3>
                <p><?= $reservationById->description ?></p>
                <p>A partir de <span><?= $reservationById->price ?>€</span></p>

            </div>

        </div>




    </section>
</main>