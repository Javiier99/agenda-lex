

// Efectos
const section1 = document.querySelector(".index-main-section1");
const section2 = document.querySelector(".index-main-section2");


const claseEnlace = ".index-main-section1-div2-div-form-div3--registrarse-iniciar-sesion";
const enlaceRegistro = section1.querySelector(claseEnlace);
const enlaceLogin = section2.querySelector(claseEnlace);

const sinAnimacion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
let animando = false;

function cambiarSeccion(salida, entrada, panel) {
    if (animando) return;

    if (sinAnimacion) {
        salida.classList.add("hidden");
        entrada.classList.remove("hidden");
        return;
    }

    animando = true;

    function alTerminar(e) {
        if (e.target !== panel || e.propertyName !== "transform") return;
        panel.removeEventListener("transitionend", alTerminar);

        salida.classList.add("hidden");
        salida.classList.remove("saliendo");

        entrada.classList.add("entrando");
        entrada.classList.remove("hidden");
        void entrada.offsetWidth;
        entrada.classList.remove("entrando");

        animando = false;
    }

    panel.addEventListener("transitionend", alTerminar);
    salida.classList.add("saliendo");
}

enlaceRegistro.addEventListener("click", (e) => {
    e.preventDefault();
    cambiarSeccion(section1, section2, section1.querySelector(".index-main-section1-div1"));
});

enlaceLogin.addEventListener("click", (e) => {
    e.preventDefault();
    cambiarSeccion(section2, section1, section2.querySelector(".index-main-section2-div2"));
});


// Sistema de registro

const formRegistroAbogado = document.getElementById("registro-abogado");

formRegistroAbogado.addEventListener("submit", (e)=>{

    // Cogemos los datos correspondientes:
    const registroNombreAbogado = document.getElementById("nombre-registro");
    const registroApellidoAbogado = document.getElementById("apellidos-registro");
    const registroCorreoAbogado = document.getElementById("email-registro");
    const registroTelefonoAbogado = document.getElementById("telefono-registro");
    const registroPasswordAbogado = document.getElementById("password-registro");
    const registroPasswordComprobarAbogado = document.getElementById("password-registro-comprobar");

    // Lo pasamos a una variable

    let valorRegistroNombreAbogado = String(registroNombreAbogado.value);
    let valorRegistroApellidoAbogado = String(registroApellidoAbogado.value); 
    let valorRegistroCorreoAbogado = String(registroCorreoAbogado.value);
    let valorRegistroTelefonoAbogado = String(registroTelefonoAbogado.value);
    let valorRegistroPasswordAbogado = String(registroPasswordAbogado.value);
    let valorRegistroPasswordComprobarAbogado = String(registroPasswordComprobarAbogado.value);
    let booleanaNumeroTeléfono = /^\d+$/.test(registroTelefonoAbogado.value);
    
    
    // Guardar todos los errores
    let erroresFormulario = [];

    if(valorRegistroNombreAbogado.length < 3){
        erroresFormulario.push("El nombre debe tener más de 2 letras");
    }
    if(valorRegistroApellidoAbogado.length < 3){
        erroresFormulario.push("Ambos apellidos deben tener más de 2 letras");
    }
    if(valorRegistroCorreoAbogado.includes("@") == false || valorRegistroCorreoAbogado.includes(".") == false){
        erroresFormulario.push("El correo falta un @ o su extensión (.com, .es)");
    }
    if(valorRegistroTelefonoAbogado.length != 9 || booleanaNumeroTeléfono == false){
        erroresFormulario.push("El número de teléfono debe de tener exactamente 9 números");
    }
    if((valorRegistroPasswordAbogado.length < 3) || (valorRegistroPasswordAbogado != valorRegistroPasswordComprobarAbogado) || (valorRegistroPasswordAbogado.length == 0)){
        erroresFormulario.push("Las contraseñas no coinciden o debes tener más de 3 caracteres la contraseña");
    }

    if(erroresFormulario.length != 0){
        e.preventDefault();
        // Para todos los errores
        const divErrores = document.querySelector(".index-main-section2-div-div-form-div4-div");
        divErrores.innerHTML = "";

        for(let i = 0; i < erroresFormulario.length; i++){
            const errorRegistroLi = document.createElement("li");
            errorRegistroLi.textContent = erroresFormulario[i];
            errorRegistroLi.classList.add("error");
            errorRegistroLi.classList.add("errorLi");
            divErrores.appendChild(errorRegistroLi);
            
        }

    }

})


