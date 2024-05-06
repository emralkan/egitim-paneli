
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
                                    <div class="nk-block-head-sub"><a class="back-to" href="{{route('module')}}"><em class="icon ni ni-arrow-left"></em><span>Geri Dön</span></a></div>
                                    <h2 class="nk-block-title fw-normal">Modül Oluştur</h2>
                                    <div class="nk-block-des">
                                        <p class="lead">Aşağıda Bulunan Formu Doldurarak Modül Oluşturabilirsiniz</a>.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block nk-block-lg">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <form action="{{route('module-created')}}" method="post" class="form-validate" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-gs">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-full-name">Modül Adı</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fv-full-name" name="name" required>
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
