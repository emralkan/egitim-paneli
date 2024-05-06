
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
                                    <h2 class="nk-block-title fw-normal">Eğitim Paketi Oluştur</h2>
                                    <div class="nk-block-des">
                                        <p class="lead">Aşağıda Bulunan Formu Doldurarak Paket Oluşturabilirsiniz</a>.</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block nk-block-lg">
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
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <form action="{{route('package-created')}}" method="post" class="form-validate">
                                            @csrf
                                            <div class="row g-gs">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-full-name">Paket Adı</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fv-full-name" name="name" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-email">Geçerlilik Süresi</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="fv-email" name="validityPeriod" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">Fiyat</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="subject" name="price" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">İndirim</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="discount" name="discount" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="fv-subject">İndirim Süresi</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" class="form-control" id="discountPeriod" name="discount_period" required>
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
