<?php
class Viaje {
    private $codigo;
    private $destino;
    private $cantidadMaxPasajeros;
    private $coleObjPasajero; // Arreglo de la coleccion de pasajeros
    private $objResponsableViaje; // Objeto responsable del viaje
    private $costoViaje;
    private $costosAbonados;

    //metodo constructor
    public function __construct($codigo,$destino,$cantidadMaxPasajeros,$coleObjPasajero,$objResponsableViaje,$costoViaje,$costosAbonados){
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantidadMaxPasajeros = $cantidadMaxPasajeros;
        $this->coleObjPasajero = $coleObjPasajero;
        $this->objResponsableViaje = $objResponsableViaje;
        $this->costoViaje = $costoViaje;
        $this->costosAbonados = $costosAbonados;
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

    public function getCostoViaje (){
        return  $this->costoViaje;
    }

    public function getCostosAbonados (){
        return  $this->costosAbonados;
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

    public function setCostoViaje ($costoViaje){
        $this->costoViaje = $costoViaje;
    }

    public function setCostosAbonados ($costosAbonados){
        $this->costosAbonados = $costosAbonados;
    }

    //metodos

    public function cambiarPasajero($objPersona){
        $dniPasajero = $objPersona->getNumDocumento();
        $pasajeros = $this->getColeObjPasajero();
        $contadorPasajeros = count($pasajeros);
        $res = false;
        $i = 0;
        while (!$res && $i<$contadorPasajeros) {
            if ($pasajeros[$i]->getNumDocumento() === $dniPasajero) {
                $pasajeros[$i] = $objPersona;
                $this->setColeObjPasajero($pasajeros);
                $res = true;
            } else {
                $i++;
            }
        }
        return $res;
    }

    public function agregarCambiarResponsable ($objResponsable){
       $this->setObjResponsableViaje($objResponsable);
    }

    public function hayPasajesDisponible(){
        $maxPersonas = $this->getCantidadMaxPasajeros();
        $cantPersonasActuales = count($this->getColeObjPasajero());
        $rta = false;
        if ($cantPersonasActuales < $maxPersonas) {
            $rta = true;
        }
        return $rta;
    }

    public function agregarPasajero($pasajero){
        $arregloPasajeros = $this->getColeObjPasajero();
        $pasajeroRepetido = false;
        $contadorPasajeros = count($arregloPasajeros);
        $i = 0;
        $cambiarPasajero = true;
        //verificar si el pasajero ya existe en la coleccion
        while (!$pasajeroRepetido && $i<$contadorPasajeros) {
            if ($arregloPasajeros[$i]->getNumDocumento() === $pasajero->getNumDocumento()) {
                $pasajeroRepetido = true;
            } else {
                $i++;
            }
        }
        //verificar si se puede agregar el pasajero al viaje
        if (!$pasajeroRepetido) {
            array_push($arregloPasajeros, $pasajero);
           $this->setColeObjPasajero($arregloPasajeros);
        } else{
            $cambiarPasajero = false;
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

    public function venderPasaje($objPasajero){
        $lugarDisponible = $this->hayPasajesDisponible();
        $colePasajeros = $this->getColeObjPasajero();
        $precioPasaje = $this->getCostoViaje();
        $costoAbonado = -1;
        if ($lugarDisponible) {
            $pasajeroNoRepetido = $this->agregarPasajero($objPasajero);
            if ($pasajeroNoRepetido) {
                $porcentajeIncremento = $objPasajero->darPorcentajeIncremento();
                $costoAbonado = $precioPasaje * (1 + $porcentajeIncremento);
                $this->setCostosAbonados($costoAbonado);
            }
        }
        return $costoAbonado;
    }

    public function __toString(){
        $pasajero = $this->imprimirPasajeros();
        if ($pasajero === "") {
            $pasajero = 0;
        }
        return "Codigo de viaje: ".$this->getCodigo().
        "\nDestino: ".$this->getDestino(). 
        "\nCantidad maxima de pasajeros: ".$this->getCantidadMaxPasajeros().
        "\nPasajeros del viaje: \n".$pasajero.
        "\nResponsable del viaje: \n".$this->getObjResponsableViaje().
        "\nCosto del viaje: ".$this->getCostoViaje().
        "\nCostos abonados por el pasajero: ".$this->getCostosAbonados();
    }
}