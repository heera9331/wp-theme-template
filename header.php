<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="container">
        <?php wp_nav_menu() ?>
        <hr>
        <p>header.php</p>
    </header>

    <div class="page">