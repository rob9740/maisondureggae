<?php

namespace App\Form;

use App\Entity\Musiques;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class MusiqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class)
            ->add('album', TextType::class)
            ->add('reference', TextType::class)
            ->add('prix', MoneyType::class)
            ->add('img', TextType::class)
            ->add('label', ChoiceType::class, [
                'choices' => [
                    'Trojan Records' => 'trojan records',
                    'Studio One' => 'studio one',
                    'Pressure Sound' => 'pressure sound',
                    'Wackies' => 'wackies'

                ]
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Musiques::class,
        ]);
    }
}
