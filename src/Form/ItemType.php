<?php

namespace App\Form;

use App\Entity\Color;
use App\Entity\Item;
use App\Entity\Shape;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text')
            ->add('email')
            ->add('color', EntityType::class, [
                'class' => Color::class,
                'choice_label' => 'name',
            ])
            ->add('shape', EntityType::class, [
                'class' => Shape::class,
                'choice_label' => 'name',
            ])->add('images', FileType::class, [
                'required' => false,
                'mapped' => false,
                'multiple' => true,
                'attr' => [
                    'class' => 'inputfile',
                    'data-for' => 'file-1'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
