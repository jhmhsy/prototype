{{-- resources/views/components/swiper-gallery.blade.php --}}
<div class="swiper-container">
    <h3>Swiper Theme</h3>
    <p>This is a nice Swiper.js application by <a href="https://marcogargano.com" target="_blank">Marco</a></p>
    <div class="swiper-full">
        <div class="swiper-wrapper">
            @foreach($images as $image)
            <div class="swiper-slide">
                <img src="{{ asset($image['path']) }}" alt="{{ $image['alt'] }}" class="img-fluid">
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>

{{-- Example usage in another blade file: --}}
@php
$images = [
['path' => 'images/_trattamenti/kin-1.jpg', 'alt' => 'KinHealth - Trattamenti'],
['path' => 'images/_trattamenti/kin-2.jpg', 'alt' => 'KinHealth - Trattamenti'],
['path' => 'images/_trattamenti/kin-3.jpg', 'alt' => 'KinHealth - Trattamenti'],
['path' => 'images/_trattamenti/kin-4.jpg', 'alt' => 'KinHealth - Trattamenti'],
['path' => 'images/_trattamenti/kin-5.jpg', 'alt' => 'KinHealth - Trattamenti'],
['path' => 'images/_trattamenti/kin-6.jpg', 'alt' => 'KinHealth - Trattamenti'],
];
@endphp

<x-swiper-gallery :images="$images" />