<div class="flex-1 p-2 text-md text-dark-800 dark:text-light-200 lg:text-xl">
    <p class="text-xl lg:text-2xl font-bold mb-2">Контакты:</p>
    <img class="w-80" src="{{Vite::asset('resources/images/self-photo.jpg')}}">
    <p>Влад Плавинский</p>
    <p>Образование: высшее, инженер-программист</p>
    <p>Языки: русский, английский</p>
    <p><span>Телефон: </span><a href="tel:{{\Illuminate\Support\Str::replaceMatches('/[ ()-]++/', '', $phone)}}">{{$phone}}</a></p>
    <p><span>E-mail: </span><a href="mailto:{{$email}}">{{$email}}</a></p>
    <p class="text-center">Социальные сети:</p>
    <div class="flex justify-between px-5">
        @foreach($socials as $channel => $link)
            <a href="{{$link}}"><img class="w-10 h-10 inline" src="{{Vite::social("$channel.png")}}"></a>
        @endforeach
    </div>
</div>
