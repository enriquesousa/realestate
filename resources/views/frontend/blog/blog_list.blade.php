{{-- Llamado por: BlogCatList en app/Http/Controllers/Backend/BlogController.php --}}
@extends('frontend.frontend_dashboard')
@section('main')

 <!--Page Title-->
 <section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});"></div>
        <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Blogs</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('casa') }}">Inicio</a></li>
                <li>Blogs</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- sidebar-page-container -->
<section class="sidebar-page-container blog-grid sec-pad-2">
    <div class="auto-container">
        <div class="row clearfix">

            {{-- content-side --}}
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">

                {{-- blog-grid-content --}}
                <div class="blog-grid-content">
                    <div class="row clearfix">

                        @php
                            Config::set('custom.display_preload', false)
                        @endphp

                        @foreach ($blog as $item)
                        <div class="col-lg-6 col-md-6 col-sm-12 news-block">
                            <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image"><a href="{{ url('blog/details/'.$item->post_slug) }}"><img src="{{ asset($item->post_image) }}" alt=""></a></figure>
                                        <span class="category">{{ $item['cat']['category_name'] }}</span>
                                    </div>
                                    <div class="lower-content">
                                        <h4><a href="{{ url('blog/details/'.$item->post_slug) }}">{{ $item->post_title }}</a></h4>
                                        <ul class="post-info clearfix">
                                            <li class="author-box">
                                                <figure class="author-thumb"><img src="{{ (!empty($item->user->photo)) ? url('upload/admin_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt=""></figure>
                                                <h5><a href="#">{{ $item->user->name }}</a></h5>
                                            </li>
                                            <li>{{ $item->created_at->format('d M Y') }}</li>
                                        </ul>
                                        <div class="text">
                                            <p>{{ $item->short_descp }}</p>
                                        </div>
                                        <div class="btn-box">
                                            <a href="{{ url('blog/details/'.$item->post_slug) }}" class="theme-btn btn-two">Ver Detalles</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    {{-- pagination-wrapper usando custom pagination --}}
                    <div class="pagination-wrapper">
                        {{ $blog->links('vendor.pagination.custom') }}
                    </div>

                </div>

            </div>

            {{-- sidebar-side --}}
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">

                {{-- blog-sidebar --}}
                <div class="blog-sidebar">

                    {{-- Search --}}
                    <div class="sidebar-widget search-widget">
                        <div class="widget-title">
                            <h4>Search</h4>
                        </div>
                        <div class="search-inner">
                            <form action="blog-1.html" method="post">
                                <div class="form-group">
                                    <input type="search" name="search_field" placeholder="Search" required="">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Follow Us On --}}
                    <div class="sidebar-widget social-widget">
                        <div class="widget-title">
                            <h4>Follow Us On</h4>
                        </div>
                        <ul class="social-links clearfix">
                            <li><a href="blog-1.html"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="blog-1.html"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="blog-1.html"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="blog-1.html"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="blog-1.html"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>

                     {{-- Category --}}
                     <div class="sidebar-widget category-widget">
                        <div class="widget-title">
                            <h4>Category</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="category-list clearfix">
                                @foreach ($blog_categories as $item)
                                    @php
                                        $cat_id = \App\Models\BlogPost::where('blogcat_id',$item->id)->get();
                                    @endphp
                                    <li><a href="{{ url('blog/cat/list/'.$item->id) }}">{{ $item->category_name }}<span>({{ count($cat_id) }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Recent Posts --}}
                    <div class="sidebar-widget post-widget">
                        <div class="widget-title">
                            <h4>Recent Posts</h4>
                        </div>
                        <div class="post-inner">

                            @foreach ($recent_posts as $item)
                            <div class="post">
                                <figure class="post-thumb"><a href="{{ url('blog/details/'.$item->post_slug) }}"><img src="{{ asset($item->post_image) }}" alt=""></a></figure>
                                <h5><a href="{{ url('blog/details/'.$item->post_slug) }}">{{ $item->post_title }}</a></h5>
                                <span class="post-date">{{ $item->created_at->format('d M Y') }}</span>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
<!-- sidebar-page-container -->

<!-- subscribe-section -->
@include('frontend.home.subscribe')

@endsection
