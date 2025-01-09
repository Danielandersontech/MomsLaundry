<?php

namespace App\Http\Controllers;

use App\Models\Pengguna; // Assuming this is the model for users
use App\Models\Order; // Assuming this is the model for transactions
use Illuminate\Http\Request;
use carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Fetch total members
        $totalMembers = Pengguna::count();

        // Fetch total transactions
        $totalTransactions = Order::count();

        // Fetch ongoing transactions
        $ongoingTransactions = Order::where('status', 'Pending')->get();

        // Fetch priority transactions (you can define what makes a transaction priority)
        $priorityTransactions = Order::where('status', 'Pending')->orderBy('tgl_order', 'asc')->take(5)->get();

        return view('admin_dashboard', compact('totalMembers', 'totalTransactions', 'ongoingTransactions', 'priorityTransactions'));
    }
}

