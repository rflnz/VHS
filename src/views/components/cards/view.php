<?php

require_once __DIR__ . "/exampleCards.php";
require_once __DIR__ . "/index.php";

use function Src\Views\Components\Cards\renderCards;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VHS - Evento</title>
    <link rel="stylesheet" href="/VHS/src/styles/global.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="/VHS/src/styles/tailwindglobal.js"></script>
    <link rel="stylesheet" href="/VHS/src/styles/global.css">
</head>

<body class='flex flex-col gap-2'>
    <?php echo renderCards($cards, 'videos'); ?>
</body>
</html>