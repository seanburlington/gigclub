<?php
namespace Gigclub\MembershipBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddAsPrimaryFieldsSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        // Tells the dispatcher that you want to listen on the form.pre_set_data
        // event and that the preSetData method should be called.
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if ($data && !$data->getPrimaryMember()) {
            $form
            ->add('phone_as_primary', null, array('required' => false))
            ->add('mobile_as_primary', null, array('required' => false))
            ->add('email_as_primary', null, array('required' => false))
            
            ;        
        }
    }
}
