<div class="flex-2 p-2 px-16 text-md text-dark-800 dark:text-light-200 lg:text-xl overflow-hidden">
    <p class="text-xl lg:text-2xl text-center font-bold mb-2">Проекты</p>
    <div class="w-full h-full overflow-x-hidden">
        <div class="relative gap-30 flex snap-x snap-mandatory overflow-x-auto px-30 pb-4 m-8">
            @foreach($companies as $company)
                <div class="snap-center w-5/6 py-3 shrink-0 bg-gray-100 rounded-xl">
                    <img class="w-80" src="{{Vite::company("{$company['id']}.png")}}">
                    <p><a href="{{$company['link']}}">{{$company['name']}}</a> ({{$company['year']}})</p>
                    <p>{{$company['features']}}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
