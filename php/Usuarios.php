<?php

    class Usuarios{
        private $id;
        private $nombre;
        private $apellido;
        private $correo;
        private $privilegio;
        private $status;


        public function getId()
        {
            return $this->id;
        }


        public function setId($id)
        {
            $this->id = $id;
        }


        public function getNombre()
        {
            return $this->nombre;
        }


        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }


        public function getApellido()
        {
            return $this->apellido;
        }


        public function setApellido($apellido)
        {
            $this->apellido = $apellido;
        }


        public function getCorreo()
        {
            return $this->correo;
        }


        public function setCorreo($correo)
        {
            $this->correo = $correo;
        }


        public function getPrivilegio()
        {
            return $this->privilegio;
        }


        public function setPrivilegio($privilegio)
        {
            $this->privilegio = $privilegio;
        }


        public function getStatus()
        {
            return $this->status;
        }


        public function setStatus($status)
        {
            $this->status = $status;
        }

        function agregarCliente(){

            try{
                $pdo= new Conexion();
                $query = $pdo->prepare("INSERT INTO usuarios (nombre
            apellido, correo, privilegios, estatus) VALUES (:nombre, :apellido, :correo,
            :privilegios, :estatus);");

                $query->bindValue('nombre',$this->getNombre());
                $query->bindValue('apellido',$this->getApellido());
                $query->bindValue('correo',$this->getCorreo());
                $query->bindValue('privilegios',$this->getPrivilegio());
                $query->bindValue('estatus',$this->getStatus());
                $query->execute();


            }
            catch (PDOException $e){
                echo $query . "<br>" . $e->getMessage();

            }
            $pdo = null;
        }
        function agregarEliminarCliente(){

            try{
                $pdo= new Conexion();
                $query = $pdo->prepare("delete usuarios where = (nombre
            apellido, correo, privilegios, estatus)");

                $query->bindValue('id',$this->getId());

                $query->execute();


            }
            catch (PDOException $e){
                echo $query . "<br>" . $e->getMessage();

            }
            $pdo = null;
        }

    }