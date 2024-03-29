<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\EqualTo;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
       ->add("username", TextType::class, [
        "label" => "Nom d'utilisateur",
         "required" => true,
        #}"row_attr" => ['class' => 'nom', 'id' => 'name', "name" => "_username"],#}
         "constraints"=> [
            new NotBlank(["message" => "Le nom d'utilisateur ne doit pas être vide !"])
            ]
         ])

    ->add("password", PasswordType::class, [
        "label" => "Mot de passe",
         "required" => true,
         "constraints"=> [
            new NotBlank(["message" => "Le mot de passe ne peut pas être vide !"])
         ]
         ])

         ->add("confirm", PasswordType::class, [
            "label" => "Comfirmer le mot de passe",
             "required" => true,
             "constraints"=> [
                new NotBlank(["message" => "Le mot de passe ne peut pas être vide !"]),
                new EqualTo(["propertyPath" => "password", "message" => "Les mots de passe doivent être identique !"])
             ]
             ]);
}


public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([
        "data_class" => User::class,
        'csrf_protection' => true,
        'csrf_field_name' => '_token',
        'csrf_token_id' => 'post_item',
    ]);
    }
}