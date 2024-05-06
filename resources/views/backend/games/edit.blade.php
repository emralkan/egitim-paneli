
@extends('backend.template.template')
@section('content')
    {{dd($userData);}}

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
                                    <h2 class="nk-block-title fw-normal">Oyun Güncelle</h2>
                                    <div class="nk-block-des">
                                        <p class="lead">Aşağıda Bulunan Formu Doldurarak Seçili Oyunu Güncelleyebilirsiniz.</a>.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block nk-block-lg">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <form action="{{route('game-updated')}}" method="post" class="form-validate" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-gs">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-full-name">Eğitim Adı</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" value="{{$userData['games']['name']}}" id="fv-full-name" name="name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Başlangıç X konumu</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"value="{{$userData['games']['positionX']}}" id="subject" name="positionX" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-full-name">Başlangıç Y Konumu</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"value="{{$userData['games']['positionY']}}" id="fv-full-name" name="positionY" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Oyun Yönü</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"value="{{$userData['games']['start_frame']}}" id="subject" name="start_frame" required>
                                                            <input type="hidden" name="id" value="{{$userData['games']['id']}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Bayrak X Konumu</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"value="{{$userData['games']['flagX']}}" id="subject" name="flagX" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-full-name">Bayrak Y Konumu</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"value="{{$userData['games']['flagY']}}" id="fv-full-name" name="flagY" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Açıklama</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"value="{{$userData['games']['sentence']}}" id="subject" name="contents" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Kutu Rengi</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"value="{{$userData['games']['box_color']}}" id="subject" name="box_color" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Bölüm</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"value="{{$userData['games']['part']}}" id="subject" name="part" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Blok Limiti</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"value="{{$userData['games']['block_limit']}}" id="subject" name="block_limit" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Araçlar</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control"value="{{$userData['games']['toolbox']}}" id="subject" name="toolbox" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label" for="default-06">Eğitim Seçiniz</label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-control-select">
                                                            <select class="form-control" id="default-06" multiple>
                                                                @foreach ($userData['educations'] as $education)
                                                                    <option value="{{ $education['id'] }}" {{ $userData['games']['education_id'] == $education['id'] ? 'selected' : '' }}>
                                                                        {{ $education['name'] }}
                                                                    </option>
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
