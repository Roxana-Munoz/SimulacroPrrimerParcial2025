<?php
/*/En la clase Moto:
1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activa (atributo que va a contener un valor true, si la moto está disponible para la
venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
la venta, el método realiza el siguiente cálculo:
$_venta = $_compra + $_compra * (anio * por_inc_anual)
donde $_compra: es el costo de la moto.
anio: cantidad de años transcurridos desde que se fabricó la moto.
por_inc_anual: porcentaje de incremento anual de la moto.*/

// Atributos
class Moto {
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    // Metodo Constructor 
    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa) {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }
    // Métodos de acceso :los getters 
    public function getCodigo() {
        return $this->codigo;
    }
    public function getCosto() {
        return $this->costo;
    }
    public function getAnioFabricacion() {
        return $this->anioFabricacion;
    }   
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getPorcentajeIncrementoAnual() {
        return $this->porcentajeIncrementoAnual;
    }
    public function getEsActiva() {
        return $this->activa;
    }

    // Métodos  de acceso: los setters 
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }   
    public function setCosto($costo) {
        $this->costo = $costo;
    }
    public function setAnioFabricacion($anioFabricacion) {
        $this->anioFabricacion = $anioFabricacion;
    }       
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual) {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;

    }

    public function setEsActiva($activa) {
        $this->activa = $activa;
    }
    // Método __toString 
    public function __toString() {
          $mensajeString="Código de la moto: " . $this->getCodigo() ."\n".
                   "Año de fabricación de la moto: " . $this->getAnioFabricacion() ."\n".
                   "Descripción de la moto: " . $this->getDescripcion() . "\n".
                   "Porcentaje de incremento anual: " . $this->getPorcentajeIncrementoAnual() ."\n".
                   "Esta activa la moto: " . $this->getEsActiva()."\n";
        return $mensajeString;
    }
   /*/ Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendida una moto.
       Si la moto no se encuentra disponible para la venta retorna un valor < 0. Si la moto está disponible para
       la venta, el método realiza el siguiente cálculo:
       $_venta = $_compra + $_compra * (anio * por_inc_anual) 
       donde $_compra: es el costo de la moto.
       anio: cantidad de años transcurridos desde que se fabricó la moto.
       por_inc_anual: porcentaje de incremento anual de la moto.*/
    public function darPrecioVenta() {
        if ($this->getEsActiva()=="false") {
            $precioVenta=-1; 
        }else {
            $anioActual = date("Y"); 
            $anioTranscurrido = $anioActual - $this->getAnioFabricacion(); 
            $precioVenta = $this->getCosto() + ($this->getCosto()* ($anioTranscurrido * ($this->getPorcentajeIncrementoAnual())));  
            
        }
            return $precioVenta;
    } 
}