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
    <title>BIOROBOTEC</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=1.7.0">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=1.7.0">
</head>

<body class="nk-body npc-crypto ui-clean pg-auth">
<!-- app body @s -->
<div class="nk-app-root">
    <div class="nk-split nk-split-page nk-split-md">
        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
            </div>
            <div class="nk-block nk-block-middle nk-auth-body">
                <div class="brand-logo pb-5">
                    <a href="html/general/index.html" class="logo-link">
                        <img class="logo-light logo-img logo-img-lg" src="./images/logo.png" srcset="./images/blacklogo.png" alt="logo">
                        <img class="logo-dark logo-img logo-img-lg" src="./images/logo-dark.png" srcset="./images/blacklogo.png" alt="logo-dark">
                    </a>
                </div>
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h5 class="nk-block-title">{{trans('register.register')}}</h5>
                        <div class="nk-block-des">
                            <p>{{trans('register.newaccount')}}</p>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <form action="{{route('registered')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="name">{{trans('register.namesurname')}}</label>
                        <input type="text" name="name" class="form-control form-control-lg" id="name" placeholder="{{trans('register.namesurname')}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">{{trans('register.mail')}}</label>
                        <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="{{trans('register.mail')}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">{{trans('register.phone')}}</label>
                        <input type="text" name="phone" class="form-control form-control-lg" id="phone" placeholder="{{trans('register.phone')}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">{{trans('register.password')}}</label>
                        <div class="form-control-wrap">
                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="{{trans('register.password')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="default-06">{{trans('register.educationtype')}}</label>
                        <div class="form-control-wrap ">
                            <div class="form-control-select">
                                <select class="form-control"  id="default-06" name="user_type">
                                    <option value="" selected disabled hidden>{{trans('register.makeaselection')}}</option>
                                    <option value="bireysel">{{trans('register.individual')}}</option>
                                    <option value="kurumsal">{{trans('register.corporate')}}</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-control-xs custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox">
                            <label class="custom-control-label" for="checkbox">I agree to Dashlite <a tabindex="-1" href="#">Privacy Policy</a> &amp; <a tabindex="-1" href="#"> Terms.</a></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-primary btn-block">{{trans('register.register')}}</button>
                    </div>
                </form><!-- form -->
                <div class="form-note-s2 pt-4"> Already have an account ? <a href="html/general/pages/auths/auth-login.html"><strong>Sign in instead</strong></a>
                </div>
                <div class="text-center pt-4 pb-3">
                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                </div>
                <ul class="nav justify-center gx-8">
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
                        <li class="nav-item dropup">
                            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><small>English</small></a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="language-list">
                                    <li>
                                        <a href="{{ url('/change-language/en') }}" class="language-item">
                                            <img src="./images/flags/english.png" alt="" class="language-flag">
                                            <span class="language-name">English</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="language-item">
                                            <img src="./images/flags/spanish.png" alt="" class="language-flag">
                                            <span class="language-name">Español</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="language-item">
                                            <img src="./images/flags/french.png" alt="" class="language-flag">
                                            <span class="language-name">Français</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ url('/change-language/tr') }}" class="language-item">
                                            <img src="./images/flags/turkey.png" alt="" class="language-flag">
                                            <span class="language-name">Türkçe</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul><!-- nav -->
                </div>
                <div class="mt-3">
                    <p>&copy; 2019 DashLite. All Rights Reserved.</p>
                </div>
            </div><!-- nk-block -->
        </div><!-- nk-split-content -->
        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                    <div class="slider-item">
                        <div class="nk-feature nk-feature-center">
                            <div class="nk-feature-img">
                                <img class="round" src="./images/slide1.jpeg" srcset="./images/slide1.jpeg" alt="">
                            </div>
                            <div class="nk-feature-content py-4 p-sm-5">
                                <h4>{{trans('register.slide1title')}}</h4>
                                <p>{{trans('register.slide1content')}}</p>
                            </div>
                        </div>
                    </div><!-- .slider-item -->
                    <div class="slider-item">
                        <div class="nk-feature nk-feature-center">
                            <div class="nk-feature-img">
                                <img class="round" src="./images/slide2.jpeg" srcset="./images/slide2.jpeg" alt="">
                            </div>
                            <div class="nk-feature-content py-4 p-sm-5">
                                <h4>{{trans('register.slide2title')}}</h4>
                                <p>{{trans('register.slide2content')}}</p>
                            </div>
                        </div>
                    </div><!-- .slider-item -->
                    <div class="slider-item">
                        <div class="nk-feature nk-feature-center">
                            <div class="nk-feature-img">
                                <img class="round" src="./images/slide3.jpeg" srcset="./images/slide3.jpeg" alt="">
                            </div>
                            <div class="nk-feature-content py-4 p-sm-5">
                                <h4>{{trans('register.slide3title')}}</h4>
                                <p>{{trans('register.slide3content')}}</p>
                            </div>
                        </div>
                    </div><!-- .slider-item -->
                </div><!-- .slider-init -->
                <div class="slider-dots"></div>
                <div class="slider-arrows"></div>
            </div><!-- .slider-wrap -->
        </div><!-- nk-split-content -->
    </div><!-- nk-split -->
</div><!-- app body @e -->
<!-- JavaScript -->
<script src="./assets/js/bundle.js?ver=1.7.0"></script>
<script src="./assets/js/scripts.js?ver=1.7.0"></script>
</body>

</html>
