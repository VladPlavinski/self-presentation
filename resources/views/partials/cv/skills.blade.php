<div class="flex-col w-4/6">
    <div class="flex-1 flex flex-row gap-4 p-2 text-md text-dark-800 dark:text-light-200 lg:text-xl">
        <div class="flex-2">
            <p class="text-xl lg:text-2xl text-center font-bold mb-2">{{__("$prefix.title")}}</p>
            <div class="my-6 indent-4">
                <p>{{__("$prefix.bio")}}</p>
                <p>{{__("$prefix.bioExp")}}</p>
            </div>
        </div>
        <div class="flex-1">
            <p class="text-xl lg:text-2xl text-center font-bold mb-2">{{__("$prefix.soft")}}</p>
            <div class="my-6">
                <ul>
                    @foreach(__("$prefix.soft-skills") as $soft)
                    <li class="ml-4">{{$soft}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="flex-1 p-2 text-md text-center text-dark-800 dark:text-light-200 lg:text-xl">
        <p class="text-xl lg:text-2xl text-center font-bold mb-2">{{__("$prefix.skills")}}</p>
        <div class="grid my-6 grid-rows-3 grid-flow-col gap-4">
            @foreach($stack as $skill)
                <div class="p-2 bg-dark-200/75 rounded-lg content-center">
                    <img class="max-w-25 max-h-15 mx-auto" alt="{{$skill}}" src="{{Vite::stack("$skill.png")}}">
                </div>
            @endforeach
        </div>
    </div>
</div>
