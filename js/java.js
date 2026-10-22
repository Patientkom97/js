let apprenant = 0;
const liste = document.querySelectorAll('.liste');
const button = document.getElementById('afficher');

button.addEventListener('click', () => {
    if (apprenant < liste.length) {
        liste[apprenant].style.display = 'block';
        apprenant++;
    }
});


