  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const navLinks = document.querySelectorAll('#navmenu ul li a');
          const footerLinks = document.querySelectorAll('footer ul li a'); // Select footer links

          function handleNavigation(event) {
              const sectionName = this.getAttribute('href');

              // Check if the current route is not the home page
              if (window.location.pathname !== "{{ route('homePage') }}") {
                  event.preventDefault(); // Prevent default link behavior

                  // Redirect to homePage route with the section hash
                  window.location.href = "{{ route('homePage') }}" + sectionName;
              }
          }

          // Attach event listeners to navigation and footer links
          navLinks.forEach(link => link.addEventListener('click', handleNavigation));
          footerLinks.forEach(link => link.addEventListener('click', handleNavigation));
      });
  </script>
