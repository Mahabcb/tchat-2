<div class="container">
    <div class="col-md-4">
        <h1>Bienvenu dans mon chat</h1>
        <div class="form-group">
            <form action="" method="post">
                <textarea  name="message" cols="30" rows="10" placeholder="Your message"></textarea>
                <input  type="text" name="user" placeholder="Your name">
                <button type="submit" class="btn btn-primary">Send</button>
            </form>

            <div class="col-md-6">
                <h1>Le tchaaaaat</h1>
                <div class="form-group">
                    <?php foreach ($messages as $message) : ?>
                        <p><?= $message['message'] ?></p>

                    <?php endforeach ?>
                </div>
            </div>

        </div>
    </div>

</div>
