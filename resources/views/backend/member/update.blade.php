@extends('backend.template.template')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><a class="back-to" href="{{route('users')}}"><em class="icon ni ni-arrow-left"></em><span>Geri Dön</span></a></div>
                                <h2 class="nk-block-title fw-normal">Kullanıcı Düzenle</h2>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                            </div>
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <div class="preview-block">
                                        <span class="preview-title-lg overline-title">Kullanıcı Bilgileri</span>
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

                                        <form action="{{ route('user-updated') }}" method="post">
                                            @csrf
                                            <div class="row gy-4">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-01">Ad Soyad</label>
                                                        <div class="form-control-wrap">

                                                            <input type="text" name="name" value="{{$userData->name}}" class="form-control" id="default-01" placeholder="Ad Soyad Giriniz">
                                                            <input type="hidden" name="id" value="{{$userData->id}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-05">Şifre</label>
                                                        <div class="form-control-wrap">
                                                            <input type="password" name="password" class="form-control" id="default-05" placeholder="Şifre Giriniz">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-03">Telefon Numarası</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon ni ni-user"></em>
                                                            </div>
                                                            <input type="text" name="phone" value="{{$userData->phone}}" class="form-control" id="default-03" placeholder="Telefon Numarası Giriniz">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-04">E-Mail Adresi</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-right">
                                                                <em class="icon ni ni-mail"></em>
                                                            </div>
                                                            <input type="text" name="email" value="{{$userData->email}}" class="form-control" id="default-04" placeholder="E-Mail Adresi Giriniz">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-07">Kullanıcı Tipi Seçiniz</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-control-select-multiple">
                                                                <select name="user_type" class="custom-select" id="default-07" multiple>
                                                                    <option value="admin" {{ $userData->user_type === 'admin' ? 'selected' : '' }}>Admin</option>
                                                                    <option value="editor" {{ $userData->user_type === 'editor' ? 'selected' : '' }}>Editör</option>
                                                                    <option value="bireysel" {{ $userData->user_type === 'bireysel' ? 'selected' : '' }}>Bireysel</option>
                                                                    <option value="kurumsal" {{ $userData->user_type === 'kurumsal' ? 'selected' : '' }}>Kurumsal</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary" style="margin-top: 15px; margin-left: 770px;">Formu Gönder</button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- .card-preview -->
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
@endsection
