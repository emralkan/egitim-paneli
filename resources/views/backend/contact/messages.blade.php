@extends('backend.template.template')
@section('content')


        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header nk-header-fixed is-light">

            </div>
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-msg nk-msg-boxed">
                                <!-- .nk-msg-aside -->
                                <div class="nk-msg-body bg-white profile-shown">
                                    <div class="nk-msg-head">
                                        <h4 class="title d-none d-lg-block">{{ Illuminate\Support\Str::limit($userData->message, 50) }}
                                        </h4>
                                        <div class="nk-msg-head-meta">
                                            <div class="d-none d-lg-block">
                                                <ul class="nk-msg-tags">
                                                    <li><span class="label-tag"><em class="icon ni ni-flag-fill"></em> <span>{{$userData->subject}}</span></span></li>
                                                </ul>
                                            </div>
                                            <div class="d-lg-none"><a href="#" class="btn btn-icon btn-trigger nk-msg-hide ml-n1"><em class="icon ni ni-arrow-left"></em></a></div>

                                        </div>
                                        <button class="nk-msg-profile-toggle profile-toggle active" ><em class="icon ni ni-arrow-left"></em></button>
                                    </div><!-- .nk-msg-head -->
                                    <div class="nk-msg-reply nk-reply" data-simplebar>
                                        <div class="nk-reply-item">
                                            <div class="nk-reply-header">
                                                <div class="user-card">
                                                    <div class="user-avatar sm bg-blue">
                                                        <span>{{ ucfirst(substr($userData->name, 0, 1)) }}</span>
                                                    </div>
                                                    <div class="user-name">{{$userData->name}}</div>
                                                </div>
                                                <div class="date-time">{{ \Carbon\Carbon::parse($userData->created_at)->format('d-m-Y') }}</div>
                                            </div>
                                            <div class="nk-reply-body">
                                                <div class="nk-reply-entry entry">
                                                    <h5><p>{{$userData->message}}</p></h5>
                                                </div>
                                            </div>
                                        </div><!-- .nk-reply-form -->
                                    </div><!-- .nk-reply -->
                                    <div class="nk-msg-profile visible" data-simplebar>
                                        <div class="card">
                                            <div class="card-inner-group">
                                                <div class="card-inner">
                                                    <div class="user-card user-card-s2 mb-2">
                                                        <div class="user-avatar md bg-primary">
                                                            <span>{{ ucfirst(substr($userData->name, 0, 1)) }}</span>
                                                        </div>
                                                        <div class="user-info">
                                                            <h5>{{$userData->name}}</h5>
                                                            <span class="sub-text">{{$userData->user_type}}</span>
                                                        </div>

                                                    </div>

                                                </div><!-- .card-inner -->
                                                <div class="card-inner">
                                                    <div class="aside-wg">
                                                        <h6 class="overline-title-alt mb-2">Kullanıcı Bilgileri</h6>
                                                        <ul class="user-contacts">
                                                            <li>
                                                                <em class="icon ni ni-mail"></em><span>{{$userData->email}}</span>
                                                            </li>
                                                            <li>
                                                                <em class="icon ni ni-call"></em><span>{{$userData->phone}}</span>
                                                            </li>

                                                        </ul>
                                                    </div>

                                                </div><!-- .card-inner -->
                                            </div>
                                        </div>
                                    </div><!-- .nk-msg-profile -->
                                </div><!-- .nk-msg-body -->
                            </div><!-- .nk-msg -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection
