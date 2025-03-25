<div class="flex-1 flex-col text-md text-center text-dark-800 dark:text-light-200 p-8 lg:text-xl">
    <p class="text-xl lg:text-2xl text-center font-bold mb-2">Связаться со мной</p>
    <p>Если необходимо связаться со мной, вот несколько вариантов: </p>
    <p><span class="capitalize">Телефон: </span><a href="tel:{{\Illuminate\Support\Str::replaceMatches('/[ ()-]++/', '', $phone)}}">{{$phone}}</a></p>
    <p><span class="capitalize">E-mail: </span><a href="mailto:{{$email}}">{{$email}}</a></p>
    @foreach($socials as $channel => $link)
        <p> <span class="capitalize">{{$channel}}</span>:
            <a href="{{$link}}"><img class="w-20 h-20 inline" src="{{Vite::social("$channel.png")}}"></a>
        </p>
    @endforeach
</div>
