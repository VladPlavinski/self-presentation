<div class="w-2/6 p-2 bg-light-200 dark:bg-dark-600">
    <p class="text-2xl text-center font-bold mb-2">{{__("$prefix.title")}}</p>
    <div class="my-4">
        <img class="max-h-70 mx-auto rounded-full opacity-100 border-4 border-light-600 dark:border-dark-800" src="{{Vite::asset('resources/images/self-photo.jpg')}}" title="{{__("$prefix.name")}}">
    </div>
    @foreach($baseInfo as $row)
        <div class="flex px-5">
            <div class="size-10 inline fill-light-600 dark:fill-dark-200" title="{{__("$prefix.".$row['name']."Title")}}">
                {!! app('svg')->get($row['svg'] ?? $row['name']) !!}
            </div>
            <span class="content-center ml-4">
                {{__("$prefix.".$row['name'], $row['additionalToText'] ?? [])}}
            </span>
        </div>
    @endforeach
    <div class="pl-10 pr-6 py-2 -ml-6 -mr-2 my-4 bg-light-600 text-light-200 rounded-l-xl dark:bg-dark-200 dark:text-dark-600">
        @foreach($languages as $lang => $level)
            <div class="flex flex-row">
                <span class="flex-1">{{__("$prefix.languages.$lang")}}</span>
                <div class="flex-2 flex gap-4 justify-center hover:bg-opacity-50 hover-[&div]:border-red group">
                    @for($i = 1; $i <= 6; $i++)
                        @if($i <= $level)
                            <div class="size-5 rounded-full bg-light-200 dark:bg-dark-800 group-hover:bg-light-100 dark:group-hover:bg-dark-400 hover:outline-white dark:hover:outline-dark-900 hover:outline-3" title="{{__("$prefix.languageLevels.$i")}}"></div>
                        @else
                            <div class="size-5 rounded-full border-solid border-2 border-light-200 dark:border-dark-800 bg-transparent hover:outline-white dark:hover:outline-dark-900 hover:outline-3" title="{{__("$prefix.languageLevels.$i")}}"></div>
                        @endif
                    @endfor
                </div>
            </div>
        @endforeach
    </div>
     <div class="flex justify-between px-5 mt-2">
        @foreach($socials as $channel => $link)
            <a class="size-12 inline p-2 bg-light-100/75 dark:bg-dark-100/75 border-light-600 dark:border-dark-200 border-2 rounded-lg fill-light-600 dark:fill-dark-800" href="{{$link}}" title="{{__("social.$channel")}}">
                {!! app('svg')->get($channel) !!}
            </a>
        @endforeach
    </div>
</div>
