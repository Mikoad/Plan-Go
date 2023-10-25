//ajouter une réservation dans le planning de l'utilisateur au clic sur un bouton

let addToPlanning = document.querySelectorAll('.addToPlanning');
//si la variable addToPlanning existe
if (addToPlanning != undefined) {
    //pour chaque élément du tableau addToPlanning
    for (let add of addToPlanning) {
        //ajoute un évènement au click
        add.addEventListener("click", () => {

            //je stocke la valeur de reservationId dans la variable id
            let id = add.getAttribute('reservationId');
            //puis j'instancie l'objet XMLHttpRequest
            var xmlhttp = new XMLHttpRequest();
            //je défini une fonction qui sera appelée chaque fois que l'état de la requête HTTP change
            xmlhttp.onreadystatechange = function () {
                //si l'état de la requête = 4 (si la réponse est complète) et si le code de statut HTTP = 200 (si l'état est OK)
                if (this.readyState == 4 && this.status == 200) {
                    //si la réponse de la requête = 1 (si elle est vraie)
                    if (this.responseText == 1) {
                        //je change la couleur du background de add (un bouton) en vert pour indiquer que l'action est réussie
                        add.style.backgroundColor = 'green';
                        add.style.border = "none";
                        let addIcon = add.querySelector('.fa-plus');
                        addIcon.style.color = "white";

                        // let checkIcon = add.parentElement.querySelector('.fa-check');
                        // checkIcon.style.display = 'block';
                        // let addIcon = add.parentElement.querySelector('.fa-plus');
                        // addIcon.style.display = "none";
                    }

                }
            };
            //configuration de la requête HTTP : spécifier le type (GET), l'URL du fichier php avec en paramètre l'id qui correspond à l'id de la réservation
            xmlhttp.open("GET", "controllers/ajaxPlanningController.php?id=" + id, true);
            //envoi de la requête HTTP au serveur
            xmlhttp.send();
        })
    }
}

// carousel presentation - Homepage


let carousel = document.getElementById('carousel');
//si le carousel est présent sur la page
if (carousel != null) {

    let index = 0;
    function shifLeft(c) {
        let content = document.querySelector('.content');
        let title = document.querySelector('.title');
        let paragraph = document.querySelector('.paragraph');
        //ajout de la class shift left pour faire défiler le texte
        title.classList.add('shiftLeft');
        paragraph.classList.add('shiftLeft');
        //délai de 0.7s avant d'executer le code
        setTimeout(() => {
            title.textContent = c.title;
            paragraph.textContent = c.text;
            title.classList.remove('shiftLeft');
            paragraph.classList.remove('shiftLeft');
        }, 700);

    };

    //tableau des différents contenus
    let contenus = [
        { title: "Présentation", text: "Plan&Go vous permet d'organiser vos vacances de manière simple et rapide. Faîtes toutes vos réservations d'activités, de logements et de séances bien être au même endroit.  " },
        { title: 'Trouvez ce qu\'il vous plaît', text: "Notre site de planification de vacances vous simplifie la recherche. Trouvez votre destination idéale grâce à notre outil de recherche intuitif avec suggestions et filtres personnalisés." },
        { title: 'Créez votre planning', text: "Organisez votre voyage en toute simplicité avec des planning personnels et gardez le contrôle sur vos journées d'excursions et vos moments de détente." }

    ];

    //au clic sur bouton carousel, déclenchement de la fonction shiftLeft qui prend en argument le tableau contenu en spécifiant l'index pour afficher les différents contenus
    carousel.addEventListener('click', () => {
        shifLeft(contenus[index]);
        //incrémentation de l'index pour afficher les autres contenus
        index++;
        //si l'index dépasse la longueur du tableau contenu, 
        if (index >= contenus.length) {
            //l'index repasse à 0
            index = 0;
        };
    });
}



//display update forms
let updateBtn = document.getElementById("updateBtn");


let updateUser = document.querySelector(".updateUser");
updateBtn.addEventListener("click", () => {
    if (updateUser.style.display === "none") {
        updateUser.style.display = "flex";
    } else {
        updateUser.style.display = "none";
    }


})


//modal delete account
const openModalBtn = document.getElementById("open-modal-btn");
const closeBtn = document.getElementsByClassName("close-btn");
const modalContainer = document.getElementById("modal-container");
// au clic sur openModalBtn, la modale s'ouvre
openModalBtn.addEventListener("click", function () {
    modalContainer.style.display = "block";
});

for (let btn of closeBtn) {
    // au clic sur le bouton, la modal se ferme
    btn.addEventListener("click", function () {
        modalContainer.style.display = "none";
    });
}
//au clic en dehors de la modale, la modal se ferme
window.addEventListener("click", function (event) {
    if (event.target == modal) {
        modalContainer.style.display = "none";
    }
});





// burger menu
let icons = document.getElementById('icons');

icons.addEventListener("click", () => {
    icons.classList.toggle("active");
})


