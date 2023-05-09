//We store the html elements necessary for the hamburger menu in variables.
menu = document.getElementById('menu');
liste = document.getElementById('liste');
ferme = document.getElementById('ferme');

//We create a function to make the menu appear when we press on the hamburger menu logo.
menu.addEventListener('click', function () {
    liste.style.left = "0px";
})
//We create a function to make the menu disappear when we press the cross of it.
ferme.addEventListener('click', function () {
    liste.style.left = "-256px";
})