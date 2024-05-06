@extends('backend.template.template')
@section('content')

        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header nk-header-fixed is-light">
                <div class="container-fluid">

                </div><!-- .container-fliud -->
            </div>
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="components-preview wide-md mx-auto">
                                <div class="nk-block-head nk-block-head-lg wide-sm">
                                    <div class="nk-block-head-content">
                                        <div class="nk-block-head-sub"><a class="back-to" href="html/general/components.html"><em class="icon ni ni-arrow-left"></em><span>Geri Dön</span></a></div>
                                        <h2 class="nk-block-title fw-normal">İletişime Geçin !</h2>
                                        <div class="nk-block-des">
                                            <p class="lead">Aşağıda Bulunan Formu Doldurarak Bizimle İletişime Geçebilirsin.</a>.</p>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block nk-block-lg">

                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <form action="{{route('contact-member')}}" method="post" class="form-validate">
                                                @csrf
                                                <div class="row g-gs">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="fv-full-name">Ad Soyad</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="fv-full-name" name="name" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="fv-email">E-mail Adresiniz</label>
                                                            <div class="form-control-wrap">
                                                                <input type="email" class="form-control" id="fv-email" name="email" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="fv-subject">Konu</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="subject" name="subject" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="fv-subject">Telefon</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control" id="subject" name="phone" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="fv-topics">Departman</label>
                                                            <div class="form-control-wrap ">
                                                                <select class="form-control form-select" id="fv-topics" name="department" data-placeholder="Seçiniz" required>
                                                                    <option label="empty" value=""></option>
                                                                    <option value="muhasebe">Muhasebe</option>
                                                                    <option value="teknik">Teknik Destek</option>
                                                                    <option value="satıs">Satış</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="fv-message">Mesajınız</label>
                                                            <div class="form-control-wrap">
                                                                <textarea class="form-control form-control-sm" id="fv-message" name="message" placeholder="Mesajınızı Giriniz" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary">Gönder</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->

                            </div><!-- .components-preview -->
                        </div>
                    </div>
                </div>
            </div>

@endsection
