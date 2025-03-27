<div class="w-3/5 p-2 text-md text-dark-800 dark:text-light-200 lg:text-xl overflow-hidden">
    <p class="text-xl lg:text-2xl text-center font-bold mb-2">{{__("$prefix.title")}}</p>
    <div class="w-full h-full overflow-x-hidden">
        <div class="relative z-10">
            <div class="absolute top-60 w-full flex justify-between">
                <div id="sliderLeft" class="h-11 w-10 bg-cont-100/60 p-3 rounded-r-full">
                    <div class="cursor-pointer absolute border-l-2 border-b-2 h-5 w-5 border-dark-700/60 rotate-45"></div>
                </div>
                <div id="sliderRight" class="h-11 w-10 bg-cont-100/60 p-3 rounded-l-full">
                    <div class="cursor-pointer absolute border-r-2 border-t-2 h-5 w-5 border-dark-700/60 rotate-45"></div>
                </div>
            </div>
        </div>
        <div id="slider" class="relative gap-30 flex snap-x snap-mandatory overflow-x-auto px-30 pb-4 scroll-none">
            @foreach($companies as $company)
                <div class="snap-center w-5/6 p-3 shrink-0 bg-gray-100 rounded-xl">
                    <div class="content-center h-50 bg-dark-300 w-full p-4">
                        <img class="max-w-100 mx-auto max-h-40 min-h-20" src="{{Vite::company("{$company['id']}.png")}}" alt="{{__("$prefix.{$company['id']}.name")}}">
                    </div>
                    <p class="my-2"><a href="{{$company['link']}}">{{__("$prefix.{$company['id']}.name")}}</a> ({{$company['year']}})</p>
                    <ul class="list-disc">
                        @foreach(__("$prefix.{$company['id']}.features") as $feature)
                            <li class="ml-8">{{$feature}}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>
