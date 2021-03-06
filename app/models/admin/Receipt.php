<?php

namespace app\models\admin;

use FPDF;

class Receipt extends FPDF {

    function __construct($orientation = 'P', $unit = 'pt', $size = 'Letter', $margin = 40) {
        parent::__construct($orientation, $unit, $size);
        $this->SetTopMargin($margin);
        $this->SetRightMargin($margin);
        $this->SetLeftMargin($margin);
        $this->SetAutoPageBreak(true, $margin);
        $this->AddFont('Quicksand', '', 'Quicksand-Regular.php');
    }

    function Header() {
        //parent::Header(); // TODO: Change the autogenerated stub
        $this->SetFont('Quicksand', '', 12);
        $this->SetFillColor(36, 96, 84);
        $this->SetTextColor(225);
        $this->Cell(0, 30, 'TheBestStore', 0 , 1, true);
    }

    function Footer() {
        //parent::Footer(); // TODO: Change the autogenerated stub
        $this->SetFont('Quicksand', '', 12);
        $this->SetTextColor(0);
        $this->SetXY(0, -60);
        $this->Cell(0, 20, "Thank you for shopping at TheBestStore!", 'T', 0, 'C');
    }

    function ProductsTable($order_products, $order) {
        $this->SetFont('Quicksand', '', 12);
        $this->SetTextColor(0);
        $this->SetFillColor(36, 140, 129);
        $this->SetLineWidth(0.2);
        $this->SetDrawColor(238);
        $this->Cell(327, 25, "Title", 'LTR', 0, 'C', true);
        $this->Cell(50, 25, "Qty", 'LTR', 0, 'C', true);
        $this->Cell(50, 25, "Size", 'LTR', 0, 'C', true);
        $this->Cell(100, 25, "Price", 'LTR', 1, 'C', true);

        $this->SetFont('Quicksand', '', 12);
        $this->SetFillColor(238);
        $this->SetLineWidth(0.2);
        $fill = false;

        foreach ($order_products as $product) {
            $this->Cell(327, 20, $product->title, 1, 0, 'L', $fill);
            $this->Cell(50, 20, $product->qty, 1, 0, 'R', $fill);
            $this->Cell(50, 20, $product->size, 1, 0, 'R', $fill);
            $this->Cell(100, 20, $order['currency'] . ' ' . $product->qty * $product->price, 1, 1, 'R', $fill);
            $fill = !$fill;
        }
        $this->SetX(367);
        $this->Cell(100, 20, "Total", 1);
        $this->Cell(100, 20, $order['currency'] . ' ' . $order['sum'], 1, 1, 'R');
    }

}