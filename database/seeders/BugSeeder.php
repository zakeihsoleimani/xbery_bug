<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bug;

class BugSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // دریافت admin موجود برای استفاده به‌عنوان گزارش‌دهنده
        $admin = \App\Models\Admin::first();

        if (!$admin) {
            return; // اگر admin موجود نیست، seeder را نریز
        }

        $reporterMobile = $admin->mobile;

        // ایجاد نمونه باگ‌ها برای تالار
        Bug::create([
            'app_name' => 'bug',
            'reporter_mobile' => $reporterMobile,
            'admin_mobile' => null,
            'page' => 'index',
            'description' => 'دکمه ثبت نام در صفحه اول کار نمی‌کند. وقتی روی دکمه کلیک می‌کنم هیچ اتفاقی نمی‌افتد و صفحه بند نمی‌شود.',
            'status' => 'open',
        ]);

        Bug::create([
            'app_name' => 'bug',
            'reporter_mobile' => $reporterMobile,
            'admin_mobile' => null,
            'page' => 'bugShow',
            'description' => 'هنگام بارگذاری صفحات زیادی از پیام‌های باگ، سرعت صفحه بسیار کند می‌شود و اگر بیش از 100 پیام داشته باشیم صفحه freeze می‌شود.',
            'status' => 'open',
        ]);

        Bug::create([
            'app_name' => 'bug',
            'reporter_mobile' => $reporterMobile,
            'admin_mobile' => null,
            'page' => 'index',
            'description' => 'تصویر پروفایل کاربر در صفحه نمایش صحیح نیست. تصویری که آپلود شده نمایش داده نمی‌شود و جای آن از تصویر پیشفرض استفاده می‌شود.',
            'status' => 'open',
        ]);

        Bug::create([
            'app_name' => 'bug',
            'reporter_mobile' => $reporterMobile,
            'admin_mobile' => null,
            'page' => null,
            'description' => 'خطا در validation پیام باگ. وقتی پیام خیلی بلند باشد (بیش از 2000 کاراکتر) سامانه crash می‌کند.',
            'status' => 'open',
        ]);

        Bug::create([
            'app_name' => 'bug',
            'reporter_mobile' => $reporterMobile,
            'admin_mobile' => null,
            'page' => 'bugShow',
            'description' => 'اسکرول کردن در قسمت پیام‌های چت کار نمی‌کند. با استفاده از keyboard یا mouse نمی‌توان پیام‌های قدیمی‌تر را دید.',
            'status' => 'open',
        ]);

        Bug::create([
            'app_name' => 'bug',
            'reporter_mobile' => $reporterMobile,
            'admin_mobile' => null,
            'page' => 'index',
            'description' => 'مشکل در پاسخ‌گویی responsive در موبایل. Layout صفحه در دستگاه‌های کوچک درست نیست و محتوا از صفحه بیرون می‌رود.',
            'status' => 'open',
        ]);
    }
}