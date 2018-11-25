<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de contacto</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
        <form action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " method="POST">
            <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php if(!$enviado && isset($nombre)) echo $nombre ?>">

            <input class="form-control" type="text" name="email" placeholder="Email" value="<?php if(!$enviado && isset($email)) echo $email ?>">

            <textarea class="form-control" name="mensaje" id="mensaje" placeholder="Mensaje"><?php if(!$enviado && isset($mensaje)) echo $mensaje ?></textarea>

            <?php if(!empty($errores)) : ?>
                <div class="alert error">
                    <?php echo $errores ?>
                </div>
            <?php elseif($enviado) : ?>
                <div class="alert success">
                    Enviado Correctamente!
                </div>
            <?php endif ?>

            <input class="btn btn--primary float-right" type="submit" value="Enviar correo">
        </form>
    </div>
</body>
</html>