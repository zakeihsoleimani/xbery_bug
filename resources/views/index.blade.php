@extends('layout.master')

@section('css')
<style>
    .action-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 32px;
    }
    .action-card {
        background: #fff;
        border: 2px solid #e5e5f0;
        border-radius: 16px;
        padding: 32px;
        text-decoration: none;
        color: inherit;
        transition: all .3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .action-card:hover {
        border-color: var(--colorTextSidebar);
        box-shadow: 0 12px 32px rgba(63, 64, 100, .15);
        transform: translateY(-8px);
    }
    .action-card-icon {
        width: 64px;
        height: 64px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        font-size: 28px;
    }
    .action-card-primary .action-card-icon {
        background: linear-gradient(135deg, var(--colorTextSidebar) 0%, #6b5dd6 100%);
    }
    .action-card-secondary .action-card-icon {
        background: linear-gradient(135deg, #ffa500 0%, #ff8c00 100%);
    }
    .action-card-primary svg,
    .action-card-secondary svg {
        color: #fff;
        width: 32px;
        height: 32px;
    }
    .action-card-title {
        font-size: 18px;
        font-weight: bold;
        color: var(--colorTextSidebar);
        margin-bottom: 12px;
    }
    .action-card-desc {
        font-size: 13px;
        color: #8a8a9a;
        line-height: 1.6;
    }
</style>
@endsection

@section('content')
<div dir="rtl">

    <div class="action-cards">
        <a href="{{ route('process.index') }}" class="action-card action-card-primary">
            <div class="action-card-icon">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
            </div>
            <div class="action-card-title">تالار باگ‌ها</div>
            <div class="action-card-desc">باگ‌های ثبت شده را مشاهده کنید و برای بررسی درخواست کنید</div>
        </a>

        <a href="{{ route('bug.my-bugs') }}" class="action-card action-card-secondary">
            <div class="action-card-icon">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/>
                </svg>
            </div>
            <div class="action-card-title">باگ‌های من</div>
            <div class="action-card-desc">باگ‌هایی را که برای بررسی درخواست کرده‌اید مشاهده کنید</div>
        </a>
    </div>

</div>
@endsection
