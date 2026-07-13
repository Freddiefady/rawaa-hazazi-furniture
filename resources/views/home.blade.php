@extends('layouts.app')

@section('content')
<div class="flex flex-col">

    <!-- Hero Section -->
    <section class="relative h-[85vh] flex items-center justify-center bg-slate-950 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img
                src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&q=80&w=2000"
                alt="تصميم داخلي فخم"
                class="w-full h-full object-cover opacity-35 scale-105"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-4xl text-center px-4">
            <h1 class="text-4xl sm:text-6xl md:text-7xl font-black text-white mb-6 leading-tight drop-shadow-xl">
                نحول مساحاتك إلى <span class="bg-gradient-to-l from-gold to-amber-300 bg-clip-text text-transparent">تحف فنية</span>
            </h1>
            <p class="text-lg sm:text-xl md:text-2xl text-slate-300 mb-12 max-w-2xl mx-auto leading-relaxed drop-shadow-md">
                تصميم داخلي، تصنيع موبيليات فاخرة، وتشطيبات راقية بأعلى معايير الجودة والدقة في الرياض.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('contact.index') }}" class="bg-gradient-to-l from-gold to-amber-600 text-slate-900 px-8 py-4 rounded-xl font-extrabold text-lg hover:opacity-95 transition-opacity shadow-lg">
                    اطلب معاينة مجانية
                </a>
                <a href="{{ route('portfolio.index') }}" class="bg-transparent text-white border-2 border-slate-700 hover:border-gold px-8 py-4 rounded-xl font-extrabold text-lg hover:bg-white hover:text-slate-950 transition-all shadow-lg">
                    شاهد أعمالنا
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-24 px-4 bg-white relative">
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                <!-- Text -->
                <div class="text-right">
                    <span class="text-gold font-extrabold uppercase tracking-widest text-sm mb-2 block">من نحن</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-6 leading-tight">شغف النجارة وجودة التصميم</h2>
                    <p class="text-lg text-slate-600 leading-relaxed mb-8">
                        {{ $settings['about_brief'] ?? 'نحن رواد في عالم التصميم الداخلي والموبيليات في المملكة.' }}
                    </p>
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div class="border-r-4 border-gold pr-4">
                            <span class="block text-3xl font-black text-slate-900">١٥+</span>
                            <span class="text-sm text-slate-500 font-bold">عاماً من الخبرة</span>
                        </div>
                        <div class="border-r-4 border-gold pr-4">
                            <span class="block text-3xl font-black text-slate-900">٥٠٠+</span>
                            <span class="text-sm text-slate-500 font-bold">مشروع منفذ</span>
                        </div>
                    </div>
                    <a href="{{ route('services') }}" class="text-slate-900 font-black border-b-2 border-gold pb-1 hover:text-gold transition-colors text-base inline-block">تصفح جميع خدماتنا ←</a>
                </div>

                <!-- Graphic Image -->
                <div class="relative">
                    <div class="absolute -inset-2 bg-gradient-to-tr from-gold to-amber-600 rounded-3xl opacity-20 blur-xl"></div>
                    <div class="relative h-96 rounded-3xl overflow-hidden shadow-2xl border border-slate-100">
                        <img
                            src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&q=80&w=1000"
                            alt="حرفية تصنيع الأثاث في روعة هزازي"
                            class="w-full h-full object-cover"
                        />
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-24 px-4 bg-slate-50 border-t border-slate-100">
        <div class="max-w-7xl mx-auto text-center">
            <span class="text-gold font-extrabold uppercase tracking-widest text-sm mb-2 block">خبراتنا</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-16">ماذا نقدم في روعة هزازي؟</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($services as $srv)
                    <div class="bg-white p-10 rounded-2xl shadow-sm border border-slate-100 hover:shadow-xl transition-all duration-300 text-center flex flex-col items-center">
                        <div class="w-16 h-16 bg-slate-900 text-white rounded-2xl flex items-center justify-center mb-8 text-3xl shadow-md">
                            {{ $srv->icon ?? '📐' }}
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4">{{ $srv->title }}</h3>
                        <p class="text-slate-600 leading-relaxed text-sm">{{ $srv->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Visualizer Promo Banner -->
    <section class="py-16 bg-gradient-to-l from-slate-900 to-slate-950 text-white border-y border-slate-800">
        <div class="max-w-5xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-8 text-right">
            <div>
                <span class="bg-gold/20 text-gold px-3 py-1 rounded-full text-xs font-bold mb-3 inline-block">ميزة تفاعلية جديدة</span>
                <h3 class="text-2xl sm:text-3xl font-bold mb-3">هل تريد تجربة توليف الخامات بنفسك؟</h3>
                <p class="text-slate-400 text-base max-w-xl">استخدم أداة مبتكر الخامات التفاعلية لاختيار نوع الخشب والقماش المفضلين لديك وملاحظة فرق التكلفة والخصائص فوراً.</p>
            </div>
            <div>
                <a href="{{ route('visualizer') }}" class="inline-block bg-white text-slate-950 font-bold px-6 py-3.5 rounded-lg hover:bg-gold hover:text-slate-950 transition-colors shadow-lg">جرب مبتكر الخامات التفاعلي ←</a>
            </div>
        </div>
    </section>

    <!-- Latest Projects -->
    <section class="py-24 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col sm:flex-row justify-between items-end mb-16 text-right">
                <div>
                    <span class="text-gold font-extrabold uppercase tracking-widest text-sm mb-2 block">معرض الأعمال</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900">أحدث مشاريعنا المنفذة</h2>
                </div>
                <a href="{{ route('portfolio.index') }}" class="text-slate-900 font-bold hover:text-gold transition-colors mt-4 sm:mt-0">عرض جميع المشاريع ←</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestProjects as $project)
                    <a href="{{ route('portfolio.show', $project->id) }}" class="group bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300">
                        <div class="h-64 bg-slate-200 relative overflow-hidden">
                            @if($project->cover_image)
                                <img src="{{ $project->cover_image }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400">صورة المشروع</div>
                            @endif
                            <div class="absolute top-4 right-4 bg-slate-900/80 backdrop-blur-sm text-gold px-3.5 py-1 rounded-full text-xs font-bold">
                                {{ $project->category }}
                            </div>
                        </div>
                        <div class="p-6 text-right">
                            <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-gold transition-colors">{{ $project->title }}</h3>
                            <p class="text-slate-500 text-xs line-clamp-2 leading-relaxed">{{ Str::limit($project->description, 100) }}</p>
                            <span class="inline-block mt-4 text-slate-900 font-extrabold text-sm border-b border-slate-900 hover:text-gold transition-colors">تفاصيل المشروع ←</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 px-4 bg-gradient-to-t from-slate-950 to-slate-900 text-white text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl sm:text-5xl font-black mb-6">جاهز لتصميم مساحتك الخاصة؟</h2>
            <p class="text-lg sm:text-xl text-slate-400 mb-12 leading-relaxed">
                تواصل معنا اليوم للحصول على استشارة مجانية مع مهندسينا ومناقشة تفاصيل تصميم وتفصيل أثاث منزلك أو مكتبك.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('contact.index') }}" class="bg-gradient-to-l from-gold to-amber-600 text-slate-900 px-8 py-4 rounded-xl font-extrabold text-lg hover:opacity-95 transition-opacity shadow-lg">
                    تواصل معنا الآن
                </a>
                {{-- <a href="{{ route('ai-assistant.index') }}" class="bg-slate-800 text-slate-200 hover:text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-slate-700 transition-colors shadow-lg">
                    استعن بالمهندس الذكي (AI)
                </a> --}}
            </div>
        </div>
    </section>

</div>
@endsection
