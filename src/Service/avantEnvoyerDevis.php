<?php

namespace App\Service;
use App\Entity\Devis;

class avantEnvoyerDevis
{
    public function remplissage($devis)
    {
        if($devis->getCaseStarterPack() == true)
        {
            $devis->setDesignationStarterPack('Starter pack');
            $devis->setChargeStarterPack(6);
            $devis->setPrixHTStarterPack(1208.33);
            $devis->setPrixTVAStarterPack(241.67);
            $devis->setPrixTTCStarterPack(1450.00);
        }
        else
        {
            $devis->setDesignationStarterPack('vide');
            $devis->setChargeStarterPack(0);
            $devis->setPrixHTStarterPack(0);
            $devis->setPrixTVAStarterPack(0);
            $devis->setPrixTTCStarterPack(0);
        }

        if($devis->getCaseChallengerPack() == true)
        {
            $devis->setDesignationChallengerPack('Challenger pack');
            $devis->setChargeChallengerPack(11);
            $devis->setPrixHTChallengerPack(2083.33);
            $devis->setPrixTVAChallengerPack(416.67);
            $devis->setPrixTTCChallengerPack(2500.00);
        }
        else
        {
            $devis->setDesignationChallengerPack('vide');
            $devis->setChargeChallengerPack(0);
            $devis->setPrixHTChallengerPack(0);
            $devis->setPrixTVAChallengerPack(0);
            $devis->setPrixTTCChallengerPack(0);
        }

        if($devis->getCaseExpertPack() == true)
        {
            $devis->setDesignationExpertPack('Expert pack');
            $devis->setChargeExpertPack(19);
            $devis->setPrixHTExpertPack(3333.34);
            $devis->setPrixTVAExpertPack(666.67);
            $devis->setPrixTTCExpertPack(4000);
        }
        else
        {
            $devis->setDesignationExpertPack('vide');
            $devis->setChargeExpertPack(0);
            $devis->setPrixHTExpertPack(0);
            $devis->setPrixTVAExpertPack(0);
            $devis->setPrixTTCExpertPack(0);
        }

        if($devis->getCaseInboundMarketing() == true)
        {

        }
        else
        {
            $devis->setDesignationInboundMarketing('vide');
            $devis->setChargeInboundMarketing(0);
            $devis->setPrixHTInboundMarketing(0);
            $devis->setPrixTVAInboundMarketing(0);
            $devis->setPrixTTCInboundMarketing(0);
        }

        if($devis->getCaseConsulting() == true)
        {

        }
        else
        {
            $devis->setDesignationConsulting('vide');
            $devis->setChargeConsulting(0);
            $devis->setPrixHTConsulting(0);
            $devis->setPrixTVAConsulting(0);
            $devis->setPrixTTCConsulting(0);
        }

        if($devis->getCaseDesign() == true)
        {

        }
        else
        {
            $devis->setDesignationDesign('vide');
            $devis->setChargeDesign(0);
            $devis->setPrixHTDesign(0);
            $devis->setPrixTVADesign(0);
            $devis->setPrixTTCDesign(0);
        }
    }
}