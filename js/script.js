// const empouleAllumée = document.getElementById('allumée');
// const empouleEteinte = document.getElementById('etteinte');
// const texte = document.getElementById('annoncer');
// function allumer() {
//     texte.textContent = "L'ampoule est allumée";
// }
// empouleAllumée.addEventListener('dblclick', allumer);

// function eteindre() {
//     texte.textContent = "L'ampoule est éteinte";
// }
// empouleEteinte.addEventListener('click', eteindre);


const compteur = document.getElementById('compteur');
const plus = document.getElementById('plus');
const zero = document.getElementById('zero');
const moins = document.getElementById('moins');
let number = 0;
function augmenter() {
    number = number + 1;
    compteur.textContent = number;
}
function diminuer() {
    number = number - 1;
    compteur.textContent = number;
}
function remettreAZero() {
    number = 0;
    compteur.textContent = number;
}
plus.addEventListener('click', augmenter);
moins.addEventListener('click', diminuer);
zero.addEventListener('click', remettreAZero);