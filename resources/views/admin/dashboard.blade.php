@extends('layouts.admin')

@section('title', 'Dashboard - Go-Blog Admin')

@section('content')
<div class="space-y-6">

    {{-- Page Header --}}
    <div class="flex items-start justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Welcome To Go-Blog</h1>
            <p class="text-sm text-slate-500 mt-1 flex items-center gap-1.5">
                <i data-lucide="trending-up" class="w-3.5 h-3.5 text-green-500"></i>
                Your blog's performance is up 12% this week.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <button class="flex items-center gap-2 px-3 py-2 bg-white border border-slate-200 rounded-lg text-xs font-medium text-slate-600 hover:bg-slate-50 transition-colors">
                <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                Last 30 Days
            </button>
            <button class="flex items-center gap-2 px-3 py-2 bg-slate-800 rounded-lg text-xs font-medium text-white hover:bg-slate-700 transition-colors">
                <i data-lucide="download" class="w-3.5 h-3.5"></i>
                Export Report
            </button>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-5">

        {{-- Left Column: Stats + Chart + Recent Posts --}}
        <div class="col-span-2 space-y-5">

            {{-- Stats Row --}}
            <div class="grid grid-cols-3 gap-4">
                {{-- Total Visitors --}}
                <div class="stat-card bg-white rounded-xl p-4 border border-slate-100">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <i data-lucide="users" class="w-4 h-4 text-blue-600"></i>
                        </div>
                        <span class="text-[11px] font-semibold text-emerald-500 bg-emerald-50 px-2 py-0.5 rounded-full">+12.5%</span>
                    </div>
                    <p class="text-2xl font-bold text-slate-800">124,592</p>
                    <p class="text-xs text-slate-500 mt-1">Total Visitors</p>
                </div>

                {{-- Avg Engagement --}}
                <div class="stat-card bg-white rounded-xl p-4 border border-slate-100">
                    <div class="flex items-start justify-between mb-3">
                        <div class="p-2 bg-slate-100 rounded-lg">
                            <i data-lucide="clock" class="w-4 h-4 text-slate-600"></i>
                        </div>
                        <span class="text-[11px] font-semibold text-rose-500 bg-rose-50 px-2 py-0.5 rounded-full">-2.4%</span>
                    </div>
                    <p class="text-2xl font-bold text-slate-800">4m 32s</p>
                    <p class="text-xs text-slate-500 mt-1">Avg. Engagement</p>
                </div>

                {{-- Top Performance Post --}}
                <div class="stat-card bg-slate-800 rounded-xl p-4 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-slate-700 to-slate-900"></div>
                    <div class="relative z-10">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-emerald-400 bg-emerald-400/10 px-2 py-0.5 rounded-full">Top Performance</span>
                        <p class="text-sm font-semibold text-white mt-2 leading-snug line-clamp-2">Finding Silence in the Swiss Alps</p>
                        <p class="text-[10px] text-slate-400 mt-1">24.5k views this month</p>
                        <button class="absolute bottom-4 right-4 p-1 bg-white/10 rounded-lg hover:bg-white/20 transition-colors">
                            <i data-lucide="external-link" class="w-3 h-3 text-white"></i>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Traffic Overview Chart --}}
            <div class="bg-white rounded-xl p-5 border border-slate-100">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="font-semibold text-slate-800 text-sm">Traffic Overview</h2>
                        <p class="text-xs text-slate-400 mt-0.5">Audience reach over the last 12 months</p>
                    </div>
                    <div class="flex items-center gap-4 text-xs text-slate-500">
                        <span class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-blue-500 inline-block"></span> This Year
                        </span>
                        <span class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-slate-200 inline-block"></span> Last Year
                        </span>
                    </div>
                </div>

                {{-- Chart Area --}}
                <div class="relative h-36">
                    <svg viewBox="0 0 600 120" class="w-full h-full" preserveAspectRatio="none">
                        <!-- Last Year line (grey) -->
                        <polyline points="0,90 75,80 150,85 225,75 300,80 375,70 450,75 600,65"
                                  fill="none" stroke="#e2e8f0" stroke-width="2" stroke-linecap="round"/>
                        <!-- This Year area -->
                        <defs>
                            <linearGradient id="blueGrad" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#3b82f6" stop-opacity="0.2"/>
                                <stop offset="100%" stop-color="#3b82f6" stop-opacity="0"/>
                            </linearGradient>
                        </defs>
                        <polygon points="0,120 0,70 75,55 150,60 225,45 300,50 375,35 450,40 600,20 600,120"
                                 fill="url(#blueGrad)"/>
                        <polyline points="0,70 75,55 150,60 225,45 300,50 375,35 450,40 600,20"
                                  fill="none" stroke="#3b82f6" stroke-width="2.5" stroke-linecap="round"/>
                    </svg>
                    {{-- X-axis labels --}}
                    <div class="absolute bottom-0 left-0 right-0 flex justify-between px-1">
                        @foreach(['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG'] as $m)
                        <span class="text-[9px] text-slate-400 font-medium">{{ $m }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Recent Posts --}}
            <div class="bg-white rounded-xl border border-slate-100">
                <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                    <div>
                        <h2 class="font-semibold text-slate-800 text-sm">Recent Posts</h2>
                        <p class="text-xs text-slate-400 mt-0.5">Manage your latest content updates</p>
                    </div>
                    <a href="{{ route('admin.posts.index') }}" class="text-xs font-semibold text-blue-600 hover:underline">View All Posts</a>
                </div>
                <div class="px-5">
                    <table class="w-full text-xs">
                        <thead>
                            <tr class="border-b border-slate-100">
                                <th class="text-left py-3 font-semibold text-slate-400 uppercase tracking-wider">Title</th>
                                <th class="text-left py-3 font-semibold text-slate-400 uppercase tracking-wider">Category</th>
                                <th class="text-left py-3 font-semibold text-slate-400 uppercase tracking-wider">Date</th>
                                <th class="text-left py-3 font-semibold text-slate-400 uppercase tracking-wider">Status</th>
                                <th class="text-left py-3 font-semibold text-slate-400 uppercase tracking-wider">Engagement</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @php
                            $recentPosts = [
                                ['title' => 'The Hidden Architecture of Tokyo', 'cat' => 'Culture', 'cat_color' => 'purple', 'date' => 'Oct 12, 2023', 'status' => 'Published', 'views' => '12.4k', 'img' => 'TA'],
                                ['title' => 'Mist and Pines: A Nordic Journey', 'cat' => 'Adventure', 'cat_color' => 'green', 'date' => 'Oct 10, 2023', 'status' => 'Published', 'views' => '8.2k', 'img' => 'MP'],
                                ['title' => 'Top 10 Cafes in Lisbon', 'cat' => 'Lifestyle', 'cat_color' => 'orange', 'date' => 'Oct 08, 2023', 'status' => 'Draft', 'views' => '-', 'img' => 'CL'],
                            ];
                            @endphp
                            @foreach($recentPosts as $post)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="py-3">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-lg bg-slate-200 flex items-center justify-center text-[9px] font-bold text-slate-500 flex-shrink-0">{{ $post['img'] }}</div>
                                        <span class="font-medium text-slate-700 text-xs">{{ $post['title'] }}</span>
                                    </div>
                                </td>
                                <td class="py-3">
                                    @php
                                    $colors = ['purple'=>'bg-purple-100 text-purple-700','green'=>'bg-green-100 text-green-700','orange'=>'bg-orange-100 text-orange-700'];
                                    @endphp
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wide {{ $colors[$post['cat_color']] }}">
                                        {{ $post['cat'] }}
                                    </span>
                                </td>
                                <td class="py-3 text-slate-500">{{ $post['date'] }}</td>
                                <td class="py-3">
                                    @if($post['status'] === 'Published')
                                        <span class="flex items-center gap-1 text-slate-600">
                                            <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full"></span> Published
                                        </span>
                                    @else
                                        <span class="flex items-center gap-1 text-slate-400">
                                            <span class="w-1.5 h-1.5 bg-slate-400 rounded-full"></span> Draft
                                        </span>
                                    @endif
                                </td>
                                <td class="py-3 text-slate-500">
                                    <span class="flex items-center gap-1">
                                        <i data-lucide="eye" class="w-3 h-3"></i> {{ $post['views'] }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Right Column: Quick Draft --}}
        <div class="col-span-1">
            <div class="bg-[#1a56db] rounded-xl p-5 text-white sticky top-0">
                <div class="flex items-center gap-2 mb-4">
                    <i data-lucide="zap" class="w-4 h-4 text-blue-200"></i>
                    <h2 class="font-semibold text-sm">Quick Draft</h2>
                </div>
                <div class="space-y-3">
                    <div>
                        <input type="text" placeholder="Entry Title"
                               class="w-full bg-white/15 border border-white/20 rounded-lg px-3 py-2.5 text-sm text-white placeholder:text-blue-200 focus:outline-none focus:ring-2 focus:ring-white/30 focus:bg-white/20 transition-all">
                    </div>
                    <div>
                        <textarea placeholder="What's on your mind? Capture the adventure..." rows="5"
                                  class="w-full bg-white/15 border border-white/20 rounded-lg px-3 py-2.5 text-sm text-white placeholder:text-blue-200 focus:outline-none focus:ring-2 focus:ring-white/30 focus:bg-white/20 transition-all resize-none"></textarea>
                    </div>
                    <button class="w-full py-2.5 bg-white/20 hover:bg-white/30 border border-white/20 rounded-lg text-sm font-semibold text-white transition-all flex items-center justify-center gap-2">
                        <i data-lucide="save" class="w-3.5 h-3.5"></i>
                        Save Draft
                    </button>
                </div>

                {{-- Mini stats --}}
                <div class="mt-6 pt-5 border-t border-white/15 space-y-3">
                    <h3 class="text-xs font-semibold text-blue-200 uppercase tracking-widest">Quick Stats</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-blue-200">Published Posts</span>
                        <span class="text-sm font-bold text-white">{{ \App\Models\Post::where('status','published')->count() }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-blue-200">Draft Posts</span>
                        <span class="text-sm font-bold text-white">{{ \App\Models\Post::where('status','draft')->count() }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-blue-200">Total Posts</span>
                        <span class="text-sm font-bold text-white">{{ \App\Models\Post::count() }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
