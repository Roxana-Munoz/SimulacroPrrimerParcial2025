<?php
/*/En la clase Venta:
1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
motos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
Utilizar el método que calcula el precio de venta de la moto donde crea necesario.*/
include_once 'Cliente.php';

// Atributos

class Venta {
    private $numero;
    private $fecha;
    private $Cliente;
    private $colecMotos; // Colección de motos
    private $precioFinal;

// Metodo constructor

    public function __construct($numero, $fecha, $Cliente,$colecMotos, $precioFinal) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->Cliente= $Cliente;
        $this->colecMotos = $colecMotos;
        $this->precioFinal = $precioFinal; 
    
    }
// Métodos de acceso : los getters 
    public function getNumero() {
        return $this->numero;
    }   
    public function getFecha() {
        return $this->fecha;
    }
    public function getCliente() {
        return $this->Cliente;
    }   
    public function getColeccionMotos() {
        return $this->colecMotos;
    }
    public function getPrecioFinal() {
        return $this->precioFinal;
    }   
// Métodos setters  
    public function setNumero($numero) {
        $this->numero = $numero;
    }       
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }   
    public function setCliente($Cliente) {
        $this->Cliente = $Cliente;
    }
    public function setColeccionMotos($colecMotos) {
        $this->colecMotos = $colecMotos;
    }   
    public function setPrecioFinal($precioFinal) {
        $this->precioFinal = $precioFinal;
    }
// Método __toString     

    public function __toString() {
              $mensajeString= "Número de venta: " . $this->getNumero()."\n".
                              "Fecha de la venta: " . $this->getFecha()."\n".
                              "Cliente: " . $this->getCliente()."\n". 
                              "Coleccion de Motos: ". $this->ColeccionMotos() . "\n".  
                              "Precio Final: " . $this->getPrecioFinal();
                return $mensajeString;
        
    }
//  Metodo para obtener la coleccion de motos
    public function ColeccionMotos() {
        $motos=$this->getColeccionMotos();
        $mensajeString="";
        for($i=0; $i<count($motos); $i++) { 
            $mensajeString= $mensajeString."Moto   n° [". $i . "]:\n". ($i+1) . ": " . $motos[$i]->getDescripcion() . "\n"; 
        }
      return $mensajeString; 
    }
/*/ Implementar el método incorporarMoto($objMoto) que recibe por parámetro un objeto moto y lo
    incorpora a la colección de motos de la venta, siempre y cuando sea posible la venta. El método cada
    vez que incorpora una moto a la venta, debe actualizar la variable instancia precio final de la venta.
    Utilizar el método que calcula el precio de venta de la moto donde crea necesario.*/
    public function incorporarMoto($objMoto) {
        if ($objMoto->getEsActiva()) { 
            $colMoto=$this->getColeccionMotos();
            array_push($colMoto, $objMoto); 
            $this->setColeccionMotos($colMoto);  
            $precioMoto=$objMoto->darPrecioVenta();
            $precioFinal=$this->getPrecioFinal();
            $precioFinal=$precioFinal+$precioMoto;      
            $this->setPrecioFinal($precioFinal);                   
     }
    }

}   