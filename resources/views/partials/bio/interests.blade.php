<div class="flex-1 p-2 bg-light-600 dark:bg-dark-800 opacity-75">
    <p class="text-2xl text-center font-bold mb-2">{{__("$prefix.title")}}</p>
    <div id="chartdiv" class="size-full"></div>
    <script>
        var chartData = [
            @foreach($chartData as $key => $value)
                {
                    value: {{$value}},
                    category: '{{__("$prefix.interests.$key")}}',
                },
            @endforeach
        ];
    </script>
</div>
