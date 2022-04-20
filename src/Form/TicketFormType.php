<?php

namespace App\Form;

use App\Entity\Tickets;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('openedBy', EmailType::class, ['label' => 'Votre adresse E-Mail'])
            ->add('file', FileType::class, [
                'label' => 'Votre Fichier (*.zip, *.7z, *.rar)',
                'constraints' => [(
                    new File([
                        'mimeTypes' => [
                            'application/zip',
                            'application/x-rar-compressed',
                            'application/x-7z-compressed'
                        ],
                        'mimeTypesMessage' => 'Please upload a valid Archive File',
                    ])
                )]
            ])
            ->add('submit', SubmitType::class, ['label' => 'Envoyer votre fichiers'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tickets::class,
        ]);
    }
}
