<?php

    require_once __DIR__ . "/../../../components/header/headerComponent.php";
    require_once __DIR__ . "/../../../components/sidebar/SidebarComponent.php";
    require_once __DIR__ . "/../../../components/cards/index.php";
    require_once __DIR__ . "/../../../components/featuredCard/featuredEventComponent.php";
    require_once __DIR__ . "/../../../components/cards/index.php";
    
    use function Src\Views\Components\sidebar\SidebarComponent;
    use function Src\Views\Components\header\HeaderComponent;
    use function Src\Views\Components\Cards\renderCards;
    use function Views\Components\FeaturedCard\FeaturedEventCard;

    $category = isset($_GET['category']) ? $_GET['category'] : 'tecnologia';

    $categories = [
        'tecnologia' => 'Tecnologia',
        'saude' => 'Saúde',
        'moda' => 'Moda',
        'estetica' => 'Estética',
    ];

    $featuredVieo = [
        'image_url' => 'https://framerusercontent.com/images/TO1bOWR2ihsAvIgtbf5Y9taYWZs.png',
        'title' => 'Usando IA para processamento de geoinformação em Python, com GIS AXIS',
        'instructor' => 'Ministrado por Paulo Silveira',
        'event_type' => 'Pago | Presencial',
        'date' => '09-08 18:15',
    ];

    $data = $_SESSION["page_data"] ?? [];
    $events = $data["events"] ?? [];

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

<body class="w-full min-h-screen bg-background text-white">
    <?= HeaderComponent(); ?>

    <div class="flex flex-col md:flex-row w-full">
        <?= SidebarComponent(); ?>

        <main class="flex-1 px-4 sm:px-6 py-4 mx-auto">
            <div class="max-w-[1500px] mx-auto">
                <div>
                    <h2 class="text-2xl font-bold text-white mb-2"><span class="text-purple-400">#</span> Eventos  🚀</h2>
                    <p class="text-gray-400 text-sm mb-6">Confira o evento que está acontecendo agora 🔥</p>
                </div>
                
                
                <section class="mb-12">
                    <div class="grid grid-cols-1 gap-6">
                        <div class="lg:col-span-1">
                            <?= FeaturedEventCard($featuredVieo, true)  ?>
                        </div>
                    </div>
                </section>

                <section class="mb-12">
                    <div>
                        <h2 class="text-2xl font-bold text-white mb-2"><span class="text-purple-400">#</span> Eventos que irão acontecer 🔥</h2>
                        <p class="text-gray-400 text-sm mb-6">Confira os vídeo mais populares da nossa plataforma VHS</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        <?= renderCards($events, 'event'); ?>   
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>