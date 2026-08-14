@extends('layout.master')

@section('css')
<style>
    .bug-chat {
        border: 1px solid #e5e5f0 !important;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }
    .bug-chat-messages {
        max-height: 460px;
        overflow-y: auto;
        background: #f5f6fa;
        padding: 16px;
        scrollbar-width: thin;
        scrollbar-color: #c9c9dc transparent;
    }
    .bug-chat-messages::-webkit-scrollbar {
        width: 6px;
    }
    .bug-chat-messages::-webkit-scrollbar-track {
        background: transparent;
    }
    .bug-chat-messages::-webkit-scrollbar-thumb {
        background-color: #c9c9dc;
        border-radius: 100px;
    }
    .bug-chat-messages::-webkit-scrollbar-thumb:hover {
        background-color: var(--colorTextSidebar);
    }
    .bug-chat-date-divider {
        text-align: center;
        margin: 4px 0 16px;
    }
    .bug-chat-date-divider span {
        display: inline-block;
        background: #e9e9f2;
        color: #8a8ac0;
        font-size: 12px;
        padding: 4px 14px;
        border-radius: 100px;
    }
    .bug-msg-row {
        display: flex;
        direction: ltr;
        align-items: flex-end;
        gap: 8px;
        margin-bottom: 14px;
    }
    .bug-msg-row.is-own {
        justify-content: flex-end;
    }
    .bug-msg-row.is-other {
        justify-content: flex-start;
    }
    .bug-msg-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
    }
    .bug-msg-bubble {
        max-width: 72%;
        padding: 10px 14px;
        border-radius: 16px;
    }
    .bug-msg-row.is-other .bug-msg-bubble {
        background: #fff;
        border: 1px solid #ececf5;
        border-bottom-left-radius: 4px;
    }
    .bug-msg-row.is-own .bug-msg-bubble {
        background: var(--colorTextSidebar);
        color: #fff;
        border-bottom-right-radius: 4px;
    }
    .bug-msg-sender {
        font-size: 12px;
        font-weight: bold;
        color: var(--colorTextSidebar);
        margin-bottom: 3px;
    }
    .bug-msg-text {
        font-size: 14px;
        line-height: 1.7;
        white-space: pre-wrap;
        word-break: break-word;
    }
    .bug-msg-time {
        font-size: 10px;
        opacity: .65;
        margin-top: 4px;
    }
    .bug-chat-empty {
        text-align: center;
        padding: 32px 0;
    }
    .bug-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 12px;
        border-radius: 100px;
        font-size: 12px;
        font-weight: bold;
        white-space: nowrap;
    }
    .bug-status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: currentColor;
        flex-shrink: 0;
    }
    .bug-status-open {
        background: #eef0fb;
        color: #5b5fc7;
    }
    .bug-status-in_progress {
        background: #fff4e0;
        color: #c98a12;
    }
    .bug-status-resolved {
        background: #e6f7ec;
        color: #1f9254;
    }
    .bug-composer-label {
        font-size: 13px;
        font-weight: bold;
        color: #8a8ac0;
        margin-bottom: 8px;
        padding: 0 6px;
    }
    .bug-composer-bar {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #fff;
        border: 1px solid #e5e5f0;
        border-radius: 28px;
        padding: 6px 6px 6px 8px;
        box-shadow: 0 6px 20px rgba(63, 64, 100, .08);
        transition: box-shadow .2s, border-color .2s;
    }
    .bug-composer-bar:focus-within {
        border-color: var(--colorTextSidebar);
        box-shadow: 0 6px 24px rgba(63, 64, 100, .18);
    }
    .bug-composer-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
    }
    .bug-composer-input {
        flex: 1;
        resize: none;
        border: none;
        outline: none;
        background: transparent;
        padding: 9px 4px;
        font-size: 14px;
        line-height: 1.6;
        max-height: 120px;
    }
    .bug-composer-send {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        border: none;
        background: var(--colorTextSidebar);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        cursor: pointer;
        transition: transform .15s, opacity .15s, background-color .15s;
    }
    .bug-composer-send:hover,
    .bug-composer-send:focus {
        color: #fff;
        transform: scale(1.06);
    }
    .bug-composer-send:disabled {
        background: #d9d9d9;
        cursor: not-allowed;
        transform: none;
    }
    .bug-composer-hint {
        font-size: 11px;
        color: #a8a8c0;
        margin-top: 8px;
        padding: 0 10px;
    }
</style>
@endsection

@section('content')
<div dir="rtl">

    <div class="border rounded-2 p-3 mb-4 bug-chat">
        <div class="d-flex justify-content-between align-items-start">
            <div>
                <h5 class="fw-bold mb-1 mt-2 text-sorme d-flex align-items-center gap-2">
                    <img src="{{ url('assets/icons/pages/' . ($bug->page ?? '') . '.svg') }}" width="22" height="22" onerror="this.onerror=null; this.src='{{ url('assets/library/shadonic/icons/guide.svg') }}';" />
                    باگ یا پیشنهاد در صفحه:  {{ $bug->page ? \App\Models\Bug::PAGES[$bug->page] ?? $bug->page : 'سایر صفحات' }}
                </h5>
                <span class="text-gray fs-12">
                    بررسی‌کننده: {{ $bug->admin->name ?? 'هنوز به کاربری ارجاع نشده است' }}
                </span>
            </div>
            <span class="bug-status-badge bug-status-{{ $bug->status }}">
                <span class="bug-status-dot"></span>
                {{ $statuses[$bug->status] ?? $bug->status }}
            </span>
        </div>
        <div class="bug-chat-messages" id="bug-chat-messages">
            <div class="bug-msg-row is-own">
                <div class="bug-msg-bubble" dir="rtl">
                    <div class="bug-msg-text">{{ $bug->description }}</div>
                    <div class="bug-msg-time">ثبت اولیه باگ در {{ verta($bug->created_at)->format('l j F Y H:i') }} توسط شما</div>
                </div>
            </div>
            @php $lastDate = null; @endphp
            @foreach($bug->messages as $message)
                @php
                    $isOwn = $message->admin_mobile == auth()->user()->mobile;
                    $msgDate = $message->created_at->format('Y-m-d');
                @endphp
                @if($msgDate !== $lastDate)
                    <div class="bug-chat-date-divider"><span>{{ verta($message->created_at)->format('l j F Y') }}</span></div>
                    @php $lastDate = $msgDate; @endphp
                @endif
                <div class="bug-msg-row {{ $isOwn ? 'is-own' : 'is-other' }}">
                    @unless($isOwn)
                        <img class="bug-msg-avatar" src="{{ $message->admin->avatar ?? url('assets/library/shadonic/icons/no.jpg') }}">
                    @endunless
                    <div class="bug-msg-bubble" dir="rtl">
                        @unless($isOwn)
                            <div class="bug-msg-sender">{{ $message->admin->name ?? 'نامشخص' }}</div>
                        @endunless
                        <div class="bug-msg-text">{{ $message->message }}</div>
                        <div class="bug-msg-time">{{ $message->created_at->format('H:i') }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if($bug->status !== 'resolved')
        <div class="mb-4">
            <div class="bug-composer-label">پیام جدید</div>
            <form method="POST" action="{{ url('bug/message', $bug->id) }}" class="bug-composer-bar" dir="rtl" id="bug-composer-form">
                @csrf
                <img class="bug-composer-avatar" src="{{ auth()->user()->avatar ?? url('assets/library/shadonic/icons/no.jpg') }}">
                <textarea id="bug-chat-textarea" name="message" class="bug-composer-input" rows="1" placeholder="پیام خود را بنویسید..." maxlength="2000">{{ old('message') }}</textarea>
                <button type="submit" class="bug-composer-send" title="ارسال" id="bug-composer-send">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M2 21l21-9L2 3v7l15 2-15 2z"/></svg>
                </button>
            </form>
            <div class="bug-composer-hint">Enter برای ارسال، Shift+Enter برای خط جدید</div>
        </div>
    @else
        <div class="text-muted text-center fs-12 mb-4">این گزارش بسته‌شده است و امکان ارسال پیام جدید وجود ندارد.</div>
    @endif

</div>
@endsection

@section('script')
<script>
    (function () {
        var box = document.getElementById('bug-chat-messages');
        if (box) {
            box.scrollTop = box.scrollHeight;
        }

        var textarea = document.getElementById('bug-chat-textarea');
        var sendBtn = document.getElementById('bug-composer-send');
        if (!textarea) return;

        function autoGrow() {
            textarea.style.height = 'auto';
            textarea.style.height = Math.min(textarea.scrollHeight, 120) + 'px';
        }
        function toggleSendState() {
            if (sendBtn) {
                sendBtn.disabled = textarea.value.trim().length === 0;
            }
        }
        textarea.addEventListener('input', function () {
            autoGrow();
            toggleSendState();
        });
        autoGrow();
        toggleSendState();

        var form = textarea.form;

        function lockAndSubmit() {
            if (form.dataset.locked) {
                return;
            }
            form.dataset.locked = '1';
            if (sendBtn) sendBtn.disabled = true;
            textarea.readOnly = true;
            form.submit();
        }

        textarea.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                if (textarea.value.trim().length > 0) {
                    lockAndSubmit();
                }
            }
        });

        form.addEventListener('submit', function (e) {
            if (form.dataset.locked) {
                e.preventDefault();
                return;
            }
            form.dataset.locked = '1';
            if (sendBtn) sendBtn.disabled = true;
            textarea.readOnly = true;
        });
    })();
</script>
@endsection
