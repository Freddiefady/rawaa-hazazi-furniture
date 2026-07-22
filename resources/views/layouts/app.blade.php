<!DOCTYPE html>
<html lang="ar" dir="rtl" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $settings['site_name'] ?? 'روعة هزازي للموبيليات والديكور')</title>

    <meta name="description" content="روعة هزازي للموبيليات والديكور - تفصيل وتصميم أثاث داخلي ومجالس ومطابخ وغرف نوم بأعلى جودة في الرياض.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen text-slate-800 antialiased font-sans bg-slate-50/50">

    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 bg-slate-900/95 backdrop-blur-md border-b border-slate-800 text-white shadow-md" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-3">
                        <span class="text-3xl">🛋️</span>
                        <span class="text-xl font-extrabold tracking-tight bg-gradient-to-l from-gold via-amber-200 to-white bg-clip-text text-transparent">روعة هزازي</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <nav class="hidden md:flex items-center gap-8 text-sm font-bold">
                    <a href="{{ route('home') }}" class="transition-colors hover:text-gold {{ Route::is('home') ? 'text-gold' : 'text-slate-300' }}">الرئيسية</a>
                    <a href="{{ route('services') }}" class="transition-colors hover:text-gold {{ Route::is('services') ? 'text-gold' : 'text-slate-300' }}">خدماتنا</a>
                    <a href="{{ route('portfolio.index') }}" class="transition-colors hover:text-gold {{ Route::is('portfolio.*') ? 'text-gold' : 'text-slate-300' }}">معرض أعمالنا</a>
                    <a href="{{ route('visualizer') }}" class="transition-colors hover:text-gold {{ Route::is('visualizer') ? 'text-gold' : 'text-slate-300' }}">مبتكر الخامات</a>
                    <a href="{{ route('blog.index') }}" class="transition-colors hover:text-gold {{ Route::is('blog.*') ? 'text-gold' : 'text-slate-300' }}">المدونة</a>
                    <a href="{{ route('contact.index') }}" class="transition-colors hover:text-gold {{ Route::is('contact.index') ? 'text-gold' : 'text-slate-300' }}">اتصل بنا</a>

                    <!-- AI Assistant CTA -->
                    {{-- <a href="{{ route('ai-assistant.index') }}" class="inline-flex items-center gap-2 bg-gradient-to-l from-gold to-amber-600 text-slate-900 px-4 py-2 rounded-lg font-extrabold hover:opacity-90 transition-all shadow-sm">
                        <span>المهندس الذكي</span>
                        <span class="text-xs bg-slate-900 text-gold px-1.5 py-0.5 rounded-full">AI</span>
                    </a> --}}
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">فتح القائمة الرئيسية</span>
                        <svg class="h-6 w-6" x-show="!open" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="h-6 w-6" x-show="open" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Menu (Alpine.js) -->
        <div class="md:hidden bg-slate-950/95" x-show="open" @click.away="open = false" style="display: none;">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 text-right">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-bold {{ Route::is('home') ? 'bg-slate-900 text-gold' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}">الرئيسية</a>
                <a href="{{ route('services') }}" class="block px-3 py-2 rounded-md text-base font-bold {{ Route::is('services') ? 'bg-slate-900 text-gold' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}">خدماتنا</a>
                <a href="{{ route('portfolio.index') }}" class="block px-3 py-2 rounded-md text-base font-bold {{ Route::is('portfolio.*') ? 'bg-slate-900 text-gold' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}">معرض أعمالنا</a>
                <a href="{{ route('visualizer') }}" class="block px-3 py-2 rounded-md text-base font-bold {{ Route::is('visualizer') ? 'bg-slate-900 text-gold' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}">مبتكر الخامات</a>
                <a href="{{ route('blog.index') }}" class="block px-3 py-2 rounded-md text-base font-bold {{ Route::is('blog.*') ? 'bg-slate-900 text-gold' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}">المدونة</a>
                <a href="{{ route('contact.index') }}" class="block px-3 py-2 rounded-md text-base font-bold {{ Route::is('contact.index') ? 'bg-slate-900 text-gold' : 'text-slate-300 hover:bg-slate-900 hover:text-white' }}">اتصل بنا</a>
                {{-- <a href="{{ route('ai-assistant.index') }}" class="block px-3 py-2 rounded-md text-base font-bold text-center bg-gradient-to-l from-gold to-amber-600 text-slate-900">المهندس الذكي (AI)</a> --}}
            </div>
        </div>
    </header>

    <!-- Page Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 border-t border-slate-800 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12 text-right">

                <!-- About Column -->
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-3xl">🛋️</span>
                        <span class="text-xl font-bold text-white tracking-wide">روعة هزازي</span>
                    </div>
                    <p class="leading-relaxed text-sm text-slate-400 mb-6">
                        {{ $settings['about_brief'] ?? 'رواد في عالم التصميم الداخلي والموبيليات الفاخرة.' }}
                    </p>
                    <div class="flex gap-4">
                        <a href="{{ $settings['facebook_link'] ?? '#' }}" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-white hover:bg-gold hover:text-slate-900 transition-colors shadow-sm">Fb</a>
                        <a href="{{ $settings['instagram_link'] ?? '#' }}" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-white hover:bg-gold hover:text-slate-900 transition-colors shadow-sm">In</a>
                        <a href="{{ $settings['tiktok_link'] ?? '#' }}" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-white hover:bg-gold hover:text-slate-900 transition-colors shadow-sm">Tk</a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-white font-bold text-lg mb-6 border-r-2 border-gold pr-3">روابط سريعة</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-gold transition-colors">الرئيسية</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-gold transition-colors">خدماتنا</a></li>
                        <li><a href="{{ route('portfolio.index') }}" class="hover:text-gold transition-colors">معرض أعمالنا</a></li>
                        <li><a href="{{ route('visualizer') }}" class="hover:text-gold transition-colors">مبتكر الخامات (التفاعلي)</a></li>
                        {{-- <li><a href="{{ route('ai-assistant.index') }}" class="hover:text-gold transition-colors">المهندس الذكي (AI)</a></li> --}}
                    </ul>
                </div>

                <!-- Contact Details -->
                <div>
                    <h3 class="text-white font-bold text-lg mb-6 border-r-2 border-gold pr-3">معلومات التواصل</h3>
                    <ul class="space-y-4 text-sm text-slate-400">
                        <li class="flex items-start gap-3">
                            <span class="text-lg">📍</span>
                            <span>{{ $settings['contact_address'] ?? 'الرياض، المملكة العربية السعودية' }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="text-lg">📞</span>
                            <span class="dir-ltr text-right inline-block">{{ $settings['contact_phone'] ?? '+966 55 276 3729' }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="text-lg">✉️</span>
                            <span>{{ $settings['contact_email'] ?? 'info@rawathazzazi.com' }}</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Copyright -->
            <div class="border-t border-slate-800 pt-8 mt-8 text-center text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'روعة هزازي للموبيليات والديكور' }}. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>

</body>
</html>
