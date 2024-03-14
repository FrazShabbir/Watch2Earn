<div class="card form-card" id="load-notes-log">
    <div class="card-header">
        <h5 class="card-title mb-0">Notes</h5>
    </div>
    <div class="card-body">
        <div class="container" style="max-height: 200px; overflow:scroll">
            <div class="chat-container">
                @foreach ($notes as $note)
                    @if ($note->created_by_id == auth()->user()->id)
                        <div class="chat-message outgoing col-12 text-end">
                            <div class="message outgoing-msg">
                                {{ $note->note }}
                                <div class="meta">{{ $note->created_at->format('M d, Y h:i A') }}</div>
                            </div>
                        </div>
                    @else
                        <div class="chat-message incoming col-12 text-start">
                            <div class="message incoming-msg">
                                {{ $note->note }}
                                <div class="meta">{{ $note->created_at->format('M d, Y h:i A') }}</div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>

        <div class="chat-input-section  bg-transparent">
            <div class="row g-0 align-items-center">
                <div class="col-auto">
                    <div class="chat-input-links me-2">
                        <div class="links-list-item">
                            <button type="button" class="btn btn-link text-decoration-none emoji-btn" id="emoji-btn">
                                <i class="bx bx-smile align-middle"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="chat-input-feedback">
                        Please Enter a Message
                    </div>
                    <input type="text" class="form-control chat-input independent-area bg-light border-light"
                        id="chat-input" placeholder="Type your message..." autocomplete="off">
                </div>
                <div class="col-auto">
                    <div class="chat-input-links ms-2">
                        <div class="links-list-item">
                            <button type="button" id="addNoteChatButton"
                                class="btn btn-success chat-send waves-effect waves-light">
                                <i class="ri-send-plane-2-fill align-bottom"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
