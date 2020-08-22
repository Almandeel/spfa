<section class="home-slider  inner-page owl-carousel">
    @if(isset($folder))
    <div class="slider-item" style="background-image: url('{{ asset('images/' . $folder . '/' . $page['image']) }}');">
    @else
    <div class="slider-item" style="background-image: url('{{ asset('images/pages/' . $page['image']) }}');">
    @endif
        <div style="
            background-color: rgba(255,255,255,0.6);
            width: 100%;
            padding: 0;
            margin: 0 auto;
        ">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center text-center">
                    <div class="col-md-7 col-sm-12 element-animate">
                        <h1 style="color: #f4b214; text-align: center;">{{ $page['title'] }}</h1>
                        <p style="color: #444; text-align: center;">{{ $page['description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>