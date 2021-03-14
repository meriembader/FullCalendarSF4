<?php

namespace App\Form;

use App\Entity\Ordonance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class OrdonnanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Titre',TextType::class,[
                'label'=>'Titre : ',
                'attr'=>[
                    'placeholder'=>'Saisir le titre',
                    'class'=>'form-control'
                ]
            ])
            ->add('Traitement',TextareaType::class,['label'=>'Traitement : ',
                'attr'=>[
                    'placeholder'=>'Saisir le traitement',
                    'class'=>'form-control'
                ]])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ordonance::class,
        ]);
    }
}
