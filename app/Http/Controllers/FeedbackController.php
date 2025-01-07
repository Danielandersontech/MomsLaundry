<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use App\Models\Order;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $data['feedbacks'] = Feedback::latest()->paginate(10);
        return view('feedback_index', $data);
    }

    public function create()  
    {  
        // Get the currently authenticated user    
        $currentUser = Auth::user();  
      
        // Get orders associated with the current user    
        $orders = Order::where('id_pengguna', $currentUser->id_pengguna)->get(); // Adjust the field name as necessary  
      
        // Get feedback history for the current user  
        $feedbacks = Feedback::where('id_pengguna', $currentUser->id_pengguna)->get();  
      
        return view('pengguna.feedback.create', [  
            'currentUser' => $currentUser,  
            'orders' => $orders,  
            'feedbacks' => $feedbacks, // Pass feedbacks to the view  
        ]);  
    }  
    

    public function store(Request $request)
    {
        $request->validate([
            'id_pengguna' => 'required|exists:penggunas,id_pengguna',
            'id_order' => 'required|exists:orders,id_order',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:255',
        ]);

        Feedback::create([
            'id_pengguna' => $request->id_pengguna,
            'id_order' => $request->id_order,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        // Redirect to the feedback creation page or another appropriate route  
        return redirect()->route('pengguna.feedback.create')->with('success', 'Feedback berhasil dikirim.');
    }


    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return back()->with('success', 'Feedback berhasil dihapus.');
    }
}
