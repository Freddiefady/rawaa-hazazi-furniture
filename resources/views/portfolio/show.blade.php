@extends('layouts.app')

@section('content')
<div class="bg-slate-50/50 pb-24 text-right">
    
    <!-- Hero Header -->
    <div class="h-[55vh] bg-slate-950 relative overflow-hidden flex items-end">
        <div class="absolute inset-0 z-0">
            @if($project->cover_image)
                <img src="{{ $project->cover_image }}" alt="{{ $project->title }}" class="w-full h-full object-cover opacity-45" />
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 to-transparent"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pb-16">
            <div class="flex flex-col items-start gap-4">
                @if($project->category)
                    <span class="bg-gold text-slate-900 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-wider">
                        {{ $project->category->name }}
                    </span>
                @endif
                <h1 class="text-3xl sm:text-5xl font-black text-white drop-shadow-lg leading-tight">{{ $project->title }}</h1>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <!-- Back Link -->
        <a href="{{ route('portfolio.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-900 mb-12 font-bold transition-colors">
            <span>→ العودة إلى معرض الأعمال</span>
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
            
            <!-- Description -->
            <div class="lg:col-span-2 text-lg text-slate-700 leading-relaxed whitespace-pre-line">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-8 border-r-4 border-gold pr-4">تفاصيل المشروع</h2>
                {!! nl2br(e($project->description)) !!}
            </div>

            <!-- Details Sidebar -->
            <div>
                <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-xl">
                    <h3 class="text-xl font-bold text-slate-900 mb-6 border-b border-slate-100 pb-4">مواصفات القطع</h3>
                    
                    <ul class="space-y-6">
                        @if($project->category)
                            <li class="flex flex-col">
                                <span class="text-xs text-slate-400 font-bold mb-1">القسم</span>
                                <span class="text-base font-extrabold text-slate-900">{{ $project->category->name }}</span>
                            </li>
                        @endif
                        @if($project->materials)
                            <li class="flex flex-col">
                                <span class="text-xs text-slate-400 font-bold mb-1">الخامات المستخدمة</span>
                                <span class="text-base font-extrabold text-slate-900">{{ $project->materials }}</span>
                            </li>
                        @endif
                        @if($project->area)
                            <li class="flex flex-col">
                                <span class="text-xs text-slate-400 font-bold mb-1">المساحة المقدرة</span>
                                <span class="text-base font-extrabold text-slate-900">{{ $project->area }}</span>
                            </li>
                        @endif
                    </ul>

                    <div class="mt-10">
                        <a 
                            href="{{ route('contact.index', ['service' => 'تصنيع موبيليات', 'project' => $project->title]) }}" 
                            class="block w-full text-center bg-gradient-to-l from-gold to-amber-600 text-slate-900 font-extrabold py-4 rounded-xl shadow-md hover:opacity-95 transition-opacity"
                        >
                            اطلب تفصيل مماثل
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Additional Images Grid -->
        @if($project->images && $project->images->count() > 0)
            <div class="mt-24 border-t border-slate-200/60 pt-20">
                <h3 class="text-3xl font-extrabold text-slate-900 mb-12 text-center">لقطات وتفاصيل إضافية</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($project->images as $img)
                        <div class="h-80 bg-slate-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-slate-100">
                            <img src="{{ $img->image_url }}" alt="تفاصيل أثاث روعة هزازي" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

</div>
@endsection
