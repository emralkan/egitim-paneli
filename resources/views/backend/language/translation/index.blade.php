@extends('backend.template.template')
@section('content')
    <div class="nk-content ">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Tüm Çeviriler</h4>
                    <div class="nk-block-des">
                        <p>Kaydı Olan Tüm Çeviriler Burada Listelenir.</p>
                    </div>
                    <a href="{{route('languageLines-create')}}" class="btn btn-l btn-primary" style="margin-left: 1200px;">Çeviri Oluştur</a>
                </div>
            </div>
            <div class="tab-content">
                <div id="tabItem5" class="tab-pane fade show active">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init table">
                                <thead>
                                <tr>
                                    <th>Dil</th>
                                    <th>Key</th>
                                    <th>Durum</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($userData['success']) && $userData['success'])
                                    @if(isset($userData['language']) && is_array($userData['language']))
                                        @foreach($userData['language'] as $language)
                                            <tr>
                                                <td>{{ $language['language']  }}</td>
                                                <td>{{$language['key'] }}</td>
                                                <td>{{$language['text'] }}</td>

                                                <td class="tb-tnx-action">
                                                    <div class="dropdown">
                                                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown">
                                                            <em class="icon ni ni-more-h"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                            <ul class="link-list-plain">
                                                                <li><a href="{{route('languageLines-update', [$language['id']])}}">Düzenle</a></li>
                                                                <li><a href="{{route('languageLines-delete', [$language['id']])}}">Sil</a></li>
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
