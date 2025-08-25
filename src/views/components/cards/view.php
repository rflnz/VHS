<?php

require_once __DIR__ . "/exampleCards.php";
require_once __DIR__ . "/index.php";

use function Src\Views\Components\Cards\viewCards;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cards</title>

    <link rel="stylesheet" href="/VHS/src/styles/global.css">
    <script type="module" src="/VHS/src/styles/tailwindglobal.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class='flex flex-row flex-wrap gap-4'>

    <?= viewCards($cards, "videos"); ?>

</body>
</html>