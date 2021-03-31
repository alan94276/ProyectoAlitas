<?php

class Productos{

    private $idproductos;
    private $nombre;
    private $tipo;
    private $precio;
    private $estatus;


    public function getIdproductos()
    {
        return $this->idproductos;
    }


    public function setIdproductos($idproductos)
    {
        $this->idproductos = $idproductos;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


    public function getTipo()
    {
        return $this->tipo;
    }


    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }


    public function getPrecio()
    {
        return $this->precio;
    }


    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }


    public function getEstatus()
    {
        return $this->estatus;
    }


    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }




    function agregarproducto(){

        try{
            $pdo= new Conexion();
            $query = $pdo->prepare("INSERT INTO productos (nombre
            tipo, precio, estatus) VALUES (:nombreProducto, :tipo, :precio,
            :estatus);");

            $query->bindValue('nombreProducto',$this->getNombre());
            $query->bindValue('tipo',$this->getTipo());
            $query->bindValue('precio',$this->getPrecio());
            $query->bindValue('estatus',$this->getEstatus());
            $query->execute();


        }
        catch (PDOException $e){
            echo $query . "<br>" . $e->getMessage();

        }

        $pdo = null;

    }



}