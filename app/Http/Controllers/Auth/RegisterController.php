<?php  
  
namespace App\Http\Controllers\Auth;  
  
use App\Http\Controllers\Controller;  
use App\Models\Pengguna;  
use Illuminate\Foundation\Auth\RegistersUsers;  
use Illuminate\Support\Facades\Hash;  
use Illuminate\Support\Facades\Validator;  
use Illuminate\Http\Request;
  
class RegisterController extends Controller  
{  
    use RegistersUsers;  
  
    protected $redirectTo = '/admin/pengguna'; // Default redirect after registration  
  
    public function __construct()  
    {  
        $this->middleware('guest');  
    }  
  
    protected function validator(array $data)  
    {  
        return Validator::make($data, [  
            'nama' => ['required', 'string', 'max:100'],  
            'email' => ['required', 'string', 'email', 'max:255', 'unique:penggunas,email'],  
            'password' => ['required', 'string', 'min:8', 'confirmed'],  
            'no_hp' => ['required', 'numeric'],  
            'role' => ['required', 'in:pelanggan,pemilik_laundry'],  
            'alamat' => ['nullable', 'string'],  
        ]);  
    }  
  
    protected function create(array $data)  
    {  
        return Pengguna::create([  
            'nama' => $data['nama'],  
            'email' => $data['email'],  
            'password' => Hash::make($data['password']),  
            'no_hp' => $data['no_hp'],  
            'alamat' => $data['alamat'] ?? null,  
            'role' => $data['role'],  
        ]);  
    }  
  
    protected function registered(Request $request, $user)  
    {  
        // Redirect based on user role after registration  
        if ($user->role == 'pemilik_laundry') {  
            return redirect()->route('admin.dashboard'); // Redirect to admin dashboard  
        }  
  
        if ($user->role == 'pelanggan') {  
            return redirect()->route('pengguna.profil'); // Redirect to user dashboard  
        }  
  
        return redirect()->intended($this->redirectTo); // Default redirect  
    }  
}  
