<div class="mt-10 md:mt-20 md:col-span-2 xl:col-span-3">
    <ul class="flex items-center justify-center space-x-6 cursor-default md:space-x-10">
        @if ($previous = $pagination->previous)
            <li class="justify-center text-sm">
                <a class="justify-center font-medium text-sm text-gray-600 hover:text-dark-purplish-blue"
                   href="{{ $previous }}"><span>«</span></a>
            </li>
        @endif

        @foreach ($pagination->pages as $pageNumber => $path)
            <li class="justify-center text-sm">
                <a class="justify-center font-medium text-sm {{ (int)$pagination->currentPage === (int)$pageNumber ? 'text-dark-purplish-blue' : 'text-gray-600 hover:text-dark-purplish-blue' }}"
                   href="{{ $path }}">{{ $pageNumber }}</a>
            </li>
        @endforeach

        @if ($next = $pagination->next)
            <li class="justify-center text-sm">
                <a class="justify-center font-medium text-sm text-gray-600 hover:text-dark-purplish-blue" href="{{ $next }}"><span>»</span></a>
            </li>
        @endif
    </ul>
</div>