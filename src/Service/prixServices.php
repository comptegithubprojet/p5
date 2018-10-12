<?php

namespace App\Service;
use App\Entity\Devis;

class prixServices
{
    public function calculer($devis)
    {    
        if ($devis->getCaseInboundMarketing() == true) 
        {
            $PrixHTInboundMarketing = $devis->getPrixHTInboundMarketing();
            $devis->setPrixTVAInboundMarketing($PrixHTInboundMarketing * 0.2);
            $devis->setPrixTTCInboundMarketing($PrixHTInboundMarketing * 1.2);
        }        

        if ($devis->getCaseConsulting() == true) 
        {
            $PrixHTConsulting = $devis->getPrixHTConsulting();
            $devis->setPrixTVAConsulting($PrixHTConsulting * 0.2);
            $devis->setPrixTTCConsulting($PrixHTConsulting * 1.2);
        }

        if ($devis->getCaseDesign() == true) 
        {
            $PrixHTDesign = $devis->getPrixHTDesign();
            $devis->setPrixTVADesign($PrixHTDesign * 0.2);
            $devis->setPrixTTCDesign($PrixHTDesign * 1.2);
        }
    }
}