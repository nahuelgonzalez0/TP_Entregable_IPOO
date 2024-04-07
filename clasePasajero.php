<?php
class Pasajero {
    private $nombre;
    private $apellido;
    private $numDocumento;
    private $telefono;
    //metodo constructor
    public function __construct($nombre, $apellido, $numDocumento, $telefono){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDocumento = $numDocumento;
        $this->telefono = $telefono;
    }

    //metodo de acceso
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getNumDocumento() {
        return $this->numDocumento;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    //metodo de modificacion
    public function setNombre ($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido ($apellido){
        $this->apellido = $apellido;
    }

    public function setNumDocumento ($numDocumento){
        $this->numDocumento = $numDocumento;
    }

    public function setTelefono ($telefono){
        $this->telefono = $telefono;
    }

    //metodos

    public function __toString(){
        return "Nombre: " . $this->getNombre() . "\nApellido: " . $this->getApellido() . 
        "\nNumero de documento: " . $this->getNumDocumento() . "\nTelefono: " . $this->getTelefono();
    }
}