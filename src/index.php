<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>MadelineProto</title>
</head>
<body>
    <div class="container">
    <?php
        use danog\MadelineProto\Settings;
        use danog\MadelineProto\Stream\Proxy\SocksProxy;

        const SESSION_DIR = __DIR__.'/../session';

        require __DIR__.'/../vendor/autoload.php';
        require __DIR__.'/EventHandler.php';

        is_dir(SESSION_DIR) || mkdir(SESSION_DIR);

        $settings = new Settings;
        $settings->getConnection()
            ->addProxy(SocksProxy::class, array(
                'address' => '127.0.0.1',
                'port'    => 10808
            ));
        EventHandler::startAndLoop(SESSION_DIR . '/session', $settings);
    ?>
    </div>

    <script defer>
        const container = document.querySelector('.container')
        if (container && container.textContent.trim() === '') {
            container.remove()
        }
    </script>
</body>
</html>
