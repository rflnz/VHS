<?php

namespace Src\Views\Components\Cards;

use DateTime;
use Respect\Validation\Rules\Date;
use function Src\Application\Utils\Purify\purifyProperty;

function renderCards(array $card, $type) {
    foreach ($card as $item) {
        if ($item['type_card'] === $type) {
            echo Cards::Renderer($item);
        }
    }
}

// new Cards

class Cards {

    private string $type_card;
    private string $url;
    private string $title;
    private string $description;
    private string $views;
    private string $thumbnail_url;
    private string $username;
    private string $avatar_url;
    
    private int $duration;
    private int $likes;
    private int $comments;

    private DateTime $created_at;
    private DateTime $planned_events;

    public function __construct(array $card) {
        $this->type_card = purifyProperty($card['type_card']);
        $this->url = purifyProperty($card['url']);
        $this->title = purifyProperty($card['title']);
        $this->description = purifyProperty($card['description']);
        $this->views = purifyProperty($card['views']);
        $this->thumbnail_url = purifyProperty($card['thumbnail_url']);
        $this->username = purifyProperty($card['username']);
        $this->avatar_url = purifyProperty($card['avatar_url']);
        
        $this->duration = purifyProperty($card['duration']);
        $this->likes = purifyProperty($card['likes']);
        $this->comments = purifyProperty($card['comments']);

        $this->created_at = $card['created_at'];
        $this->planned_events = $card['planned_events'];
    }

    public static function Renderer(array $item) {
        $card = new Cards($item);

        switch ($card->type_card) {
            case 'video':
                return $card->Video(
                    $card->url,
                    $card->duration,
                    $card->username,
                    $card->title,
                    $card->views,
                    $card->created_at
                );
            case 'event':
                return $card->Event(
                    $card->url,
                    $card->thumbnail_url,
                    $card->description,
                    $card->username,
                    $card->title,
                    $card->views,
                    $card->planned_events
                );
            case 'channel':
                return $card->Channel(
                    $card->url,
                    $card->duration,
                    $card->created_at,
                    $card->title,
                    $card->comments,
                    $card->likes,
                    $card->views
                );
            case 'channels':
                return $card->Channels(
                    $card->url,
                    $card->thumbnail_url,
                    $card->duration,
                    $card->username,
                    $card->title,
                    $card->views,
                    $card->created_at
                );
            case 'fast':
                return $card->Fast(
                    $card->url,
                    $card->thumbnail_url,
                    $card->title,
                    $card->likes,
                    $card->views
                );
            default:
                return '';
        }
    }

    private function Video (
        string $url,
        int $duration,
        string $username,
        string $title,
        string $views,
        DateTime $created_at
    ) {

        return <<<HTML
            <a href='$url' class='card flex flex-col cursor-pointer relative max-w-[340px] h-[340px] bg-gray600 rounded-3xl overflow-hidden shadow-lg transition-all duration-300'>
                <div class='relative w-full h-[50%]'>
                    <img src='{$this->thumbnail_url}' class='w-full h-full object-cover'>

                    <div class='absolute top-3 right-3 bg-black/75 px-2 py-1 rounded-md'>
                        <p class='text-white text-caption 2xl:text-paragraph'>$duration</p>
                    </div>
                </div>

                <div class='p-4 text-white flex flex-col justify-between h-[50%]'>
                    <p class='truncate text-gray-400 text-caption 2xl:text-paragraph pr-16'>$username</p>

                    <h3 class='text-paragraph 2xl:text-subtitle leading-tight break-words overflow-hidden line-clamp-3'
                    style='
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        text-overflow: ellipsis;
                    '>
                        $title
                    </h3>

                    <p class='text-gray-400 text-caption 2xl:text-paragraph'>
                        $views views • $created_at
                    </p>
                </div>

                <!-- Foto do Usuário -->

                <div class='absolute w-full h-full flex items-center justify-end p-5'>
                    <div class='relative w-16 h-16 2xl:w-20 2xl:h-20 flex items-center justify-center'>
                        <div class='absolute flex w-full h-full items-center justify-center rounded-full overflow-hidden bg-white/5'>
                            <img src='{$this->avatar_url}' class='w-full h-full object-cover'>
                        </div>
                    </div>
                </div>
            </a>
        HTML;
    }

    private function Event (
        string $url,
        string $thumbnail_url,
        string $description,
        string $username,
        string $title,
        int $views,
        DateTime $planned_events
    ) {

        return <<<HTML
            <a href='$url' class='card flex flex-col cursor-pointer max-w-[340px] h-[340px] bg-[#1B1B1B] rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300'>
                <div class='relative w-full h-[50%]'>
                    <img src='$thumbnail_url' class='w-full h-full object-cover'>

                    <div class='absolute top-3 right-3 bg-black bg-opacity-70 text-white text-caption 2xl:text-paragraph px-4 py-1 rounded-md'>
                        🔥  
                    </div>
                </div>

                <!-- Informações do vídeo -->

                <div class='p-3 text-white flex flex-col justify-between h-[50%]'>
                    <p class='text-gray-400 text-caption 2xl:text-paragraph'>$description | $username</p>

                    <h3 class='text-paragraph 2xl:text-subtitle leading-tight break-words overflow-hidden line-clamp-3'
                        style='
                            display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            text-overflow: ellipsis;
                        '
                    >
                        $title
                    </h3>

                    <p class='text-gray-400 text-caption 2xl:text-paragraph'>$views views • $planned_events</p>
                </div>
            </a>
        HTML;
    }

    private function Channel (
        string $url,
        string $duration,
        DateTime $created_at,
        string $title,
        string $comments,
        int $likes,
        int $views
    ) {

        return <<<HTML
            <a href='$url' class='card flex flex-col cursor-pointer max-w-[340px] h-[340px] bg-[#1B1B1B] rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300'>
                <div class='relative w-full h-[50%]'>
                    <img src='{$this->thumbnail_url}' class='w-full h-full object-cover'>
                    
                    <div class='absolute top-3 right-3 bg-black bg-opacity-70 text-white text-caption px-2 py-1 rounded-md'>
                        <p class='text-white text-caption 2xl:text-paragraph'>$duration</p>
                    </div>
                </div>

                <!-- Informações do vídeo -->

                <div class='p-4 text-white flex flex-col justify-between flex gap-1'>
                    <p class='text-gray-400 text-caption 2xl:text-paragraph'>$created_at</p>

                    <h3 class='text-paragraph 2xl:text-subtitle leading-tight break-words overflow-hidden line-clamp-3'
                        style='
                            display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            text-overflow: ellipsis;
                        '
                    >
                        $title
                    </h3>
                    
                    <div class='flex justify-between mt-4'>
                        <div class='flex gap-2 items-center'>
                            <div>
                                <img src='/VHS/public/icons/comments-card.svg' class='w-full h-full'>
                            </div>
                            <p class='text-gray-400 text-caption 2xl:text-paragraph'>$comments</p>
                        </div>

                        <div class='flex gap-2 items-center'>
                            <div>
                                <img src='/VHS/public/icons/star-card.svg' class='w-full h-full'>
                            </div>
                            <p class='text-gray-400 text-caption 2xl:text-paragraph'>$likes</p>
                        </div>

                        <div class='flex gap-2 items-center'>
                            <div>
                                <img src='/VHS/public/icons/views-card.svg' class='w-full h-full'>
                            </div>
                            <p class='text-gray-400 text-caption 2xl:text-paragraph'>$views</p>
                        </div>
                    </div>
                </div>
            </a>
        HTML;
    }

    private function Channels (
        string $url,
        string $thumbnail_url,
        int $duration,
        string $username,
        string $title,
        int $views,
        DateTime $created_at
    ) {

        return <<<HTML
            <a href='$url' class='card flex flex-col cursor-pointer max-w-[340px] h-[340px] bg-[#1B1B1B] rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300'>
                <div class='relative w-full h-[50%]'>
                    <img src='$thumbnail_url' class='w-full h-full object-cover'>

                    <div class='absolute top-3 right-3 bg-black bg-opacity-70 px-2 py-1 rounded-md'>
                        <p class='text-white text-caption 2xl:text-paragraph'>$duration</p>
                    </div>
                </div>

                <!-- Informações do vídeo -->

                <div class='p-4 text-white flex flex-col justify-between h-[50%]'>
                    <p class='text-gray-400 text-caption 2xl:text-paragraph'>$username</p>

                    <h3 class='text-paragraph 2xl:text-subtitle leading-tight break-words overflow-hidden line-clamp-3'
                        style='
                            display: -webkit-box;
                            -webkit-line-clamp: 2;
                            -webkit-box-orient: vertical;
                            text-overflow: ellipsis;
                        '
                    >
                        $title
                    </h3>

                    <p class='text-gray-400 text-caption 2xl:text-paragraph'>$views views • $created_at</p>
                </div>
            </a>
        HTML;
    }

    private function Fast (
        string $url,
        string $thumbnail_url,
        string $title,
        int $likes,
        int $views
    ) {

        return <<<HTML
            <a href='$url' class='cursor-pointer h-[35rem] relative flex items-center justify-center current_fast rounded-2xl'>
                <img src='$thumbnail_url' class='w-full object-cover h-full absolute rounded-2xl'>

                <div class='block w-full bottom-12 absolute px-1'>
                    <h2 class='text-white ml-3.5'>$title</h2>

                    <div class='mt-2 w-full flex gap-4 px-4 absolute'>
                        <div class='flex items-center gap-2.5'>
                            <img src='/VHS/public/icons/fastIcon/Vector.svg' alt='coração'>
                            <p class='text-sm text-white'>$likes</p>
                        </div>

                        <div class='flex items-center gap-2.5'>
                            <img src='/VHS/public/icons/fastIcon/eyeIcon.svg' alt='visualizações'>
                            <p class='text-sm text-white'>$views</p>
                        </div>
                    </div>
                </div>
            </a>

            <script defer src='/VHS/src/views/components/CardFastComponent/cardFast.js'></script>
        HTML;
    }

}