<?php 
/*/Implementar un script TestEmpresa en la cual:
1. Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
2. Cree 3 objetos Motos con la información visualizada en la tabla: código, costo, año fabricación,
descripción, porcentaje incremento anual, activo.
código costo anio_fabricacion Descripcion porc_increment activo
11 2230000 2022 Benelli Imperiale 400 85% true
12 584000 2021 Zanella Zr 150 Ohc 70% true
13 999900 2023 Zanella Patagonian Eagle 250 55% false
4. Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, dirección= “Av
Argenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
[$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
5. Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.
6. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.
7. Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.
8. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente1.
9. Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
corresponden con el tipo y número de documento del $objCliente2
10. Realizar un echo de la variable Empresa creada en 2.*/
   

include_once 'Cliente.php';
include_once 'Moto.php'; 
include_once 'Venta.php';
include_once 'Empresa.php'; 

// Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
//$nombre, $apellido, $dadoDeBaja, $tipoDocumento, $numeroDocumento)

$objCliente1 = new Cliente("Pablo", "Muñoz","alta" , "DNI", "12345678");
$objCliente2 = new Cliente("Ariana", "Prospitti", "baja", "DNI", "87654321");

// Cree 3 objetos Motos 
//$codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa

$objMoto1 = new Moto(11, 2230000, 2022, "Benelli Imperiale 400", 0.85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 0.70, true);       
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 0.55, false);
$colecMotos=[$objMoto1, $objMoto2, $objMoto3];
$colecClientes=[$objCliente1, $objCliente2];
$colecVentasRealizadas=[];

/*/  Se crea un objeto Empresa con la siguiente información:
 denominación =” Alta Gama”, dirección= “AvArgenetina 123”, colección de motos= [$obMoto1, $obMoto2, $obMoto3] , colección de clientes =
[$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].*/

$objEmpresa = new Empresa("Alta Gama", "Av Argentina 123", $colecClientes, $colecMotos, $colecVentasRealizadas);
$objEmpresa = new Empresa("Alta gama", "Av Argenetina 123", $colecClientes, $colecMotos, $colecVentasRealizadas);
echo "Información de la Empresa:\n";
echo $objEmpresa;

//  Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
//$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
//punto 1) y la colección de códigos de motos es la siguiente [11,12,13]. Visualizar el resultado obtenido.

echo $objEmpresa->registrarVenta([11,12,13], $objCliente2);

echo"\n";
// Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
//$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el
//punto 1) y la colección de códigos de motos es la siguiente [0]. Visualizar el resultado obtenido.

echo $objEmpresa->registrarVenta([0], $objCliente2);
echo"\n";

// Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
//$objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el 
//punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido.    


echo $objEmpresa->registrarVenta([2], $objCliente2);
echo"\n";
// Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
//corresponden con el tipo y número de documento del $objCliente1.  
 
echo $objEmpresa->retornarVentasXCliente("DNI", "12345678");
echo"\n";

// Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se
//corresponden con el tipo y número de documento del $objCliente2
echo $objEmpresa->retornarVentasXCliente( "DNI", "87654321");
echo"\n";

//Realizar un echo de la variable Empresa creada en 2
echo "Información de la Empresa:\n";
echo $objEmpresa;





