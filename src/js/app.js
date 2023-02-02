// Codigo para dar clic al icono hamburguesa y q paresca el menu
document.addEventListener('DOMContentLoaded', function(){ 
    eventListener();
    darkMode();
})

// para cambiar el tema como javascript todo lo que tiene dark-mode
function darkMode() {

    // linea para saber las preferencias del sistema en el modo dark
    // dentro del objeto se llama matches
    const prefiereDarkkMode = window.matchMedia("(prefers-color-scheme: dark)")

    // console.log(prefiereDarkkMode.matches);  // aca para ver si esta funcionando

    // if en la parte del si agrega la class dark-mode en el else la quita
     if (prefiereDarkkMode.matches) {
        document.body.classList.add('dark-mode');
     } else {
        document.body.classList.remove('dark-mode');  
     }


     // por si el usuario hace el cambio dsd el sistema y que se actualice solo
     prefiereDarkkMode.addEventListener("change", function() { // change dice que escucha por un cambio
        if (prefiereDarkkMode.matches) {
            document.body.classList.add('dark-mode');
         } else {
            document.body.classList.remove('dark-mode');  
         }
    
     }) 



    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function() {
            // para que lo agrege en el body
            document.body.classList.toggle('dark-mode');
    });  
}


function eventListener() {
    // creamos un selector al CSS
    const  mobilMenu = document.querySelector('.mobile-menu');
// aca dice que vamos a escuchar por un clic osea al dar clic a la imagen
// le pasamos solamente el nombre de la funcion q va a realizar
    mobilMenu.addEventListener('click', navegacionResponsive)
}

function navegacionResponsive(){
    // aca manipulo el CSS con javascript
    const navegacion = document.querySelector('.navegacion');
   // esto va agregar una class dsd javascript al HTML
   navegacion.classList.toggle('mostrar')

}