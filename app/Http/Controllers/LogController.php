<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function viewMaterialLogs()
    {
        $path = storage_path('logs/material.log');
        if (File::exists($path)) {
            $logs = File::get($path);
            return response()->view('logs.material', compact('logs'));
        }
        return response()->view('logs.material', ['logs' => 'No logs available']);
    }
}
