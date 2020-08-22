<section class="home-slider owl-carousel">
    @foreach($sliders as $slider)
    <div class="slider-item" style="background-image: url('{{ asset('images/sliders/' . $slider->image) }}');">
        <div style="
            background-color: rgba(100,100,100,0.6);
            width: 100%;
            padding: 0;
            margin: 0 auto;
        ">
            <div class="container">
                <div class="row slider-text align-items-center">
                    <div class="col-md-8 col-sm-12 element-animate">
                        <h1>{{ $slider->name ? $slider->name : $slider->title }}</h1>
                        <p>{{ $slider->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>