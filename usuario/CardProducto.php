<?php
class CardProducto
{
    function mostrarCard()
    {
        $vueltas = 5;
        $card =
            '
        <div class="container-fluid d-flex justify-content-center ">
                <div class="row "></div>
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Esto es un producto </h5>
                        <p class="card-text">esta es la descripcion de un producto .</p>
                        <a href="#" class="btn btn-primary">agregar al carrito.</a>
                    </div>
                </div>
            </div>
        ';
        $cards = [];

        for ($i = 0; $i >= $vueltas; $i++) {
            $cards[$card];
        }

        return $cards;
    }
}