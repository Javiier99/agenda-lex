<?php



    class Tareas{

        protected int $id;
        protected string $tituloTarea;
        protected string $descripcionTarea;
        protected string $dificultadTarea;
        protected bool $completarTarea;

        public function __construct($tituloTarea, $descripcionTarea,  $dificultadTarea, $completarTarea = false){
            $this->tituloTarea = $tituloTarea;
            $this->descripcionTarea = $descripcionTarea;
            $this->dificultadTarea = $dificultadTarea;
            $this->completarTarea = $completarTarea;
        }




    }


?>