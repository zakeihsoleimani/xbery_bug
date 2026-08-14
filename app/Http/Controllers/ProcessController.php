<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modles\Bug;
use Illuminate\Support\Facades\Validator;

class ProcessController extends Controller
{
    public function index()
    {
        $bugs = auth()->user()->bugs;
        return view('process.index', compact('bugs'));
    }

    public function show(Bug $bug)
    {
        return view('process.show', compact('bug'));
    }
}
