<?php
include_once "clasePasajero.php";
class PasajeroEspecial extends Pasajero {
    private $servicioEspecial; //boolean
    private $asistencia; //boolean
    private $restriccionesAlimentarias; //boolean
    //construct
    public function __construct($nombre, $apellido, $numDocumento, $telefono, $numAsiento, $numTicket, $servicioEspecial, $asistencia, $restriccionesAlimentarias){
        parent::__construct($nombre, $apellido, $numDocumento, $telefono, $numAsiento, $numTicket);
        $this->servicioEspecial = $servicioEspecial;
        $this->asistencia = $asistencia;
        $this->restriccionesAlimentarias = $restriccionesAlimentarias;
    }
    
    //metodo de acceso
    public function getServicioEspecial(){
        return  $this->servicioEspecial;
    }

    public function getAsistencia(){
        return  $this->asistencia;
    }

    public function getRestriccionesAlimentarias(){
        return  $this->restriccionesAlimentarias;
    }

    //metodos

    public function darPorcentajeIncremento(){
        $incremento = 0.10;
        $servicioEspecial = $this->getServicioEspecial();
        $asistencia = $this->getAsistencia();
        $comidaEspecial = $this->getRestriccionesAlimentarias();

        if ($servicioEspecial && $asistencia && $comidaEspecial) {
            $incremento = 0.30;
        }
        return $incremento;
    }
    public function __toString(){
        $parent = parent::__toString();
        return "Servicio especial: ".$this->getServicioEspecial().
        "\nAsistencia: ".$this->getAsistencia().
        "\nRestriccion de alguna comida: ".$this->getRestriccionesAlimentarias().
        $parent;
    }
}