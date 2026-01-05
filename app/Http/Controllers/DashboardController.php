<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DiagnosticTest;
use App\Models\Blog;
use App\Models\ContactMessage;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard', [
            'barang'        => Barang::count(),
            'services'      => DiagnosticTest::count(),
            'blogs'         => Blog::count(),
            'contacts'      => ContactMessage::count(),
            'newContacts'   => ContactMessage::where('status', 'new')
                                ->latest()
                                ->limit(5)
                                ->get(),
        ]);
    }
}
