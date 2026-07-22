@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-right">
    
    <!-- Title -->
    <div class="text-center mb-16">
        <span class="text-gold font-extrabold uppercase tracking-widest text-sm mb-2 block">أعمالنا</span>
        <h1 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">معرض المشاريع والموبيليات</h1>
        <p class="text-lg text-slate-600 max-w-2xl mx-auto leading-relaxed">
            استعرض أحدث تشكيلات الأثاث الفاخر والتصميمات الداخلية التي قمنا بتنفيذها لعملائنا في المملكة.
        </p>
    </div>

    {{-- Category Filters --}}
    <div class="flex flex-wrap justify-center gap-3 mb-16">
        <a
            href="{{ route('portfolio.index') }}"
            class="px-6 py-2.5 rounded-full font-bold text-sm transition-all shadow-sm {{ ! $activeCategory ? 'bg-slate-900 text-white' : 'bg-white text-slate-600 hover:bg-slate-100' }}"
        >
            الكل
        </a>
        @foreach($categories as $cat)
            <a
                href="{{ route('portfolio.index', ['category' => $cat->name]) }}"
                class="px-6 py-2.5 rounded-full font-bold text-sm transition-all shadow-sm {{ $activeCategory === $cat->name ? 'bg-slate-900 text-white' : 'bg-white text-slate-600 hover:bg-slate-100' }}"
            >
                {{ $cat->name }}
            </a>
        @endforeach
    </div>

    <!-- Projects Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($projects as $project)
            <a href="{{ route('portfolio.show', $project->id) }}" class="group bg-white rounded-3xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300 flex flex-col h-full">
                <!-- Cover Image -->
                <div class="h-72 bg-slate-100 relative overflow-hidden">
                    @if($project->cover_image)
                        <img src="{{ $project->cover_image }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-400">لا توجد صورة للمشروع</div>
                    @endif
                    @if($project->category)
                        <div class="absolute top-4 right-4 bg-slate-900/80 backdrop-blur-sm px-4 py-1.5 rounded-full text-xs font-bold text-gold">
                            {{ $project->category->name }}
                        </div>
                    @endif
                </div>

                <!-- Info -->
                <div class="p-8 flex-grow flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-gold transition-colors duration-300">{{ $project->title }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed line-clamp-3">{{ $project->description }}</p>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-between text-slate-900 font-extrabold text-sm">
                        <span class="group-hover:text-gold transition-colors duration-300">عرض التفاصيل ←</span>
                        @if($project->area)
                            <span class="text-slate-400 text-xs font-medium">المساحة: {{ $project->area }}</span>
                        @endif
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center text-slate-500 py-20 text-lg bg-white rounded-3xl border border-slate-100 shadow-sm">
                لا توجد مشاريع في هذا القسم حالياً.
            </div>
        @endforelse
    </div>

</div>
@endsection
