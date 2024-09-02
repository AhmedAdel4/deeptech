<section id="hero" class="hero section dark-background">

    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        @foreach ($carousels as $carousel)
            <div class="carousel-item active" style="text-align: center">
                @if ($carousel->getFirstMediaUrl('carousel'))
                    <img src="{{ $carousel->getFirstMediaUrl('carousel') }}" alt="">
                @endif

                <div class="carousel-container">
                    <h2>{{ $carousel->main_title }}</h2>
                    <p>{!! $carousel->text !!}</p>
                </div>
            </div><!-- End Carousel Item -->
        @endforeach


        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

    </div>

</section>
