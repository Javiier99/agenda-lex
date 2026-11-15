<?php



    class Tareas{

        protected string $tituloTarea;
        protected string $descripcionTarea;
        protected string $dificultadTarea;
        protected bool $completarTarea;
        protected $fechaTareaLimite;

        public function __construct($tituloTarea, $descripcionTarea,  $dificultadTarea, $fechaTareaLimite, $completarTarea = false){
            $this->tituloTarea = $tituloTarea;
            $this->descripcionTarea = $descripcionTarea;
            $this->dificultadTarea = $dificultadTarea;
            $this->completarTarea = $completarTarea;
            $this->fechaTareaLimite = $fechaTareaLimite;
        }




    }


?>