<nav aria-labelledby="nav-heading" :aria-expanded="isOpen"
     class="container flex flex-wrap items-center justify-between py-5" x-data="{ isOpen: false }"
     @keydown.escape="isOpen = false" @click.away="isOpen = false">
    <a aria-label="logo" href="{{ $page->baseUrl }}">
        <span class="font-bold text-xl lg:text-lg text-dark-purplish-blue">{{ $page->siteName }}</span>
    </a>

    <button :aria-expanded="isOpen" aria-controls="nav-list" aria-label="toggle menu" @click="isOpen = !isOpen"
            type="button" class="block px-2 text-indigo-900 lg:hidden focus:outline-none">
        <svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path x-show.transition="!isOpen"
                  d="M3 7h18a1 1 0 100-2H3a1 1 0 000 2zm18 10H3a1 1 0 000 2h18a1 1 0 000-2zm0-4H3a1 1 0 000 2h18a1 1 0 000-2zm0-4H3a1 1 0 000 2h18a1 1 0 000-2z"/>

            <path x-show="isOpen"
                  d="M13.41 12l6.3-6.29a1.004 1.004 0 00-1.42-1.42L12 10.59l-6.29-6.3a1.004 1.004 0 10-1.42 1.42l6.3 6.29-6.3 6.29a.999.999 0 000 1.42 1 1 0 001.42 0l6.29-6.3 6.29 6.3a1.001 1.001 0 001.639-.325 1 1 0 00-.22-1.095L13.41 12z"/>
        </svg>
    </button>

    <!--Menu-->
    <div class="flex-grow w-full lg:flex lg:items-center lg:w-auto hidden"
         :class="{ 'block': isOpen, 'hidden': !isOpen }">
        <ul id="nav-list"
            class="flex-wrap items-center justify-end flex-1 pt-6 space-y-5 lg:space-y-0 lg:pt-0 list-reset lg:flex lg:space-x-10">
            <li>
                <a class="text-xl font-medium lg:text-lg text-dark-purplish-blue hover:text-blue-500"
                   href="{{ $page->baseUrl }}/">Главная</a>
            </li>
            <li>
                <a class="text-xl font-medium lg:text-lg text-dark-purplish-blue hover:text-blue-500"
                   href="{{ $page->baseUrl }}/posts/">Статьи</a>
            </li>
            <li>
                <a class="text-xl font-medium lg:text-lg text-dark-purplish-blue hover:text-blue-500"
                   href="{{ $page->baseUrl }}/projects/">Проекты</a>
            </li>
            <li>
                <a class="text-xl font-medium lg:text-lg text-dark-purplish-blue hover:text-blue-500"
                   href="{{ $page->baseUrl }}/about/">Обо мне</a>
            </li>
        </ul>
    </div>
</nav>