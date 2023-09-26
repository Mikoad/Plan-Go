let carousel = document.getElementById('carousel');
if (carousel != null) {
    // carousel presentation - Homepage
    let index = 0;
    function shifLeft(c) {
        let content = document.querySelector('.content');
        let title = document.querySelector('.title');
        let paragraph = document.querySelector('.paragraph');

        title.classList.add('shiftLeft');
        paragraph.classList.add('shiftLeft');

        // setTimeout(() => {
        //     title.textContent = 'Trouvez ce qui vous plaît';
        //     paragraph.textContent = "Plan&Go vous permet d'organiser vos vacances de manière simple et rapide.Faîtes toutes vos réservations d'activités, de logements et de séances bien être au même endroit. Plan&Go vous permet d'organiser vos vacances de manière simple et rapide. Faîtes toutes vos réservations d'activités, de logements et de séances bien être au même endroit. Plan&Go vous permet d'organiser vos vacances de manière simple et rapide. Faîtes toutes vos réservations d'activités, de logements et de séances bien être au même endroit.";
        //     title.classList.remove('shiftLeft');
        //     paragraph.classList.remove('shiftLeft');
        // }, 500);
        setTimeout(() => {
            title.textContent = c.title;
            paragraph.textContent = c.text;
            title.classList.remove('shiftLeft');
            paragraph.classList.remove('shiftLeft');
        }, 700);

    };

    let contenus = [
        { title: "Présentation", text: "Plan&Go vous permet d'organiser vos vacances de manière simple et rapide. Faîtes toutes vos réservations d'activités, de logements et de séances bien être au même endroit.  " },
        { title: 'Trouvez ce qu\'il vous plaît', text: "Notre site de planification de vacances vous simplifie la recherche. Trouvez votre destination idéale grâce à notre outil de recherche intuitif avec suggestions et filtres personnalisés." },
        { title: 'Discutez entre amis', text: "Organisez des voyages en groupe sans stress. Créez des groupes pour partagez les frais, discuter de vos vacances et planifiez ensemble." },
        { title: 'Créez votre planning', text: "Organisez votre voyage en toute simplicité avec des planning personnels ou de groupe et gardez le contrôle sur vos journées d'excursions et vos moments de détente.." }

    ];


    carousel.addEventListener('click', () => {
        shifLeft(contenus[index]);
        index++;
        if (index >= contenus.length) {
            index = 0;
        };
    });
}

// let groupMember = document.querySelector('.groupMember');
// let addMember = document.getElementById('addMember');

// let newInput = document.createElement('input', { type: 'email', name: 'email[]' })
// addMember.addEventListener("click", () => {
//     console.log('test')
//     groupMember.appendChild(newInput);
// });


//display update forms
let updateBtn = document.getElementById("update");
if (updateBtn != null) {

    let updateUser = document.querySelector(".updateUser");
    updateBtn.addEventListener("click", () => {
        // if (updateUser.style.display === "none") {
        //     updateUser.style.display = "block";
        // } else {
        //     updateUser.style.display = "none";
        // }
        alert("ok");

    })
}





// burger menu
// let icons = document.getElementById('icons');
// let nav = document.getElementById('nav');
// icons.addEventListener("click", () => {
//     nav.classList.toggle("active");
// })
//add group members

