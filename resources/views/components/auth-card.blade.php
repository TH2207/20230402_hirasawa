<div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-0 bg-gray-100">
    <!-- <div>
        {{ $logo }}
    </div> -->
    <h1 class="w-full sm:max-w-md px-6 py-4 bg-blue text-white sm:rounded-lg-top">{{ $title }}</h1>
    <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg-bottom">
        {{ $slot }}
    </div>
</div>