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
                <!-- Post preview-->
                <div class="post-preview">

                    <h2 class="post-title">Guided Tour</h2>
                    Fee: 150,000 VND per group (limited to 25 people per group)
                    <p></p>
                    Languages: Vietnamese, English, Chinese.
                    <p></p>
                    Tours (lunch break from 11:30 AM to 01:30 PM):

                    <ul>
                        <li>General introduction</li>
                        <li>Thematic tours</li>
                        <li>Collections tours (reservation in advance)</li>
                    </ul>
                    <p></p>
                    Contact:

                    <ul>
                        <li>The Tour Guide Time, Department of Exhibition and Education: (84-24) 3823-3084, 3733-2131 ext.
                            131</li>
                    </ul>
                    <p></p>

                    Or directly contact:
                    <ul>
                        <li>Ms. Vuong Le My Hoc: 0904511679</li>
                        <li>Ms. Bui Bich Chau: 0904284994</li>

                    </ul>


                </div>
                <hr class="my-4" />
                <!-- Post preview-->
                <div class="post-preview">

                    <h2 class="post-title">Smart Guide iMuseum VFA</h2>

                    <p></p>

                    Fee:
                    <ul>
                        <li>Adults: 50,000 VND</li>
                        <li>Students: 30,000 VND</li>

                    </ul>
                    <p></p>
                    Available in 9 languages: Vietnamese, English, French, Chinese, Japanese, Korean, Spanish, Italian and
                    German.
                </div>
                <hr class="my-4" />
                <!-- Post preview-->
                <div class="post-preview">

                    <h2 class="post-title">Educational Programmes at the Creative Space for Children</h2>

                    <p></p>
                    <h4>Regular programme:</h4> 50.000VND/ticket

                    <p></p>


                    <ul>

                        <li>Timetable: Morning: 9:00 to 11:30 - Afternoon: 14:00 to 16:30</li>
                        <li>Children from 5 - 15 years old</li>
                    </ul>
                    <p></p>

                    <h4>Special programme (advanced booking required):</h4> 50.000VND/ticket
                    <p></p>
                    <ul>
                        <li>Timetable: Morning: 9:00 to 11:30 - Afternoon: 14:00 to 16:30</li>
                        <li>Children from 5 - 15 years old</li>

                    </ul>


                </div>
                <hr class="my-4" />
                <!-- Post preview-->
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
