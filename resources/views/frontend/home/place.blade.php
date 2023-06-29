@php
    $skip_state_0 = App\Models\State::skip(0)->first();
    $property_0 = App\Models\Property::where('state', $skip_state_0->id)->get();
@endphp

<!-- place-section -->
<section class="place-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Top Places</h5>
            <h2>Most Popular Places</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore
                dolore magna aliqua enim.</p>
        </div>
        <div class="sortable-masonry">

            <div class="items-container row clearfix">

                {{-- 1er propiedad --}}
                <div
                    class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration brand marketing software">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{ asset( $skip_state_0->state_image ) }}" alt="" style="width:370px; height:580px;">
                            </figure>
                            <div class="text">
                                <h4><a href="categories.html">{{ $skip_state_0->state_name }}</a></h4>
                                <p>{{ count($property_0) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- San Francisco     --}}
                <div
                    class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all brand illustration print software logo">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{ asset('frontend/assets/images/resource/place-2.jpg') }}" alt="">
                            </figure>
                            <div class="text">
                                <h4><a href="categories.html">San Francisco</a></h4>
                                <p>08 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Las Vegas --}}
                <div
                    class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{ asset('frontend/assets/images/resource/place-3.jpg') }}" alt="">
                            </figure>
                            <div class="text">
                                <h4><a href="categories.html">Las Vegas</a></h4>
                                <p>29 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- New York City --}}
                <div
                    class="col-lg-8 col-md-6 col-sm-12 masonry-item small-column all brand marketing print software">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{ asset('frontend/assets/images/resource/place-4.jpg') }}" alt="">
                            </figure>
                            <div class="text">
                                <h4><a href="categories.html">New York City</a></h4>
                                <p>05 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- place-section end -->
