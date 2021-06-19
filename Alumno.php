<?php
 require_once 'Conexion.php';
 class Alumno {
    private $id;
    private $matricula;
    private $nombreCompleto;
    private $correo;
    private $edad;
    const TABLA = 'alumno';
    public function getId() {
        return $this->Id;
     }
     public function getMatricula() {
        return $this->Matricula;
     }
     public function getNombreCompleto() {
        return $this->NombreCompleto;
     }
     public function getCorreo() {
        return $this->Correo;
     }
     public function getEdad() {
        return $this->Edad;
     }
     public function setMatricula($matricula) {
        $this->Matricula = $matricula;
     }
     public function setNombreCompleto($nombreCompleto) {
        $this->NombreCompleto = $nombreCompleto;
     }
     public function setCorreo($correo) {
        $this->Correo = $correo;
     }
     public function setEdad($edad) {
        $this->Edad = $edad;
     }
    public function __construct($matricula, $nombreCompleto, $correo, $edad, $id=null) {
       $this->Matricula = $matricula;
       $this->NombreCompleto = $nombreCompleto;
       $this->Correo = $correo;
       $this->Edad = $edad;
       $this->Id = $id;
    }
 }
?>