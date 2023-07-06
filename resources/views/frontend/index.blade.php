{{-- Llamado por: index() en app/Http/Controllers/UserController.php --}}

@extends('frontend.frontend_dashboard')
@section('main')

<!-- banner-section -->
@include('frontend.home.banner')

<!-- category-section -->
@include('frontend.home.category')

<!-- feature-section -->
@include('frontend.home.feature')

<!-- video-section -->
@include('frontend.home.video')

<!-- deals-section -->
@include('frontend.home.deals')

<!-- testimonial-section end -->
@include('frontend.home.testimonial')

<!-- choose us - section -->
@include('frontend.home.chooseus')

<!-- place-section -->
@include('frontend.home.place')

<!-- team-section AGENTES -->
@include('frontend.home.team')

<!-- cta-section -->
@include('frontend.home.cta')

<!-- news-section BLOG -->
@include('frontend.home.news')


<!-- download-section -->
@include('frontend.home.download')

@endsection
