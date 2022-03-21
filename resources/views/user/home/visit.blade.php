@extends('user.museum')
@section('main')
</header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <div class="post-preview">

                    <h2 class="post-title">Opening hours</h2>
                    8:30 - 17:00 from Tuesdays through Sundays, except Mondays and Tet Holidays.

                </div>
                <!-- Divider-->

                <hr class="my-4" />
                <div class="post-preview">

                    <h2 class="post-title">Address</h2>

                    <p></p>

                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="https://goo.gl/maps/9gyH7yCLBbJq1rvX7">
                                <img id="location" src="https://img.icons8.com/ios/50/000000/marker--v1.png" /> 66 Nguyen
                                Thai Hoc, Ba Dinh, Ha Noi, Viet Nam
                            </a>
                        </li>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.056232488544!2d105.83437961469066!3d21.030435885997413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab98ec48df2f%3A0x38829e5c4f8625a4!2zNjYgUC4gTmd1eeG7hW4gVGjDoWkgSOG7jWMsIMSQaeG7h24gQsOgbiwgQmEgxJDDrG5oLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1639985470752!5m2!1svi!2s" width="1040" height="450" style="border:0;" allowfullscreen="true" loading="lazy"></iframe>
                    </ul>


                </div>
                <p></p>
                <hr class="my-4" />
                <h2>Building plan</h2>
                <p></p>
                <div class="owl-carousel owl-theme">
                    <div class="item"><img src="{{ url('outsite') }}/assets/img/sodo1.jpg" alt=""><h3>Floor 1</h3></div>
                    <div class="item"><img src="{{ url('outsite') }}/assets/img/sodo2.jpg" alt=""><h3>Floor 2</h3></div>
                    <div class="item"><img src="{{ url('outsite') }}/assets/img/sodo3.jpg" alt=""><h3>Floor 3</h3></div>
                </div>
                <hr class="my-4" />
                <!-- Post preview-->
                <div class="post-preview">

                    <h2 class="post-title">Coffee</h2>

                    <p></p>
                    In addition to its magnificent display galleries located inside the museum's historic main building, the
                    Vietnam National Fine Arts Museum has an attractive café/snack-bar. There is both indoor and outdoor
                    seating, and visitors can relax there in comfort, enjoying a wide variety of refreshments while taking
                    pleasure in its fine view of the museum's handsome architectural features.
                    <br>
                    Open daily from 07:00 to 22:30.

                </div>
                <hr class="my-4" />

            </div>
        </div>
    </div>

@stop()
