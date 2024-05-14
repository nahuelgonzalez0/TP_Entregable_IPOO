<?php
class Pasajero {
    private $nombre;
    private $apellido;
    private $numDocumento;
    private $telefono;
    private $numAsiento;
    private $numTicket;
    //metodo constructor
    public function __construct($nombre, $apellido, $numDocumento, $telefono, $numAsiento, $numTicket){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numDocumento = $numDocumento;
        $this->telefono = $telefono;
        $this->numAsiento = $numAsiento;
        $this->numTicket = $numTicket;
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

    public function getNumAsiento() {
        return  $this->numAsiento;
    }

    public function getNumTicket() {
        return $this->numTicket;
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

    public function setNumAsiento($numAsiento) {
        $this->numAsiento = $numAsiento;
    }

    public function setNumTicket($numTicket) {
        $this->numTicket = $numTicket;
    }

    //metodos

    public function __toString(){
        return "Nombre: ".$this->getNombre(). 
        "\nApellido: " . $this->getApellido(). 
        "\nNumero de documento: ".$this->getNumDocumento().
        "\nTelefono: " . $this->getTelefono().
        "\nNumero de asiento: " . $this->getNumAsiento().
        "\nNumero de ticket : " . $this->getNumTicket();
    }
}