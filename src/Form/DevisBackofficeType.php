<?php

namespace App\Form;

use App\Entity\Devis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DevisBackofficeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('caseStarterPack')
            ->add('caseChallengerPack')
            ->add('caseExpertPack')
            ->add('caseInboundMarketing')
            ->add('caseConsulting')
            ->add('caseDesign')
            ->add('civilite', ChoiceType::class, array(
                'choices' => array(
                    'Mme' => 'Mme',
                    'M.' => 'M.',
                    'Mlle' => 'Mlle',
                )                
            ))
            ->add('nom')
            ->add('prenom')
            ->add('societe')
            ->add('email')
            ->add('adresse')
            ->add('codePostal')
            ->add('ville')
            ->add('telephone')
            ->add('urlSite')
            ->add('description')
            ->add('statut', ChoiceType::class, array(
                'choices' => array(
                    'Nouveau'      => 'nouveaux',
                    'En attente' => 'en attente',
                    'Signé' => 'signes',
                    'Archivé' => 'archives',
                )                
            ))
            ->add('save',      SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Devis::class,
        ]);
    }
}
