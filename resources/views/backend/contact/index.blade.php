@extends('backend.template.template')
@section('content')


    <!-- wrap @s -->
    <div class="nk-wrap ">
        <div class="nk-header nk-header-fixed is-light">
            <div class="container-lg wide-xl">

            </div><!-- .container-fliud -->
        </div>
        <!-- main header @e -->
        <!-- content @s -->
        <div class="nk-content ">
            <div class="container wide-xl">
                <div class="nk-content-inner">

                    <div class="nk-content-body">
                        <div class="nk-content-wrap">
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-head-sub"><span>İletişim Mesajları</span></div>
                                <div class="nk-block-between-md g-4">
                                    <div class="nk-block-head-content">
                                        <h2 class="nk-block-title fw-normal">Tüm Mesajlar</h2>
                                        <div class="nk-block-des">
                                            <p>Gönderilen Tüm Mesajlar Burada Listelenir</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <ul class="nk-block-tools g-4 flex-wrap">
                                            <li class="order-md-last"><a href="#" class="btn btn-white btn-dim btn-outline-primary"><span>Submit Ticket</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="card card-bordered">
                                    <table class="table table-tickets">
                                        <thead class="tb-ticket-head">
                                        <tr class="tb-ticket-title">
                                            <th class="tb-ticket-id"><span>Ad Soyad</span></th>
                                            <th class="tb-ticket-desc">
                                                <span>Konu</span>
                                            </th>
                                            <th class="tb-ticket-date tb-col-md">
                                                <span>Tarih</span>
                                            </th>
                                            <th class="tb-ticket-seen tb-col-md">
                                                <span>Kullanıcı Tipi</span>
                                            </th>
                                            <th class="tb-ticket-status">
                                                <span>Durum</span>
                                            </th>
                                            <th class="tb-ticket-action"> &nbsp; </th>
                                        </tr><!-- .tb-ticket-title -->
                                        </thead>
                                        <tbody class="tb-ticket-body">

                                        @foreach ($contacts as $key => $item)
                                                <tr class="tb-ticket-item is-unread">
                                                    <td class="tb-ticket-id"><a href="{{ url('/contact-messages/'.$item['id']) }}">{{$item['name']}}</a></td>
                                                    <td class="tb-ticket-desc">
                                                        <a href="{{ url('/contact-messages/'.$item['id']) }}"><span class="title">{{$item['subject']}}</span></a>
                                                    </td>
                                                    <td class="tb-ticket-date tb-col-md">
                                                        <span class="date">{{ \Carbon\Carbon::parse($item['created_at'])->format('d-m-Y') }}</span>
                                                    </td>

                                                    <td class="tb-ticket-seen tb-col-md">
                                                        <span class="date-last"><em class="icon-avatar bg-danger-dim icon ni ni-user-fill nk-tooltip" title="Support Team"></em>{{$item['user_type']}}</span></span>
                                                    </td>
                                                    <td class="tb-ticket-status">
                                                        <span class="badge badge-success">{{$item['status'] ?? '*' }}</span>
                                                    </td>
                                                    <td class="tb-ticket-action">
                                                        <a href="{{ url('/contact-messages/'.$item['id']) }}" class="btn btn-icon btn-trigger">
                                                            <em class="icon ni ni-chevron-right"></em>
                                                        </a>
                                                    </td>
                                                </tr><!-- .tb-ticket-item -->
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .nk-block -->

                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
