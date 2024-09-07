<style>
    .partner-logo {
        width: 150px;
        height: 100px;
        object-fit: contain;
        display: block;
        margin: 0 auto;
    }
</style>
<section id="partners" class="partners section">
    <div class="container">
        <div class="section-title text-center">
            <h2>@lang('lang.Our Partners of Success')</h2>
        </div>
        <div id="partnersCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
            <div class="carousel-inner">
                @foreach ($partners->chunk(4) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="row text-center">
                            @foreach ($chunk as $partner)
                                <div class="col-md-3">
                                    @if ($partner->getFirstMediaUrl('partner'))
                                        <img src="{{ $partner->getFirstMediaUrl('partner') }}"
                                            class="img-fluid partner-logo" alt="{{ $partner->name }}">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Controls (optional) -->
            <button class="carousel-control-prev" type="button" data-bs-target="#partnersCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#partnersCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
