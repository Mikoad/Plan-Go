<main>
    <!-- NAVBAR CONV + FORM D'ENVOI MESSAGE -->

    <section class="chatGlobal">
        <div class="nav">
            <div class="return">
                <a href="liste-groupes"><i class="fa-solid fa-chevron-left"></i></a>


            </div>
            <div class="groupName">
                <p>Groupe Famille</p>
            </div>
            <div class="groupSettings">
                <i class="fa-solid fa-gear"></i>
            </div>
        </div>


        <!-- CONTENU DE LA CONVERSATION (TYPE MESSENGER) -->
        <div class="conversation">
            <?php foreach ($messageList as $ml) { ?>
                <div class="talk left">
                    <p><?= $ml->content ?></p>
                </div>
                <p class="hourMessage"><?= $ml->hour ?></p>
            <?php } ?>


            <!-- <div class="talk right">
                <p></p>
            </div> -->
        </div>

        <form action="messagerie" method="POST" class="chatForm">
            <div class="formContainer">

                <div class="groupText">
                    <textarea placeholder="Entrez votre message ici" minlength="1" maxlength="1500" name="content"></textarea>
                </div>
                <input type="submit" value="Envoyer" name="add">


            </div>
        </form>
    </section>



</main>