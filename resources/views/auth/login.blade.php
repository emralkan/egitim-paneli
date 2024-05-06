<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <base href="../../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Login | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=1.7.0">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=1.7.0">
</head>

<body class="nk-body npc-crypto ui-clean pg-auth">
<!-- app body @s -->
<div class="nk-app-root">
    <div class="nk-split nk-split-page nk-split-md">
        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white">
            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
            </div>
            <div class="nk-block nk-block-middle nk-auth-body">
                <div class="brand-logo pb-5">
                    <a href="html/general/index.html" class="logo-link">
                        <img class="logo-light logo-img logo-img-lg" src="./images/biplogo.png" srcset="./images/blacklogo.png" alt="logo">
                        <img class="logo-dark logo-img logo-img-lg" src="./images/biplogo.png" srcset="./images/blacklogo.png" alt="logo-dark">
                    </a>
                </div>
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">{{ $translations['auth_hosgeldiniz'] ?? 'auth_hosgeldiniz'}}</h5>
                        <div class="nk-block-des">
                            <p>{{ $translations['authtext'] ?? '__authtext'}}</p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <form action="{{route('logins')}}" method="POST">
                    @csrf
                    <div class="form-group">
                    @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                        <div class="form-label-group">
                            <label class="form-label" for="default-01">{{ $translations['email'] ?? '__email'}}</label>
                            <a class="link link-primary link-sm" tabindex="-1" href="#">{{ $translations['needhelp'] ?? '__needhelp'}}</a>
                        </div>
                        <input type="email" class="form-control form-control-lg" name="email" id="default-01" placeholder="{{ $translations['emailcreate'] ?? '__emailcreate'}}">
                    </div><!-- .foem-group -->
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">{{ $translations['password'] ?? '__password'}}</label>
                            <a class="link link-primary link-sm" tabindex="-1" href="html/general/pages/auths/auth-reset.html">{{ $translations['forgotpassword'] ?? '__forgotpassword'}}</a>
                        </div>
                        <div class="form-control-wrap">
                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="{{ $translations['createpassword'] ?? '__createpassword'}}">
                        </div>
                    </div><!-- .foem-group -->
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block">{{ $translations['login'] ?? '__login'}}</button>
                    </div>
                </form><!-- form -->
                <div class="form-note-s2 pt-4"> {{ $translations['noaccount'] ?? '__noaccount'}} <a href="{{route('register')}}">{{ $translations['createaccount'] ?? '__createaccount'}}</a>
                </div>
                <div class="text-center pt-4 pb-3">
                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                </div>
                <ul class="nav justify-center gx-4">
                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                </ul>

            </div><!-- .nk-block -->
            <div class="nk-block nk-auth-footer">
                <div class="nk-block-between">
                    <ul class="nav nav-sm">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Terms & Condition</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Help</a>
                        </li>
                        @php
                            $currentLanguage = session('locale', 'tr');
                            $languageName = ($currentLanguage === 'en') ? 'English' : 'Türkçe';
                        @endphp
                        <li class="nav-item dropup">
                            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><small>{{ ucfirst($languageName) }}</small></a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="language-list">
                                    @foreach($availableLanguages['language'] as $language)
                                        <li>
                                            <a href="{{ url('/change-language/' . $language['language_key']) }}" class="language-item">
                                                <img src="./images/flags/{{ strtolower($language['language_key']) === 'en' ? 'english' : 'turkey' }}.png" alt="" class="language-flag">
                                                <span class="language-name">{{ $language['language'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul><!-- .nav -->
                </div>
                <div class="mt-3">
                    <p>&copy; 2024 BIOROBOTEC. {{ $translations['reserved'] ?? '__reserved'}}</p>
                </div>
            </div><!-- .nk-block -->
        </div><!-- .nk-split-content -->
        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                    <div class="slider-item">
                        <div class="nk-feature nk-feature-center">
                            <div class="nk-feature-img">
                                <img class="round" src="./images/slide1.jpeg" srcset="./images/slide1.jpeg" alt="">
                            </div>
                            <div class="nk-feature-content py-4 p-sm-5">
                                <h4> {{ $translations['slide1title'] ?? '__slide1title'}}
                                </h4>
                                <p>{{ $translations['slide1content'] ?? '__slide1content'}}</p>
                            </div>
                        </div>
                    </div><!-- .slider-item -->
                    <div class="slider-item">
                        <div class="nk-feature nk-feature-center">
                            <div class="nk-feature-img">
                                <img class="round" src="./images/slide2.jpeg" srcset="./images/slide2.jpeg" alt="">
                            </div>
                            <div class="nk-feature-content py-4 p-sm-5">
                                <h4>{{ $translations['slide2title'] ?? '__slide2title'}}
                                </h4>
                                <p>
                                    {{ $translations['slide2content'] ?? '__slide2content'}}
                                </p>
                            </div>
                        </div>
                    </div><!-- .slider-item -->
                    <div class="slider-item">
                        <div class="nk-feature nk-feature-center">
                            <div class="nk-feature-img">
                                <img class="round" src="./images/slide3.jpeg" srcset="./images/slide3.jpeg" alt="">
                            </div>
                            <div class="nk-feature-content py-4 p-sm-5">
                                <h4>
                                    {{ $translations['slide3title'] ?? '__slide3title'}}
                                </h4>
                                <p>
                                {{ $translations['slide3content'] ?? '__slide3content'}}

                            </div>
                        </div>
                    </div><!-- .slider-item -->
                </div><!-- .slider-init -->
                <div class="slider-dots"></div>
                <div class="slider-arrows"></div>
            </div><!-- .slider-wrap -->
        </div><!-- .nk-split-content -->
    </div><!-- .nk-split -->
</div><!-- app body @e -->
<!-- JavaScript -->
<script src="./assets/js/bundle.js?ver=1.7.0"></script>
<script src="./assets/js/scripts.js?ver=1.7.0"></script>
</body>

</html>
