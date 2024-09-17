const navbar = document.getElementById('navbar');
const a= document.getElementsByClassName('aes');
document.getElementById('añoactual').textContent = new Date().getFullYear();

//funcion para añadir o remover la clase scrolled segun el tipo de proceso ingresado
//(Se utiliza posteriormente en la lista de eventos)
function toggleClassForAesElements(proceso) {
    for (let i = 0; i < a.length; i++) {
        if (proceso === 'add') {
            a[i].classList.add('scrolled');
        } else if (proceso === 'remove') {
            a[i].classList.remove('scrolled');
        }
    }
}
window.addEventListener('scroll', function() {
    //si el desplazamiento del scroll supera los 50 pixeles
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
        toggleClassForAesElements('add');
    } else {
        navbar.classList.remove('scrolled');
        toggleClassForAesElements('remove');
        }});