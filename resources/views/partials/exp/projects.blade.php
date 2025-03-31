<div class="w-3/5 py-2 overflow-hidden">
    <p class="text-2xl text-center font-bold mb-2">{{__("$prefix.title")}}</p>
    <div class="size-full overflow-x-hidden shadow-xl shadow-cont-700 dark:shadow-cont-500">
        <div class="relative z-10">
            <div class="absolute top-60 w-full flex justify-between">
                <div id="sliderLeft" class="h-11 w-10 p-3 bg-cont-200/75 rounded-r-full">
                    <div class="cursor-pointer absolute border-light-600 dark:border-dark-700 border-l-2 border-b-2 size-5 rotate-45"></div>
                </div>
                <div id="sliderRight" class="h-11 w-10 p-3 bg-cont-200/75 rounded-l-full">
                    <div class="cursor-pointer absolute border-light-600 dark:border-dark-700 border-r-2 border-t-2 size-5 rotate-45"></div>
                </div>
            </div>
        </div>
        <div id="slider" class="relative gap-30 flex snap-x snap-mandatory overflow-x-auto px-30 pb-4 scroll-none h-fit pt-10">
            @foreach($companies as $company)
                <div class="snap-center w-5/7 shrink-0 rounded-xl bg-light-600 dark:bg-dark-700 border-4 border-light-600 dark:border-dark-700 text-light-200 dark:text-dark-200 overflow-hidden">
                    <div class="content-center h-40 w-full bg-cont-200/75 shadow-lg dark:shadow-inner shadow-cont-700 dark:shadow-cont-500">
                        <img class="max-w-100 mx-auto max-h-40 min-h-30 p-4 rounded-xl" src="{{Vite::company("{$company['id']}.png")}}" alt="{{__("$prefix.{$company['id']}.name")}}">
                    </div>
                    <div class="px-4 mt-2">
                        <p class="text-center"><a class="link" href="{{$company['link']}}">{{__("$prefix.{$company['id']}.name")}}</a> ({{$company['year']}})</p>
                        <ul class="list-disc my-2">
                            @foreach(__("$prefix.{$company['id']}.features") as $feature)
                                <li class="ml-8">{{$feature}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
