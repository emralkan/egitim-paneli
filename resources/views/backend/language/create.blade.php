
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
                                    <h2 class="nk-block-title fw-normal">Dil Oluştur</h2>
                                    <div class="nk-block-des">
                                        <p class="lead">Aşağıda Bulunan Formu Doldurarak Dil Oluşturabilirsiniz</a>.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block nk-block-lg">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <form action="{{route('languages-created')}}" method="post" class="form-validate" enctype="multipart/form-data">

                                            @csrf
                                            <div class="row g-gs">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-full-name">Dil Adı</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fv-full-name" name="language" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Key</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="subject" name="langkey" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="default-06">Durum</label>
                                                    <div class="form-control-wrap ">
                                                        <div class="form-control-select">
                                                            <select class="form-control" name="status" id="default-06">
                                                                <option value="1">Aktif</option>
                                                                <option value="0">Pasif</option>
                                                            </select>
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
