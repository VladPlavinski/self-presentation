<div class="flex-1 p-2 text-md text-center text-dark-800 dark:text-light-200 lg:text-xl">
    <p class="text-xl lg:text-2xl font-bold mb-2">Стек используемых технологий:</p>
    <div class="grid grid-cols-3 gap-4">
        @foreach($stack as $skill)
            <div class="p-2 bg-dark-200/75 rounded-lg">
                <img class="h-auto w-10 mx-auto" src="{{Vite::stack("$skill.png")}}">
            </div>
        @endforeach
    </div>
</div>
