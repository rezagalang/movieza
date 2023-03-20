<!DOCTYPE html>
<html lang="en">

@include('templatesfront.header')

<body>
  <div class="sticky-konsul">
    <div class="konsul">
        KONSULTASI<br>GRATIS
    </div>
    <div class="float">
        <a href="#" class="myfloat but">
            <img src="{{ asset('assets/img/icon3.png') }}" class="mb-2"><span>Layanan Pelanggan</span></a>
    </div>
    <div class="float">
        <a href="#" target="_blank" class="myfloat">
          <img src="{{ asset('assets/img/icon3.png') }}" class="mb-2"><br><span>Sapa<br>Sales USFA</span>
        </a>
    </div>
  </div>
  @include('templatesfront.navbar')
  @include('templatesfront.hero')

  <main id="main">

    @yield('content')

  </main><!-- End #main -->

  @include('templatesfront.footer')
  <script>
    $(document).ready(function(e) {
      $('.but').click(function(e) {
        e.preventDefault();
        $('.sticky-konsul').append(`
        <div class="sticky-konsul close">
          <div class="konsul">
            <button type="button" onclick="back()" class="btn myfloat"><i class="bi bi-arrow-left"></i></button>
            </div>
            <div class="float">
              <a href="#" target="_blank" class="myfloat">
              <img src="{{ asset('assets/img/icon3.png') }}" class="mb-2"><br><span>CS 1</span></a>
            </div>
            <div class="float">
              <a href="#" target="_blank" class="myfloat">
              <img src="{{ asset('assets/img/icon3.png') }}" class="mb-2"><br><span>CS 2</span></a>
            </div>
          </div>
          `).hide().fadeIn('slow');
          });
        });
        function back() {
          $(".close").remove();
        }
  </script>

</body>

</html>