<?php

namespace App\Form;

use App\Entity\ScheduledActivity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScheduledActivityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Begin')
            ->add('End')
            ->add('Name')
            ->add('Classroom')
            ->add('StudentGroup')
            ->add('Lecturer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ScheduledActivity::class,
        ]);
    }
}
