<?php 
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controller\MessageController;
$messageController = new MessageController();
$messages = $messageController->getMessages();
$messageController->handleRequest();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Mon super Chat</title>
</head>
<body >

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center mb-3">Bienvenu dans mon chat</h1>
                <form action="" method="post">
                    <div class="form-group m-2">
                        <textarea class="form-control" name="message" rows="3" placeholder="Your message"></textarea>
                    </div>
                    <div class="form-group m-2">
                        <input type="text" class="form-control" name="user" placeholder="Your name">
                    </div>
                    <div class="form-group m-2">
                    <button type="submit" class="btn btn-primary col-12">Send</button>
                    </div>
                </form>
                <hr>
                <h1 class="text-center mb-3">Tous les messages</h1>
                <div class="messages">
                    <?php foreach ($messages as $message) : ?>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?= $message->getAuthor() ?></h5>
                                <p class="card-text"><?= $message->getContent() ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>