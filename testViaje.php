<?php
include_once 'claseResponsableViaje.php';
include_once 'clasePasajero.php';
include_once 'claseViaje.php';
include_once 'clasePasajeroEspecial.php';
include_once 'clasePasajeroVip.php';
//$objResponsable = new Responsable (12,193,"Javier","Gutierrez");
$objResponsable = null;
$objColeccionPasajero = [];
$viaje = new Viaje(123,"miami", 5, $objColeccionPasajero, $objResponsable,500,0);

function datosPasajero (){
    $dato = trim(fgets(STDIN));
    return $dato;
}

function pedidosPasajeroEspecial (){
    $pedido = trim(fgets(STDIN));
    $res = false;
    if ($pedido === "si") {
       $res = true;
    }
    return $res;
}

$salir = true;

do {
    echo "\n1. Agregar pasajero\n";
    echo "2. Agregar pasajero vip\n";
    echo "3. Agregar pasajero especial\n";
    echo "4. Ver viaje\n";
    echo "5. Cambiar pasajero\n";
    echo "6. Cambiar pasajero vip\n";
    echo "7. Cambiar pasajero especial\n";
    echo "8. ingresar Responsable del viaje\n";
    echo "9. Cambiar Responsable del viaje\n";
    echo "10. Salir\n";
    echo "Ingrese una opcion: ";
    $opcion = datosPasajero();
switch ($opcion) {
        case 1:
           $verificarLugar = $viaje->hayPasajesDisponible();
            if ($verificarLugar) {
                echo "Ingrese el nombre del pasajero: ";
                $nombre = datosPasajero();
                echo "Ingrese el apellido del pasajero: ";
                $apellido = datosPasajero();
                echo "Ingrese el numero de documento del pasajero: ";
                $numeroDocumento = datosPasajero();
                echo "Ingrese el numero telefonico del pasajero: ";
                $telefono = datosPasajero();
                echo "Ingrese el numero de asiento del pasajero: ";
                $numAsiento = datosPasajero();
                echo "Ingrese el numero de ticket del pasajero: ";
                $numTicket = datosPasajero();
                $objColeccionPasajero = new Pasajero ($nombre,$apellido,$numeroDocumento,$telefono,$numAsiento,$numTicket);
                $resultadoCambiarPasajero = $viaje->agregarPasajero($objColeccionPasajero);
                if ($resultadoCambiarPasajero) {
                    echo "El usuario ha sigo cargado";
                } else{
                    echo "El usuario esta repetido";
                }
            } else {
                echo "El avion ya esta lleno";
            }
        break;

        case 2:
            $verificarLugar = $viaje->hayPasajesDisponible();
            if ($verificarLugar) {
                echo "Ingrese el nombre del pasajero vip: ";
                $nombre = datosPasajero();
                echo "Ingrese el apellido del pasajero vip: ";
                $apellido = datosPasajero();
                echo "Ingrese el numero de documento del pasajero vip: ";
                $numeroDocumento = datosPasajero();
                echo "Ingrese el numero telefonico del pasajero vip: ";
                $telefono = datosPasajero();
                echo "Ingrese el numero de viajero frecuente del pasajero vip: ";
                $numViajeroFrecuente = datosPasajero();
                echo "Ingrese el numero telefonico del pasajero vip: ";
                $telefono = datosPasajero();
                echo "Ingrese el numero de asiento del pasajero vip: ";
                $numAsiento = datosPasajero();
                echo "Ingrese el numero de ticket del pasajero vip: ";
                $numTicket = datosPasajero();
                echo "Ingrese el numero de viajero frecuente del pasajero vip: ";
                $numViajeroFrecuente = datosPasajero();
                echo "Ingrese la cantidad de millas que ha echo pasajero vip: ";
                $cantMillasPasajero = datosPasajero();
                $objColeccionPasajero = new PasajeroVip ($nombre,$apellido,$numeroDocumento,$telefono,$numAsiento,$numTicket,$numViajeroFrecuente,$cantMillasPasajero);
                $resultadoCambiarPasajero = $viaje->agregarPasajero($objColeccionPasajero);
                if ($resultadoCambiarPasajero) {
                    echo "El usuario ha sigo cargado";
                } else{
                    echo "El usuario esta repetido";
                }
            } else {
                echo "El avion ya esta lleno";
            }
        break;

        case 3:
            $verificarLugar = $viaje->hayPasajesDisponible();
            if ($verificarLugar) {
                echo "Ingrese el nombre del pasajero especial: ";
                $nombre = datosPasajero();
                echo "Ingrese el apellido del pasajero especial: ";
                $apellido = datosPasajero();
                echo "Ingrese el numero de documento del pasajero especial: ";
                $numeroDocumento = datosPasajero();
                echo "Ingrese el numero telefonico del pasajero especial: ";
                $telefono = datosPasajero();
                echo "Ingrese el numero de asiento del pasajero especial: ";
                $numAsiento = datosPasajero();
                echo "Ingrese el numero de ticket del pasajero especial: ";
                $numTicket = datosPasajero();
                echo "el pasajero especial necesita un servicio especial? Responder con si o no";
                $servicioEspecial = pedidosPasajeroEspecial();
                echo "el pasajero especial necesita un asistencia? Responder con si o no: ";
                $asistencia = pedidosPasajeroEspecial();
                echo "el pasajero especial tiene alguna restriccion alimentaria? Responder con si o no: ";
                $restriccionAlimentaria = pedidosPasajeroEspecial();
                $objColeccionPasajero = new PasajeroEspecial ($nombre,$apellido,$numeroDocumento,$telefono,$numAsiento,$numTicket,$servicioEspecial,$asistencia,$restriccionAlimentaria);
                $resultadoCambiarPasajero = $viaje->agregarPasajero($objColeccionPasajero);
                if ($resultadoCambiarPasajero) {
                    echo "El usuario ha sigo cargado";
                } else{
                    echo "El usuario esta repetido";
                }
            } else {
                echo "El avion ya esta lleno";
            }
        break;

        case 4:
            echo $viaje;
        break;
        
        case 5;
        if ($objColeccionPasajero = []) {
           echo "Todavia no hay ningun pasajero cargado.\n";
        } else {
            echo "Ingrese el documento del pasajero que quiere modificar: ";
            $documento = datosPasajero();
            echo "Ingrese el nombre del pasajero: ";
            $nombre = datosPasajero();
            echo "Ingrese el apellido del pasajero: ";
            $apellido = datosPasajero();
            echo "Ingrese el telefono del pasajero: ";
            $telefono = datosPasajero();
            $objColeccionPasajero = new Pasajero ($nombre,$apellido,$documento,$telefono);
            $cambiarPersona = $viaje->cambiarPasajero($objColeccionPasajero);
            if ($cambiarPersona) {
                echo "Se ha cambiado correctamente\n";
            } else {
                echo "El pasajero no existe\n";
            }
        }
        break;

        case 6;
        if ($objColeccionPasajero = []) {
           echo "Todavia no hay ningun pasajero cargado.\n";
        } else {
            echo "Ingrese el nombre del pasajero vip: ";
            $nombre = datosPasajero();
            echo "Ingrese el apellido del pasajero vip: ";
            $apellido = datosPasajero();
            echo "Ingrese el numero de documento del pasajero vip: ";
            $numeroDocumento = datosPasajero();
            echo "Ingrese el numero telefonico del pasajero vip: ";
            $telefono = datosPasajero();
            echo "Ingrese el numero de asiento del pasajero vip: ";
            $numAsiento = datosPasajero();
            echo "Ingrese el numero de ticket del pasajero vip: ";
            $numTicket = datosPasajero();
            echo "Ingrese el numero de viajero frecuente del pasajero vip: ";
            $numViajeroFrecuente = datosPasajero();
            echo "Ingrese la cantidad de millas que ha echo pasajero vip: ";
            $cantMillasPasajero = datosPasajero();
            $objColeccionPasajero = new Pasajero ($nombre,$apellido,$numeroDocumento,$telefono,$numAsiento,$numTicket,$numViajeroFrecuente,$cantMillasPasajero);
            $cambiarPersona = $viaje->cambiarPasajero($objColeccionPasajero);
            if ($cambiarPersona) {
                echo "Se ha cambiado correctamente\n";
            } else {
                echo "El pasajero no existe\n";
            }
        }
        break;

        case 7;
        if ($objColeccionPasajero = []) {
           echo "Todavia no hay ningun pasajero cargado.\n";
        } else {
            echo "Ingrese el nombre del pasajero especial: ";
            $nombre = datosPasajero();
            echo "Ingrese el apellido del pasajero especial: ";
            $apellido = datosPasajero();
            echo "Ingrese el numero de documento del pasajero especial: ";
            $numeroDocumento = datosPasajero();
            echo "Ingrese el numero telefonico del pasajero especial: ";
            $telefono = datosPasajero();
            echo "Ingrese el numero de asiento del pasajero especial: ";
            $numAsiento = datosPasajero();
            echo "Ingrese el numero de ticket del pasajero especial: ";
            $numTicket = datosPasajero();
            echo "el pasajero especial necesita un servicio especial? Responder con si o no";
            $servicioEspecial = pedidosPasajeroEspecial();
            echo "el pasajero especial necesita un asistencia? Responder con si o no: ";
            $asistencia = pedidosPasajeroEspecial();
            echo "el pasajero especial tiene alguna restriccion alimentaria? Responder con si o no: ";
            $restriccionAlimentaria = pedidosPasajeroEspecial();
            $objColeccionPasajero = new PasajeroEspecial ($nombre,$apellido,$numeroDocumento,$telefono,$numAsiento,$numTicket,$servicioEspecial,$asistencia,$restriccionAlimentaria);
            $cambiarPersona = $viaje->cambiarPasajero($objColeccionPasajero);
            if ($cambiarPersona) {
                echo "Se ha cambiado correctamente\n";
            } else {
                echo "El pasajero no existe\n";
            }
        }
        break;

        case 8:
            if ($objResponsable === null) {
               echo "Ingrese el numero de licencia:\n";
               $licencia = datosPasajero();
               echo "Ingrese el numero de empleado:\n";
               $numeroEmpleado = datosPasajero();
               echo "Ingrese el nombre del empleado:\n";
               $nombre = datosPasajero();
               echo "Ingrese el apellido del empleado:\n";
               $apellido = datosPasajero();
               $objResponsable = new Responsable ($numeroEmpleado,$licencia,$nombre,$apellido);
               $viaje->agregarCambiarResponsable($objResponsable);
            } else {
                echo "Ya existe un responsable del viaje.\n";
            }
        break;

        case 9:
            if ($objResponsable === null) {
                echo "Aun no hay ningun responsable del viaje.\n";
            } else {
            echo "Ingrese el numero de licencia del responsable del viaje que quiere modificar:\n";
            $licencia = datosPasajero();
            $licenciaResponsableActual =  $objResponsable->getNumLicencia();
             // Limpiar espacios en blanco
            $licenciaResponsableActual = trim($licenciaResponsableActual);
            if ($licencia === $licenciaResponsableActual) {
                echo "Ingrese el numero de empleado: ";
                $empleado = datosPasajero();
                echo "Ingrese el nombre del empleado: ";
                $nombre = datosPasajero();
                echo "Ingrese el apellido del empleado: ";
                $apellido = datosPasajero();
                $objResponsableViaje = new Responsable ($empleado,$licencia,$nombre,$apellido);
                $viaje->agregarCambiarResponsable($objResponsableViaje);
            } else {
                echo "El Numero es incorrecto\n";
            }
            } 
        break;

        case 10:
            $salir = false;
        break;
        
        default:
            echo "error, esa opcion no existe";
            break;
    }
} while ($salir);
