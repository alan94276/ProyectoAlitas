<?php


namespace Comanda;


class Comanda
{
    private $idComanda;
    private $fecha;
    private $total;
    private $numeroMesa;

    /**
     * @return mixed
     */
    public function getIdComanda()
    {
        return $this->idComanda;
    }

    /**
     * @param mixed $idComanda
     */
    public function setIdComanda($idComanda): void
    {
        $this->idComanda = $idComanda;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total): void
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getNumeroMesa()
    {
        return $this->numeroMesa;
    }

    /**
     * @param mixed $numeroMesa
     */
    public function setNumeroMesa($numeroMesa): void
    {
        $this->numeroMesa = $numeroMesa;
    }



}