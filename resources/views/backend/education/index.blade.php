@extends('backend.template.template')
@section('content')

    <div class="nk-content ">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Tüm Eğitimler</h4>
                    <div class="nk-block-des">
                        <p>Kaydı Olan Tüm Eğitimler Burada Listelenir.</p>
                    </div>
                    <a href="{{route('education-create')}}" class="btn btn-l btn-primary" style="margin-left: 1200px;">Eğitim Oluştur</a>
                </div>
            </div>
            <div class="tab-content">
                <div id="tabItem5" class="tab-pane fade show active">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init table">
                                <thead>
                                <tr>
                                    <th>Eğitim Adı</th>
                                    <th>Kayıt Tarihi</th>
                                    <th>İçerik</th>
                                    <th>Paketi</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($userData['success']) && $userData['success'])
                                    @if(isset($userData['education']) && is_array($userData['education']))
                                        @foreach($userData['education'] as $education)
                                            <tr>
                                                <td>{{ $education['name']  }}</td>
                                                <td>{{ \Carbon\Carbon::parse($education['created_at'] ?? '')->format('d.m.Y') }}</td>
                                                <td>
                                                    {{ \Illuminate\Support\Str::of($education['contents'])->limit(50) }}
                                                </td>
                                                <td>
                                                    @if(isset($education['packages']) && is_array($education['packages']) && count($education['packages']) > 0)
                                                        @foreach($education['packages'] as $package)
                                                            {{ $package['name'] }}
                                                        @endforeach
                                                    @else
                                                        Belirtilmemiş
                                                    @endif
                                                </td>
                                                <td class="tb-tnx-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown">
                                                            <em class="icon ni ni-more-h"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a href="{{route('education-update', [$education['id']])}}">Düzenle</a></li>
                                                                <li><a href="{{route('education-delete', [$education['id']])}}">Sil</a></li>
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
