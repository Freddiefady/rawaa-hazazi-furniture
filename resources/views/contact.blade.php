@extends('layouts.app')

@section('content')
<div class="bg-slate-50/50 min-h-screen pb-24 text-right">
    
    <!-- Header -->
    <div class="bg-slate-900 text-white py-20 text-center px-4">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-black mb-6">اتصل بنا واطلب معاينة</h1>
            <p class="text-lg md:text-xl text-slate-300 leading-relaxed">
                يسعدنا الرد على جميع استفساراتكم ومناقشة مشاريع تفصيل الأثاث والديكور الخاصة بكم في مدينة الرياض.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            <!-- Contact Form -->
            <div class="bg-white p-8 sm:p-12 rounded-3xl shadow-xl border border-slate-100 h-fit">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-8 border-r-4 border-gold pr-4">أرسل لنا تفاصيل طلبك</h2>
                
                @if(session('success'))
                    <div class="text-center p-8 bg-green-50 rounded-2xl border border-green-200 text-green-800">
                        <div class="text-5xl mb-4">✓</div>
                        <h3 class="text-2xl font-black mb-2">تم الإرسال بنجاح!</h3>
                        <p class="text-sm leading-relaxed mb-6">{{ session('success') }}</p>
                        <a href="{{ route('contact.index') }}" class="text-slate-900 font-extrabold underline hover:text-slate-700">إرسال رسالة أخرى</a>
                    </div>
                @else
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label for="name" class="block text-sm font-bold text-slate-750 mb-2">الاسم الكامل <span class="text-red-500">*</span></label>
                            <input 
                                required 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}" 
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-slate-900 focus:border-slate-900 focus:bg-white outline-none transition-all @error('name') border-red-500 @enderror"
                            />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="email" class="block text-sm font-bold text-slate-750 mb-2">البريد الإلكتروني <span class="text-red-500">*</span></label>
                                <input 
                                    required 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-slate-900 focus:border-slate-900 focus:bg-white outline-none transition-all @error('email') border-red-500 @enderror"
                                />
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-bold text-slate-750 mb-2">رقم الهاتف (جوال) <span class="text-slate-400 font-normal">(اختياري)</span></label>
                                <input 
                                    type="text" 
                                    id="phone" 
                                    name="phone" 
                                    value="{{ old('phone') }}" 
                                    placeholder="05xxxxxxxx"
                                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-slate-900 focus:border-slate-900 focus:bg-white outline-none transition-all @error('phone') border-red-500 @enderror"
                                />
                                @error('phone')
                                    <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="service_type" class="block text-sm font-bold text-slate-750 mb-2">نوع الخدمة المطلوبة <span class="text-red-500">*</span></label>
                            @php
                                $selectedService = request()->query('service', old('service_type', 'تصميم داخلي'));
                            @endphp
                            <select 
                                id="service_type" 
                                name="service_type" 
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-slate-900 focus:border-slate-900 focus:bg-white outline-none transition-all"
                            >
                                <option value="تصميم داخلي" {{ $selectedService === 'تصميم داخلي' ? 'selected' : '' }}>تصميم داخلي ثلاثي الأبعاد 3D</option>
                                <option value="تصنيع موبيليات" {{ $selectedService === 'تصنيع موبيليات' ? 'selected' : '' }}>تصنيع موبيليات مخصصة (تفصيل)</option>
                                <option value="تشطيبات وديكور" {{ $selectedService === 'تشطيبات وديكور' ? 'selected' : '' }}>تشطيبات وديكور وجبس بورد</option>
                                <option value="استشارة" {{ $selectedService === 'استشارة' ? 'selected' : '' }}>استشارة هندسية / فنية</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-bold text-slate-750 mb-2">تفاصيل طلبك <span class="text-red-500">*</span></label>
                            @php
                                $prefillMsg = '';
                                if(request()->has('project')) {
                                    $prefillMsg = 'أرغب في الحصول على تفاصيل وعرض سعر بخصوص تفصيل مشروع: ' . request()->query('project') . "\n\n";
                                }
                            @endphp
                            <textarea 
                                required 
                                rows="5" 
                                id="message" 
                                name="message" 
                                placeholder="اكتب مساحات الغرف أو قطع الأثاث التي ترغب بتفصيلها ونوع الخشب المفضل..."
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-slate-900 focus:border-slate-900 focus:bg-white outline-none transition-all @error('message') border-red-500 @enderror"
                            >{{ old('message', $prefillMsg) }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <button 
                            type="submit" 
                            class="w-full bg-slate-900 text-white font-extrabold py-4 rounded-xl shadow-md hover:bg-slate-800 transition-colors text-lg"
                        >
                            إرسال الطلب
                        </button>
                    </form>
                @endif
            </div>

            <!-- Contact Info & Map -->
            <div class="space-y-12">
                
                <!-- Info cards -->
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-8 border-r-4 border-gold pr-4">تفاصيل التواصل المباشر</h2>
                    <div class="space-y-6 mt-8">
                        
                        <div class="flex items-start gap-4 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                            <div class="w-12 h-12 bg-slate-55 flex-shrink-0 rounded-xl flex items-center justify-center text-xl text-slate-900">
                                📍
                            </div>
                            <div>
                                <h4 class="font-extrabold text-slate-900 text-base mb-1">العنوان والمعرض الرئيسي</h4>
                                <p class="text-slate-500 text-sm leading-relaxed">{{ $settings['contact_address'] ?? 'الرياض، المملكة العربية السعودية' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                            <div class="w-12 h-12 bg-slate-55 flex-shrink-0 rounded-xl flex items-center justify-center text-xl text-slate-900">
                                📞
                            </div>
                            <div>
                                <h4 class="font-extrabold text-slate-900 text-base mb-1">الهاتف المباشر</h4>
                                <p class="text-slate-500 text-sm dir-ltr text-right">{{ $settings['contact_phone'] ?? '+966 55 276 3729' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm group hover:border-green-300 transition-all duration-300">
                            <div class="w-12 h-12 bg-green-50 flex-shrink-0 rounded-xl flex items-center justify-center text-xl text-green-600">
                                💬
                            </div>
                            <div>
                                <h4 class="font-extrabold text-slate-900 text-base mb-1">تواصل سريع عبر واتساب</h4>
                                <a href="{{ $settings['whatsapp_link'] ?? 'https://wa.me/966552763729' }}" target="_blank" class="text-green-650 hover:underline font-bold text-sm dir-ltr text-right block">{{ $settings['contact_phone'] ?? '+966 55 276 3729' }}</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-4 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                            <div class="w-12 h-12 bg-slate-55 flex-shrink-0 rounded-xl flex items-center justify-center text-xl text-slate-900">
                                ✉️
                            </div>
                            <div>
                                <h4 class="font-extrabold text-slate-900 text-base mb-1">البريد الإلكتروني للطلبات</h4>
                                <p class="text-slate-500 text-sm">{{ $settings['contact_email'] ?? 'info@rawathazzazi.com' }}</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Google Map -->
                <div class="h-80 bg-slate-200 rounded-3xl overflow-hidden shadow-md border border-slate-200">
                    <iframe 
                        src="https://maps.google.com/maps?q=24.691444,46.795889&hl=ar&z=15&output=embed" 
                        width="100%" 
                        height="100%" 
                        style="border: 0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        title="موقع معرض روعة هزازي للموبيليات"
                    ></iframe>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
