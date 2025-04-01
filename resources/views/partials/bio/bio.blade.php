<div class="flex-2 p-2 bg-gradient-to-l from-light-600 dark:from-dark-800 to-light-200 dark:to-dark-400 opacity-75">
    <p class="text-2xl text-center font-bold">{{__("$prefix.title")}}</p>
    <div class="h-full px-2 content-center">
        <div class="bg-cont-200/50 rounded-xl p-4">
            @foreach($sections as $section)
                <p class="text-justify indent-6 my-2">{!! __("$prefix.$section")!!}</p>
            @endforeach
        </div>
    </div>
</div>
