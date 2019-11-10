<?php

namespace App\Form;

use App\Entity\Animal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, [
                'label' => "Nome",
                'attr' => [
                    'placeholder' => 'Informe o nome do animal',
                    'class' => "form-control"
                ]
            ])
            ->add('raca', EntityType::class, [
                'class' => 'App\Entity\Raca',
                'choice_label' => 'nome',
                'group_by' => 'nomeEspecie',
                'placeholder' => 'Selecione',
                'label' => "Raça",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('data_nascimento', DateType::class, [
                'widget' => 'choice',
                'format' => "dd-MM-yyyy",
                'label' => "Data de Nascimento",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add("salvar", SubmitType::class, [
                'label' => "Salvar",
                'attr' => [
                    'class' => 'btn btn-success'
                ]
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            //'data_class' => Animal::class,
        ]);
    }
}
