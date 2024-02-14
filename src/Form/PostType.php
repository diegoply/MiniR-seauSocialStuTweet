<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Constraints\NotBlank;

class PostType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
        ->add("title", TextType::class, ["label" => "Titre", "required" => false])
        ->add("content", TextareaType::class,
         ["label" => "contenue",
          "required" => true,
          
          ])
           

        ->add("image", UrlType::class, 
        ["label" => "URL de l'image",
         "required" => false,
      
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Post::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id' => 'post_item',
        ]);
    }
}