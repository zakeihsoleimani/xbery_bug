<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bug extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "bugs";
    protected $guarded = [];

    const PAGES = [
        'index' => 'تالار باگ‌ها (پیشخان)',
        'bugShow' => 'پردازش باگ',
    ];

    const STATUSES = [
        'open' => 'باز',
        'in_progress' => 'در حال بررسی',
        'resolved' => 'حل‌شده',
    ];

    public function reporter()
    {
        return $this->belongsTo(Admin::class, 'reporter_mobile', 'mobile');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_mobile', 'mobile');
    }

    public function messages()
    {
        return $this->hasMany(BugMessage::class);
    }
}
