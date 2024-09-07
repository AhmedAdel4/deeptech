<section id="stats" class="stats section light-background" style="background-color: #274464">

    <div class="container" data-aos="fade-up" data-aos-delay="100" style="margin-bottom: -40px; margin-top: -67px">

        <div class="row gy-4">

            @foreach ($statistics as $title => $value)
                @if (!empty($value))
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0"  style="color: #f6f6f7" data-purecounter-end="{{ $value }}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p style="font-size: 25px; color: #f6f6f7">@lang('lang.'.$title)</p>
                        </div>
                    </div><!-- End Stats Item -->
                @endif
            @endforeach



        </div>

    </div>

</section>
