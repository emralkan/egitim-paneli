@extends('backend.template.template')
@section('content')
    <div class="nk-content ">
        <div class="nk-block nk-block-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Tüm Kullanıcılar</h4>
                    <div class="nk-block-des">
                        <p>Kaydı Olan Tüm Kullanıcılar Burada Listelenir.</p>
                    </div>
                    <a href="{{route('user-create')}}" class="btn btn-l btn-primary" style="margin-left: 1200px;">Kullanıcı Oluştur</a>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabItem5"><em class="icon ni ni-user"></em><span>Bireysel</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabItem6"><em class="icon ni ni-blackberry"></em><span>Kurumsal</span></a>
                </li>

            </ul>
            <div class="tab-content">
                <div id="tabItem5" class="tab-pane fade show active">
            <div class="card card-preview">
                <div class="card-inner">
                    <table class="datatable-init table">
                        <thead>
                        <tr>
                            <th>AdSoyad</th>
                            <th>Kayıt Tipi</th>
                            <th>Telefon Numarası</th>
                            <th>E-Mail</th>
                            <th>Kayıt Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($userData->user as $key => $item)
                            @if ($item->user_type === 'bireysel')
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->user_type}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d.m.Y') }}</td>
                            <td class="tb-tnx-action">
                                <div class="dropdown">
                                    <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                        <ul class="link-list-plain">
                                            <li><a href="{{route('user-update', [$item->id])}}">Düzenle</a></li>
                                            <li><a href="{{route('user-delete', [$item->id])}}">Sil</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- .card-preview -->
        </div>
                <div id="tabItem6" class="tab-pane fade">
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init table">
                                <thead>
                                <tr>
                                    <th>AdSoyad</th>
                                    <th>Kayıt Tipi</th>
                                    <th>Telefon Numarası</th>
                                    <th>E-Mail</th>
                                    <th>Kayıt Tarihi</th>
                                    <th>İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($userData->user as $key => $item)
                                    @if ($item->user_type === 'kurumsal')
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->user_type}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d.m.Y') }}</td>
                                        <td class="tb-tnx-action">
                                            <div class="dropdown">
                                                <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                    <ul class="link-list-plain">
                                                        <li><a href="{{route('user-update', [$item->id])}}">Düzenle</a></li>
                                                        <li><a href="{{route('user-delete', [$item->id])}}">Sil</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- .card-preview -->
                </div>
    </div>
        </div>
    </div>
@endsection
