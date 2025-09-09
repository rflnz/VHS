<?php
require __DIR__ . '/../../../components/utils/buttonComponent.php';
require __DIR__ . '/../../../components/utils/inputComponent.php';
require __DIR__ . '/../../../components/header/headerComponent.php';

require __DIR__ . '/../../../components/sidebar/SidebarComponent.php';

require __DIR__ . '/../../../components/shared/shared.php';


use function Src\Views\Components\Utils\ButtonComponent;
use function Src\Views\Components\Utils\InputComponent;
use function Src\Views\Components\Header\HeaderComponent;
use function Src\views\Components\sidebar\SidebarComponent;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/VHS/src/styles/global.css">
    <script type="module" src="/VHS/src/styles/tailwindglobal.js"></script>
</head>
<body class="w-full min-h-screen bg-gradient-to-b from-[#20002c] to-[#000000] bg-no-repeat bg-cover bg-center text-white">
    
<div>
    <?= HeaderComponent() ?>
</div>

<div class="hidden md:block">
    <?= SidebarComponent() ?>
</div>

<h1 class="text-xl font-light">Criar canal<h1>

<div>
    <?= InputComponent(
        placeholder: "@UsuárioSenac12333",
        type: "text",
        label: "Nome do canal",
        icon: "/VHS/public/icons/userRound.svg",
        iconPosition: "right-3"
    ) ?>
</div>

<div>
    <?= InputComponent(
        placeholder: "usuariosenac@senac.ms.com",
        type: "text",
        label: "Identificador",
        icon: "/VHS/public/icons/userRound.svg",
        iconPosition: "right-3"
    ) ?>
</div>




</body>
</html>