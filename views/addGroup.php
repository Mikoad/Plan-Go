<main>
    <h1>Créez votre groupe</h1>
    <form action="ajout-groupe" method="POST">
        <label for="name">Nom du groupe</label>
        <input type="text" name="name" id="name">

        <label for="description">Description du groupe</label>
        <textarea name="description" id="description" cols="30" rows="2"></textarea>


        <!-- <div class="groupMember">
            <label for="members">Membres du groupe</label>
            <div id="addMember"><i class="fa-solid fa-plus"></i></div>
        </div> -->

        <label for="members">Membres du groupe</label>
        <input type="email" name="email[]" id="members[]">
        <input type="email" name="email[]" id="members[]">
        <input type="email" name="email[]" id="members[]">

        <!-- voir pour js input -->
        <input type="submit" value="Créer" name="add">
    </form>
</main>
<!-- NAVBAR CONV + FORM D'ENVOI MESSAGE
        
    <div class="chatGlobal">
        <div class="nav">
            <div class="return">
                <i class="fa-solid fa-chevron-left"></i>
                <p>Retour</p>
            </div>
            <div class="groupName">
                <p>Groupe Famille</p>
            </div>
            <div class="groupSettings">
                <i class="fa-solid fa-gear"></i>
            </div>
        </div>

        
        <form action="" class="chatForm">
            <div class="formContainer">
                <div class="proposition">
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="groupText">
                    <textarea placeholder="Entrez votre message ici" minlength="1" maxlength="1500" id=""></textarea>
                </div>
                <button class="submitBtn">
                    <i class="fa-regular fa-paper-plane"></i>
                </button>
            </div>
        </form>
    </div> -->
<!-- CONTENU DE LA CONVERSATION (TYPE MESSENGER)
    
<div class="conversation">
            <div class="talk left">
                <img src="../assets/img/group/avatar2.jpg" alt="">
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="talk right">
                <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia cumque tenetur dolores rerum commodi numquam ea excepturi autem! Quisquam, distinctio!.</p>
                <img src="../assets/img/group/avatar1.jpg" alt="">
            </div>
            <div class="talk left">
                <img src="../assets/img/group/avatar2.jpg" alt="">
                <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicincati excepturi illo aliquid laboriosam quaerat, inventore modi pariatur cupiditate e blanditiis sint ullam autem, suscipit dignissimos cumque.</p>
            </div>
            <div class="talk right">
                <p>Lorem ipsum dolor sit amet.</p>
                <img src="../assets/img/group/avatar1.jpg" alt="">
            </div>
        </div> -->