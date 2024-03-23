@foreach ($datas as $data )
<div class="col-lg-4 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="avatar-sm flex-shrink-0">
                    <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                        {{-- <i class="ri-money-dollar-circle-fill align-middle"></i> --}}
                        <img src="{{$data['imageUrl'] }}" alt="" class="img-thumbnail" style="border: none!important" >
                    </span>
                </div>
                <div class="flex-grow-1 ms-3">
                    <p class="text-uppercase fw-semibold fs-12 text-muted mb-1"> {{$data['fullName'] ?? $data['pair'] }}
                    </p>
                    <h5 class=" mb-0">{{ $data['symbol'] }} <span class="counter-value"
                            data-target="{{$data['rate'] }}">{{$data['rate'] }}</span></h5>
                </div>
                <div class="flex-shrink-0 align-self-end">
                    <span class="badge bg-success-subtle text-success"><i
                            class="ri-arrow-up-s-fill align-middle me-1"></i>6.24 %<span>
                        </span></span>
                </div>
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div><!-- end col -->

@endforeach
