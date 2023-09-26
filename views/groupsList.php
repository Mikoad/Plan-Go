<section class="groupsListSection">
    <h1>Vos groupes</h1>
    <div class="groupsList">
        <?php foreach ($groupsList as $gl) { ?>
            <div class="group">
                <h2><?= $gl->name ?></h2>
                <p><?= $gl->description ?></p>
            </div>
        <?php } ?>
    </div>
</section>