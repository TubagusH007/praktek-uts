@extends('layouts.admin')

@section('title', 'Profile Admin - Go-Blog')

@section('content')
<div class="space-y-6">

    {{-- Page Header --}}
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Profile Admin</h1>
        <p class="text-sm text-slate-500 mt-1">Kelola informasi akun dan preferensi Anda</p>
    </div>

    <div class="grid grid-cols-3 gap-6">

        {{-- Left: Profile Card --}}
        <div class="col-span-1 space-y-5">

            {{-- Avatar Card --}}
            <div class="bg-white rounded-xl border border-slate-100 p-6 text-center">
                <div class="relative inline-block mb-4">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name ?? 'Admin') }}&background=1a3a6b&color=fff&size=128"
                         alt="{{ auth()->user()->name ?? 'Admin' }}"
                         class="w-24 h-24 rounded-2xl ring-4 ring-slate-100 mx-auto">
                    <button class="absolute -bottom-2 -right-2 w-7 h-7 bg-blue-600 rounded-full flex items-center justify-center shadow-lg hover:bg-blue-700 transition-colors">
                        <i data-lucide="camera" class="w-3.5 h-3.5 text-white"></i>
                    </button>
                </div>
                <h2 class="text-lg font-bold text-slate-800">{{ auth()->user()->name ?? 'Admin User' }}</h2>
                <p class="text-xs text-slate-500 mt-0.5">{{ auth()->user()->email ?? 'admin@goblog.com' }}</p>
                <span class="inline-block mt-2 px-3 py-1 bg-blue-50 text-blue-700 text-[11px] font-semibold rounded-full border border-blue-100">
                    {{ ucfirst(auth()->user()->role ?? 'admin') }}
                </span>

                <div class="mt-5 pt-5 border-t border-slate-100 grid grid-cols-3 gap-2 text-center">
                    <div>
                        <p class="text-lg font-bold text-slate-800">{{ \App\Models\Post::count() }}</p>
                        <p class="text-[10px] text-slate-400 uppercase font-semibold tracking-wide">Posts</p>
                    </div>
                    <div class="border-x border-slate-100">
                        <p class="text-lg font-bold text-slate-800">148</p>
                        <p class="text-[10px] text-slate-400 uppercase font-semibold tracking-wide">Published</p>
                    </div>
                    <div>
                        <p class="text-lg font-bold text-slate-800">12</p>
                        <p class="text-[10px] text-slate-400 uppercase font-semibold tracking-wide">Drafts</p>
                    </div>
                </div>
            </div>

            {{-- Account Info Card --}}
            <div class="bg-white rounded-xl border border-slate-100 p-5 space-y-4">
                <h3 class="text-sm font-semibold text-slate-700">Informasi Akun</h3>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 text-xs">
                        <div class="w-7 h-7 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="user" class="w-3.5 h-3.5 text-slate-500"></i>
                        </div>
                        <div>
                            <p class="text-slate-400">Nama Lengkap</p>
                            <p class="font-semibold text-slate-700">{{ auth()->user()->name ?? 'Admin User' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 text-xs">
                        <div class="w-7 h-7 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="mail" class="w-3.5 h-3.5 text-slate-500"></i>
                        </div>
                        <div>
                            <p class="text-slate-400">Email</p>
                            <p class="font-semibold text-slate-700">{{ auth()->user()->email ?? 'admin@goblog.com' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 text-xs">
                        <div class="w-7 h-7 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="shield" class="w-3.5 h-3.5 text-slate-500"></i>
                        </div>
                        <div>
                            <p class="text-slate-400">Role</p>
                            <p class="font-semibold text-slate-700">Administrator</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 text-xs">
                        <div class="w-7 h-7 bg-slate-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="calendar" class="w-3.5 h-3.5 text-slate-500"></i>
                        </div>
                        <div>
                            <p class="text-slate-400">Bergabung</p>
                            <p class="font-semibold text-slate-700">{{ auth()->user()->created_at ? auth()->user()->created_at->format('d M Y') : 'April 2026' }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Right: Edit Forms --}}
        <div class="col-span-2 space-y-5">

            {{-- Edit Profile Form --}}
            <div class="bg-white rounded-xl border border-slate-100">
                <div class="px-6 py-4 border-b border-slate-100">
                    <h3 class="font-semibold text-slate-800 text-sm">Edit Profil</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Perbarui informasi profil dan email Anda</p>
                </div>
                <form class="p-6 space-y-4">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Nama Lengkap</label>
                            <input type="text" value="{{ auth()->user()->name ?? '' }}"
                                   class="w-full border border-slate-200 rounded-lg px-3 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-400 transition-all"
                                   placeholder="Nama lengkap Anda">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Username</label>
                            <input type="text" value="{{ auth()->user()->name ? strtolower(str_replace(' ', '_', auth()->user()->name)) : '' }}"
                                   class="w-full border border-slate-200 rounded-lg px-3 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-400 transition-all"
                                   placeholder="Username">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Email</label>
                        <input type="email" value="{{ auth()->user()->email ?? '' }}"
                               class="w-full border border-slate-200 rounded-lg px-3 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-400 transition-all"
                               placeholder="Email Anda">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Bio</label>
                        <textarea rows="3"
                                  class="w-full border border-slate-200 rounded-lg px-3 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-400 transition-all resize-none"
                                  placeholder="Tulis sedikit tentang Anda...">Chief Editor at Go-Blog. Passionate about travel writing and editorial content.</textarea>
                    </div>
                    <div class="flex justify-end pt-2">
                        <button type="submit" class="px-5 py-2.5 bg-[#1a3a6b] text-white rounded-lg text-sm font-semibold hover:bg-[#1a56db] transition-colors">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            {{-- Change Password Form --}}
            <div class="bg-white rounded-xl border border-slate-100">
                <div class="px-6 py-4 border-b border-slate-100">
                    <h3 class="font-semibold text-slate-800 text-sm">Ubah Password</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Pastikan menggunakan password yang kuat</p>
                </div>
                <form class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 mb-1.5">Password Saat Ini</label>
                        <div class="relative">
                            <input type="password" id="current_password"
                                   class="w-full border border-slate-200 rounded-lg px-3 py-2.5 pr-10 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-400 transition-all"
                                   placeholder="••••••••">
                            <button type="button" onclick="togglePwd('current_password')"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                <i data-lucide="eye" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Password Baru</label>
                            <div class="relative">
                                <input type="password" id="new_password"
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2.5 pr-10 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-400 transition-all"
                                       placeholder="••••••••">
                                <button type="button" onclick="togglePwd('new_password')"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Konfirmasi Password</label>
                            <div class="relative">
                                <input type="password" id="confirm_password"
                                       class="w-full border border-slate-200 rounded-lg px-3 py-2.5 pr-10 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-400 transition-all"
                                       placeholder="••••••••">
                                <button type="button" onclick="togglePwd('confirm_password')"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                    <i data-lucide="eye" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end pt-2">
                        <button type="submit" class="px-5 py-2.5 bg-[#1a3a6b] text-white rounded-lg text-sm font-semibold hover:bg-[#1a56db] transition-colors">
                            Perbarui Password
                        </button>
                    </div>
                </form>
            </div>

            {{-- Recent Activity --}}
            <div class="bg-white rounded-xl border border-slate-100">
                <div class="px-6 py-4 border-b border-slate-100">
                    <h3 class="font-semibold text-slate-800 text-sm">Aktivitas Terakhir</h3>
                </div>
                <div class="p-6 space-y-4">
                    @php
                    $activities = [
                        ['icon' => 'file-plus', 'color' => 'blue', 'text' => 'Membuat post baru: "The Hidden Architecture of Tokyo"', 'time' => '2 jam lalu'],
                        ['icon' => 'edit', 'color' => 'amber', 'text' => 'Mengedit post: "Mist and Pines: A Nordic Journey"', 'time' => '5 jam lalu'],
                        ['icon' => 'trash-2', 'color' => 'red', 'text' => 'Menghapus komentar spam dari pengunjung', 'time' => '1 hari lalu'],
                        ['icon' => 'check-circle', 'color' => 'green', 'text' => 'Menyetujui 5 komentar baru', 'time' => '1 hari lalu'],
                    ];
                    $iconColors = ['blue'=>'bg-blue-50 text-blue-600','amber'=>'bg-amber-50 text-amber-600','red'=>'bg-red-50 text-red-600','green'=>'bg-green-50 text-green-600'];
                    @endphp
                    @foreach($activities as $act)
                    <div class="flex items-start gap-3">
                        <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0 {{ $iconColors[$act['color']] }}">
                            <i data-lucide="{{ $act['icon'] }}" class="w-3.5 h-3.5"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs text-slate-700">{{ $act['text'] }}</p>
                            <p class="text-[10px] text-slate-400 mt-0.5">{{ $act['time'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

@push('scripts')
<script>
function togglePwd(id) {
    const input = document.getElementById(id);
    input.type = input.type === 'password' ? 'text' : 'password';
}
</script>
@endpush
@endsection
