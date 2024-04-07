<?php
class objResponsableViaje {
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    //metodo constructor
    public function __construct($numEmpleado, $numLicencia, $nombre, $apellido){
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    //metodo de acceso

    public function getNumEmpleado (){
        return $this->numEmpleado;
    }

    public function getNumLicencia (){
        return $this->numLicencia;
    }

    public function getNombre (){
        return $this->nombre;
    }

    public function getApellido (){
        return $this->apellido;
    }

    //metodo de modificacion

    public function setNumEmpleado ($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }

    public function setNumLicencia ($numLicencia){
        $this->numLicencia = $numLicencia;
    }

    public function setNombre ($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido ($apellido){
        $this->apellido = $apellido;
    }

    //metodos

    public function __toString(){
        return "Numero de empleado: " .$this->getNumeroEmpleado() . "\nNumero de licencia: " .$this->getNumeroLicencia() .
        "\nNombre: " .$this->getNombre() . "\nApellido: "  .$this->getApellido();
    }
}