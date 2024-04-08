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

    public function cambiarResponsable($numLicencia,$nuevoNumEmpleado,$nuevoNombre,$NuevoApellido){
        $responsable = $this->getObjResponsableViaje();
            $responsable->setNumEmpleado($nuevoNumEmpleado);
            $responsable->setNombre($nuevoNombre);
            $responsable->setApellido($NuevoApellido);
    }

    public function cambiarPasajero($dniPasajero,$nuevoNombre,$nuevoApellido,$NuevoTelefono){
        $res = false;
        $pasajeros = $this->getColeObjPasajero();
        foreach ($pasajeros as $pasajero) {
           if ($pasajero->getNumDocumento() === $dniPasajero) {
            $pasajero->setNombre($nuevoNombre);
            $pasajero->setApellido($nuevoApellido);
            $pasajero->setTelefono($NuevoTelefono);
            $res = true;
           }
        }
        return $res;
    }

    public function agregarPasajero($pasajero){
        $arregloPasajeros = $this->getColeObjPasajero();
        $pasajeroRepetido = false;

        //verificar si el pasajero ya existe en la coleccion
        foreach ($arregloPasajeros as $pasajeroActual) {
            if ($pasajeroActual->getNumDocumento() === $pasajero->getNumDocumento()) {
                $pasajeroRepetido = true;
                break;
            }
        }
        $cantActualPasajero = count($this->getColeObjPasajero());
        //verificar si se puede agregar el pasajero al viaje
        $cambiarPasajero = false;
        if ($cantActualPasajero < $this->getCantidadMaxPasajeros() && !$pasajeroRepetido) {
            array_push($arregloPasajeros, $pasajero);
           $this->setColeObjPasajero($arregloPasajeros);
           $cambiarPasajero = true;
        }
        return $cambiarPasajero;
    }

    public function imprimirPasajeros(){
        $pasajero = "";
        $arregloPasajeros = $this->getColeObjPasajero();
        foreach ($arregloPasajeros as $pasajeroActual) {
            $pasajero .= $pasajeroActual ."\n";
        }
        return $pasajero;
    }

    public function __toString(){
        $pasajero = $this->imprimirPasajeros();
        if ($pasajero === "") {
            $pasajero = 0;
        }
        return "Codigo de viaje: " .$this->getCodigo() . "\nDestino: " .$this->getDestino() . "\nCantidad maxima de pasajeros: " .$this->getCantidadMaxPasajeros() .
        "\nPasajeros del viaje:\n" .$pasajero . "\nResponsable del viaje:\n" .$this->getObjResponsableViaje();
    }
}