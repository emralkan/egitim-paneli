<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{route('dashboard')}}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="./images/biplogo.png" srcset="./images/biplogo.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="./images/biplogo.png" srcset="./images/biplogo.png 2x" alt="logo-dark">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Menüler</h6>
                    </li><!-- .nk-menu-heading -->

                    @if(session()->has('authUser') && session('authUser.user_type') === 'admin')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">KURUMSAL</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="html/general/user-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">User List - Regular</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/general/user-list-compact.html" class="nk-menu-link"><span class="nk-menu-text">User List - Compact</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/general/user-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">User Details - Regular</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="html/general/user-profile-regular.html" class="nk-menu-link"><span class="nk-menu-text">User Profile - Regular</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li>

                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                <span class="nk-menu-text">EĞİTİMLER</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="{{ route('education') }}" class="nk-menu-link"><span class="nk-menu-text">Eğitimler</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{ route('education-create') }}" class="nk-menu-link"><span class="nk-menu-text">Eğitim Oluştur</span></a>
                                </li>

                                <li class="nk-menu-item">
                                    <a href="html/general/kyc-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">Paketler</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-microsoft"></em></span>
                            <span class="nk-menu-text">OYUNLAR</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('games')}}" class="nk-menu-link"><span class="nk-menu-text">Oyunlar</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('games-create')}}" class="nk-menu-link"><span class="nk-menu-text">Oyun Oluştur</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-opt-alt-fill"></em></span>
                            <span class="nk-menu-text">OYUN MODÜLLERİ</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('module')}}" class="nk-menu-link"><span class="nk-menu-text">Modüller</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('module-create')}}" class="nk-menu-link"><span class="nk-menu-text">Modül Oluştur</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                <span class="nk-menu-text">KULLANICILAR</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="{{route('users')}}" class="nk-menu-link"><span class="nk-menu-text">Tüm Kullanıcılar</span></a>
                                </li>

                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                    @endif
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                            <span class="nk-menu-text">PAKETLER</span>
                        </a>
                        <ul class="nk-menu-sub">
                            @if(session()->has('authUser') && session('authUser.user_type') === 'admin')
                            <li class="nk-menu-item">
                                <a href="{{route('package-create')}}" class="nk-menu-link"><span class="nk-menu-text">Paket Oluştur</span></a>
                            </li>
                            @endif
                            <li class="nk-menu-item">
                                <a href="{{route('package.index')}}" class="nk-menu-link"><span class="nk-menu-text">Tüm Paketler</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li>

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-emails"></em></span>
                            <span class="nk-menu-text">İLETİŞİM</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('contact')}}" class="nk-menu-link"><span class="nk-menu-text">İletişim Mesajları</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('contact-members')}}" class="nk-menu-link"><span class="nk-menu-text">İletişime Geç</span></a>
                            </li>

                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->
                    @if(session()->has('authUser') && session('authUser.user_type') === 'admin')
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-tranx"></em></span>
                            <span class="nk-menu-text">DİLLER</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('languages')}}" class="nk-menu-link"><span class="nk-menu-text">Tüm Diller</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('languagesLine')}}" class="nk-menu-link"><span class="nk-menu-text">Çeviri</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li>
                    @endif
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
