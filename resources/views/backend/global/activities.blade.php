<div class="card form-card" id="load-activity-log">
    <div class="card-header">
        <h5 class="card-title mb-0">Activity Log</h5>
    </div>
    <div class="card-body">
        <div id="scrolltobottom" class="scrolltobottom">
            @if ($logs)
                @foreach ($logs as $index => $item)
                    <div class="accordion-item border-0">
                        <div class="card">
                            <div class="card-body p-1">
                                <div class="accordion-header" id="heading6">
                                    <a class="accordion-button p-2 shadow-none collapsed" data-bs-toggle="collapse"
                                        href="#collapse{{ $item->id }}" aria-expanded="true">

                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <img src="{{ 'https://ui-avatars.com/api/?name=Elon+Musk' }}"
                                                    alt="" class="avatar-xs rounded-circle">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fs-14 mb-1">{{ $item->user->full_name }} </h6>
                                                <small class="text-muted"> {{ $item->description }} - <small
                                                        class="mb-0 text-muted" title="dasdasd">
                                                        {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                    </small>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </div>


                                <div id="collapse{{ $item->id }}" class="accordion-collapse hide collapse"
                                    aria-labelledby="heading6" data-bs-parent="#accordion11">
                                    <div class="accordion-body ms-2 ps-5 pt-2"
                                        style="max-height: 200px; overflow:scroll">
                                        <div class="code-view" id="hiddenLog11">
                                            <span class="language-markup">
                                                <small class="text-muted">

                                                    <br><strong>New Data:</strong><br>



                                                    <ul class="new_data">
                                                        @foreach (json_decode($item->new_data) as $subKey => $subValue)
                                                            <li class=""><span
                                                                    class="highlight">{{ $subKey }}:
                                                                    {{ $subValue }}</span></li>
                                                        @endforeach
                                                    </ul>

                                                    <br> <strong>Old data:</strong>
                                                    <br>

                                                    {{-- <strong>key:</strong> --}}
                                                    <ul class="old_data">
                                                        @foreach (json_decode($item->old_data) as $subKey => $subValue)
                                                            <li><span class="highlight">{{ $subKey }}:
                                                                    {{ $subValue }}</span></li>
                                                        @endforeach
                                                    </ul>

                                                </small>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </Ídiv>
                @endforeach
            @else
            @endif
        </div>




    </div>
</div>



<script>
    $(document).ready(function() {
        $('.code-view').each(function() {
            var newItems = $(this).find('.new_data li');
            var oldItems = $(this).find('.old_data li');

            newItems.each(function(index) {
                var newItem = $(this);
                var oldItem = oldItems.eq(index);
                if (newItem.text() !== oldItem.text()) {
                    newItem.find('span').addClass('highlighted-text');
                    oldItem.find('span').addClass('highlighted-text');
                }
            });
        });
    });
</script>
