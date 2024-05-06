
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
                                    <div class="nk-block-head-sub"><a class="back-to" href="html/general/components.html"><em class="icon ni ni-arrow-left"></em><span>Geri Dön</span></a></div>
                                    <h2 class="nk-block-title fw-normal">Oyun Oluştur</h2>
                                    <div class="nk-block-des">
                                        <p class="lead">Aşağıda Bulunan Formu Doldurarak Oyun Oluşturabilirsiniz</a>.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block nk-block-lg">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <form action="{{route('games-created')}}" method="post" class="form-validate" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-gs">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-full-name">Eğitim Adı</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fv-full-name" name="name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Başlangıç X konumu</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="subject" name="positionX" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-full-name">Başlangıç Y Konumu</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fv-full-name" name="positionY" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Oyun Yönü</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="subject" name="start_frame" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Bayrak X Konumu</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="subject" name="flagX" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-full-name">Bayrak Y Konumu</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fv-full-name" name="flagY" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-full-name">Açıklama</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fv-full-name" name="sentence" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Kutu Rengi</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="subject" name="box_color" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Bölüm</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="subject" name="part" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Blok Limiti</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="subject" name="block_limit" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Araçlar</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="subject" name="toolbox" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Seçilen Modüller</label>
                                                        <div class="form-control-wrap">
                                                            <select class="form-select" multiple="multiple" name="modules[]" data-placeholder="Modülleri Seçiniz">
                                                                @foreach ($userData['module'] as $module)
                                                                    <option value="{{ $module['id'] }}">{{ $module['name'] }}</option>
                                                                @endforeach
                                                            </select>
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
