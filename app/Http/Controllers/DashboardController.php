<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Deal;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'clients_count' => Client::count(),
            'deals_count' => Deal::count(),
            'deals_by_status' => DB::table('deals')->select('status', DB::raw('COUNT(*) as count'))
                    ->groupBy('status')->pluck('count', 'status'),
        ];

        return view('dashboard.index', ['stats' => $stats]);
    }
}
