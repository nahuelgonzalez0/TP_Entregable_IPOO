<?php
include_once 'claseResponsableViaje.php';
include_once 'clasePasajero.php';
include_once 'claseViaje.php';

$objResponsable = new Responsable (12,193,"Javier","Gutierrez");
$coleccionPasajero = [];
$viaje = new Viaje(123,"miami", 30, $coleccionPasajero, $objResponsable);

function datosPasajero (){
    $dato = trim(fgets(STDIN));
    return $dato;
}

$salir = true;

do {
    echo "\n1. Agregar pasajero\n";
    echo "2. Ver viaje\n";
    echo "3. Cambiar pasajero\n";
    echo "4. Cambiar Responsable del viaje\n";
    echo "5. Salir\n";
    echo "Ingrese una opcion: ";
    $opcion = datosPasajero();
switch ($opcion) {
        case 1:
            echo "Ingrese el nombre del pasajero: ";
            $nombre = datosPasajero();
            echo "Ingrese el apellido del pasajero: ";
            $apellido = datosPasajero();
            echo "Ingrese el numero de documento del pasajero: ";
            $numeroDocumento = datosPasajero();
            echo "Ingrese el numero telefonico del pasajero: ";
            $telefono = datosPasajero();
            $objPasajero = new Pasajero ($nombre,$apellido,$numeroDocumento,$telefono);
            if ($viaje->agregarPasajero($objPasajero)) {
                echo 'el usuario ha sigo cargado';
            } else {
                echo 'el usuario esta repetido';
            }
        break;

        case 2:
            echo $viaje;
        break;
        
        case 3;
            echo "Ingrese el documento del pasajero que quiere modificar: ";
            $documento = datosPasajero();
            echo "Ingrese el nombre del pasajero: ";
            $nombre = datosPasajero();
            echo "Ingrese el apellido del pasajero: ";
            $apellido = datosPasajero();
            echo "Ingrese el telefono del pasajero: ";
            $telefono = datosPasajero();
            $cambiarPersona = $viaje->cambiarPasajero($documento,$nombre,$apellido,$telefono);
            if ($cambiarPersona) {
                echo "Se ha cambiado correctamente\n";
            } else {
                echo "El pasajero no existe\n";
            }
        break;

        case 4:
            echo "Ingrese el numero de licencia del responsable del viaje que quiere modificar: ";
            $licencia = datosPasajero();
            $licenciaResponsableActual =  $objResponsable->getNumLicencia();

             // Limpiar espacios en blanco
            $licenciaResponsableActual = trim($licenciaResponsableActual);
            if ($licencia === $licenciaResponsableActual) {
                echo "Ingrese el numero de empleado: ";
                $empleado = datosPasajero();
                $objResponsable->setNumEmpleado($empleado);

                echo "Ingrese el nombre del empleado: ";
                $nombre = datosPasajero();
                $objResponsable->setNombre($nombre);

                echo "Ingrese el apellido del empleado: ";
                $apellido = datosPasajero();
                $objResponsable->setApellido($apellido);
            } else {
                echo "El responsable no existe\n";
            }
        break;

        case 5:
            $salir = false;
        break;
        
        default:
            echo "error, esa opcion no existe";
            break;
    }
} while ($salir);
