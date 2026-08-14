@extends('layout.master')

@section('css')
<style>
    .bug-create-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(63, 64, 100, .08);
    }
    .bug-create-body {
        padding: 24px;
        background: #fff;
    }
    .bug-page-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #f3f3fb;
        border: 1px solid #e3e3f3;
        border-radius: 100px;
        padding: 8px 18px;
        font-weight: bold;
        font-size: 14px;
    }
    .bug-change-page {
        color: #8a8ac0;
        font-size: 12px;
        text-decoration: underline;
    }
    .bug-form-group label {
        font-weight: bold;
        margin-bottom: 8px;
        font-size: 14px;
    }
    .bug-form-group .form-control,
    .bug-form-group .form-select {
        border-radius: 12px;
        border: 1px solid #d9d9d9 !important;
        padding: 12px 16px;
        background: #fafaff;
        transition: border-color .15s, box-shadow .15s;
    }
    .bug-form-group .form-control:focus,
    .bug-form-group .form-select:focus {
        border-color: var(--colorTextSidebar) !important;
        box-shadow: 0 0 0 3px rgba(63, 64, 100, .12);
        background: #fff;
    }
    .bug-char-counter {
        font-size: 12px;
        color: #a8a8c0;
    }
    .bug-composer-bar {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #fafaff;
        border: 1px solid #d9d9d9;
        border-radius: 28px;
        padding: 6px 6px 6px 8px;
        transition: box-shadow .2s, border-color .2s;
    }
    .bug-composer-bar:focus-within {
        border-color: var(--colorTextSidebar);
        box-shadow: 0 0 0 3px rgba(63, 64, 100, .12);
        background: #fff;
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
    .btn-bug-submit {
        border-radius: 100px;
        padding: 12px 32px;
        font-weight: bold;
        color: #fff;
    }
    .btn-bug-submit:hover,
    .btn-bug-submit:focus {
        color: #fff;
        opacity: .9;
    }
    .btn-bug-cancel {
        border-radius: 100px;
        padding: 12px 24px;
        color: #8a8ac0;
        text-decoration: none;
        font-weight: bold;
    }
    .btn-bug-cancel:hover {
        color: var(--colorTextSidebar);
    }
</style>
@endsection

@section('content')
<div dir="rtl" class="rounded-2 border profile-request p-4 mb-3 position-relative">
    <div class="bug-create-body">

        <h5 class="fw-bold text-sorme mb-1">ثبت باگ جدید</h5>
        <div class="text-muted mb-4" style="font-size: 13px;">مشکلی که دیدید یا پیشنهادی که دارید را با جزئیات برای ما توضیح دهید</div>
        <form method="POST" action="{{ url('bug/store') }}">
            @csrf
            <input type="hidden" name="page" value="{{ in_array($request->page, array_keys($pages)) ? $request->page : '' }}">
            <div class="bug-form-group mb-4">
                <label class="d-block text-sorme">صفحه‌ای که باگ  یا پیشنهاد حول آن مطرح می‌شود</label>
                @if(in_array($request->page, array_keys($pages)))
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="text-decoration-none text-dark">
                            <div class="border rounded-2 p-3 text-center h-100 bug-page-card">
                                <img src="{{ url('assets/icons/pages/' . $request->page . '.svg') }}" width="28" height="28"  onerror="this.onerror=null; this.src='{{ url('assets/library/shadonic/icons/guide.svg') }}';" />
                                <div class="fs-14 fw-bold mt-2">{{ $pages[$request->page] }}</div>
                            </div>
                        </div>
                    </div>
                @else
                    <span class="bug-page-chip text-sorme">سایر صفحات</span>
                @endif
                <a href="{{ url('bug') }}" class="bug-change-page me-2">تغییر صفحه</a>
            </div>
            <div class="bug-form-group mb-2">
                <label>توضیحات</label>
                <div class="bug-composer-bar" dir="rtl">
                    <img class="bug-composer-avatar" src="{{ auth()->user()->avatar ?? url('assets/library/shadonic/icons/no.jpg') }}">
                    <textarea id="bug-description" name="description" class="bug-composer-input" rows="1" placeholder="مراحل بروز باگ، انتظار شما و چیزی که واقعاً اتفاق افتاد را بنویسید" maxlength="5000">{{ old('description') }}</textarea>
                    <button type="submit" class="bug-composer-send" title="ارسال" id="bug-description-send">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M2 21l21-9L2 3v7l15 2-15 2z"/></svg>
                    </button>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="{{ url('bug') }}" class="btn-bug-cancel">انصراف</a>
                <span class="bug-char-counter"><span id="bug-description-count">0</span>/5000</span>
            </div>
        </form>

    </div>
</div>
@endsection

@section('script')
<script>
    (function () {
        var textarea = document.getElementById('bug-description');
        var counter = document.getElementById('bug-description-count');
        var sendBtn = document.getElementById('bug-description-send');
        if (!textarea) return;

        function autoGrow() {
            textarea.style.height = 'auto';
            textarea.style.height = Math.min(textarea.scrollHeight, 120) + 'px';
        }
        function updateCount() {
            if (counter) counter.textContent = textarea.value.length;
        }
        function toggleSendState() {
            if (sendBtn) {
                sendBtn.disabled = textarea.value.trim().length === 0;
            }
        }
        textarea.addEventListener('input', function () {
            autoGrow();
            updateCount();
            toggleSendState();
        });
        autoGrow();
        updateCount();
        toggleSendState();

        textarea.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                if (textarea.value.trim().length > 0) {
                    textarea.form.submit();
                }
            }
        });
    })();
</script>
@endsection
