<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Admin;
use App\Models\App;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;



class ProfileController extends Controller
{
    /**
    * پیشخان
     */
    public function index()
    {
        return view('index');
    }

    /**
    * باگ‌ها
     */
    public function bug()
    {
        $bugs = Bug::where('app_name', env('APP_NAME'))->where('reporter_mobile', auth()->user()->mobile)->with(['reporter', 'admin'])->withCount('messages')->latest()->paginate(10);
        return view('bug.index', compact('bugs'));
    }

    /**
    * ایجاد باگ
     */
    public function bugCreate(Request $request)
    {
        $pages = Bug::PAGES;
        return view('bug.create', compact('pages', 'request'));
    }

    /**
    * ذخیره باگ
     */
    public function bugStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page' => 'nullable|in:' . implode(',', array_keys(Bug::PAGES)),
            'description' => 'required|string|max:5000',
        ]);
        if ($validator->fails()) {
            return redirect()->route('bug.create')->withErrors($validator)->withInput();
        }
        $data = $validator->validated();

        $bug = Bug::create([
            'app_name' => env('APP_NAME'),
            'reporter_mobile' => auth()->user()->mobile,
            'page' => $data['page'] ?? null,
            'description' => $data['description'],
            'status' => 'open',
        ]);

        return redirect()->route('bug.show', $bug->id)->with('alert-success', 'باگ با موفقیت ثبت شد');
    }

    /**
    * نمایش باگ
     */
    public function bugShow(Bug $bug)
    {
        $pages = Bug::PAGES;
        $statuses = Bug::STATUSES;
        return view('bug.show', compact('bug', 'pages', 'statuses'));
    }

    /**
    * ذخیره پیام باگ
     */
    public function bugStoreMessage(Request $request, Bug $bug)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:2000',
        ]);
        if ($validator->fails()) {
            return redirect()->route('bug.show', $bug->id)->withErrors($validator)->withInput();
        }

        $bug->messages()->create([
            'admin_mobile' => auth()->user()->mobile,
            'message' => $validator->validated()['message'],
        ]);

        return redirect()->route('bug.show', $bug->id);
    }

    /**
     * sso
     */
    public function login(Request $request)
    {
        if(isset($request->sso)){
            $token = Token::where('token', $request->sso)->first();
            if (!$token) {
                return view('login');
            }elseif ($token->used_at) {
                return view('login');
            }elseif ($token->revoked_at) {
                return view('login');
            }elseif ($token->expires_at->isPast()) {
                return view('login');
            }elseif ($token->app_id != $token->permission->app->id) {
                return view('login');
            }elseif ($token->app->name != env('APP_NAME')) {
                return view('login');
            }elseif ($token->admin_id != $token->permission->admin->id) {
                return view('login');
            }else {
                $admin = $token->permission->admin;
                Auth::login($admin);
                $token->update([
                    'used_at' => now(),
                ]);
                return redirect(url('/'));
            }
        }else{
            if(auth()->check()) {
                return redirect(url('/'));
            }
            return view('login');
        }
    }

    /**
     * خروج کاربر از سامانه
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return new RedirectResponse(env('SYSTEM_URL', 'htpp://127.0.0.1:8001') . '/workspace');
    }
}
