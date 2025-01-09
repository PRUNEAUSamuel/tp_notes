<?php
require "Matiere.php";

class MatiereSur5 extends Matiere {
    private $bareme;
    public function __construct($nomMatiere, $codeMatiere, $bareme)
    {
        $this->setNomMatiere($nomMatiere);
        $this->setCodeMatiere($codeMatiere);
        $this->setBareme($bareme);
    }
    public function getBareme()
    {
        return $this->bareme;
    }
    public function setBareme($bareme)
    {
        $this->bareme = $bareme;
    }
}