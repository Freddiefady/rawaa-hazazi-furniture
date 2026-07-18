<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Default Admin User
        User::query()->updateOrCreate(['email' => 'admin@rawathazzazi.com'], [
            'name' => 'إدارة روعة هزازي',
            'password' => bcrypt('password123'),
            'is_admin' => true,
        ]);

        // 2. Seed Settings
        $settings = [
            'site_name' => 'روعة هزازي للموبيليات والديكور',
            'contact_email' => 'info@rawathazzazi.com',
            'contact_phone' => '+966 55 276 3729',
            'contact_address' => 'شارع عبدالله ابن عباس حي الروابي، الرياض، المملكة العربية السعودية',
            'about_brief' => 'رواد في عالم التصميم الداخلي والموبيليات في المملكة العربية السعودية، نمتلك خبرة تمتد لسنوات في تحويل الأفكار إلى مساحات تنبض بالحياة. نجمع بين الفن المعماري، جودة الخامات، والدقة في التنفيذ لنقدم لك الأفضل.',
            'whatsapp_link' => 'https://wa.me/966552763729',
            'facebook_link' => '#',
            'instagram_link' => '#',
            'tiktok_link' => '#',
        ];

        foreach ($settings as $key => $value) {
            Setting::query()->updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 3. Seed Services
        $services = [
            [
                'title' => 'التصميم الداخلي 3D',
                'description' => 'نبدأ برفع المقاسات الدقيقة للمكان، ثم نقوم بإنشاء تصميم 3D واقعي يعكس تصوراتك، وننتهي باختيار الخامات المناسبة التي تتوافق مع الميزانية والذوق العام.',
                'icon' => '📐',
            ],
            [
                'title' => 'تصنيع الأثاث المخصص',
                'description' => 'نصنع أثاثك بدقة متناهية. نركز على استخدام أجود أنواع الأخشاب الطبيعية المعمرة، مع اهتمام خاص بأدق تفاصيل التشطيب لضمان قطع فنية تدوم طويلاً.',
                'icon' => '🛋️',
            ],
            [
                'title' => 'خدمات الديكور والتشطيبات',
                'description' => 'نقدم حلول متكاملة تشمل أحدث صيحات الدهانات، أنظمة الإضاءة الذكية والمخفية، وأعمال الجبس بورد بتصاميم عصرية لتجميل الأسقف والحوائط.',
                'icon' => '🎨',
            ],
        ];

        foreach ($services as $srv) {
            Service::query()->updateOrCreate(['title' => $srv['title']], $srv);
        }

        // 4. Seed Categories (standalone lookup table)
        $categoryNames = ['غرف نوم', 'مجالس', 'مطابخ', 'ديكورات حوائط', 'أثاث مكتبي'];

        foreach ($categoryNames as $name) {
            Category::query()->updateOrCreate(['name' => $name], ['status' => true]);
        }

        // 5. Seed Projects & ProjectImages (resolved via category name → category_id)
        $projects = [
            [
                'title' => 'غرفة نوم ملكية كلاسيكية',
                'category_name' => 'غرف نوم',
                'description' => "غرفة نوم ملكية مصممة من خشب الزان الروماني الفاخر مع حفر يدوي وتذهيب عيار 24. السرير مبطن بأجود خامات المخمل الإيطالي المقاوم للبقع والخدوش.\n\nتتميز هذه الغرفة بتنسيق متناسق بين الخزائن والسرير والتسريحة لتعطي فخامة القصور الكلاسيكية مع الحفاظ على الراحة النفسية لغرفة النوم.",
                'materials' => 'خشب زان روماني، ذهب ورق فرنسي، قماش مخمل إيطالي',
                'area' => '36 متر مربع',
                'cover_image' => 'https://images.unsplash.com/photo-1616594039964-ae9021a400a0?auto=format&fit=crop&q=80&w=800',
                'images' => [
                    'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&q=80&w=800',
                    'https://images.unsplash.com/photo-1540518614846-7eded433c457?auto=format&fit=crop&q=80&w=800',
                ],
            ],
            [
                'title' => 'مجلس رجال مودرن بلمسات ذهبية',
                'category_name' => 'مجالس',
                'description' => "تصميم مجلس رجال مودرن يجمع بين الفخامة المعاصرة وكرم الضيافة العربي. تم استخدام ألوان دافئة مثل البيج والكحلي والرمادي الداكن مع توزيع إضاءة خفية ونظام صوتي ذكي.\n\nالكنب مصنع يدوياً بالكامل في ورشنا لضمان أقصى درجات التحمل مع الاستخدام المستمر.",
                'materials' => 'خشب جوز طبيعي، قماش كتان تركي ثقيل، ستانلس ستيل ذهبي عيار 304',
                'area' => '50 متر مربع',
                'cover_image' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&q=80&w=1000',
                'images' => [
                    'https://images.unsplash.com/photo-1618219908412-a29a1bb7b86e?auto=format&fit=crop&q=80&w=800',
                    'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&q=80&w=800',
                ],
            ],
            [
                'title' => 'مطبخ خشبي متكامل بتصميم أوروبي',
                'category_name' => 'مطابخ',
                'description' => "مطبخ متكامل بتصميم أوروبي حديث، مجهز بأحدث أنظمة التخزين الذكية والرفوف المنزلقة. تم معالجة الأخشاب لتكون مقاومة للرطوبة والحرارة والماء.\n\nتتميز الأسطح بصلابة فائقة وسهولة التنظيف بفضل حجر الكوارتز الطبيعي.",
                'materials' => 'خشب البلوط الطبيعي المعالج، أسطح كوارتز، إكسسوارات بلوم (Blum) النمساوية',
                'area' => '24 متر مربع',
                'cover_image' => 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&q=80&w=800',
                'images' => [
                    'https://images.unsplash.com/photo-1556912173-3bb406ef7e77?auto=format&fit=crop&q=80&w=800',
                ],
            ],
            [
                'title' => 'ديكور مكتب مدير عام فاخر',
                'category_name' => 'أثاث مكتبي',
                'description' => "تصميم وتنفيذ مكتب مدير عام يجمع بين العملية والهيبة. يحتوي على مكتب رئيسي مع طاولة اجتماعات مدمجة، ووحدة تخزين جدارية مخفية للملفات.\n\nالكراسي مكسوة بالجلد الطبيعي الفاخر مع دعم كامل للظهر للعمل لفترات طويلة دون تعب.",
                'materials' => 'قشرة خشب الجوز الطبيعي، جلد طبيعي أسود، ألمنيوم مطلي بمادة البودر كوت',
                'area' => '30 متر مربع',
                'cover_image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=800',
                'images' => [
                    'https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&q=80&w=800',
                ],
            ],
            [
                'title' => 'ديكور حائط صالون عصري',
                'category_name' => 'ديكورات حوائط',
                'description' => "تصميم وتنفيذ جدار صالون رئيسي يجمع بين بديل الرخام اللامع وبديل الخشب الدافئ. مجهز بإضاءات ليد ذكية مخفية يتم التحكم بها بالريموت وخزانة تلفزيون معلقة.\n\nيعطي الجدار عمقاً للصالون ويخفي كافة كابلات التوصيل بشكل احترافي.",
                'materials' => 'بديل رخام PVC، ألواح بديل خشب، شرائط ليد ذكية، خشب MDF مقوى',
                'area' => '18 متر مربع',
                'cover_image' => 'https://images.unsplash.com/photo-1618221381711-42ca8ab6e908?auto=format&fit=crop&q=80&w=800',
                'images' => [
                    'https://images.unsplash.com/photo-1618219908412-a29a1bb7b86e?auto=format&fit=crop&q=80&w=800',
                ],
            ],
        ];

        foreach ($projects as $projData) {
            $images = $projData['images'];
            $categoryName = $projData['category_name'];

            unset($projData['images'], $projData['category_name']);

            /** @var Category $category */
            $category = Category::query()->where('name', $categoryName)->first();
            $projData['category_id'] = $category?->id;

            $project = Project::query()->updateOrCreate(['title' => $projData['title']], $projData);

            $project->images()->delete();
            foreach ($images as $imgUrl) {
                ProjectImage::query()->create([
                    'project_id' => $project->id,
                    'image_url' => $imgUrl,
                ]);
            }
        }

        // 6. Seed Blog Posts
        $posts = [
            [
                'title' => 'كيف تختار ألوان غرف النوم؟',
                'content' => "غرفة النوم هي ملاذك الخاص للراحة والاسترخاء، لذلك يجب أن تكون الألوان المستخدمة فيها مهدئة ومريحة للأعصاب. يُنصح دائماً بالابتعاد عن الألوان الصارخة مثل الأحمر الفاقع أو الأصفر القوي، واستبدالها بدرجات الباستيل الهادئة، الأزرق الفاتح، أو درجات البيج الدافئة.\n\nدمج هذه الألوان مع إضاءة خافتة وأثاث خشبي يضفي لمسة من الدفء والسكينة ويحسن من جودة نومك وطاقتك اليومية. كما يفضل استخدام دهانات صديقة للبيئة وخالية من المركبات العضوية المتطايرة (VOC) لصحة أفضل أثناء النوم.",
                'cover_image' => 'https://images.unsplash.com/photo-1616594039964-ae9021a400a0?auto=format&fit=crop&q=80&w=800',
            ],
            [
                'title' => 'أنواع الأخشاب المعمرة للأثاث وكيفية التفرقة بينها',
                'content' => "اختيار نوع الخشب هو الخطوة الأهم عند تفصيل الأثاث أو شرائه. فيما يلي أهم الأنواع المستخدمة في ورشنا:\n\n1. خشب البلوط (Oak): يعتبر من أقوى وأكثر الأخشاب تحملاً، ويتميز بتجزيعاته الجمالية العميقة ومقاومته الطبيعية للرطوبة والحشرات.\n\n2. خشب الزان (Beech): يكثر استخدامه في الأثاث الكلاسيكي نظراً لصلابته الفائقة وقابليته للتشكيل والحفر اليدوي دون تكسر.\n\n3. خشب الجوز (Walnut): خشب فاخر بلون داكن طبيعي وتعرجات ناعمة، يضفي هيبة وفخامة للقطع الفردية والمكاتب.\n\nنحن في روعة هزازي نضمن اختيار أفضل نوع خشب لكل قطعة حسب استخدامها وتصميمها لتعيش معك مدى الحياة.",
                'cover_image' => 'https://images.unsplash.com/photo-1540932239986-30128078f3c5?auto=format&fit=crop&q=80&w=800',
            ],
            [
                'title' => 'نصائح لتصميم غرف معيشة صغيرة المساحة وتوسيعها بصرياً',
                'content' => "المساحات الصغيرة ليست عائقاً أمام الجمال والأناقة والراحة. إليك 4 نصائح لتوسيع غرف المعيشة الضيقة:\n\n1. اختر الأثاث متعدد الوظائف: مثل الكنب الذي يحتوي على مساحات تخزين مخفية أو طاولات القهوة المتداخلة.\n\n2. الألوان الفاتحة هي السر: جدران باللون الأبيض أو الأوف وايت مع ستائر بلون متناسق تعكس الضوء وتعطي انطباعاً بالاتساع.\n\n3. استخدم المرايا بذكاء: وضع مرآة كبيرة في الجدار المقابل للنوافذ يضاعف كمية الضوء الطبيعي ويعكس الغرفة كأنها أكبر بمرتين.\n\n4. اختر كنب بأرجل ظاهرة: الكنب المرفوع عن الأرض يسمح بمرور الضوء تحته ويعطي إحساساً بخفة الحركة والمساحة.\n\nتطبيق هذه القواعد البسيطة يغير معالم غرفتك بالكامل!",
                'cover_image' => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&q=80&w=800',
            ],
        ];

        foreach ($posts as $postData) {
            Post::query()->updateOrCreate(['title' => $postData['title']], $postData);
        }
    }
}
