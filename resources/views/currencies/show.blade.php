@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h1>{!! $CryptoCurrency->name !!} <small>({!! $CryptoCurrency->symbol !!})</small></h1>
                        <ul class="nav flex-column">
                            @foreach($CryptoCurrency->info as $custom)
                                <li class="nav-item"><a class="nav-link px-0 py-0" rel="nofollow" target="_blank" href="{!! $custom->value !!}"><i class="icon icon-home mr-1"></i>{!! $custom->name !!}</a></li>
                            @endforeach
                            <li><span class="badge badge-success">Rank {!! $CryptoCurrency->rank !!}</span></li>
                        </ul>
                    </div>
                    <div class="col-8">
                        <div class="h3">${!!  number_format($CryptoCurrency->price_usd,2,',','.') !!} <small>USD</small>
                            <span class="{!! ($CryptoCurrency->percent_change_24h < 0 ? 'text-danger' : 'text-success') !!}">
                            {!! number_format($CryptoCurrency->percent_change_24h,2) !!}
                                <i class="ml-1 icon icon-arrow-{!! ($CryptoCurrency->percent_change_24h < 0 ? 'down' : 'up') !!}" aria-hidden="true"></i>
                        </span>
                        </div>
                        <div>${!! $CryptoCurrency->price_btc !!} <small>BTC</small></div>
                    </div>
                </div>
            </div>
            <table class="table table-striped mb-0">
                <thead class="thead-light">
                <tr>
                    <th>Market Cap</th>
                    <th>Volume (24h)</th>
                    <th>Circulating Supply</th>
                    <th>Max Supply</th>
                </tr>
                </thead>
                <tr>
                    <td>
                        <div class="font-weight-bold">{!! number_format($CryptoCurrency->market_cap_usd,0,',','.') !!} USD</div>
                        <div class="text-muted">{!! number_format($CryptoCurrency->market_cap_usd / $BTC_price_usd ,0,',','.') !!} BTC</div>
                    </td>
                    <td>
                        <div class="font-weight-bold">{!! number_format($CryptoCurrency->volume_24h_usd,0,',','.') !!} USD</div>
                        <div class="text-muted">{!! number_format($CryptoCurrency->volume_24h_usd / $BTC_price_usd ,0,',','.') !!} BTC</div>
                    </td>
                    <td>
                        <div class="font-weight-bold">{!! number_format($CryptoCurrency->available_supply,0,',','.') !!} USD</div>
                        <div class="text-muted">{!! number_format($CryptoCurrency->available_supply / $BTC_price_usd ,0,',','.') !!} BTC</div>
                    </td>
                    <td>
                        <div class="font-weight-bold">{!! number_format($CryptoCurrency->max_supply,0,',','.')  !!} USD</div>
                        <div class="text-muted">{!! number_format($CryptoCurrency->max_supply / $BTC_price_usd ,0,',','.') !!} BTC</div>
                    </td>
                </tr>
            </table>

        </div>

        <div class="row">
            <div class="col">
                <div class="card my-3">
                    <div class="card-header">
                        Crypto Currency Exchange
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Text input with checkbox">
                                    <span class="input-group-addon">{!! $CryptoCurrency->symbol !!}</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Text input with radio button">
                                    <span class="input-group-addon">BTC</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card my-3">
                    <div class="card-header">
                        Really Currency Exchange
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Text input with checkbox">
                                    <span class="input-group-addon">{!! $CryptoCurrency->symbol !!}</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" aria-label="Text input with radio button">
                                    <span class="input-group-addon">USD</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card">
            <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="icon icon-line-chart mr-1"></i>Charts</a></li>
                <li class="nav-item"><a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="icon icon-exchange mr-1"></i>Markets</a></li>
                <li class="nav-item"><a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="icon icon-globe mr-1"></i>Social</a></li>
                <li class="nav-item"><a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="icon icon-line-cogs mr-1"></i>Tools</a></li>
                <li class="nav-item"><a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="icon icon-table mr-1"></i>Historical Data</a></li>
            </ul>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" style="height: 500px" role="tabpanel" aria-labelledby="nav-home-tab">
                    @include('layouts.currencies-chart',['CryptoCurrency' => $CryptoCurrency])
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
        </div>

    </div>
@endsection


