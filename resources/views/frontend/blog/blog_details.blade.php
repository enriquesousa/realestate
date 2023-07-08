{{-- Llamado por: public function BlogDetails($slug) en app/Http/Controllers/Backend/BlogController.php --}}
@extends('frontend.frontend_dashboard')
@section('main')

@php
    Config::set('custom.display_preload', false)
@endphp

 <!--Page Title-->
<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});"></div>
        <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>{{ $blog->post_title }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('casa') }}">Inicio</a></li>
                <li>Detalles del Blog</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- sidebar-page-container -->
<section class="sidebar-page-container blog-details sec-pad-2">
    <div class="auto-container">
        <div class="row clearfix">

            {{-- Primer Columna --}}
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">

                <div class="blog-details-content">

                    {{-- Imagen, descripción y Tags --}}
                    <div class="news-block-one">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset($blog->post_image) }}" alt=""></figure>
                                <span class="category">{{ $blog->cat->category_name }}</span>
                            </div>
                            <div class="lower-content">
                                <h3>{{ $blog->post_title }}</h3>
                                <ul class="post-info clearfix">
                                    <li class="author-box">
                                        <figure class="author-thumb"><img src="{{ (!empty($blog->user->photo)) ? url('upload/admin_images/'.$blog->user->photo) : url('upload/no_image.jpg') }}" alt=""></figure>
                                        <h5><a href="#">{{ $blog->user->name }}</a></h5>
                                    </li>
                                    <li>{{ $blog->created_at->format('d M Y') }}</li>
                                </ul>
                                <div class="text"><p>{!! $blog->long_descp !!}</p>

                                    <blockquote>
                                        <h4>“Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis.”</h4>
                                    </blockquote>
                                    <p>Sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed perspiciatis unde omnis iste natus error sit voluptem accusantium doloremque laudantium totam rem aperiam.</p>
                                </div>
                                <div class="post-tags">
                                    <ul class="tags-list clearfix">
                                        <li><h5>Tags:</h5></li>
                                        @foreach ($all_tags as $tag)
                                            <li><a href="#">{{ ucwords($tag) }}</a></li>
                                        @endforeach
                                        {{-- ucwords() funcion de php que capitaliza la primer letra --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                    @php
                        $comment = App\Models\Comment::where('post_id', $blog->id)->where('parent_id', null)->limit(5)->get();
                    @endphp

                    {{-- Area de Comentarios --}}
                    <div class="comments-area">

                        {{-- Numero de Comentarios --}}
                        <div class="group-title">
                            <h4>3 Comments</h4>
                        </div>

                        {{-- Comentarios --}}
                        <div class="comment-box">


                            @foreach ($comment as $item)

                                {{-- Comentario --}}
                                <div class="comment">
                                    <figure class="thumb-box">
                                        <img src="{{ (!empty($item->user->photo)) ? url('upload/user_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt="">
                                    </figure>
                                    <div class="comment-inner">
                                        <div class="comment-info clearfix">
                                            <h5>{{ $item->user->name }}</h5>
                                            <span>{{ $item->created_at->format('d M Y') }}</span>
                                        </div>
                                        <div class="text">
                                            <h6>{{ $item->subject }}</h6>
                                            <p>{{ $item->message }}</p>
                                            <a href="blog-details.html"><i class="fas fa-share"></i>Responder</a>
                                        </div>
                                    </div>
                                </div>

                                @php
                                    $reply = App\Models\Comment::where('parent_id', $item->id)->get();
                                @endphp

                                @foreach ($reply as $rep)

                                    {{-- Respuesta a Comentario --}}
                                    <div class="comment replay-comment">
                                        <figure class="thumb-box">
                                            <img src="{{ url('upload/admin_images/admin.jpg') }}" alt="">
                                        </figure>
                                        <div class="comment-inner">
                                            <div class="comment-info clearfix">
                                                <h5>{{ $rep->subject }}</h5>
                                                <span>{{ $rep->created_at->format('d M Y') }}</span>
                                            </div>
                                            <div class="text">
                                                <p>{{ $rep->message }}</p>
                                                <a href="blog-details.html"><i class="fas fa-share"></i>Responder</a>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            @endforeach


                        </div>
                    </div>

                    {{-- Dejar un Comentario --}}
                    <div class="comments-form-area">

                        <div class="group-title">
                            <h4>Dejar un comentario</h4>
                        </div>

                        {{-- si el user esta login podemos mostrar la forma para dejar comentario --}}
                        @auth
                            <form action="{{ route('store.comment') }}" method="post" class="comment-form default-form">
                            @csrf

                                <input type="hidden" name="post_id" value="{{ $blog->id }}">

                                <div class="row">

                                    {{-- Subject --}}
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="subject" placeholder="Tema" required="">
                                    </div>

                                    {{-- Your message --}}
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Tu mensaje"></textarea>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Mandar ahora</button>
                                    </div>

                                </div>

                            </form>
                        @else
                            <p><b>Para dejar un comentario primero tienes que iniciar sesión:  <a class="ml-2" href="{{ route('login') }}">Iniciar Sesión aquí</a></b></p>
                        @endauth

                    </div>

                </div>

            </div>

            {{-- Segunda Columna --}}
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
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

                    {{-- Follow Us On facebook, google, twitter etc.. --}}
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
