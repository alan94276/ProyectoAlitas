<?php
    class Mesa {
        private $idMesa;
        private $numeroMesa;
        private $status;

        /**
         * @return mixed
         */
        public function getIdMesa()
        {
            return $this->idMesa;
        }

        /**
         * @param mixed $idMesa
         */
        public function setIdMesa($idMesa): void
        {
            $this->idMesa = $idMesa;
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

        /**
         * @return mixed
         */
        public function getStatus()
        {
            return $this->status;
        }

        /**
         * @param mixed $status
         */
        public function setStatus($status): void
        {
            $this->status = $status;
        }



    }