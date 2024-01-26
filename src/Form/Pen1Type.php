<?php

namespace App\Form;

use App\Entity\Brand;
use App\Entity\Color;
use App\Entity\Material;
use App\Entity\Pen;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Pen1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('description')
            ->add('type', EntityType::class, [
                'class' => Type::class,
'choice_label' => 'name',
            ])
            ->add('Material', EntityType::class, [
                'class' => Material::class,
'choice_label' => 'name',
            ])
            ->add('colors', EntityType::class, [
                'class' => Color::class,
'choice_label' => 'name',
'multiple' => true,
            ])
            ->add('brand', EntityType::class, [
                'class' => Brand::class,
'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pen::class,
        ]);
    }
}
