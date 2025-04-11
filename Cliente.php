<?php
/*/En la clase Cliente:
0. Se registra la siguiente información: nombre, apellido, si está o no dado de baja, el tipo y el número de
documento. Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
1. Método constructor que recibe como parámetros los valores iniciales para los atributos.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _toString para que retorne la información de los atributos de la clase.*/

// Atributos

class Cliente {
    private $nombre;
    private $apellido;
    private $estado;//Si un cliente esta dado de baja o no
    private $tipoDocumento;
    private $numeroDocumento;
// Metodo Constructor 
    public function __construct($nombre, $apellido, $estado, $tipoDocumento, $numeroDocumento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->estado= $estado;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
    }
// Métodos de acceso :los geters

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }
    //Metodos  de acceso: los seters   
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    } 
    public function setEstado($estado) {
        $this->estado= $estado;
    }
    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }
    public function setNumeroDocumento($numeroDocumento) {
        $this->numeroDocumento = $numeroDocumento;
    }
    // Método __toString 
    public function __toString() {
                $mensajeString= "DATOS DEL CLIENTE : "."\n".
                                "Nombre: " .$this->getNombre() ."\n".
                                "Apellido: ".$this->getApellido() . "\n".
                                "Estado: " .$this->getEstado(). "\n".
                                "Tipo de documento: " . $this->getTipoDocumento() ."\n".
                                "Número de documento: " . $this->getNumeroDocumento(). "\n";
            return $mensajeString;    
    }
}
   


