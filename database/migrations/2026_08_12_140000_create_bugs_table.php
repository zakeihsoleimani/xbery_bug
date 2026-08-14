<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
    * ساخت جدول
    **/
    public function up(): void
    {
        Schema::create('bugs', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->nullable(); //اپ
            $table->string('reporter_mobile'); //گزارش‌دهنده
            $table->string('admin_mobile')->nullable(); //بررسی‌کننده
            $table->string('page')->nullable(); //صفحه‌ای که باگ در آن مشاهده شده
            $table->text('description'); //توضیحات باگ
            $table->enum('status', ['open', 'in_progress', 'resolved'])->default('open'); //وضعیت
            $table->timestamps();
        });
    }

    /**
    * حذف جدول
    **/
    public function down(): void
    {
        Schema::dropIfExists('bugs');
    }
};
