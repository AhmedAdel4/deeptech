<section id="team" class="team section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>@lang('lang.Team')</h2>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            @foreach ($teams as $team)
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        @if ($team->getFirstMediaUrl('team'))
                            <img src="{{ $team->getFirstMediaUrl('team') }}" class="img-fluid" alt="">
                        @else
                            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                        @endif
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>{{ $team->name }}</h4>
                                <span>{{ $team->role }}</span>
                                {{-- <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->
            @endforeach
        </div>

    </div>

</section>
