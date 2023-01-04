<?php

namespace App\Controller;


use App\Entity\Message;
use App\Entity\User;
use App\Repository\MessageRepository;

class MessageController 
{
    private MessageRepository $messageRepository;

    public function __construct()
    {
        $this->messageRepository = new MessageRepository();
    }

    public function getMessages()
    {

        $result = $this->messageRepository->findAll("date DESC");
        $messages = [];
        foreach($result as $message) {
            $messages[] = (new Message())
                    ->setContent($message['message'])
                    ->setAuthor($message['author']);
        }
        return $messages;
    }

    public function postMessages()
    {
        return $this->messageRepository->addMessages($_POST['message'], $_POST['user']);
    }

    public function handleRequest()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!empty($_POST['message']) and !empty($_POST['user']))
            {
                $user = new User(); // object
                $message = new Message();

                $user->setName($_POST['user']);
                $userName = $user->getName();
               
                
                $message->setContent($_POST['message']);
                $message->setAuthor($userName);
                $messageContent = $message->getContent();
                $this->postMessages();
            }else{
                echo "Veuillez remplir tous les champs";
            }
        }
    }

}