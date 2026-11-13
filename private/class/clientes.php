<?php

    require_once __DIR__ . '/persona.php';

    class Usuarios extends Persona{
        protected int $id;
        protected string $empresa;
        protected string $dniNif;
        protected $listaTareas;
        protected bool $completarCliente;

        public function __construct($id, $nombre = "", $apellidos = "", $correo = "", $telefono = "", $empresa = "", $dniNif = "", $listaTareas = [], $completarCliente = false){
            parent::__construct($id, $nombre, $apellidos, $correo, $telefono);
            $this->empresa = (string) trim($empresa) ;
            $this->dniNif = (string) trim($dniNif);
            $this->listaTareas = $listaTareas;
            $this->completarCliente = $completarCliente;
        }

        // Obtener los datos

        public function getEmpresa(): string {return $this->empresa; }
        public function getDniNif(): string {return $this->dniNif; }
        public function getListaTareas() {return $this->listaTareas; }
        public function getCompletarCliente(): string {return $this->completarCliente; }

        // Métodos

        public function setCompletarCliente(){
            $this->completarCliente = true;
        }
        public function setNoCompletarCliente(){
            $this->completarCliente = false;
        }

        public function setActualizarCliente($nombre, $apellidos, $correo, $telefono, $empresa, $dniNif, $completarCliente){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->correo = $correo;
            $this->telefono = $telefono;
            $this->empresa = $empresa;
            $this->dniNif = $dniNif;
            $this->completarCliente = $completarCliente;
        }

        public function crearTarea($tituloTarea, $descripcionTarea, $dificultadTarea){
            require_once __DIR__ . '/tareas.php';
            $nuevaTarea = new Tareas($id, $tituloTarea, $descripcionTarea, $dificultadTarea);
            array_push($this->listaTareas, $nuevaTarea);
        }

        public function getVerTodasTareas(){
            // debe de conectarse a la base de datos y así poder ver todas las tareas que tiene cada cliente
        }



    }
















?>