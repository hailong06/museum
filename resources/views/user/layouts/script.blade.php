 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="{{ url('outsite') }}/js/scripts.js"></script>
 <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
 <script src="{{ url('outsite') }}/js/owl.carousel.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="{{ url('blogs') }}/js/scripts.js"></script>
 <script src="{{ url('cart') }}/js/jquery-3.3.1.min.js"></script>
 <script src="{{ url('cart') }}/js/bootstrap.min.js"></script>
 <script src="{{ url('cart') }}/js/jquery-ui.min.js"></script>
 <script src="{{ url('cart') }}/js/jquery.countdown.min.js"></script>
 <script src="{{ url('cart') }}/js/jquery.nice-select.min.js"></script>
 <script src="{{ url('cart') }}/js/jquery.zoom.min.js"></script>
 <script src="{{ url('cart') }}/js/jquery.dd.min.js"></script>
 <script src="{{ url('cart') }}/js/jquery.slicknav.js"></script>
 <script src="{{ url('cart') }}/js/owl.carousel.min.js"></script>
 <script src="{{ url('cart') }}/js/main.js"></script>
 <script type="text/javascript">
     $('.owl-carousel').owlCarousel({
         loop: true,
         margin: 15,
         nav: true,
         responsive: {
             0: {
                 items: 1
             },
             600: {
                 items: 1
             },
             1000: {
                 items: 1
             }
         }
     })
 </script>
@yield('js')
