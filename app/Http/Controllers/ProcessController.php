<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bug;
use Illuminate\Support\Facades\Validator;

class ProcessController extends Controller
{
    public function index()
    {
        $bugs = Bug::where('app_name', env('APP_NAME'))
            ->where('status', 'open')
            ->whereNull('admin_mobile')
            ->with(['reporter', 'admin'])
            ->withCount('messages')
            ->latest()
            ->paginate(10);
        return view('process.index', compact('bugs'));
    }

    public function show(Bug $bug)
    {
        return view('process.show', compact('bug'));
    }

    public function claim(Bug $bug)
    {
        if ($bug->admin_mobile !== null || $bug->status !== 'open') {
            return redirect()->route('process.index')->with('alert-error', 'این باگ قبلاً توسط کسی انتخاب شده است');
        }

        $currentUser = auth()->user();

        $bug->update([
            'status' => 'in_progress',
            'admin_mobile' => $currentUser->mobile,
        ]);

        // اضافه کردن پیام سیستم به چت
        $bug->messages()->create([
            'admin_mobile' => $currentUser->mobile,
            'message' => "🔔 این باگ توسط {$currentUser->name} برای بررسی انتخاب شد",
        ]);

        return redirect()->route('process.show', $bug->id)->with('alert-success', 'باگ با موفقیت به پروفایل شما اضافه شد');
    }
}
