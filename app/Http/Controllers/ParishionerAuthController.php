<?php
namespace App\Http\Controllers;

use App\Models\ParishionerAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ParishionerAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('authentication.userform');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => [
                'required',
                'string',
                'unique:parishioner_auths,username',
                'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*(),.?":{}|<>]).+$/'
            ],
            'email' => 'required|email|unique:parishioner_auths,email',
            'password' => 'required|min:6|same:confirmpassword',
            'confirmpassword' => 'required'
        ], [
            'username.regex' => 'Username must contain at least one uppercase letter and one symbol.',
            'password.same' => 'Password and Confirm Password must match.'
        ]);

        ParishionerAuth::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function showLoginForm()
    {
        return view('authentication.userform');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('parishioner')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('user.document_requests.main'));
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('parishioner')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
