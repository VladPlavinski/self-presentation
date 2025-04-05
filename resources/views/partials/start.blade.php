<div class="opacity-80 flex-1 flex-col p-8">
    <div class="content-center text-center">
        <p class=" my-16 text-6xl">{{__('start.welcome')}}</p>
        <div class="flex justify-around">
            <p class="flex-1 px-16">{{__('start.message')}}</p>
            <p class="flex-1 px-16">{{__('start.features')}}</p>
        </div>
        <p class="my-4">{!! __('start.download', ['route' => route('document', ['locale' => App::currentLocale()])]); !!}</p>
    </div>
    <div class="flex flex-1 justify-center w-full mt-8 pb-4 content-end overflow-y-hidden">
        <div data-to="cv" class="relative -top-22 scroller size-48 cursor-pointer border-b-4 border-l-4 border-solid -rotate-55 bg-gradient-to-tr from-light-600 border-light-600 dark:border-dark-700 dark:from-dark-700 to-50% skew-y-24 "></div>
    </div>
</div>
