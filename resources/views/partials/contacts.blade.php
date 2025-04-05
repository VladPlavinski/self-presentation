<div class="flex-1 flex-col text-center p-8">
    <div class="content-center h-full">
        <p class="text-3xl w-1/2 mx-auto">{{__('contacts.message')}}: </p>
        <div class="my-4 text-2xl">
            <p><span>{{__('contacts.by_phone')}}</span> <a href="tel:{{$clearPhone}}" class="button">{{$phone}}</a></p>
            <p><span>{{__('contacts.by_mail')}}</span> <a href="mailto:{{$gmail}}" class="button">{{$gmail}}</a></p>
        </div>
        <div class="my-4">
            <p class="text-2xl">{{__('contacts.by_social')}}</p>
            <div class="w-1/5 flex justify-center mx-auto">
                @foreach($socials as $channel => $link)
                        <a class="p-4" href="{{$link}}"><img class="size-10" src="{{Vite::social("$channel.png")}}" alt="{{__("social.$channel")}}" title="{{__("social.$channel")}}"></a>
                @endforeach
            </div>
        </div>
        <div class="relative">
            <div class="absolute top-45 right-0 text-sm">
                <p>Made by Vlad Plavinski on Laravel, 2025</p>
            </div>
        </div>
    </div>
</div>
