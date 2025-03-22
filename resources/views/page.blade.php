<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Self Presentation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="px-2 bg-cont-200 dark:bg-cont-800">
    <div class="relative">
        <div class="relative h-screen snap-y snap-mandatory overflow-y-auto">
            @foreach($data['sections'] as $section)
                <section class="snap-start shrink-0 h-screen item-center my-2 p-4">
                    <div class="flex bg-light-200 dark:bg-dark-800 opacity-80 border-1 border-light-800 dark:border-dark-200 flex-row rounded-xl w-full h-full transition-all duration-500 ease-in-out">
                        @if(array_key_exists('parts', $section))
                        @foreach($section['parts'] as $part)
                            @include("partials.$part", ['data' => $section['partsData'][$part]])
                        @endforeach
                        @else
                            <div class="flex flex-1"></div>
                            <div class="flex flex-1 items-center text-dark-800 dark:text-light-200">
                                <p class="text-center w-full capitalize text-2xl">{{$section['name']}}</p>
                            </div>
                            <div class="flex flex-1"></div>
                        @endif
                    </div>
                </section>
            @endforeach
        </div>
    </div>
    @include('partials.menu', ['sections' => $data['sections']])
@if(request()->get('color') == 'Y')
    @foreach($data['colors'] as $color)
        <div class="w-full flex py-2 justify-between flex-row">
                <div class="flex {{"bg-".$color."-50"}} w-20 h-20 border-1 border-solid rounded-lg"></div>
                @for($i = 1; $i <10; $i++)
                    <div class="flex bg-{{$color}}-{{$i}}00 w-20 h-20 border-1 border-solid rounded-lg"></div>
                @endfor
                <div class="flex bg-{{$color}}-950 w-20 h-20 border-1 border-solid rounded-lg"></div>
        </div>
    @endforeach
@endif
</body>
</html>
