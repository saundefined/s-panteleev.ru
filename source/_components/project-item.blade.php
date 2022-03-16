<div class="flex items-start p-5 bg-white shadow-3xl rounded-xl">
    <div class="ml-5">
        <a href="{{ $project->getUrl() }}" class="font-bold md:text-2xl text-lg hover:no-underline transition-all text-dark-purplish-blue hover:text-blue-500">{{ $project->title }}</a>
        <p class="font-normal text-base leading-7 text-gray-600 mt-2">
            {{ $project->description }}
        </p>
    </div>
</div>