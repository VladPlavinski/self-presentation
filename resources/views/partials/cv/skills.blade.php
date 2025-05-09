<div class="flex-col w-4/6 mr-10">
    <div class="flex-1 p-2 text-center">
        <p class="text-2xl text-center font-bold mb-2">{{__("$prefix.stack-title")}}</p>
        <div class="grid m-6 grid-rows-3 grid-flow-col gap-4">
            @foreach($stack as $skill)
                <div class="p-2 rounded-2xl content-center bg-cont-100 shadow-lg dark:shadow-inner shadow-cont-700 dark:shadow-cont-500 border-1 border-light-400 dark:border-dark-800" title="{{__("$prefix.stack.$skill")}}">
                    <img class="max-w-25 max-h-15 mx-auto" alt="{{__("$prefix.stack.$skill")}}" src="{{Vite::stack("$skill.png")}}">
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex-1 flex flex-row gap-4 p-2">
        <div class="flex-1 text-right">
            <p class="text-2xl font-bold mb-2">{{__("$prefix.hard-title")}}</p>
            <div class="my-6">
                <ul>
                    @foreach($hard as $skill)
                        <li>{{__("$prefix.hard-skills.$skill")}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="p-3">
            <div class="h-full my-4 mx-6 ring-2 rounded-full"></div>
        </div>
        <div class="flex-1 text-left">
            <p class="text-2xl font-bold mb-2">{{__("$prefix.soft-title")}}</p>
            <div class="my-6">
                <ul>
                    @foreach($soft as $skill)
                        <li>{{__("$prefix.soft-skills.$skill")}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
