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
        Schema::create('bug_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bug_id')->constrained('bugs')->onDelete('cascade'); //باگ
            $table->string('admin_mobile'); //فرستنده پیام
            $table->text('message'); //متن پیام
            $table->timestamps();
        });
    }

    /**
    * حذف جدول
    **/
    public function down(): void
    {
        Schema::dropIfExists('bug_messages');
    }
};