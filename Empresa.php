<?php
/*/En la clase Empresa:
1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
motos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro.
6. Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
para registrar una venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.*/
// Incluyo las clases Cliente, Moto y Venta para poder utilizarlas en la clase Empresa
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'Venta.php';

class Empresa {
    // Atributos de la clase Empresa
    private $denominacion;
    private $direccion;
    private $colecClientes; // Colección de clientes
    private $colecMotos; // Colección de motos
    private $colecVentasRealizadas; // Colección de ventas realizadas



    // Metodo constructor   
    public function __construct($denominacion, $direccion,$colecClientes , $colecMotos, $colecVentasRealizadas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colecClientes =$colecClientes; 
        $this->colecMotos =$colecMotos ; 
        $this->colecVentasRealizadas = $colecVentasRealizadas; 
    }
    // Métodos de acceso : los getters 
    public function getDenominacion() {
        return $this->denominacion;
    }
    public function getDireccion() {
        return $this->direccion;
    }       
    public function getColeccionClientes() {
        return $this->colecClientes;
    }   
    public function getColeccionMotos() {
        return $this->colecMotos;
    }
    public function getColeccionVentasRealizadas() {
        return $this->colecVentasRealizadas;
    }
    // Métodos  de acceso : los setters
    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }   
    public function setColeccionClientes($colecClientes) {
        $this->colecClientes = $colecClientes;
    }
    public function setColeccionMotos($colecMotos) {
        $this->colecMotos = $colecMotos;
    }   
    public function setColeccionVentasRealizadas($colecVentasRealizadas) {
        $this->colecVentasRealizadas = $colecVentasRealizadas;
    }
    // Método __toString    
    public function __toString() {
        $objCliente=$this->getColeccionClientes();
        $objMoto=$this->getColeccionMotos();   
        $objVenta=$this->getColeccionVentasRealizadas();
        return "Denominación de la Empresa : " . $this->getDenominacion() ."\n" .
               "Dirección de la Empresa : " . $this->getDireccion(). "\n" .
               "Clientes de la Empresa : " .$this->recorrerClienteString()."\n" .
               "Motos de la Empresa: " . $this->recorrerMotoString()."\n" .
               "Ventas Realizadas: " . $this->recorrerVentasString() . "\n" ;   
               
               
    }
     // Metodo que retorna una variable de tipo string que contiene todas los clientes de la  coleccion de clientes 
    public function recorrerClienteString(){
        $dato = "";
        $clientes=$this->getColeccionClientes();
        for($i = 0; $i < count($clientes); $i++){
            $dato= $dato. "Cliente N°[".$i. "].\n".$clientes[$i]."\n";
        }
        
        return $dato;
    }
  // Metodo que retorna una variable de tipo string que contiene todas las motos de la  coleccion de Motos
    public function recorrerMotoString(){
        $dato = "";
        $motos=$this->getColeccionMotos();
        for($i = 0; $i < count($motos); $i++){
            $dato= $dato. "Moto N°[".$i. "].\n".$motos[$i]."\n";
        }
        
        return $dato;
    }
    
    // Metodo que retorna una variable de tipo string que contiene todas las ventas de la  coleccion de Ventas Realizadas
    public function recorrerVentasString(){
        $dato = "";
        $ventas=$this->getColeccionVentasRealizadas();
        for($i = 0; $i < count($ventas); $i++){
            $dato= $dato. "Venta N°[".$i. "].\n".$ventas[$i]."\n";
        }
        
        return $dato;
    }
      

    /*/ Implementar el método retornarMoto($codigoMoto) que recorre la colección de motos de la Empresa y
    retorna la referencia al objeto moto cuyo código coincide con el recibido por parámetro. */
    public function retornarMoto($codigoMoto) {

        $motoObtenida = null;
        $motoEncontrada = false;
        $posMoto = 0;
        $colMotosCopia = $this->getColeccionMotos();

        while($motoEncontrada == false && $posMoto < count($colMotosCopia)){
            if($colMotosCopia[$posMoto]->getCodigo() == $codigoMoto){
                $motoEncontrada = true;
                $motoObtenida = $colMotosCopia[$posMoto];
            }
            $posMoto++;
        }

        return $motoObtenida;
    }


    /*/ Implementar el método registrarVenta($colCodigosMoto, $objCliente) método que recibe por
    parámetro una colección de códigos de motos, la cual es recorrida, y por cada elemento de la colección
    se busca el objeto moto correspondiente al código y se incorpora a la colección de motos de la instancia
    Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, están disponibles
    para registrar una venta en un momento determinado.
    El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
    venta.*/
    
    public function registrarVenta($colCodigosMoto, $objCliente){
        $importeFinal = 0;

        if($objCliente->getEstado() == "baja"){

            $nuevaVenta = new Venta("0001",date ('y-m-d'), $objCliente, [] , 0);

            for($posCodigo = 0; $posCodigo < count($colCodigosMoto); $posCodigo++){

                $codigoActual = $colCodigosMoto[$posCodigo];
                $motoEncontrada = $this->retornarMoto($codigoActual);

                if($motoEncontrada != null && $motoEncontrada->getEsActiva()){
                    $nuevaVenta->incorporarMoto($motoEncontrada);
                }
            }

            $importeFinal = $nuevaVenta->getPrecioFinal();
            $copiaColVentas = $this->getColeccionVentasRealizadas();
            array_push($copiaColVentas, $nuevaVenta);
            $this->setColeccionVentasRealizadas($copiaColVentas);

        } else {
            $importeFinal = -1;
        }

        return $importeFinal;
    }

    /*/ Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
    número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente.*/       
public function retornarVentasXCliente($tipo, $numDoc) {
        $colVen = $this->getColeccionVentasRealizadas();
        $i = 0;
        $encontro = false;
        $ventaRealizada = "";
        while($i < count($colVen) && !$encontro){
            $venta = $colVen[$i]->getCliente(); 
            $tipoDNI = $venta->getTipoDocumento(); 
            $nroDNI = $venta->getNumeroDocumento(); 
            if($tipoDNI == $tipo && $numDoc == $nroDNI){
                $ventaRealizada = $colVen[$i];
                $encontro = true;
            }
            $i++;
        }
        return $ventaRealizada;
    } 

}


