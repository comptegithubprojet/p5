<?php

namespace App\Service;
use App\Entity\Devis;

class prixOptions
{
    public function calculer($devis)
    {    
        if ($devis->getDesignationOption1() != null && $devis->getPrixHTOption1()) 
        {
            $PrixHTOption1 = $devis->getPrixHTOption1();
            $devis->setPrixTVAOption1($PrixHTOption1 * 0.2);
            $devis->setPrixTTCOption1($PrixHTOption1 * 1.2);
        }

        if ($devis->getDesignationOption2() != null && $devis->getPrixHTOption2()) 
        {
            $PrixHTOption2 = $devis->getPrixHTOption2();
            $devis->setPrixTVAOption2($PrixHTOption2 * 0.2);
            $devis->setPrixTTCOption2($PrixHTOption2 * 1.2);
        } 

        if ($devis->getDesignationOption3() != null && $devis->getPrixHTOption3()) 
        {
            $PrixHTOption3 = $devis->getPrixHTOption3();
            $devis->setPrixTVAOption3($PrixHTOption3 * 0.2);
            $devis->setPrixTTCOption3($PrixHTOption3 * 1.2);
        } 

        if ($devis->getDesignationOption4() != null && $devis->getPrixHTOption4()) 
        {
            $PrixHTOption4 = $devis->getPrixHTOption4();
            $devis->setPrixTVAOption4($PrixHTOption4 * 0.2);
            $devis->setPrixTTCOption4($PrixHTOption4 * 1.2);
        } 

        if ($devis->getDesignationOption5() != null && $devis->getPrixHTOption5()) 
        {
            $PrixHTOption5 = $devis->getPrixHTOption5();
            $devis->setPrixTVAOption5($PrixHTOption5 * 0.2);
            $devis->setPrixTTCOption5($PrixHTOption5 * 1.2);
        }         
    }
}