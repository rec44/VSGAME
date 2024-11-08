<?php
require_once  __DIR__. "/../models/CardBD.php";
include_once __DIR__ . "/../views/header.php";

class DashboardController
{
    private $cartaModel;

    public function __construct()
    {
        $this->cartaModel = new CardBD();
    }

    public function mostrar()
    {
        $total = $this->cartaModel->contarCartas();

        require_once __DIR__ . "/../views/dashboard.php";
    }
}