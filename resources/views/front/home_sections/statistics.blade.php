<section id="stats" class="stats section light-background">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            @foreach ($statistics as $title => $value)
                @if (!empty($value))
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $value }}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p style="font-size: 25px">@lang('lang.'.$title)</p>
                        </div>
                    </div><!-- End Stats Item -->
                @endif
            @endforeach



        </div>

    </div>

</section>
