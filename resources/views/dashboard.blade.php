@extends('layouts.main')

@section('title', 'Dashboard - Go-Blog')

@section('content')
<div class="space-y-12">
    <!-- Hero Section -->
    <section class="relative h-[400px] rounded-3xl overflow-hidden group">
        <img src="https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&q=80&w=2000" alt="Raja Ampat" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/20 to-transparent flex items-center p-12">
            <div class="max-w-md text-white space-y-4">
                <span class="inline-block px-3 py-1 bg-blue-600 rounded-full text-xs font-semibold tracking-wider uppercase">Featured Destination</span>
                <h2 class="text-5xl font-serif font-bold leading-tight">Raja Ampat</h2>
                <p class="text-lg text-slate-200">The last paradise on earth. Discover the hidden gems of West Papua.</p>
                <div class="pt-4 flex items-center space-x-4">
                    <img src="https://ui-avatars.com/api/?name=Julien+Thorne&background=fff&color=0f4c81" class="w-8 h-8 rounded-full border border-white" alt="Author">
                    <div class="text-sm">
                        <p class="font-semibold">Julien Thorne</p>
                        <p class="text-xs text-slate-300">April 27, 2024</p>
                    </div>
                </div>
                <a href="#" class="inline-flex items-center space-x-2 text-white font-semibold group/btn pt-2">
                    <span>Read Full Story</span>
                    <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover/btn:translate-x-1"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Latest Discoveries -->
    <section class="space-y-8">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-3xl font-serif font-bold text-slate-900">Latest Discoveries</h3>
                <p class="text-slate-500 mt-1">Curated stories from the world's most remote corners.</p>
            </div>
            <div class="flex bg-slate-100 p-1 rounded-xl">
                <button class="px-6 py-2 bg-white text-slate-900 rounded-lg shadow-sm font-medium text-sm">Recent</button>
                <button class="px-6 py-2 text-slate-500 hover:text-slate-900 transition-colors font-medium text-sm">Popular</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Article Card 1 -->
            <article class="bg-white rounded-3xl overflow-hidden card-shadow group">
                <div class="h-56 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1596701062351-8c2c14d1fdd0?auto=format&fit=crop&q=80&w=800" alt="Italy's Riviera" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-blue-900 uppercase tracking-wider">Coastal Italy</span>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <h4 class="text-xl font-serif font-bold text-slate-900 leading-snug group-hover:text-blue-700 transition-colors">Beyond the Pastel Façades of Italy's Riviera</h4>
                    <p class="text-sm text-slate-500 line-clamp-2">Exploring the hidden hiking trails that connect the five picturesque villages...</p>
                    <div class="flex items-center justify-between pt-2">
                        <div class="flex items-center space-x-2">
                            <img src="https://ui-avatars.com/api/?name=Paolo+Rossi" class="w-6 h-6 rounded-full" alt="Author">
                            <span class="text-xs font-medium text-slate-700">Paolo Rossi</span>
                        </div>
                        <span class="text-[10px] text-slate-400 font-semibold uppercase tracking-widest">12 Min Read</span>
                    </div>
                </div>
            </article>

            <!-- Article Card 2 -->
            <article class="bg-white rounded-3xl overflow-hidden card-shadow group">
                <div class="h-56 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&q=80&w=800" alt="Bali Secret" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-blue-900 uppercase tracking-wider">Southeast Asia</span>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <h4 class="text-xl font-serif font-bold text-slate-900 leading-snug group-hover:text-blue-700 transition-colors">Finding Solitude in the Land of Fire and Ice</h4>
                    <p class="text-sm text-slate-500 line-clamp-2">A two-week solo trek across the volcanic landscapes of Iceland's highlands...</p>
                    <div class="flex items-center justify-between pt-2">
                        <div class="flex items-center space-x-2">
                            <img src="https://ui-avatars.com/api/?name=Erik+S" class="w-6 h-6 rounded-full" alt="Author">
                            <span class="text-xs font-medium text-slate-700">Erik S.</span>
                        </div>
                        <span class="text-[10px] text-slate-400 font-semibold uppercase tracking-widest">15 Min Read</span>
                    </div>
                </div>
            </article>

            <!-- Article Card 3 -->
            <article class="bg-white rounded-3xl overflow-hidden card-shadow group">
                <div class="h-56 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1544911845-1f34a3eb46b1?auto=format&fit=crop&q=80&w=800" alt="Mount Bromo" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-blue-900 uppercase tracking-wider">Mount Bromo</span>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <h4 class="text-xl font-serif font-bold text-slate-900 leading-snug group-hover:text-blue-700 transition-colors">Capturing the Mist of the Far East</h4>
                    <p class="text-sm text-slate-500 line-clamp-2">Technical tips for landscape photography in the high-humidity peaks of Java...</p>
                    <div class="flex items-center justify-between pt-2">
                        <div class="flex items-center space-x-2">
                            <img src="https://ui-avatars.com/api/?name=Chen+Wei" class="w-6 h-6 rounded-full" alt="Author">
                            <span class="text-xs font-medium text-slate-700">Chen Wei</span>
                        </div>
                        <span class="text-[10px] text-slate-400 font-semibold uppercase tracking-widest">8 Min Read</span>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <!-- Newsletter & Featured Big Card -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
        <!-- Culture Section -->
        <div class="bg-white rounded-3xl overflow-hidden card-shadow flex group">
            <div class="w-1/2 overflow-hidden">
                <img src="https://images.unsplash.com/photo-1533050487297-09b450131914?auto=format&fit=crop&q=80&w=800" alt="Indonesian Culture" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            </div>
            <div class="w-1/2 p-8 flex flex-col justify-center space-y-4">
                <span class="text-[10px] font-bold text-blue-600 uppercase tracking-widest">Culture</span>
                <h4 class="text-2xl font-serif font-bold text-slate-900 leading-tight">38 Culture Budaya Lokal Indonesia</h4>
                <p class="text-sm text-slate-500">How a new generation of travelers is revitalizing the historic...</p>
                <div class="pt-2 flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <img src="https://ui-avatars.com/api/?name=Putri" class="w-6 h-6 rounded-full" alt="Author">
                        <span class="text-xs text-slate-400 italic">Posted 11 days ago</span>
                    </div>
                    <i data-lucide="bookmark" class="w-4 h-4 text-slate-300 cursor-pointer hover:text-blue-500 transition-colors"></i>
                </div>
            </div>
        </div>

        <!-- Newsletter Card -->
        <div class="bg-sidebar-bg rounded-3xl p-10 flex flex-col items-center justify-center text-center space-y-6 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute -top-12 -right-12 w-48 h-48 bg-white/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-12 -left-12 w-48 h-48 bg-blue-400/10 rounded-full blur-3xl"></div>
            
            <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-md border border-white/20">
                <i data-lucide="mail" class="w-8 h-8 text-blue-200"></i>
            </div>
            <div class="space-y-2">
                <h3 class="text-2xl font-serif font-bold">Join the Journal</h3>
                <p class="text-blue-100/70 text-sm max-w-xs">Weekly travel inspiration and editorial stories delivered to your inbox.</p>
            </div>
            <form class="w-full max-w-sm space-y-3">
                <input type="email" placeholder="Email address" class="w-full bg-white/10 border border-white/20 rounded-xl py-3 px-4 text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-blue-400/50 backdrop-blur-md">
                <button type="submit" class="w-full bg-white text-blue-900 py-3 rounded-xl font-bold hover:bg-blue-50 transition-colors shadow-lg">Subscribe</button>
            </form>
        </div>
    </section>
</div>
@endsection
