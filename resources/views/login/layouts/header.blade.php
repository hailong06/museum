<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                                    @php $locale = session()->get('locale'); @endphp
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle px-lg-3 py-3 py-lg-4" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            @switch($locale)
                                                @case('en')
                                                <img src="https://kenh14cdn.com/thumb_w/660/2017/2-1503128133740.png" width="25px">{{ __('messages.english') }}
                                                @break
                                                @case('vi')
                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOYAAACZCAMAAAAMwLadAAAAclBMVEXaJR3//wDztgrtkg7qhBD//QDvoQ3bKxz86gP65ATiURf53gT52gX2ywfdNxv99AHwqAziVxbhSxjsjg/41gXfQxn30Qb1xwjodRLumQ7cMxv++QHyrwvncBP98ALkYRXpgBHlZxT1wQjunQ3zugnmbBRmEZDwAAADBUlEQVR4nO3a6XaCQAwFYAd3tO47blX7/q9YkSrb6IASMqH3+23PyT3NYWCSWg0AAAAAAAAAAAAAAAAACtVuc1dQiu9v7gpKsd1yV1CG9n7/H7r2oNSBu4YSjJQacddQgo5SHe4a6I3V1Zi7CnItP2aLuwpyXT9m5bv21rPV79pzEPPMXQexbhCzy10HLVf9cbkrIbW+x1xzV0Kqd4/Z466E0kQ9TLhrIVQPY9a5ayHUD2P2uWuhM1fqP3TtNBpzyl0NmVk05oy7GiqxnlVqzl0PkWk8ZoO7HiKLeMwFdz00Biqhml3bSMasZtd+JWN+cVdEYdBMxmwOuGsicEymVOrIXROBZTrmkrum4qV7VmLXuo5B6gF0ewiZ/sq6uxS3q8vxma6F95wbp+iUlw13Jq3VsMiQnrVvD5OZufqs+hZ/drfXmufpW0Z2T7QPnSJC7q3fwhicPk+5lHCeNrzPQjaF3G26PXOW52w8LPU22/dTOnYelnq7/Xshh0fuyvOZa99hTRby7k3q+Y/Qlt2HpV7eI7QjdPkr3xEq4rDUy36ESjks9SZ9c0Jfz7rv53zarSwptxKfPXE741focMddYxGMD9xKrLaNzT0r5i32hbM5ZhVW2zLc+FVgtc01p6zCatvaHLIKq22ZPrHFr7ZNzBl9Ft9WZlI3R/SJfqOtxdbXXhG+2jY3J6xC107NAQOyV9s0QxWvoRspiV5t0/SsPwLSjZTkXXaF0j0bjIA0IyVrx3wZJNbXIiOg1H2Y4NW25Ppa9FYrdR8mt2vj62vJW63EfZjcro3dvKdHQPGRktjVttgqkG4EFBspyVsS+hNZX3s2AoqOlJ78xHrh+trzEVBkpCR0tS3s2ZcjoMdISWjX3nvWNAJ6HKGrcuoq2Cl9WOrdj9BTGVUVbePpDku94AhtSprH3638yrOOgIKRksSuvag8I6DbSOlCWQ+Na88Oc/13fvbKk9e1u9z7EtcjVN5ozHljX6LuEBRC6615gfwhAwAAAAAAAAAAAAAAAAAAAACADX4B/Swcmld280IAAAAASUVORK5CYII=" width="25px"> {{ __('messages.vietnam') }}
                                                @break
                                                @default
                                                <img src="https://kenh14cdn.com/thumb_w/660/2017/2-1503128133740.png" width="25px">{{ __('messages.english') }}
                                            @endswitch
                                            <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{!! route('user.change-language', ['en']) !!}"><img src="https://kenh14cdn.com/thumb_w/660/2017/2-1503128133740.png" width="25px"> {{ __('messages.english') }}</a>
                                            <a class="dropdown-item" href="{{ route('user.change-language', ['vi']) }}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOYAAACZCAMAAAAMwLadAAAAclBMVEXaJR3//wDztgrtkg7qhBD//QDvoQ3bKxz86gP65ATiURf53gT52gX2ywfdNxv99AHwqAziVxbhSxjsjg/41gXfQxn30Qb1xwjodRLumQ7cMxv++QHyrwvncBP98ALkYRXpgBHlZxT1wQjunQ3zugnmbBRmEZDwAAADBUlEQVR4nO3a6XaCQAwFYAd3tO47blX7/q9YkSrb6IASMqH3+23PyT3NYWCSWg0AAAAAAAAAAAAAAAAACtVuc1dQiu9v7gpKsd1yV1CG9n7/H7r2oNSBu4YSjJQacddQgo5SHe4a6I3V1Zi7CnItP2aLuwpyXT9m5bv21rPV79pzEPPMXQexbhCzy10HLVf9cbkrIbW+x1xzV0Kqd4/Z466E0kQ9TLhrIVQPY9a5ayHUD2P2uWuhM1fqP3TtNBpzyl0NmVk05oy7GiqxnlVqzl0PkWk8ZoO7HiKLeMwFdz00Biqhml3bSMasZtd+JWN+cVdEYdBMxmwOuGsicEymVOrIXROBZTrmkrum4qV7VmLXuo5B6gF0ewiZ/sq6uxS3q8vxma6F95wbp+iUlw13Jq3VsMiQnrVvD5OZufqs+hZ/drfXmufpW0Z2T7QPnSJC7q3fwhicPk+5lHCeNrzPQjaF3G26PXOW52w8LPU22/dTOnYelnq7/Xshh0fuyvOZa99hTRby7k3q+Y/Qlt2HpV7eI7QjdPkr3xEq4rDUy36ESjks9SZ9c0Jfz7rv53zarSwptxKfPXE741focMddYxGMD9xKrLaNzT0r5i32hbM5ZhVW2zLc+FVgtc01p6zCatvaHLIKq22ZPrHFr7ZNzBl9Ft9WZlI3R/SJfqOtxdbXXhG+2jY3J6xC107NAQOyV9s0QxWvoRspiV5t0/SsPwLSjZTkXXaF0j0bjIA0IyVrx3wZJNbXIiOg1H2Y4NW25Ppa9FYrdR8mt2vj62vJW63EfZjcro3dvKdHQPGRktjVttgqkG4EFBspyVsS+hNZX3s2AoqOlJ78xHrh+trzEVBkpCR0tS3s2ZcjoMdISWjX3nvWNAJ6HKGrcuoq2Cl9WOrdj9BTGVUVbePpDku94AhtSprH3638yrOOgIKRksSuvag8I6DbSOlCWQ+Na88Oc/13fvbKk9e1u9z7EtcjVN5ozHljX6LuEBRC6615gfwhAwAAAAAAAAAAAAAAAAAAAACADX4B/Swcmld280IAAAAASUVORK5CYII=" width="25px"> {{ __('messages.vietnam') }}</a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('messages.welcomeBack') }}</h1>
                                </div>


