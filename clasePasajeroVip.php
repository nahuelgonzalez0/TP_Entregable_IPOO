<?php
include_once "clasePasajero.php";
class PasajeroVip extends Pasajero {
    private $numViajeroFrecuente;
    private $cantMillasPasajero;
    //construct
    public function __construct($nombre, $apellido, $numDocumento, $telefono, $numAsiento, $numTicket, $numViajeroFrecuente, $cantMillasPasajero){
        parent::__construct($nombre, $apellido, $numDocumento, $telefono, $numAsiento, $numTicket);
        $this->numViajeroFrecuente = $numViajeroFrecuente;
        $this->cantMillasPasajero = $cantMillasPasajero;
    }
    //metodo de acceso
    public function getNumViajeroFrecuente(){
        return  $this->numViajeroFrecuente;
    }

    public function getCantMillasPasajero(){
        return  $this->cantMillasPasajero;
    }
    //metodos
    public function darPorcentajeIncremento(){
        $incremento = 35;
        $cantMillas = $this->getCantMillasPasajero();
        if ($cantMillas > 300) {
            $incremento = 30;
        }
        return $incremento;
    }

    public function __toString(){
        $parent = parent::__toString();
        return "Numero de viajero frecuente: ".$this->getNumViajeroFrecuente().
        "\nCantidad de millas q hizo el pasajero: ".$this->getCantMillasPasajero().
        $parent;
    }
}