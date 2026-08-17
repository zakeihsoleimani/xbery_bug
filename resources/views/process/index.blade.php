@extends('layout.master')

@section('css')
<style>
    .bug-row {
        transition: box-shadow .15s, border-color .15s;
    }
    .bug-row:hover {
        box-shadow: 0 4px 16px rgba(63, 64, 100, .08);
        border-color: #d9d9e8 !important;
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
    .bug-row-reporter {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: #8a8a9a;
    }
    .bug-row-avatar {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        object-fit: cover;
    }
    .btn-claim {
        border-radius: 100px;
        padding: 8px 20px;
        font-weight: bold;
        font-size: 13px;
        background: var(--colorTextSidebar);
        color: #fff;
        border: none;
        cursor: pointer;
        transition: opacity .15s, transform .15s;
    }
    .btn-claim:hover {
        opacity: .9;
        transform: scale(1.02);
    }
</style>
@endsection

@section('content')
<div dir="rtl">

    <div class="mb-4">
        <h5 class="fw-bold text-sorme">تالار باگ‌ها</h5>
        <p class="text-muted">باگ‌های ثبت‌شده در سیستم را مشاهده کنید و برای بررسی آن‌ها درخواست کنید</p>
    </div>

    @forelse($bugs as $bug)
        <div class="border rounded-2 mb-3 p-3 bug-row">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                <div class="fw-bold text-sorme d-flex align-items-center gap-2">
                    <img src="{{ url('assets/icons/pages/' . ($bug->page ?? '') . '.svg') }}" width="20" height="20" onerror="this.onerror=null; this.src='{{ url('assets/library/shadonic/icons/guide.svg') }}';" />
                    {{ $bug->page ? \App\Models\Bug::PAGES[$bug->page] ?? $bug->page : 'سایر صفحات' }}
                </div>
                <span class="bug-status-badge bug-status-{{ $bug->status }}">
                    <span class="bug-status-dot"></span>
                    {{ \App\Models\Bug::STATUSES[$bug->status] ?? $bug->status }}
                </span>
            </div>

            <p class="text-muted fs-13 mb-3">{{ \Illuminate\Support\Str::limit($bug->description, 90) }}</p>

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                <div class="bug-row-reporter">
                    <img class="bug-row-avatar" src="{{ $bug->reporter->avatar ?? url('assets/library/shadonic/icons/no.jpg') }}">
                    گزارش‌دهنده: <span class="text-dark fw-bold">{{ $bug->reporter->name ?? 'نامشخص' }}</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="text-gray fs-12">{{ $bug->messages_count }} پیام</span>
                    <form method="POST" action="{{ route('process.claim', $bug->id) }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-claim">انتخاب و بررسی</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info" role="alert">
            <p class="m-0">هیچ باگ در تالار موجود نیست</p>
        </div>
    @endforelse

    <div class="mt-3">
        {{ $bugs->links() }}
    </div>

</div>
@endsection
