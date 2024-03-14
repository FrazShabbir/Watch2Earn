<div id="contact-existing-list">
    <div data-simplebar style="height: 242px;" class="mx-n3">
        <ul class="list list-group list-group-flush mb-0">
            @foreach ($followups as $followup)
            <li class="list-group-item" data-id="01" style="border: 1px solid #d7d4d4;background:#fff;border-radius:10px" >
                <div class="d-flex align-items-start edit-follow-up" data-id="{{$followup->id}}" >
                    <div class="flex-shrink-0 me-3">
                        <div>
                            <img class="image avatar-xs rounded-circle" alt="" src="https://ui-avatars.com/api/?name={{$followup->user?->first_name}}">
                        </div>
                    </div>

                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="contact-name fs-13 mb-1"><a href="#" class="link text-body">{{$followup?->user?->full_name}}</a></h5>
                        <p class="contact-born text-muted mb-0">{{(strlen($followup->description) > 50) ? substr($followup->description, 0, 50) . "..." : $followup->description}}</p>
                    </div>

                    <div class="flex-shrink-0 ms-2">
                        <div class="fs-11 text-muted">{{$followup->date}}</div>
                    </div>
                </div>
            </li>
            @endforeach

        </ul>
        <!-- end ul list -->
    </div>
</div>
