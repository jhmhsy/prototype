@props(['href' => '#'])
<button onclick="window.lcoation.href='{{ $href }}'"
    class="btn radius text-tint_1  py-3 px-10 inline-block text-center font-semibold transition-all duration-300 ease-linear border-none text-sm capitalize relative no-underline m-1 z-10 rounded-full hover:text-shade_9">
    {{ $slot }}
</button>
