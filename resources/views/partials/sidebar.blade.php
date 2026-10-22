<aside class="w-64 bg-slate-900 text-slate-300 min-h-[calc(100vh-61px)] flex flex-col justify-between p-4 shrink-0 shadow-lg">
    <div class="space-y-6">
        <!-- Section: Menu Utama -->
        <div>
            <div class="px-3 mb-2 text-[11px] font-semibold tracking-wider text-slate-400 uppercase">
                Menu Utama
            </div>

            <nav class="space-y-1">
                <!-- Menu Dashboard -->
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150 {{ request()->routeIs('dashboard', 'home') ? 'bg-indigo-600 text-white shadow-sm' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                    @if (request()->routeIs('dashboard', 'home'))
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                    @endif
                </a>

                <!-- Menu Data Mahasiswa -->
                <a href="{{ route('mahasiswa.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150 {{ request()->routeIs('mahasiswa.*') ? 'bg-indigo-600 text-white shadow-sm' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span>Data Mahasiswa</span>
                    @if (request()->routeIs('mahasiswa.*'))
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                    @endif
                </a>

                <!-- Menu Laporan -->
                <a href="{{ route('laporan.index') }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150 {{ request()->routeIs('laporan.*') ? 'bg-indigo-600 text-white shadow-sm' : 'hover:bg-slate-800 hover:text-white' }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span>Laporan</span>
                    @if (request()->routeIs('laporan.*'))
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-white"></span>
                    @endif
                </a>
            </nav>
        </div>
    </div>

    <!-- Sidebar Footer / Info -->
    <div class="pt-4 border-t border-slate-800 text-xs text-slate-400">
        <div class="flex items-center justify-between">
            <span>Versi Aplikasi</span>
            <span class="px-2 py-0.5 rounded bg-slate-800 text-slate-300 font-mono">v1.0.0</span>
        </div>
    </div>
</aside>
