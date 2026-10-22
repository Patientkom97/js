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
let chiffre = 0;
function augmenter() {
    chiffre = chiffre + 1;
    compteur.textContent = chiffre;
}
function diminuer() {
    chiffre = chiffre - 1;
    compteur.textContent = chiffre;
}
function remettreAZero() {
    chiffre = 0;
    compteur.textContent = chiffre;
}
plus.addEventListener('click', augmenter);
moins.addEventListener('click', diminuer);
zero.addEventListener('click', remettreAZero);