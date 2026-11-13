<?php


    abstract class Persona{ // Evitamos que se cree por error un objeto persona ya que solo sirve para que los hijos hereden
        protected int $id;
        protected string $nombre;
        protected string $apellidos;
        protected string $correo;
        protected int $telefono;

        public function __construct($nombre, $apellidos, $correo, $telefono, $id = null){
            $comprobaciones = $this->comprobarDatos($nombre, $apellidos, $correo, $telefono);
            if($comprobaciones == true){
                $this->id = $id;
                $this->nombre = $this->nombre($nombre);
                $this->apellidos = $this->apellido($apellidos);
                $this->correo = $this->mail($correo);
                $this->telefono = $this->phone($telefono);
            }else{
                throw new InvalidArgumentException("Algunos datos no son correctos");
            }


        }

        private function comprobarDatos($nombre, $apellidos, $correo, $telefono):bool{ // Tratará de comprobar si los datos son correctos
            $nombreUsuario =  trim($nombre);
            $apellidoUsuario = trim($apellidos);
            $emailUsuario =  trim($correo);
            $phoneUsuario = trim($telefono);

            if((strlen($nombreUsuario) != 0) && (strlen($apellidoUsuario) != 0) && (strpos( $emailUsuario, "@") !== false) && (strlen($phoneUsuario) == 9)){
                return true;
            }else{
                return false;
            }

        }
        // Limpiar los datos constructor
        private function nombre($nombre) {
            $nombreUsuario = trim($nombre);
            $obtenerUsarioMayuscula = $this->primeraLetraMayuscula($nombreUsuario);
            return $obtenerUsarioMayuscula;

        }

        private function apellido($apellidos){
            $apellidoUsuario = (string) trim($apellidos);
            $obtenerUsarioMayuscula = $this->primeraLetraMayuscula($apellidoUsuario);
            return $obtenerUsarioMayuscula;

        }

        private function mail($mail){
            $emailUsuario = (string) trim($mail);
            return $emailUsuario;

        }
        
        private function phone($telefono){
            $telefonoUsuario = (int) $telefono;
            return $telefonoUsuario;

        }


        // Obtener los nombres impresos
        public function getNombre(): string { return $this->nombre; }
        public function getApellidos(): string { return $this->apellidos; }
        public function getCorreo(): string { return $this->correo; }
        public function getTelefono(): string { return $this->telefono; }

        // Métodos
        public function modificarDatos($nombre, $apellidos, $correo, $telefono){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->correo = $correo;
            $this->telefono = $telefono;
        }

        public function primeraLetraMayuscula($dato){
            $listaNombre = trim($dato);
            $extraerPrimeraLetra = $listaNombre[0];
            $primeraLetraMayuscula = strtoupper($extraerPrimeraLetra);
            $extraerLetrasMinusculas = substr($listaNombre, 1);
            $letrasMinusculas = strtolower($extraerLetrasMinusculas);
            $finalResultado = "{$primeraLetraMayuscula}{$letrasMinusculas}";
            return $finalResultado;
        }





    }



    // $peronsa1 = new Persona("javier", "Delgado", "javier@gmail.com", 432432432);

    // echo $peronsa1->getNombre();

    // $peronsa1->modificarDatos("pablo", "Delgado", "javier@gmail.com", 432432432);

    // echo $peronsa1->getNombre();






?>