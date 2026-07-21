@extends('layouts.app')

@section('content')
<div class="bg-slate-50/50 pb-24">

    <!-- Header -->
    <div class="bg-slate-900 text-white py-24 text-center px-4 relative overflow-hidden">
        <div class="absolute inset-0 z-0 opacity-20">
            <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&q=80&w=1500" alt="ورشة روعة هزازي" class="w-full h-full object-cover" />
        </div>
        <div class="relative z-10 max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-black mb-6">خدماتنا المتميزة</h1>
            <p class="text-lg md:text-xl text-slate-300 leading-relaxed">
                مجموعة متكاملة من الخدمات لتأسيس وتأثيث منزلك بأرقى الأذواق، بدءاً من الفكرة والتصميم وحتى التصنيع والتركيب الفعلي.
            </p>
        </div>
    </div>

    <!-- Core Services Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="p-10 border border-slate-100 rounded-3xl bg-white shadow-xl hover:-translate-y-2 transition-all duration-300 text-center flex flex-col items-center group">
                    <div class="w-20 h-20 bg-slate-50 text-slate-900 rounded-2xl flex items-center justify-center mb-8 text-4xl shadow-sm border border-slate-100 group-hover:bg-slate-900 group-hover:text-white transition-colors duration-300">
                        {{ $service->icon ?? '✦' }}
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4 group-hover:text-gold transition-colors duration-300">{{ $service->title }}</h3>
                    <p class="text-slate-600 leading-relaxed text-base">{{ $service->description }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Craftsmanship Promise -->
    <div class="max-w-4xl mx-auto px-4 mt-32 text-center">
        <span class="text-gold font-extrabold uppercase tracking-widest text-sm mb-2 block">عهد الجودة</span>
        <h2 class="text-3xl font-extrabold text-slate-900 mb-6">لماذا تفصّل أثاثك لدى روعة هزازي؟</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-right mt-12">
            
            <div class="bg-white p-8 rounded-2xl border border-slate-100 flex items-start gap-4">
                <span class="text-3xl">🪵</span>
                <div>
                    <h4 class="font-extrabold text-slate-950 text-lg mb-2">أخشاب معالجة ومكفولة</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">نستخدم فقط الأخشاب الصلبة المستوردة مثل الزان والبلوط والجوز، ونقوم بمعالجتها ضد الرطوبة وحشرات الخشب.</p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-slate-100 flex items-start gap-4">
                <span class="text-3xl">🪚</span>
                <div>
                    <h4 class="font-extrabold text-slate-950 text-lg mb-2">حرفيون بمهارة متوارثة</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">فريقنا يضم نجارين وحفارين مهرة يدمجون بين الأدوات الحديثة واللمسات اليدوية الأصيلة التي تعطي القطعة بصمتها الخاصة.</p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-slate-100 flex items-start gap-4">
                <span class="text-3xl">⚙️</span>
                <div>
                    <h4 class="font-extrabold text-slate-950 text-lg mb-2">إكسسوارات وهيدروليك أصلي</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">نلتزم بتركيب مفصلات وسكك أدراج هيدروليكية ذاتية الإغلاق من ماركات عالمية موثوقة لضمان فتح وإغلاق سلس لسنوات.</p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-slate-100 flex items-start gap-4">
                <span class="text-3xl">🤝</span>
                <div>
                    <h4 class="font-extrabold text-slate-950 text-lg mb-2">تسليم بالموعد المتفق عليه</h4>
                    <p class="text-slate-500 text-sm leading-relaxed">نقدر وقت عملائنا، ونلتزم بجدول زمني واضح للتصميم والتصنيع والتركيب الفعلي في منزلك.</p>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
