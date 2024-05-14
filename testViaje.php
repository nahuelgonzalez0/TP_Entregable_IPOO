<?php
include_once 'claseResponsableViaje.php';
include_once 'clasePasajero.php';
include_once 'claseViaje.php';

//$objResponsable = new Responsable (12,193,"Javier","Gutierrez");
$objResponsable = null;
$objColeccionPasajero = [];
$viaje = new Viaje(123,"miami", 1, $objColeccionPasajero, $objResponsable);

function datosPasajero (){
    $dato = trim(fgets(STDIN));
    return $dato;
}

$salir = true;

do {
    echo "\n1. Agregar pasajero\n";
    //agregar pasajero vip
    //agregar pasajero especial
    echo "2. Ver viaje\n";
    echo "3. Cambiar pasajero\n";
    //Cambiar pasajero vip
    //Cambiar pasajero especial
    echo "4. ingresar Responsable del viaje\n";
    echo "5. Cambiar Responsable del viaje\n";
    echo "6. Salir\n";
    echo "Ingrese una opcion: ";
    $opcion = datosPasajero();
switch ($opcion) {
        case 1:
           $verificarLugar = $viaje->verificarLugar();
            if ($verificarLugar) {
                echo "Ingrese el nombre del pasajero: ";
                $nombre = datosPasajero();
                echo "Ingrese el apellido del pasajero: ";
                $apellido = datosPasajero();
                echo "Ingrese el numero de documento del pasajero: ";
                $numeroDocumento = datosPasajero();
                echo "Ingrese el numero telefonico del pasajero: ";
                $telefono = datosPasajero();
                $objColeccionPasajero = new Pasajero ($nombre,$apellido,$numeroDocumento,$telefono);
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
            echo $viaje;
        break;
        
        case 3;
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

        case 4:
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

        case 5:
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

        case 6:
            $salir = false;
        break;
        
        default:
            echo "error, esa opcion no existe";
            break;
    }
} while ($salir);
