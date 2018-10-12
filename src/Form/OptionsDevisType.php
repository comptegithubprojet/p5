<?php

namespace App\Form;

use App\Entity\OptionsDevis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OptionsDevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation')
            ->add('charge')
            ->add('prixHT')
            ->add('prixTVA')
            ->add('prixTTC')
            ->add('article')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OptionsDevis::class,
        ]);
    }
}
