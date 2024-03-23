@foreach ($data as $d )
{{-- @dd($d['name']); --}}
<li class="list-group-item px-0">
    <div class="d-flex">
        <div class="flex-shrink-0 avatar-xs">
            <span class="avatar-title bg-light p-1 rounded-circle">
                <img src="{{ asset('backend/assets/images/svg/crypto-icons/btc.svg') }}"
                    class="img-fluid" alt="">
            </span>
        </div>
        <div class="flex-grow-1 ms-2">
            <h6 class="mb-1">{{ $d['name'] }}</h6>
            <p class="fs-12 mb-0 text-muted"><i
                    class="mdi mdi-circle fs-10 align-middle text-primary me-1"></i>{{ $d['symbol'] }}
            </p>
        </div>
        <div class="flex-shrink-0 text-end">
            <h6 class="mb-1">{{ $d['symbol'] }} <span class="{{  $d['quote']['USD']['percent_change_1h'] < 0?'text-danger':'text-success' }}">{{  roundOff($d['quote']['USD']['percent_change_1h'])}}</span></h6>
            <p class="text-success fs-12 mb-0"> {{ roundOff($d['quote']['USD']['price']) }}</p>
        </div>
    </div>
</li><!-- end -->
@endforeach

