// carousel presentation - Homepage

function shifLeft() {
    let content = document.querySelector('.content');
    let title = document.querySelector('.title');
    let paragraph = document.querySelector('.paragraph');

    title.classList.add('shiftLeft');
    paragraph.classList.add('shiftLeft');

    setTimeout(() => {
        title.textContent = 'Trouvez ce qui vous plaît';
        paragraph.textContent = "Plan&Go vous permet d'organiser vos vacances de manière simple et rapide.Faîtes toutes vos réservations d'activités, de logements et de séances bien être au même endroit. Plan&Go vous permet d'organiser vos vacances de manière simple et rapide. Faîtes toutes vos réservations d'activités, de logements et de séances bien être au même endroit. Plan&Go vous permet d'organiser vos vacances de manière simple et rapide. Faîtes toutes vos réservations d'activités, de logements et de séances bien être au même endroit.";
        title.classList.remove('shiftLeft');
        paragraph.classList.remove('shiftLeft');
    }, 500);

}

// let contenus = [
//     { text: 'Texte 1', title: "Titre 1" },
//     { text: 'Texte 2', title: "Titre 2" },
//     { text: 'Texte 3', title: "Titre 3" },
//     { text: 'Texte 4', title: "Titre 4" },

// ];

// for (let i = 0; i <= contenus.length; i++) {
//     shifLeft(contenus[i].text, contenus[i].title);
// }


let carousel = document.getElementById('carousel');
carousel.addEventListener('click', function () {
    shifLeft();
})


