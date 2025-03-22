<div class="absolute bottom-3 fixed w-full">
    <div class="flex flex-1 justify-center items-center">
        <div class="flex px-2 bg-cont-600 py-1 gap-8 justify-center rounded-full align-middle">
            @foreach($sections as $section)
                <div class="p-1">
                    <div class="opacity-25 bg-cont-950 h-8 text-white hover:opacity-80 hover:bg-cont-100 hover:text-black align-middle rounded-full px-2">
                        <a class="inline-flex align-middle capitalize" href="#">{{$section['name']}}</a>
                    </div>
                </div>
            @endforeach
            <div class="p-1">
                <label class="relative inline-flex cursor-pointer items-center">
                    <input type="checkbox" id="themeSwitcher" class="peer sr-only" />
                    <div class="transition-color delay-100 ease-in-out duration-500 peer flex h-8 items-center gap-2 rounded-full bg-light-600 px-2 after:absolute after:h-7 after:w-8 after:rounded-full after:bg-white/40 after:transition-all after:delay-100 after:ease-in-out after:duration-500 after:content-[''] peer-checked:bg-dark-600 peer-checked:after:translate-x-full peer-focus:outline-none text-sm text-white">
                        <svg class="h-6 ml-1 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                        </svg>
                        <svg class="h-6 mr-1 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                        </svg>
                    </div>
                </label>
            </div>
            <div class="p-1">
                <div class="opacity-25 bg-cont-950 h-8 text-white hover:opacity-80 hover:bg-cont-100 hover:text-black align-middle rounded-full px-2">
                    @switch(App::currentLocale())
                        @case('ru')
                            <a class="inline-flex align-middle capitalize" href="setLocale?locale=en">En</a>
                            @break
                        @case('en')
                            <a class="inline-flex align-middle capitalize" href="setLocale?locale=ru">Ru</a>
                            @break
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</div>
