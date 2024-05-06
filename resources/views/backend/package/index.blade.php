@extends('backend.template.template')
@section('content')
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="components-preview wide-md mx-auto">
                                <div class="nk-block-head nk-block-head-lg wide-sm">
                                    <div class="nk-block-head-content">
                                        <div class="nk-block-head-sub"><a class="back-to" href="html/general/components.html"><em class="icon ni ni-arrow-left"></em><span>Components</span></a></div>
                                        <h2 class="nk-block-title fw-normal">Paketler</h2>
                                        <div class="nk-block-des">
                                            <p class="lead">Aşağıda Bulunan Paketlerden Birini Seçerek Yazılım Serüvenine Başlayabilirsin !</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-preview">
                                        <div class="card-inner">
                                            <div class="row">
                                                @if(isset($userData['package']) && is_array($userData['package']))
                                                    @foreach($userData['package'] as $education)
                                                    <div class="col-lg-4">
                                                    <div class="card card-bordered">
                                                        <img src="./images/slides/slide-a.jpg" class="card-img-top" alt="">
                                                        <div class="card-inner">
                                                            <h5 class="card-title">{{ $education['name']  }}</h5>
                                                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                            <a href="{{ route('package-detail' , [$education['id']]) }}" class="btn btn-primary">Satın Al</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
