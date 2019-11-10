<?php
namespace App\Form;
use App\Entity\Cliente;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, [
                'label' => "Nome",
                'attr' => [
                    'placeholder' => 'Informe o nome do cliente',
                    'class' => "form-control"
                ]
            ])
            ->add('telefone', TextType::class, [
                'label' => "Telefone",
                'attr' => [
                    'placeholder' => 'Informe o telefone do cliente',
                    'class' => "form-control"
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => "E-mail",
                'attr' => [
                    'placeholder' => 'Informe o email do cliente',
                    'class' => "form-control"
                ]
            ])
            ->add('endereco', EnderecoType::class, [
                'label' => false
            ])
            ->add('animal', EntityType::class, [
                'class' => 'App\Entity\Animal',
                'choice_label' => 'nome',
                'multiple' => true,
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
            'data_class' => Cliente::class,
        ]);
    }
}
