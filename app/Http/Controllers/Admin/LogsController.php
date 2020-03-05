<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class LogsController extends Controller
{
    public function show()
    {
        $logs = File::get(storage_path('/logs/blog2.log'));

        return view('admin.logs.show', compact('logs'));
    }
}
