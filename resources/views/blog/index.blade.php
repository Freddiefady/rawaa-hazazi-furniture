@extends('layouts.app')

@section('content')
<div class="bg-slate-50/50 pb-24 text-right">
    
    <!-- Header -->
    <div class="bg-slate-900 text-white py-20 text-center px-4">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-black mb-6">مدونة روعة هزازي</h1>
            <p class="text-lg md:text-xl text-slate-300 leading-relaxed">
                أفكار ملهمة، نصائح لتنسيق الأثاث، وأسرار اختيار أفضل أنواع الأخشاب من خبرائنا وحرفيينا.
            </p>
        </div>
    </div>

    <!-- Posts Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100 hover:shadow-xl transition-all duration-300 flex flex-col h-full">
                    
                    <!-- Cover Image -->
                    <div class="h-64 bg-slate-100 overflow-hidden">
                        @if($post->cover_image)
                            <img src="{{ $post->cover_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" />
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-400">صورة المقال</div>
                        @endif
                    </div>
                    
                    <!-- Content -->
                    <div class="p-8 flex-grow flex flex-col justify-between">
                        <div>
                            <span class="text-xs text-slate-400 font-bold block mb-2">{{ $post->created_at->format('Y-m-d') }}</span>
                            <h3 class="text-2xl font-bold text-slate-900 mb-4">{{ $post->title }}</h3>
                            <p class="text-slate-600 line-clamp-4 leading-relaxed text-sm">{{ Str::limit($post->content, 200) }}</p>
                        </div>
                        
                        <div class="mt-8 pt-6 border-t border-slate-100">
                            <a href="{{ route('blog.show', $post->id) }}" class="text-slate-950 font-extrabold text-sm hover:text-gold transition-colors">اقرأ المقال بالكامل ←</a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center text-slate-500 py-20 text-lg bg-white rounded-3xl border border-slate-100 shadow-sm">
                    لا توجد منشورات في المدونة حالياً.
                </div>
            @endforelse
        </div>
    </div>

</div>
@endsection
