
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





