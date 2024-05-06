@extends('backend.template.template')
@section('content')
    <div class="nk-wrap ">
        <div class="nk-header nk-header-fixed is-light">
            <div class="container-fluid">

            </div>
        </div>
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="components-preview wide-md mx-auto">
                            <div class="nk-block-head nk-block-head-lg wide-sm">
                                <div class="nk-block-head-content">
                                    <div class="nk-block-head-sub"><a class="back-to" href="html/general/components.html">
                                            <em class="icon ni ni-arrow-left"></em><span>Geri Dön</span></a></div>
                                    <h2 class="nk-block-title fw-normal">Çeviri Oluştur</h2>
                                    <div class="nk-block-des">
                                        <p class="lead">Aşağıda Bulunan Formu Doldurarak Çeviri Oluşturabilirsiniz</a>.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block nk-block-lg">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <form action="{{route('languageLines-updated')}}" method="post" class="form-validate"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-gs">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Key</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="subject" value="{{$userData['languageLine']['key']}}"
                                                                   name="key" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Dil</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-control" id="subject" name="language" required>
                                                                <option value="">Seçiniz</option>
                                                                @foreach($userData['language'] as $language)
                                                                    <option value="{{ $language['language_key'] }}" {{ $userData['languageLine']['language'] === $language['language_key'] ? 'selected' : '' }}>
                                                                        {{ $language['language'] }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Çeviri</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="subject" name="text" value="{{$userData['languageLine']['text']}}" required>
                                                            <input type="hidden" value="{{$userData['languageLine']['id']}}" class="form-control" name="id" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-lg btn-primary">Kaydet</button>
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
