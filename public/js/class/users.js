export class Persona{
    #ID;
    #nombre;
    #apellidos;
    #correo
    #telefono;


    constructor(nombre, apellidos, correo, telefono){
        let comprobaciones = comprobarDatos(nombre, apellidos, correo, telefono);
        if(comprobaciones == true){
            this.#nombre = this.getNombre(nombre);
            this.#apellidos = this.getapellidos(apellidos);
            this.#correo = this.getMail(correo);
            this.#telefono = this.getPhone(telefono);
        }else{
            error("Algunos datos no son correctos");
        }


    }


    comprobarDatos(nombre, apellidoUsuario, mail, telefono){ // Tratará de comprobar si los datos son correctos
        let nombreUsuario = String(nombre.trim());
        let apellidoUsuario = String(apellidoUsuario.trim());
        let emailUsuario = String(mail);
        let phoneUsuario = Number(telefono);

        if((nombreUsuario.length != 0) && (apellidoUsuario.length != 0) && (apellido2Usuario.length != 0) && (emailUsuario.includes("@")) && (phoneUsuario.length == 9)){
            return true;
        }else{
            return false;
        }

    }


    getNombre(nombre) {
        let nombreUsuario = String(nombre.trim());
        let obtenerUsarioMayuscula = getPrimeraLetraMayuscula(nombreUsuario);
        return obtenerUsarioMayuscula;

    }

    getapellidos(apellidos){
        let apellidoUsuario = String(apellidos.trim());
        if(apellidoUsuario.length != 0){
            let obtenerUsarioMayuscula = getPrimeraLetraMayuscula(apellidoUsuario);
            return obtenerUsarioMayuscula;
        }else{
            return null;
        }
    }

    getMail(mail){
        let emailUsuario = String(mail);
        if(emailUsuario.includes("@")){
            return emailUsuario;
        }else{
            return null;
        }
    }
    
    getPhone(telefono){
        let telefonoUsuario = Number(telefono);
        if(telefono.length == 9){
            return telefonoUsuario;
        }else{
            return null;
        }

    }

    getPrimeraLetraMayuscula(dato){
        let listaNombre = String(dato).split();
        let extraerPrimeraLetra = listaNombre.splice(0,1);
        let primeraLetraMayuscula = String(extraerPrimeraLetra).toUpperCase();
        let extraerLetrasMinusculas = listaNombre.splice(1,-1);
        let letrasMinusculas = extraerLetrasMinusculas.join().toUpperCase();
        let finalResultado = `${primeraLetraMayuscula}${letrasMinusculas}`;
        return finalResultado;
    }


}