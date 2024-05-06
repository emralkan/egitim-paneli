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
                                <h2 class="nk-block-title fw-normal">Eğitim Düzenle</h2>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                            </div>
                            <div class="card card-preview">
                                <div class="card-inner">
                                    <div class="preview-block">
                                        <span class="preview-title-lg overline-title">Eğitim Bilgileri</span>
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
                                        <form action="{{ route('educate-updated') }}" method="post" class="form-validate" enctype="multipart/form-data">
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
                                                        <label class="form-label" for="default-05">Bilgi</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" value="{{$userData->contents}}" name="contents" class="form-control" id="default-05" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label" for="default-05">Paket</label>
                                                    <select class="form-select" data-placeholder="Select Multiple options" name="package_options[]">
                                                        @foreach($packages['package'] as $package)
                                                            <option value="{{ $package['id'] }}" {{ $userData->package_id == $package['id'] ? 'selected' : '' }}>
                                                                {{ $package['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label" for="default-05">Oyunlar</label>
                                                    <select class="form-select" data-placeholder="Select Multiple options" name="package_options[]" multiple>
                                                        @foreach($packages['games'] as $package)
                                                            <option value="{{ $package['id'] }}" {{ in_array($package['id'], $packages) ? 'selected' : '' }}>
                                                                {{ $package['name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
