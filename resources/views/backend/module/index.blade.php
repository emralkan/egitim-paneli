@extends('backend.template.template')
@section('content')
    <div class="nk-content ">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Tüm Modüller</h4>
                    <div class="nk-block-des">
                        <p>Kaydı Olan Tüm Modüller Burada Listelenir.</p>
                    </div>
                    <a href="{{route('module-create')}}" class="btn btn-l btn-primary" style="margin-left: 1200px;">Modül Oluştur</a>
                </div>
            </div>
            <div class="tab-content">
                <div id="tabItem5" class="tab-pane fade show active">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init table">
                                <thead>
                                <tr>
                                    <th>Oyun Adı</th>
                                    <th>Kayıt Tarihi</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($userData['success']) && $userData['success'])
                                    @if(isset($userData['modules']) && is_array($userData['modules']))
                                        @foreach($userData['modules'] as $module)
                                            <tr>
                                                <td>{{ $module['name']  }}</td>
                                                <td>{{ \Carbon\Carbon::parse($module['created_at'] ?? '')->format('d.m.Y') }}</td>


                                                <td class="tb-tnx-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown">
                                                            <em class="icon ni ni-more-h"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a href="{{route('module-update', [$module['id']])}}">Düzenle</a></li>
                                                                <li><a href="{{route('module-delete', [$module['id']])}}">Sil</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">Veri bulunamadı veya format hatası.</td>
                                        </tr>
                                    @endif
                                @else
                                    <tr>
                                        <td colspan="6">Hata: {{ $userData['message'] ?? 'Bilinmeyen bir hata oluştu.' }}</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div>
            </div>
        </div>
    </div>
@endsection
