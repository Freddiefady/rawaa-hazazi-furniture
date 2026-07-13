@extends('layouts.app')

@section('content')
<div class="bg-slate-50/50 pb-24 text-right" x-data="{
    furniture: 'sofa',
    wood: 'beech',
    fabric: 'velvet',
    dimensions: 'custom',
    
    // Furniture base prices (SAR)
    furnitureData: {
        sofa: { name: 'كنب مجلس كلاسيكي (متر طولي)', price: 1200, icon: '🛋️', desc: 'كنب كلاسيكي مريح بإطارات نجارة ظاهرة وحفر يدوي دقيق.' },
        bed: { name: 'سرير غرف نوم مزدوج', price: 4500, icon: '🛏️', desc: 'سرير مزدوج متكامل مع لوح رأسي (Headboard) مبطن ومزين بالخشب.' },
        table: { name: 'طاولة طعام أوروبية (٨ كراسي)', price: 7500, icon: '🍽️', desc: 'طاولة طعام تتسع لثمانية أشخاص مع كراسي خشبية مبطنة.' },
        desk: { name: 'مكتب مدير عام فاخر', price: 6000, icon: '💼', desc: 'مكتب عمل كبير مع وحدات تخزين جانبية مدمجة وقشرة خشب فاخرة.' }
    },
    
    // Wood factors and descriptions
    woodData: {
        oak: { name: 'خشب البلوط (Oak)', multiplier: 1.1, desc: 'صلابة ممتازة، مقاومة طبيعية للرطوبة، ذو تجزيعات جدارية عميقة ورائعة.' },
        beech: { name: 'خشب الزان الروماني (Beech)', multiplier: 1.0, desc: 'الخشب الأفضل للحفر اليدوي والقطع الكلاسيكية نظراً لتماسكه وخلوه من العقد.' },
        walnut: { name: 'خشب الجوز الطبيعي (Walnut)', multiplier: 1.4, desc: 'لون داكن فاخر، تعرجات ناعمة، يفضل للأثاث المودرن الراقي والمكاتب الفخمة.' },
        mahogany: { name: 'خشب الماهوجني الأحمر (Mahogany)', multiplier: 1.5, desc: 'خشب صلب داكن بلون أحمر غني، مقاوم للتآكل ويعيش لأجيال طويلة.' }
    },
    
    // Fabric additions (SAR)
    fabricData: {
        velvet: { name: 'مخمل إيطالي مقاوم للبقع', price: 1500, desc: 'ملمس ناعم ولامع، سهل التنظيف، ممتاز للمجالس وغرف النوم.' },
        linen: { name: 'كتان تركي ثقيل', price: 1000, desc: 'مظهر مطفأ عصري ومقاوم للاهتراء، يفضله مصممو الديكور للمظهر المودرن.' },
        leather: { name: 'جلد طبيعي فاخر', price: 3500, desc: 'فخامة مطلقة للمكاتب الفخمة والمقاعد القيادية، متانة لا تضاهى.' },
        none: { name: 'بدون تنجيد (خشب خالص)', price: 0, desc: 'مناسب لأسطح الطاولات والخزائن والأثاث الخشبي بالكامل.' }
    },

    get totalEstimate() {
        let base = this.furnitureData[this.furniture].price;
        let mult = this.woodData[this.wood].multiplier;
        let add = this.fabricData[this.fabric].price;
        
        // Adjust fabric if none is chosen
        if (this.furniture === 'table' && this.fabric === 'leather') {
            // tables with 8 chairs have more leather
            add = 4500;
        }
        
        return Math.round((base * mult) + add);
    },
    
    get orderLink() {
        let fName = this.furnitureData[this.furniture].name;
        let wName = this.woodData[this.wood].name;
        let fbName = this.fabricData[this.fabric].name;
        let details = `طلب تفصيل مخصص: ${fName}، باستخدام ${wName}، وتنجيد من نوع ${fbName}. التكلفة التقديرية: ${this.totalEstimate} ريال سعودي.`;
        
        return '{{ route("contact.index") }}?service=تصنيع موبيليات&project=' + encodeURIComponent(details);
    }
}">

    <!-- Header -->
    <div class="bg-slate-900 text-white py-20 text-center px-4">
        <div class="max-w-3xl mx-auto">
            <span class="bg-gold/20 text-gold px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-wider mb-4 inline-block">تفاعلي بالكامل</span>
            <h1 class="text-4xl md:text-5xl font-black mb-6">مبتكر الخامات والأخشاب</h1>
            <p class="text-lg md:text-xl text-slate-300 leading-relaxed">
                اختر نوع الأثاث وخامات الأخشاب والأقمشة المنجدة لمشاهدة المواصفات والأسعار التقديرية فوراً بأسلوب تفاعلي ذكي.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left Side: Configurator Controls (8 Cols) -->
            <div class="lg:col-span-8 bg-white p-8 sm:p-12 rounded-3xl border border-slate-100 shadow-xl space-y-12">
                
                <!-- 1. Select Furniture Type -->
                <div>
                    <h3 class="text-xl font-extrabold text-slate-900 mb-6 border-r-4 border-gold pr-3">١. نوع قطعة الأثاث</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <template x-for="(data, key) in furnitureData">
                            <button 
                                @click="furniture = key; if(key === 'desk' || key === 'table') { fabric = 'none' } else if(fabric === 'none') { fabric = 'velvet' }" 
                                :class="furniture === key ? 'border-gold bg-slate-50 ring-2 ring-gold/45' : 'border-slate-200 hover:border-slate-400 bg-white'"
                                class="p-6 border rounded-2xl text-right transition-all flex items-start gap-4"
                            >
                                <span class="text-3xl" x-text="data.icon"></span>
                                <div>
                                    <h4 class="font-extrabold text-slate-950 text-base" x-text="data.name"></h4>
                                    <p class="text-slate-400 text-xs mt-1 leading-relaxed" x-text="data.desc"></p>
                                </div>
                            </button>
                        </template>
                    </div>
                </div>

                <!-- 2. Select Wood Type -->
                <div>
                    <h3 class="text-xl font-extrabold text-slate-900 mb-6 border-r-4 border-gold pr-3">٢. نوع الخشب الأساسي</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <template x-for="(data, key) in woodData">
                            <button 
                                @click="wood = key" 
                                :class="wood === key ? 'border-gold bg-slate-50 ring-2 ring-gold/45' : 'border-slate-200 hover:border-slate-400 bg-white'"
                                class="p-6 border rounded-2xl text-right transition-all flex flex-col justify-between"
                            >
                                <div>
                                    <h4 class="font-extrabold text-slate-950 text-base" x-text="data.name"></h4>
                                    <p class="text-slate-500 text-xs mt-2 leading-relaxed" x-text="data.desc"></p>
                                </div>
                                <div class="mt-4 pt-3 border-t border-slate-100 flex justify-between items-center text-xs">
                                    <span class="text-slate-400 font-bold">معامل السعر:</span>
                                    <span class="font-black text-slate-900" x-text="'x' + data.multiplier"></span>
                                </div>
                            </button>
                        </template>
                    </div>
                </div>

                <!-- 3. Select Upholstery Fabric -->
                <div>
                    <h3 class="text-xl font-extrabold text-slate-900 mb-6 border-r-4 border-gold pr-3">٣. التنجيد والأقمشة</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <template x-for="(data, key) in fabricData">
                            <!-- Disable None option for sofa and bed since they MUST be upholstered -->
                            <button 
                                @click="fabric = key" 
                                :disabled="(furniture === 'sofa' || furniture === 'bed') && key === 'none'"
                                :class="[
                                    fabric === key ? 'border-gold bg-slate-50 ring-2 ring-gold/45' : 'border-slate-200 hover:border-slate-400 bg-white',
                                    ((furniture === 'sofa' || furniture === 'bed') && key === 'none') ? 'opacity-40 cursor-not-allowed border-slate-100 bg-slate-50' : ''
                                ]"
                                class="p-6 border rounded-2xl text-right transition-all flex flex-col justify-between"
                            >
                                <div>
                                    <h4 class="font-extrabold text-slate-950 text-base" x-text="data.name"></h4>
                                    <p class="text-slate-500 text-xs mt-2 leading-relaxed" x-text="data.desc"></p>
                                </div>
                                <div class="mt-4 pt-3 border-t border-slate-100 flex justify-between items-center text-xs">
                                    <span class="text-slate-400 font-bold">التكلفة الإضافية:</span>
                                    <span class="font-black text-slate-900" x-text="data.price === 0 ? 'مشمول' : '+' + data.price + ' ر.س'"></span>
                                </div>
                            </button>
                        </template>
                    </div>
                </div>

            </div>

            <!-- Right Side: Estimate Summary Box (4 Cols) -->
            <div class="lg:col-span-4 sticky top-28 space-y-6">
                
                <div class="bg-slate-900 text-white p-8 rounded-3xl border border-slate-800 shadow-2xl">
                    <h3 class="text-lg font-bold text-slate-400 mb-6 pb-3 border-b border-slate-800">بيان الخامات والأسعار</h3>
                    
                    <div class="space-y-6 text-sm">
                        
                        <!-- Chosen Item -->
                        <div>
                            <span class="text-xs text-slate-500 block mb-1">المنتج المحدد:</span>
                            <span class="font-bold text-white text-base" x-text="furnitureData[furniture].name"></span>
                        </div>

                        <!-- Chosen Wood -->
                        <div>
                            <span class="text-xs text-slate-500 block mb-1">نوع الخشب الأساسي:</span>
                            <span class="font-bold text-white text-base" x-text="woodData[wood].name"></span>
                        </div>

                        <!-- Chosen Fabric -->
                        <div>
                            <span class="text-xs text-slate-500 block mb-1">نوع قماش التنجيد:</span>
                            <span class="font-bold text-white text-base" x-text="fabricData[fabric].name"></span>
                        </div>

                        <!-- Estimate Price -->
                        <div class="pt-6 border-t border-slate-850">
                            <span class="text-xs text-slate-400 block mb-2">التكلفة التقديرية (تقريبية):</span>
                            <div class="flex items-baseline gap-2">
                                <span class="text-4xl font-black text-gold" x-text="totalEstimate"></span>
                                <span class="text-sm font-bold text-slate-400">جنيه مصرى</span>
                            </div>
                        </div>

                    </div>

                    <div class="mt-8">
                        <a 
                            :href="orderLink" 
                            class="block w-full text-center bg-gradient-to-l from-gold to-amber-600 text-slate-900 font-extrabold py-4 rounded-xl shadow-lg hover:opacity-95 transition-opacity text-base"
                        >
                            طلب تفصيل بهذه المواصفات
                        </a>
                        <p class="text-center text-[10px] text-slate-500 mt-4 leading-relaxed">الأسعار تقديرية تشمل نجارة روعة هزازي وخامات الخشب والتنجيد ولا تشمل تكاليف الشحن لخارج الرياض أو المعاينة الميدانية الدقيقة.</p>
                    </div>

                </div>

                <!-- Custom Request Widget -->
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-md">
                    <h4 class="font-extrabold text-slate-900 text-sm mb-2">هل لديك قطعة أثاث أخرى؟</h4>
                    <p class="text-xs text-slate-500 leading-relaxed mb-4">إن كان لديك رسم أو صورة لقطعة أثاث مخصصة ترغب بتفصيلها، يمكنك إرسالها إلينا للحصول على تقدير سعر فوري ومجاني.</p>
                    <a href="{{ route('contact.index') }}" class="text-slate-900 font-extrabold text-xs underline hover:text-gold transition-colors">تقديم طلب مخصص ←</a>
                </div>

            </div>

        </div>

    </div>

</div>
@endsection
