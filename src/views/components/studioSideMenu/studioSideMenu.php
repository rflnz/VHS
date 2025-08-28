<?php

namespace Src\Views\Components;

function StudioSideMenu() {
    return <<<HTML
        <aside id="sidebar" class="w-44 ml-[1.87rem] transition-all duration-500 ease-in-out top-20 z-10 h-full">
            <h2 class="w-[11rem] pt-[1.18rem] ml-[0.5rem] text-gray-400 text-xs font-poppins">VHS STUDIO</h2>

            <ul>
                <li class="menu-item flex items-center text-gray-300 rounded-lg cursor-pointer mt-[1.5rem] transition-transform duration-200">
                    <a href="/VHS/src/views/pages/studio/" class="flex items-center w-full p-2">
                        <div class="analytics-icon icon w-[2rem] h-[2rem] flex items-center justify-center rounded-[12px] ml-[0.31rem] ">
                            <img src="/VHS/public/icons/sidebar_studio/Analytics.svg">
                        </div>
                        <h2 class="menu-text ml-[1rem] text-gray-400 text-sm font-semibold transition-all duration-500 ease-in-out">Analytics</h2>
                    </a>
                </li>
    
                <li class="flex items-center text-gray-300 rounded-lg cursor-pointer mt-[2rem]">
                    <a href="/VHS/src/views/pages/studio/content" class="flex items-center w-full p-2">
                        <div class="conteudo-icon icon w-[2rem] h-[2rem] flex items-center justify-center rounded-[12px] ml-[0.31rem]">
                            <img src="/VHS/public/icons/sidebar_studio/Conteúdo.svg">
                        </div>
                        <h2 class="menu-text ml-[1rem] text-gray-400 text-sm font-semibold transition-all duration-500 ease-in-out">Conteúdo</h2>
                    </a>
                </li>
    
                <li class="flex items-center text-gray-300 rounded-lg cursor-pointer mt-[2rem]">
                    <a href="/VHS/src/views/pages/studio/edit-channel" class="flex items-center w-full p-2">
                        <div class="customizar-icon icon w-[2rem] h-[2rem] flex items-center justify-center rounded-[12px] ml-[0.31rem]">
                            <img src="/VHS/public/icons/sidebar_studio/Customizar.svg" class="w-[3rem] h-[3rem]">
                        </div>
                        <h2 class="menu-text ml-[1rem] text-gray-400 text-sm font-semibold transition-all duration-500 ease-in-out">Customizar</h2>
                    </a>
                </li>

                <li class="flex items-center text-gray-300 rounded-lg cursor-pointer mt-[2rem]">
                    <a href="/VHS/src/views/pages/studio/comments" class="flex items-center w-full p-2">
                    <div class="comentarios-icon icon w-[2rem] h-[2rem] flex items-center justify-center rounded-[12px] ml-[0.31rem]">
                        <img src="/VHS/public/icons/sidebar_studio/Comentários.svg" class="w-[3rem] h-[3rem]">
                    </div>
                        <h2 class="menu-text ml-[1rem] text-gray-400 text-sm font-semibold transition-all duration-500 ease-in-out">Comentários</h2>
                    </a>
                </li>
    
                <li class="flex items-center text-gray-300 rounded-lg cursor-pointer mt-[2rem]">
                    <a href="/VHS/src/views/pages/studio/content/create/video" class="flex items-center w-full p-2">
                        <div class="criar-icon icon w-[2rem] h-[2rem] flex items-center justify-center rounded-[12px] ml-[0.31rem]">
                            <img src="/VHS/public/icons/sidebar_studio/Criar.svg">
                        </div>
                        <h2 class="menu-text ml-[1rem] text-gray-400 text-sm font-semibold transition-all duration-500 ease-in-out">Criar</h2>
                    </a>
                </li>
            </ul>
        </aside>

        <script src="/VHS/src/views/components/studioSideMenu/studioSideMenu.js"></script>
    HTML;
}