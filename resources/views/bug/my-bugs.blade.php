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
    .bug-status-in_progress {
        background: #fff4e0;
        color: #c98a12;
    }
    .bug-status-resolved {
        background: #e6f7ec;
        color: #1f9254;
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
</style>
@endsection

@section('content')
<div dir="rtl">

    <div class="mb-4">
        <h5 class="fw-bold text-sorme mb-1">باگ‌های درخواست‌شده من</h5>
        <p class="text-muted">باگ‌هایی که برای بررسی درخواست کرده‌اید</p>
    </div>

    @forelse($bugs as $bug)
        <a href="{{ route('process.show', $bug->id) }}" class="text-decoration-none text-dark">
            <div class="border rounded-2 mb-3 p-3 bug-row">
                <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                    <div class="fw-bold text-sorme d-flex align-items-center gap-2">
                        <img src="{{ url('assets/icons/pages/' . ($bug->page ?? '') . '.svg') }}" width="20" height="20" onerror="this.onerror=null; this.src='{{ url('assets/library/shadonic/icons/guide.svg') }}';" />
                        {{ $bug->page ? \App\Models\Bug::PAGES[$bug->page] ?? $bug->page : 'سایر صفحات' }}
                    </div>
                    <span class="bug-status-badge bug-status-{{ $bug->status }}">
                        <span class="bug-status-dot"></span>
                        {{ \App\Models\Bug::STATUSES[$bug->status] ?? $bug->status }}
                    </span>
                </div>

                <p class="text-muted fs-13 mb-3 mt-2">{{ \Illuminate\Support\Str::limit($bug->description, 90) }}</p>

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div class="bug-row-reporter">
                        <img class="bug-row-avatar" src="{{ $bug->reporter->avatar ?? url('assets/library/shadonic/icons/no.jpg') }}">
                        گزارش‌دهنده: <span class="text-dark fw-bold">{{ $bug->reporter->name ?? 'نامشخص' }}</span>
                    </div>
                    <span class="text-gray fs-12">{{ $bug->messages_count }} پیام</span>
                </div>
            </div>
        </a>
    @empty
        <div class="alert alert-info" role="alert">
            <p class="m-0">شما هنوز هیچ باگی را برای بررسی درخواست نکرده‌اید</p>
        </div>
    @endforelse

    <div class="mt-3">
        {{ $bugs->links() }}
    </div>

</div>
@endsection