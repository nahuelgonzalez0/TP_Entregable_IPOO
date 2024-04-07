<?php
class Viaje {
    private $codigo;
    private $destino;
    private $cantidadMaxPasajeros;
    private $coleObjPasajero; // Arreglo de la coleccion de pasajeros
    private $objResponsableViaje; // Objeto responsable del viaje

    //metodo constructor
    public function __construct($codigo,$destino,$cantidadMaxPasajeros,$coleObjPasajero,$objResponsableViaje){
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantidadMaxPasajeros = $cantidadMaxPasajeros;
        $this->coleObjPasajero = $coleObjPasajero;
        $this->objResponsableViaje = $objResponsableViaje;
    }

    //metodo de acceso

    public function getCodigo (){
        return  $this->codigo;
    }

    public function getDestino (){
        return  $this->destino;
    }

    public function getCantidadMaxPasajeros (){
        return  $this->cantidadMaxPasajeros;
    }

    public function getColeObjPasajero (){
        return  $this->coleObjPasajero;
    }

    public function getObjResponsableViaje (){
        return  $this->objResponsableViaje;
    }

    //metodo de modificacion
    public function setCodigo ($codigo){
        $this->codigo = $codigo;
    }

    public function setDestino ($destino){
        $this->destino = $destino;
    }

    public function setCantidadMaxPasajeros ($cantidadMaxPasajeros){
        $this->cantidadMaxPasajeros = $cantidadMaxPasajeros;
    }

    public function setColeObjPasajero ($coleObjPasajero){
        $this->coleObjPasajero = $coleObjPasajero;
    }

    public function setObjResponsableViaje ($objResponsableViaje){
        $this->objResponsableViaje = $objResponsableViaje;
    }

    //metodos

    public function imprimirPasajeros(){
        $pasajero = "";
        $arregloPasajeros = $this->getColeObjPasajero();
        foreach ($arregloPasajeros as $pasajeroActual) {
            $pasajero .= $pasajeroActual ."\n";
        }
        return $pasajero;
    }

    public function __toString(){
        return "Codigo de viaje: " .$this->getCodigo() . "\nDestino: " .$this->getDestino() . "\nCantidad maxima de pasajeros: " .$this->getCantidadMaxPasajeros() .
        "\nPasajeros del viaje: " .$this->imprimirPasajeros() . "\nResponsable del viaje: " .$this->objResponsableViaje();
    }
    
}