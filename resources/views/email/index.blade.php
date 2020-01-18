

@section('content')

    <div class="detail_box">
        <h3>{{$ema_descriptif}}</h3>
        <h4>{{$ema_lieu}}, le {{Carbon\Carbon::createFromFormat('Y-m-d', date($ema_dateJour))->format('d.m.Y')}}</h4>
        <h5>{{$ema_intro}}</h5>
        <hr>
        <div class="detail_row">
            <div class="detail_left_col">
                <p>{{$ema_p}}</p>
                <p>{{$ema_p2}}</p>
            </div>
        </div>
        <p>{{$ema_salutations}}</p>
    </div>

