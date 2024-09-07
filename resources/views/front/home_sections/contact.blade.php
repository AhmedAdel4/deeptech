<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>@lang('lang.Contact')</h2>
        {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4">
                <div class="info-item d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-geo-alt"></i>
                    <h3>@lang('lang.Address')</h3>
                    <p>{{ $contact->address ?? '' }}</p>
                </div>
            </div><!-- End Info Item -->

            <div class="col-lg-4">
                <div class="info-item d-flex flex-column justify-content-center align-items-center info-item-borders">
                    <i class="bi bi-telephone"></i>
                    <h3>@lang('lang.Call Us')</h3>
                    <p>{{ $contact->phone ?? '' }}</p>
                </div>
            </div><!-- End Info Item -->

            <div class="col-lg-4">
                <div class="info-item d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-envelope"></i>
                    <h3>@lang('lang.Email Us')</h3>
                    <p>{{ $contact->email ?? '' }}</p>
                </div>
            </div><!-- End Info Item -->

        </div>

        <form action="{{ route('userMessage') }}" method="post" class="php-email-form" data-aos="fade-up"
            data-aos-delay="300">
            <div class="row gy-4">

                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="{{ __('lang.Your Name') }}"
                        required="">
                </div>

                <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="{{ __('lang.Your Email') }}"
                        required="">
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="subject" placeholder="{{ __('lang.subject') }}" required="">
                </div>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="phone" placeholder="{{ __('lang.phone') }}" required="">
                </div>

                <div class="col-md-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="{{ __('lang.Message') }}" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                    <div class="loading">@lang('lang.loading')</div>
                    <div class="error-message" style="text-align: right"></div>
                    <div class="sent-message" style="text-align: right">@lang('lang.Your message has been sent. Thank you!')</div>

                    <button type="submit" style="background-color: #3391b7">@lang('lang.send')</button>
                </div>

            </div>
        </form><!-- End Contact Form -->

    </div>

</section>
