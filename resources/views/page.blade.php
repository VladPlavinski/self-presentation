<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Self Presentation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cont-100 text-xl dark:bg-dark-950 text-light-800 dark:text-dark-100 transition-all duration-500 ease-in-out">
    <div>
        <input type="checkbox" id="loader" class="peer sr-only" />
        <div class="opacity-100 peer-checked:opacity-0 transition-opacity duration-500 ease-out absolute top-0 size-full content-center z-100 bg-dark-950 has:opacity-0">
            <div class="rounded-full mx-auto size-25 bg-conic from-cont-300 to-80% animate-spin content-center">
                <div class="rounded-full bg-dark-950 mx-auto size-20"></div>
            </div>
        </div>
    </div>
    <div>
        <div id="container" class="relative h-screen snap-y snap-mandatory overflow-y-auto overflow-x-hidden px-2">
            @include('partials.abstractBackground')
            @foreach($data['sections'] as $section)
                <section id="{{$section['id']}}" class="relative snap-start shrink-0 h-screen item-center my-2 p-4 z-1">
                    <div class="flex flex-row rounded-xl size-full shadow-xl shadow-cont-700 dark:shadow-cont-500 bg-light-100/75 dark:bg-dark-400/75 border-2 border-light-200 dark:border-dark-600 overflow-hidden">
                        @foreach($section['parts'] as $part)
                            @if(count($section['parts']) > 1)
                                @include("partials.{$section['id']}.$part", $section['partsData'][$part] ?? [])
                            @else
                                @include("partials.$part", $section['partsData'][$part] ?? [])
                            @endif
                        @endforeach
                    </div>
                </section>
            @endforeach
        </div>
    </div>
    @include('partials.menu', ['sections' => $data['sections']])
</body>
</html>
