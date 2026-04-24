<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ─────────────────────────────────────────────────────────────────────
    // ROLE SELECTION
    // ─────────────────────────────────────────────────────────────────────

    /**
     * Halaman pilihan: Login sebagai Admin atau Pengunjung.
     */
    public function showRoleSelect()
    {
        return view('auth.role-select');
    }

    // ─────────────────────────────────────────────────────────────────────
    // ADMIN AUTH
    // ─────────────────────────────────────────────────────────────────────

    /**
     * Tampilkan halaman login admin.
     */
    public function showAdminLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login admin.
     */
    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role !== 'admin') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akun ini bukan akun admin.',
                ])->onlyInput('email');
            }

            return redirect()->route('admin.dashboard')
                             ->with('success', 'Selamat datang, ' . $user->name . '!');
        }

        return back()->withErrors([
            'email' => 'Email atau Security Key yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // ─────────────────────────────────────────────────────────────────────
    // VISITOR AUTH
    // ─────────────────────────────────────────────────────────────────────

    /**
     * Tampilkan halaman login pengunjung.
     */
    public function showVisitorLogin()
    {
        return view('auth.visitor-login');
    }

    /**
     * Proses login pengunjung.
     */
    public function loginVisitor(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Admin tidak boleh login lewat halaman visitor
            if ($user->role === 'admin') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Silakan login melalui halaman Admin.',
                ])->onlyInput('email');
            }

            return redirect()->route('home')
                             ->with('success', 'Selamat datang kembali, ' . $user->name . '!');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // ─────────────────────────────────────────────────────────────────────
    // REGISTER (Pengunjung)
    // ─────────────────────────────────────────────────────────────────────

    /**
     * Tampilkan halaman registrasi pengunjung.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Proses registrasi pengunjung baru.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'                  => ['required', 'string', 'max:80'],
            'email'                 => ['required', 'email', 'unique:users,email'],
            'password'              => ['required', 'min:8', 'confirmed'],
        ], [
            'name.required'         => 'Nama lengkap wajib diisi.',
            'email.required'        => 'Email wajib diisi.',
            'email.unique'          => 'Email ini sudah terdaftar.',
            'password.required'     => 'Password wajib diisi.',
            'password.min'          => 'Password minimal 8 karakter.',
            'password.confirmed'    => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'visitor',
        ]);

        Auth::login($user);

        return redirect()->route('home')
                         ->with('success', 'Selamat datang, ' . $user->name . '! Akun Anda berhasil dibuat.');
    }

    // ─────────────────────────────────────────────────────────────────────
    // LOGOUT
    // ─────────────────────────────────────────────────────────────────────

    /**
     * Logout semua role.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
