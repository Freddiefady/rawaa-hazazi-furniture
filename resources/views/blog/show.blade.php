@extends('layouts.app')

@section('content')
<div class="bg-slate-50/50 pb-24 text-right">
    
    <!-- Cover Image Header -->
    @if($post->cover_image)
        <div class="h-[45vh] bg-slate-900 relative">
            <img src="{{ $post->cover_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover opacity-60" />
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 to-transparent"></div>
        </div>
    @endif

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-32 relative z-10">
        
        <!-- Post Wrapper -->
        <div class="bg-white p-8 sm:p-16 rounded-3xl border border-slate-100 shadow-xl">
            
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-900 mb-8 font-bold transition-colors">
                <span>→ العودة للمدونة</span>
            </a>

            <div class="mb-8">
                <span class="text-xs text-slate-400 font-bold block mb-2">{{ $post->created_at->format('Y-m-d') }}</span>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight">{{ $post->title }}</h1>
            </div>

            <!-- Content -->
            <div class="text-lg text-slate-700 leading-relaxed space-y-6 prose max-w-none">
                {!! nl2br(e($post->content)) !!}
            </div>

            <!-- CTA inside post -->
            <div class="mt-16 p-8 bg-slate-50 rounded-2xl border border-slate-200/60 flex flex-col sm:flex-row items-center justify-between gap-6">
                <div>
                    <h3 class="font-extrabold text-slate-900 text-lg mb-2">أعجبك هذا الموضوع؟</h3>
                    <p class="text-slate-500 text-sm">يمكنك استشارة مهندسينا والحصول على تفصيل مجاني لأثاث أحلامك.</p>
                </div>
                <a href="{{ route('contact.index') }}" class="bg-slate-900 text-white font-extrabold px-6 py-3 rounded-xl hover:bg-gold hover:text-slate-900 transition-colors shadow-sm whitespace-nowrap">تواصل معنا الآن</a>
            </div>

        </div>

    </div>

</div>
@endsection
