<?php

namespace App\Notifications;


use App\Entity\Visitor;
use Twig\Environment;

class ContactNotifications
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * @var Environment
     */
    private $renderer;

    public function __construct(\Swift_Mailer $mailer, Environment $renderer)
    {
        $this->mailer = $mailer;
        $this->renderer = $renderer;
    }

    public function notify(Visitor $visitor)
    {
        $visitorEmail = $visitor->getEmail();
        $message = (new \Swift_Message('Message bien envoyé '. $visitor->getName()))
            ->setFrom('bachir.ndiaye.pro@gmail.com')
            ->setTo($visitorEmail)
            ->setReplyTo($visitorEmail)
            ->setBody($this->renderer->render('emails/contact.html.twig',[
                'visitor' => $visitor
            ]), 'text/html');
        $this->mailer->send($message);
    }

}