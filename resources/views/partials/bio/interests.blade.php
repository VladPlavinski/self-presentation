<div class="flex-1 p-2 bg-light-600 dark:bg-dark-800 opacity-75">
    <p class="text-2xl text-center font-bold mb-2">{{__("$prefix.title")}}</p>
    <ul class="hidden">
        @foreach(__("$prefix.interests") as $item)
            <li class="ml-4">{{$item}}</li>
        @endforeach
    </ul>
    <div id="chartdiv" class="size-full"></div>
    <script>
        var chartData = [
            @foreach($percentage as $key => $value)
                {
                    value: {{$value}},
                    category: '{{__("$prefix.interests.$key")}}',
                },
            @endforeach
        ];
    </script>
</div>
