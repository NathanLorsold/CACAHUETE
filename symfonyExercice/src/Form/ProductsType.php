<?php

namespace App\Form;

use App\Entity\Products;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ProductName')
            ->add('SupplierId')
            ->add('CategoryId')
            ->add('QuantityPerUnit')
            ->add('UnitPrice')
            ->add('UnitsInStock')
            ->add('UnitsOnOrder')
            ->add('RedorderLevel')
            ->add('Discontinued')
            ->add('supplier')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Products::class,
        ]);
    }
}
