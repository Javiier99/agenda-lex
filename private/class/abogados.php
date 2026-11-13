<?php


require_once __DIR__ . "/persona.php";

    class Abogados extends Persona{

        protected $listaCliente;

        public function __construct($id, $nombre, $apellidos, $correo, $telefono, $listaCliente = []){
            parent::__construct($id, $nombre, $apellidos, $correo, $telefono);

            $this->listaCliente = $listaCliente;

        }

            // Obtener dátos
        public function getObtenerListaTareas() { return $this->listaCliente; }

        // Métodos

        public function setBorrarCliente(){
            // Se buscaría en la base de datos y se borraría el cliente, se debe de incluir el ID
        }

        public function setModificarDatosAbogado($id, $nombre, $apellidos, $correo, $telefono){ // Modificar sus propios datos del abogado, utilizando el id, debe de llevarte dodo ello a la base de datos
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->correo = $correo;
            $this->telefono = $telefono;
        }

        public function buscarMostrarCliente($clienteBuscado = ""){
            // Base de datos, conectarla y posteriormente buscar todos aquellos nombres que tengan coherencia
            // Además aprovechamos para mostrar todos los clientes, solo cuando aparece este dato entonces es cuando filtramos
        }

        public function setAñadirNuevoCliente($nombre = "", $apellidos = "", $correo = "", $telefono = "", $empresa = "", $dniNif = ""){

            require_once __DIR__ . '/clientes.php';
            // $stmt = $pdo -> prepare('INSERT INTO')
            // $nuevoCliente = new Usuarios();
            
            // array_push($this->listaCliente, $lista);
            
            
        }

    }

    $abogado1 = new Abogados( "javier", "Delgado", "javier@gmail.com", 432432432, 1, []);

    $abogado1->setAñadirNuevoCliente("Tarea 1");
    $abogado1->setAñadirNuevoCliente("Tarea 2");
    echo "<br><br>";
    $resulto = $abogado1->getObtenerListaTareas();
    foreach($resulto as $loquesea){
        echo $loquesea;
        echo "<br><br>";

    }
    print_r($resulto);



?>