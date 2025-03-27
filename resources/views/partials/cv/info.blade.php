<div class="w-2/6 p-2 ml-4 text-md text-dark-800 dark:text-light-200 lg:text-xl">
    <p class="text-xl lg:text-2xl text-center font-bold mb-2">{{__("$prefix.title")}}</p>
    <p>{{__("$prefix.name")}}</p>
    <p>{{__("$prefix.born", ['date' => $birthdate, 'years' => $yearsOld.' '.trans_choice("$prefix.years", $yearsOld)])}}</p>
    <p>{{__("$prefix.education")}}</p>
    <p>{{__("$prefix.langs")}}</p>
    <div class="my-4">
        <img class="max-h-80 rounded-lg" src="{{Vite::asset('resources/images/self-photo.jpg')}}">
    </div>
    <p><span>{{__("social.phone")}}: </span><a href="tel:{{\Illuminate\Support\Str::replaceMatches('/[ ()-]++/', '', $phone)}}">{{$phone}}</a></p>
    <p><span>{{__("social.mail")}}: </span><a href="mailto:{{$email}}">{{$email}}</a></p>
    <div class="flex justify-around px-5 mt-2">
        @foreach($socials as $channel => $link)
            <a href="{{$link}}"><img class="w-10 h-10 inline" src="{{Vite::social("$channel.png")}}"></a>
        @endforeach
    </div>
</div>
