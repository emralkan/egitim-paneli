
@extends('backend.template.template')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title"><p>{{ $translations['hosgeldiniz'] ?? 'hosgeldiniz'}}</p>

                                    {{ session('authUser.name') }}
                                </h3>
                                <div class="nk-block-des text-soft">
                                    <p>{{trans('BIOROBOTEC Eğitim Setine Hoş Geldiniz.')}}</p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
@endsection
