


import {Users} from "./users";


class UsersAbogado extends Users{

    // Aqui entraría 

    #listTask;
    #connect;

    constructor(name, firstSurname, secondSurname, mail, phone, listTask, connect = false){
        super(name, firstSurname, secondSurname, mail, phone)
        this.#listTask = this.getListTask();
        this.#connect = this.getConect();

    }

    getTokensSesion(tokensSesion){
        // Aquí se obtiene un tokens de inicio sesión
    }

    getConect(conect){
        // Aquí se envia una petición al PHP para comprobar si users está conectado con las credenciales correctas, en caso de afirmativo se cambia a true, lo miraremos en php



    }
}








