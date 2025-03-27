<div class="flex-1 flex-col text-md text-center text-dark-800 dark:text-light-200 p-8 lg:text-xl">
    <div class="content-center h-full">
        <p class="text-xl lg:text-3xl w-1/2 mx-auto">{{__('contacts.message')}}: </p>
        <div class="my-4 text-xl lg:text-2xl">
            <p><span>{{__('contacts.by_phone')}}</span> <a href="tel:{{\Illuminate\Support\Str::replaceMatches('/[ ()-]++/', '', $phone)}}">{{$phone}}</a></p>
            <p><span>{{__('contacts.by_mail')}}</span> <a href="mailto:{{$email}}">{{$email}}</a></p>
        </div>
        <div class="my-4">
            <p class="text-xl lg:text-2xl">{{__('contacts.by_social')}}</p>
            <div class="w-1/5 flex justify-center mx-auto">
                @foreach($socials as $channel => $link)
                        <a class="p-4" href="{{$link}}"><img class="w-10 h-10" src="{{Vite::social("$channel.png")}}"></a>
                @endforeach
            </div>
        </div>
        <div class="relative">
            <div class="absolute top-45 right-0 text-light-300 text-sm">
                <p>Site was made by Vlad Plavinski on Laravel, 2025.</p>
            </div>
        </div>
    </div>
</div>
