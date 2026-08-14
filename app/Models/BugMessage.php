<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BugMessage extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table = "bug_messages";
    protected $guarded = [];

    public function bug()
    {
        return $this->belongsTo(Bug::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_mobile', 'mobile');
    }
}
