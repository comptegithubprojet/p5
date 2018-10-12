<?php

namespace App\Service;
use App\Entity\Devis;

class prixDevis
{
    public function calculer($devis)
    {
        $prixHT = 0;
        $prixTVA = 0;
        $prixTTC = 0;

        if ($devis->getCaseStarterPack() == true) 
        {
            $prixHT += $devis->getPrixHTStarterPack();
            $prixTVA += $devis->getPrixTVAStarterPack();
            $prixTTC += $devis->getPrixTTCStarterPack();
        }

        if ($devis->getCaseChallengerPack() == true) 
        {
            $prixHT += $devis->getPrixHTChallengerPack();
            $prixTVA += $devis->getPrixTVAChallengerPack();
            $prixTTC += $devis->getPrixTTCChallengerPack();
        }

        if ($devis->getCaseExpertPack() == true) 
        {
            $prixHT += $devis->getPrixHTExpertPack();
            $prixTVA += $devis->getPrixTVAExpertPack();
            $prixTTC += $devis->getPrixTTCExpertPack();
        }

        if ($devis->getCaseInboundMarketing() == true) 
        {
            $prixHT += $devis->getPrixHTInboundMarketing();
            $prixTVA += $devis->getPrixTVAInboundMarketing();
            $prixTTC += $devis->getPrixTTCInboundMarketing();
        }        

        if ($devis->getCaseConsulting() == true) 
        {
            $prixHT += $devis->getPrixHTConsulting();
            $prixTVA += $devis->getPrixTVAConsulting();
            $prixTTC += $devis->getPrixTTCConsulting();
        }

        if ($devis->getCaseDesign() == true) 
        {
            $prixHT += $devis->getPrixHTDesign();
            $prixTVA += $devis->getPrixTVADesign();
            $prixTTC += $devis->getPrixTTCDesign();
        }

        if ($devis->getDesignationOption1() != null && $devis->getPrixHTOption1()) 
        {
            $prixHT += $devis->getPrixHTOption1();
            $prixTVA += $devis->getPrixTVAOption1();
            $prixTTC += $devis->getPrixTTCOption1();
        }

        if ($devis->getDesignationOption2() != null && $devis->getPrixHTOption2()) 
        {
            $prixHT += $devis->getPrixHTOption2();
            $prixTVA += $devis->getPrixTVAOption2();
            $prixTTC += $devis->getPrixTTCOption2();
        }

        if ($devis->getDesignationOption3() != null && $devis->getPrixHTOption3()) 
        {
            $prixHT += $devis->getPrixHTOption3();
            $prixTVA += $devis->getPrixTVAOption3();
            $prixTTC += $devis->getPrixTTCOption3();
        }

        if ($devis->getDesignationOption4() != null && $devis->getPrixHTOption4()) 
        {
            $prixHT += $devis->getPrixHTOption4();
            $prixTVA += $devis->getPrixTVAOption4();
            $prixTTC += $devis->getPrixTTCOption4();
        }

        if ($devis->getDesignationOption5() != null && $devis->getPrixHTOption5()) 
        {
            $prixHT += $devis->getPrixHTOption5();
            $prixTVA += $devis->getPrixTVAOption5();
            $prixTTC += $devis->getPrixTTCOption5();
        }

        $devis->setPrixTotalHT($prixHT);
        $devis->setPrixTotalTVA($prixTVA);
        $devis->setPrixTotalTTC($prixTTC);

    }
}