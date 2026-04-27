@extends('layouts.main')

@section('title', 'Elena Rodriguez - Reader Profile')

@section('content')
<div class="space-y-12">
    <!-- Profile Header -->
    <section class="flex flex-col md:flex-row items-center md:items-start space-y-8 md:space-y-0 md:space-x-12">
        <div class="relative">
            <div class="w-40 h-40 rounded-[2.5rem] overflow-hidden border-4 border-white shadow-2xl ring-1 ring-slate-200">
                <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80&w=400" alt="Elena Rodriguez" class="w-full h-full object-cover">
            </div>
            <button class="absolute bottom-2 right-2 p-2 bg-white rounded-full shadow-lg border border-slate-100 text-blue-600 hover:scale-110 transition-transform">
                <i data-lucide="edit-3" class="w-4 h-4"></i>
            </button>
        </div>

        <div class="flex-1 space-y-6 text-center md:text-left">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h2 class="text-4xl font-serif font-bold text-slate-900">Elena Rodriguez</h2>
                    <p class="text-slate-500 mt-2 max-w-lg">Curious explorer & slow travel advocate. Exploring the hidden corners of Southern Europe and the Andes.</p>
                </div>
                <div class="flex space-x-8 justify-center md:justify-start bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
                    <div class="text-center">
                        <p class="text-2xl font-serif font-bold text-slate-900">124</p>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Saved</p>
                    </div>
                    <div class="w-px h-10 bg-slate-100"></div>
                    <div class="text-center">
                        <p class="text-2xl font-serif font-bold text-slate-900">42</p>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Comments</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap justify-center md:justify-start gap-3">
                <span class="px-4 py-1.5 bg-blue-50 text-blue-700 rounded-full text-xs font-semibold border border-blue-100">Culture Seeker</span>
                <span class="px-4 py-1.5 bg-green-50 text-green-700 rounded-full text-xs font-semibold border border-green-100">Eco-Traveler</span>
                <span class="px-4 py-1.5 bg-orange-50 text-orange-700 rounded-full text-xs font-semibold border border-orange-100">Slow Living</span>
            </div>
        </div>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Main Profile Content -->
        <div class="lg:col-span-2 space-y-12">
            <!-- Saved Stories -->
            <section class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-2xl font-serif font-bold text-slate-900">Saved Stories</h3>
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-700">View All</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Saved Card 1 -->
                    <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 hover:border-blue-200 transition-colors group">
                        <div class="h-44 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1523906834658-6e24ef2386f9?auto=format&fit=crop&q=80&w=800" alt="Venice" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </div>
                        <div class="p-6 space-y-2">
                            <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">Europe</span>
                            <h4 class="font-serif font-bold text-slate-900 group-hover:text-blue-700 transition-colors">The Silence of the Sierras: A Solo Journey</h4>
                            <p class="text-xs text-slate-500 line-clamp-2">Finding peace in the high altitudes where the only sound is the wind...</p>
                        </div>
                    </div>
                    <!-- Saved Card 2 -->
                    <div class="bg-white rounded-3xl overflow-hidden border border-slate-100 hover:border-blue-200 transition-colors group">
                        <div class="h-44 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1548013146-72479768bbaa?auto=format&fit=crop&q=80&w=800" alt="Taj Mahal" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </div>
                        <div class="p-6 space-y-2">
                            <span class="text-[10px] font-bold text-orange-600 uppercase tracking-widest">Asia</span>
                            <h4 class="font-serif font-bold text-slate-900 group-hover:text-blue-700 transition-colors">Beyond the Temples: Bali's Secret Waterfalls</h4>
                            <p class="text-xs text-slate-500 line-clamp-2">Trekking deep into the jungle to find the hidden gems away from the crowds...</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- My Comments -->
            <section class="space-y-6">
                <h3 class="text-2xl font-serif font-bold text-slate-900">My Comments</h3>
                <div class="space-y-4">
                    <!-- Comment 1 -->
                    <div class="bg-white p-6 rounded-3xl border border-slate-100 space-y-4 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <h5 class="text-sm font-semibold text-slate-900">On Article: <span class="text-blue-600 italic">"Sustainable Luxury: The Alps' New Standard"</span></h5>
                            <span class="text-xs text-slate-400">June 12, 2024</span>
                        </div>
                        <p class="text-sm text-slate-600 leading-relaxed italic border-l-2 border-slate-100 pl-4">"I visited the Valser resort last month and their water conservation system is truly revolutionary. It's great to see more hotels taking this seriously."</p>
                        <div class="flex items-center space-x-6 text-xs font-bold text-slate-400">
                            <button class="flex items-center space-x-2 hover:text-red-500 transition-colors">
                                <i data-lucide="heart" class="w-3.5 h-3.5"></i>
                                <span>24 Likes</span>
                            </button>
                            <button class="flex items-center space-x-2 hover:text-blue-500 transition-colors">
                                <i data-lucide="message-square" class="w-3.5 h-3.5"></i>
                                <span>View Reply</span>
                            </button>
                        </div>
                    </div>
                    <!-- Comment 2 -->
                    <div class="bg-white p-6 rounded-3xl border border-slate-100 space-y-4 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start">
                            <h5 class="text-sm font-semibold text-slate-900">On Article: <span class="text-blue-600 italic">"Beyond the Temples: Bali's Secret Waterfalls"</span></h5>
                            <span class="text-xs text-slate-400">June 08, 2024</span>
                        </div>
                        <p class="text-sm text-slate-600 leading-relaxed italic border-l-2 border-slate-100 pl-4">"Great tips on the Munduk region. I found that arriving before 8 AM is crucial if you want the lighting shown in your photos!"</p>
                        <div class="flex items-center space-x-6 text-xs font-bold text-slate-400">
                            <button class="flex items-center space-x-2 hover:text-red-500 transition-colors">
                                <i data-lucide="heart" class="w-3.5 h-3.5"></i>
                                <span>12 Likes</span>
                            </button>
                            <button class="flex items-center space-x-2 hover:text-blue-500 transition-colors">
                                <i data-lucide="message-square" class="w-3.5 h-3.5"></i>
                                <span>View Reply</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Sidebar Activity -->
        <div class="space-y-8">
            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm space-y-8">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-blue-50 text-blue-600 rounded-xl">
                        <i data-lucide="clock" class="w-5 h-5"></i>
                    </div>
                    <h3 class="text-lg font-serif font-bold text-slate-900">Recently Read</h3>
                </div>

                <div class="space-y-6">
                    <!-- Recent Item 1 -->
                    <div class="flex items-center space-x-4 group cursor-pointer">
                        <div class="w-16 h-16 rounded-2xl overflow-hidden flex-shrink-0">
                            <img src="https://images.unsplash.com/photo-1516483638261-f4dbaf036963?auto=format&fit=crop&q=80&w=400" alt="Florence" class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-xs font-bold text-slate-900 line-clamp-2 leading-snug group-hover:text-blue-600 transition-colors">Florence After Dark: An Insider's Guide</h5>
                            <p class="text-[10px] text-slate-400 font-medium">Read 2 hours ago</p>
                        </div>
                    </div>
                    <!-- Recent Item 2 -->
                    <div class="flex items-center space-x-4 group cursor-pointer">
                        <div class="w-16 h-16 rounded-2xl overflow-hidden flex-shrink-0">
                            <img src="https://images.unsplash.com/photo-1533105079780-92b9be482077?auto=format&fit=crop&q=80&w=400" alt="Santorini" class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-xs font-bold text-slate-900 line-clamp-2 leading-snug group-hover:text-blue-600 transition-colors">The Best Time to Visit Santorini Without the Crowds</h5>
                            <p class="text-[10px] text-slate-400 font-medium">Read 1 day ago</p>
                        </div>
                    </div>
                    <!-- Recent Item 3 -->
                    <div class="flex items-center space-x-4 group cursor-pointer">
                        <div class="w-16 h-16 rounded-2xl overflow-hidden flex-shrink-0">
                            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?auto=format&fit=crop&q=80&w=400" alt="Alps" class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-1">
                            <h5 class="text-xs font-bold text-slate-900 line-clamp-2 leading-snug group-hover:text-blue-600 transition-colors">Sustainable Luxury: The Alps' New Standard</h5>
                            <p class="text-[10px] text-slate-400 font-medium">Read 3 days ago</p>
                        </div>
                    </div>
                </div>

                <button class="w-full py-3 bg-slate-50 text-slate-500 rounded-2xl text-xs font-bold hover:bg-slate-100 hover:text-slate-900 transition-all">Clear History</button>
            </div>

            <!-- Ad/Promotion placeholder -->
            <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-[2.5rem] p-8 text-white space-y-4 relative overflow-hidden shadow-xl">
                <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-white/10 rounded-full blur-2xl"></div>
                <h4 class="font-serif font-bold text-xl leading-tight">Plan your next adventure with Pro</h4>
                <p class="text-xs text-blue-100">Unlock exclusive travel guides and offline maps.</p>
                <button class="px-6 py-2 bg-white text-blue-700 rounded-xl text-xs font-bold shadow-lg">Learn More</button>
            </div>
        </div>
    </div>
</div>
@endsection
