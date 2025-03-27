<div class="flex-1 p-2 text-md text-dark-800 dark:text-light-200 lg:text-xl">
    <p class="text-xl lg:text-2xl text-center font-bold mb-2">{{__("$prefix.title")}}</p>
    <ul>
        @foreach(__("$prefix.interests") as $item)
            <li class="ml-4">{{$item}}</li>
        @endforeach
    </ul>
</div>
