<?php
 require_once 'Conexion.php';
 class Alumno {
    private $id;
    private $matricula;
    private $nombreCompleto;
    private $correo;
    private $edad;
    const TABLA = 'alumnos';
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
    public function guardar(){
        $conexion = new Conexion();
        if($this->Id) /*Modifica*/ {
           $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET Matricula = :Matricula, NombreCompleto = :NombreCompleto, Correo = :Correo, Edad = :Edad WHERE Id = :Id');
           $consulta->bindParam(':Matricula', $this->Matricula);
           $consulta->bindParam(':NombreCompleto', $this->NombreCompleto);
           $consulta->bindParam(':Correo', $this->Correo);
           $consulta->bindParam(':Edad', $this->Edad);
           $consulta->bindParam(':Id', $this->Id);
           $consulta->execute();
        }else /*Inserta*/ {
           $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (Matricula, NombreCompleto, Correo, Edad) VALUES(:Matricula, :NombreCompleto, :Correo, :Edad)');
           $consulta->bindParam(':Matricula', $this->Matricula);
           $consulta->bindParam(':NombreCompleto', $this->NombreCompleto);
           $consulta->bindParam(':Correo', $this->Correo);
           $consulta->bindParam(':Edad', $this->Edad);
           $consulta->execute();
           $this->Id = $conexion->lastInsertId();
        }
        $conexion = null;
    }
    public static function buscarPorId($id){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT Matricula, NombreCompleto, Correo FROM ' . self::TABLA . ' WHERE Id = :Id');
        $consulta->bindParam(':Id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
        if($registro){
            return new self($registro['Matricula'],$registro['NombreCompleto'], $registro['Correo'], $id);
        }else{
           return false;
        }
    }

    public static function RecuperarTodos(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT Id,Matricula, NombreCompleto, Correo, Edad FROM ' . self::TABLA . ' ORDER BY NombreCompleto');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
     }
}
?>