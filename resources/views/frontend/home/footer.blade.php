@php
    // Recuperamos datos de site settings de la tabla 'site_settings'
    $settings = App\Models\SiteSetting::find(1);

    $noticias = App\Models\BlogPost::latest()->limit(2)->get();
@endphp

<!-- main-footer -->
<footer class="main-footer">
    <div class="footer-top bg-color-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="widget-title">
                            <h3>About</h3>
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor amet consetetur adi pisicing elit sed eiusm tempor in cididunt
                                ut labore dolore magna aliqua enim ad minim venitam</p>
                            <p>Quis nostrud exercita laboris nisi ut aliquip commodo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-70">
                        <div class="widget-title">
                            <h3>Services</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list class">
                                <li><a href="index.html">About Us</a></li>
                                <li><a href="index.html">Listing</a></li>
                                <li><a href="index.html">How It Works</a></li>
                                <li><a href="index.html">Our Services</a></li>
                                <li><a href="index.html">Our Blog</a></li>
                                <li><a href="index.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget post-widget">
                        <div class="widget-title">
                            <h3>Ultimas Noticias</h3>
                        </div>
                        <div class="post-inner">
                            @foreach ($noticias as $item)
                                <div class="post">
                                    <figure class="post-thumb"><a href="{{ url('blog/details/'.$item->post_slug) }}"><img src="{{ asset($item->post_image) }}" alt=""></a></figure>
                                    <h5><a href="{{ url('blog/details/'.$item->post_slug) }}">{{ $item->post_title }}</a></h5>
                                    <p>{{ $item->created_at->format('d M Y') }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>Contáctanos</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info-list clearfix">
                                <li><i class="fas fa-map-marker-alt"></i>{{ $settings->company_address }}</li>
                                <li><i class="fas fa-microphone"></i><a href="tel:{{ $settings->support_phone }}">{{ $settings->support_phone }}</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">

            <div class="inner-box clearfix">

                <figure class="footer-logo"><a href="index.html"><img src="{{ asset('frontend/assets/images/footer-logo.png') }}" alt=""></a></figure>

                <div class="copyright pull-left">
                    {{-- <p><a href="index.html">Realshed</a> &copy; 2021 All Right Reserved</p> --}}
                    <li><p class="text-muted mb-1 mb-md-0">{{ $settings->copyright }}</p></li>
                    <li><p><a href="{{ $settings->company_webpage }}" target="_blank">{{ $settings->company_name }}</a></p></li>
                </div>

                <ul class="footer-nav pull-right clearfix">
                    <li><a href="index.html">Terms of Service</a></li>
                    <li><a href="index.html">Privacy Policy</a></li>
                </ul>

            </div>

        </div>
    </div>
</footer>
<!-- main-footer end -->
