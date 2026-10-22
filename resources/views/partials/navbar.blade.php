<header class="bg-white border-b border-gray-200 sticky top-0 z-30">
    <div class="px-4 sm:px-6 lg:px-8 py-3.5 flex items-center justify-between">
        <!-- Brand & Page Title -->
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2 font-bold text-lg text-indigo-600">
                <svg class="w-7 h-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                </svg>
                <span class="tracking-tight">SIAKAD</span>
            </div>

            <div class="hidden md:block h-5 w-px bg-gray-200"></div>

            <div class="text-sm font-semibold text-gray-700">
                @yield('title', 'Dashboard Mahasiswa')
            </div>
        </div>

        <!-- User Information & Notification -->
        <div class="flex items-center gap-4">
            <!-- Status Badge -->
            <span class="hidden sm:inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Sistem Online
            </span>

            <!-- User Info -->
            <div class="flex items-center gap-3 pl-2 border-l border-gray-200">
                <div class="w-8 h-8 rounded-full bg-indigo-600 text-white flex items-center justify-center font-semibold text-xs shadow-sm">
                    {{ strtoupper(substr($adminName ?? 'Admin', 0, 2)) }}
                </div>
                <div class="hidden sm:block text-left">
                    <div class="text-xs font-semibold text-gray-800 leading-tight">
                        {{ $adminName ?? 'Administrator Sistem' }}
                    </div>
                    <div class="text-[11px] text-gray-500 leading-tight">
                        Super Admin
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
