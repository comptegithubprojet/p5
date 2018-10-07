<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Image;
use App\Form\ImageType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('auteur', ChoiceType::class, array(
                'choices' => array(
                    'Maxime CONSTANTIN'      => 'Maxime CONSTANTIN',
                    'Elodie ROUEL' => 'Elodie ROUEL',
                    'Julie TATIBOUET' => 'Julie TATIBOUET',
                    'Florian BRETON' => 'Florian BRETON',
                )                
            ))
            ->add('titre')
            ->add('resume')
            ->add('contenu')
            ->add('image', EntityType::class, array(
                'class' => Image::class,
            ))
            ->add('save',      SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
