<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;

class ImportProductsFromArray extends Command
{
    protected $signature = 'products:import-array';

    protected $description = 'Import products from a hardcoded array';

    public function handle()
    {
        $products = [
            [
                "name" => ["ar" => "اسم اصنف بالعربي", "en" => "اسم الصنف"],
                "code" => "كود الصنف",
                "category" => "Categry",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بوكس للسفر سكودو 6 (70*63*92)", "en" => "(92*63*70) Skudo 6 Ata"],
                "code" => "7",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق حشرات ادامز", "en" => "Adams Flea & Tick Collar "],
                "code" => "15",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق بوستر للعمليات الجراحيه مقاس 10", "en" => "Buster Clic Collar 10cm"],
                "code" => "130",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق بوستر للعمليات الجراحيه مقاس 15", "en" => "Buster Clic Collar 15"],
                "code" => "131",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق بوستر للعمليات الجراحيه مقاس 20", "en" => "Buster Clic Collar 20cm"],
                "code" => "132",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق بوستر للعمليات الجراحيه مقاس 30", "en" => "Buster Clic Collar 30 cm"],
                "code" => "133",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق بوستر للعمليات الجراحيه 7.5مقاس   ", "en" => "Buster Clic Collar 7.5cm"],
                "code" => "134",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق بوستر للعمليات الجراحيه مقاس 12.5", "en" => "Buster Clic Collar 12.5 cm"],
                "code" => "135",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه نيلون بوستر مقاس 1", "en" => "Buster Nylon Muzzle size 1"],
                "code" => "136",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه نيلون بوستر مقاس 4", "en" => "Buster Nylon Muzzle size 4"],
                "code" => "138",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه نيلون بوستر مقاس 5", "en" => "Buster Nylon Muzzle size size5"],
                "code" => "140",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه نيلون بوستر مقاس 6", "en" => "Buster Nylon Muzzle size6"],
                "code" => "142",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه نيلون بوستر مقاس 8", "en" => "Buster Nylon Muzzle size8"],
                "code" => "143",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه نيلون بوستر مقاس 0", "en" => "Buster Nylon Muzzl size 0"],
                "code" => "144",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دوج نيس كامب ليش ", "en" => "Dogness Camo Leash M-S"],
                "code" => "146",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لمامة شعر", "en" => "Capsule Fuzzer "],
                "code" => "151",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شنطه ظهر قطط", "en" => "Cat Back Bag"],
                "code" => "157",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شنطه ظهر قطط مضلع بيضاوي", "en" => " Oval Cat Back Bag "],
                "code" => "158",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شنطه ظهر للقطط دوبل", "en" => "Cat Holder (Nunbell Cat Back Bag) FLD180312"],
                "code" => "161",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كولر بلوره مقاس l", "en" => "Cat Space Hood L"],
                "code" => "165",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كولر جراحي بسكوتش مقاس 1", "en" => "Collar size 1"],
                "code" => "209",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كولر جراحي بسكوتش مقاس 5", "en" => "Collar size 5"],
                "code" => "211",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كولر جراحي بسكوتش مقاس 6", "en" => "Collar size 6"],
                "code" => "212",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كولر جراحي بسكوتش مقاس 7", "en" => "Collar size 7"],
                "code" => "213",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سويت شيرت", "en" => "Paw Star Suit Shirt"],
                "code" => "236",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "غطاء كرسي العربيه 120*143", "en" => "Dog Moda Carseat 143*120"],
                "code" => "242",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دوج موضه تي شيرت للقطط مقاس 1", "en" => "Dog Moda Cat T-shirt 1"],
                "code" => "243",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دوج موضه سويت شيرت لكلاب مقاس 7", "en" => "Dog Moda Sweat Shirt 7"],
                "code" => "250",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دوج موضه سويت شيرت لكلاب مقاس 8", "en" => "Dog Moda Sweat Shirt 8"],
                "code" => "251",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دوج موضه تي شيرت لكلاب مقاس 10", "en" => "Dog Moda T-shirt 10"],
                "code" => "257",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دوج موضه تي شيرت مقاس 8", "en" => "Dog Moda T-shirt 8"],
                "code" => "259",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دوج موضه تي شيرت مقاس 9", "en" => "Dog Moda T-shirt 9"],
                "code" => "260",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "صداره دوج نيس مقاس xs", "en" => "Dogness Teflon Harness XS"],
                "code" => "263",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => " طوق فليكسي مقاس l", "en" => "Flexi Soft Belt l"],
                "code" => "327",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق فليكسي مقاس S-M", "en" => "Flexi Soft Belt S-M"],
                "code" => "328",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ديسبنسر للطعام و الماء", "en" => "Food & Water Dispenser 2L"],
                "code" => "331",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ديسبنسر للطعام", "en" => "Food Tank "],
                "code" => "332",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ديسبنسر للطعام", "en" => "Food Tank702.6"],
                "code" => "333",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "صداره فوس دوج 15 مللي", "en" => "Fuss Dog Harness 15mm"],
                "code" => "352",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جوانتي للاستحمام و العنايه بالفرو", "en" => "Grooming Gloves"],
                "code" => "383",
                "category" => "Dogs/Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لمامه لشعر القطط و الكلاب", "en" => "Hair Roller"],
                "code" => "393",
                "category" => "Dogs/Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تي شيرت مقاس 10", "en" => "Hawaiian Shirt 10"],
                "code" => "404",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تي شيرت مقاي 5", "en" => "Hawaiian Shirt 5"],
                "code" => "406",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تي شيرت مقاس 6", "en" => "Hawaiian Shirt 6"],
                "code" => "407",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اكياس لجمع فضلات الكلاب", "en" => "Klint / Soleil Stool Bag"],
                "code" => "465",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه ننبيل لكلاب مقاس 2", "en" => "Mask Nunbel size 2 fld 180318"],
                "code" => "496",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه ننبيل لكلاب مقاس3", "en" => "Mask Nunbel size 3 fld 180319"],
                "code" => "497",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بودر معطر لرمله القطط", "en" => "Misty Litter Deoderant Powder 500gm"],
                "code" => "526",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مودال طوق و ليش مقاس S", "en" => "Modal Coller&Leash  S"],
                "code" => "529",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مودتا صداره و ليش مقاسS ", "en" => "Modal Leash&Harness S"],
                "code" => "531",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بطاقه تعارف ", "en" => "Name Tag Bone Shape"],
                "code" => "570",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كوره نن يل ملونه", "en" => "Nunbell colour full ball - fld 180112"],
                "code" => "581",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ببرونه للرضاعه للكلاب", "en" => "Nunbell -Feeding Puppy"],
                "code" => "582",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => " نن بيل ليش حبل بسلسله", "en" => "Nunbell Lesh With Chain "],
                "code" => "583",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "غطاء كرسي العربيه ", "en" => "Nunbell Cover Seat 4 Sides FLD 180213"],
                "code" => "584",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نن بيل ليش", "en" => "Nunbell Leash fld 180307"],
                "code" => "592",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نن بيل نيلون ليش", "en" => "Nunbell leash Nylon 2.5 mm  - fld 180229"],
                "code" => "594",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نن بيل لمامه فضلات معدن", "en" => "Nunbell Metal Catcher"],
                "code" => "595",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نن بيل ليش", "en" => "Nnunbell Pet Leash   - fld 180230"],
                "code" => "596",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نن بيل كوره كبيره بصوت", "en" => "Nunbell Pet Leash   - fld 180230"],
                "code" => "599",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نن بيل طبق استانليس 26 سم ", "en" => "Nunbell Stainless Plate 26 cm  - fld 180198"],
                "code" => "602",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نن بيل طبق مياه استانلس 30 سم ", "en" => "Nunbell Stainless Water Bowel 30 cm  - fld 180202"],
                "code" => "603",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نن بيل زجاجه مياه للسفر ", "en" => "Nunbell Travel Bottle"],
                "code" => "605",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نافورة مياه", "en" => "Pet Fountain "],
                "code" => "706",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيت ستار كوره بيضاويه ", "en" => "Pet Star Oval Ball  - yt 99620"],
                "code" => "713",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ملقاط للقراض", "en" => "Pet Tick Twister 3pc"],
                "code" => "714",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيت ستار طوق كلاب", "en" => "Pet Star Dog Collar"],
                "code" => "736",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "محقنه لحبوب الحيوانات ", "en" => "Pill Gun"],
                "code" => "742",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كره للكلاب", "en" => "Pop-Pals S-M"],
                "code" => "746",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دواسه امام الليتر بوكس", "en" => "Pvc Mat 40*30cm"],
                "code" => "792",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش قابل للتمدد مقاس M/L", "en" => "Reflective Leash M/L"],
                "code" => "794",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش قابل للتمدد مقاسXL", "en" => "Reflective Leash X/L"],
                "code" => "795",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش قابل للتمدد مقاس XS/S", "en" => "Reflective Leash XS/S "],
                "code" => "796",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش قابل للتمدد مقاس 3 متر", "en" => "Reflective Leash 3m"],
                "code" => "799",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش قابل للتمدد مقاس5 متر", "en" => "Reflective Leash 5m"],
                "code" => "800",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش قابل للتمدد  ميني", "en" => "Reflective Leash  mini"],
                "code" => "801",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيجنادوج طوق مع صديري", "en" => "Signor Dog Collar with Harness L"],
                "code" => "890",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "عضاضه سوليل", "en" => "Soleil Dental Cleaning"],
                "code" => "911",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سوليل فرشه مساج", "en" => "Soleil Massage Brunsh cat"],
                "code" => "918",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ستيفانوبلاست طبق للاكل ", "en" => "Stefanplast Chic Bowl 1 ltr - ld gray"],
                "code" => "925",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "معجون اسنان و فرشه", "en" => "Tooth Paste With Brushe"],
                "code" => "951",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شنطه لنقل القطط", "en" => "Transport Bag"],
                "code" => "954",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "عضاضه لعبه للكلاب", "en" => "Turtle Dog Toy Tooth Brush"],
                "code" => "958",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بوله وميي مقاس L", "en" => "Woome Bowl L"],
                "code" => "989",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بوله وميي مقاس S", "en" => "Wome Bowl Puppy"],
                "code" => "990",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اطار بادة بفريم 38 * 38 * 12", "en" => " Pad Frame size 38 * 38 * 12"],
                "code" => "995",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "باب للقطط", "en" => "Cat Door "],
                "code" => "999",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بوكس تركي", "en" => " Turkish Box"],
                "code" => "1000",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بوكس جديد كبير كيان", "en" => "Large Kayan Box"],
                "code" => "1001",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بوكس مصري كبير", "en" => " Large Egyption Box "],
                "code" => "1005",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تي شيرت بولو 7xl", "en" => "Polo T- Shirt size 7 XL"],
                "code" => "1009",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جاروف بثقوب", "en" => "SCOOP"],
                "code" => "1011",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جاروف مصرى", "en" => "SCOOP"],
                "code" => "1013",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جاكيت بو ستار 4 XL", "en" => " Paw Star Jacket 4xl"],
                "code" => "1016",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جاكيت بو ستار  XL5", "en" => "PawStar Jacket 5xl"],
                "code" => "1017",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جاكيت ضد الماء مقاس L", "en" => "Water Proof Jacket L"],
                "code" => "1019",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جاكيت ضد الماء مقاس M", "en" => " Water Proof Jacket  m"],
                "code" => "1020",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جاكيت جبردين", "en" => "جاكت جبردين"],
                "code" => "1022",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جاكت ماكس ", "en" => "Max Jacket  "],
                "code" => "1023",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جزم سليكون ", "en" => "Selicon Shoes"],
                "code" => "1026",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خناقة طوق قماش 1.2 سم * 50 سم", "en" => "Fabric Dog Choke Coller "],
                "code" => "1032",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خناقة طوق قماش  صغيره", "en" => "Fabric Dog Choke Coller S"],
                "code" => "1033",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خناقة طوق قماش كبيره", "en" => "Fabric Dog Choke Coller L"],
                "code" => "1034",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خناقة طوق قماش  وسط", "en" => "  Fabric Dog Choke Coller M"],
                "code" => "1035",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خناقة  كلاب صغيرة حديد", "en" => "  Metal Dog Choke Coller"],
                "code" => "1036",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خناقه سوبريم مغلقه 4مللي", "en" => "Suprium Dog Choke Coller "],
                "code" => "1041",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خناقه شوك", "en" => "Spicky  Dog Choke Coller"],
                "code" => "1043",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خناقه مبططه مغلقه", "en" => "Padded Dog Choke Coller"],
                "code" => "1045",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خناقه مفرد مبططه بلوحه M", "en" => "  Dog Choke Coller"],
                "code" => "1046",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ديسبينسر اكل ومياه نافورة", "en" => "  Water fountain&Food Dispenser "],
                "code" => "1048",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رماله كبير", "en" => " Large Cat litter Box "],
                "code" => "1051",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رماله  وسط", "en" => "Medium Cat litter Box "],
                "code" => "1052",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "زجاجه مياه ", "en" => "Uarone Water Flask 500ml"],
                "code" => "1055",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيت مودا سرير 105 *85", "en" => "Dog Moda bed 105*85"],
                "code" => "1059",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سرير شكل موزة (أخضر)", "en" => " BANANA Shape Bed "],
                "code" => "1071",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سرير مستطيل دبل فيس كبير", "en" => "Double Face Rectangle Bed"],
                "code" => "1073",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سلسله  كارتيير مشي 2مم", "en" => "Cartieer Chain 2 mm"],
                "code" => "1076",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سلسله سوبريم مشي كارتيير 4مللي", "en" => "Superium Cartieer Chain 4 mm"],
                "code" => "1077",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سلسله مشي بقفل T 3مم", "en" => "Chain with Lock "],
                "code" => "1078",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سلسله مشي بقفل T 4مم", "en" => "Chain with Lock "],
                "code" => "1079",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شنطة هالو كيتى", "en" => "Hello Kitty Bag "],
                "code" => "1081",
                "category" => "Cats ",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شنطه ببنوره", "en" => " Cat Hand bag "],
                "code" => "1082",
                "category" => "Cats ",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شياله سفنج صغيره", "en" => "Small Fabric Bag"],
                "code" => "1085",
                "category" => "Cats ",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شياله سفنج وسط", "en" => "Medium Fabric Bag"],
                "code" => "1087",
                "category" => "Cats ",
                "price" => 0
            ],
            [
                "name" => ["ar" => "صدرية +ليش ماكس بيد مبطنة XL", "en" => "Max Harnest with Lech Xl"],
                "code" => "1088",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "صدرية +ليش ماكس بيد مبطنة XXL", "en" => "Max Harnest with Lech  XXl"],
                "code" => "1089",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "صدريه +ليش  s", "en" => "Lino Harnest with Lech S"],
                "code" => "1093",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "صدريه l", "en" => "Harness L"],
                "code" => "1097",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طبق استانلس صغير 26سم", "en" => "Small Dog Stanless Plate  26 cm"],
                "code" => "1103",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طبق استانلس كبير للكلاب 35سم", "en" => "Large Dog Stanless Plate 35 cm "],
                "code" => "1104",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طبق استانلس كبير للكلاب 40سم", "en" => "Large  Dog Stanless Plate 40 cm"],
                "code" => "1105",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طبق استانلس للكلاب ", "en" => " Upside Dog Stanless Plate"],
                "code" => "1106",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طبق اكل بطئ l", "en" => "Dog plate L"],
                "code" => "1107",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طبق اكل بوكس سيلكون", "en" => "Silicon Plate"],
                "code" => "1109",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طبق اكل كلاب بطىْ علي شكل سمكه", "en" => "Fish Shape Dog Plate "],
                "code" => "1110",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طبق سيليكون كبير", "en" => "Silicon Plate Large "],
                "code" => "1112",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طبق بعين استانلس", "en" => "Stanless Plate"],
                "code" => "1113",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طبق ستانلس صغير 22سم", "en" => "Small Stanless Plate"],
                "code" => "1117",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طبق مزدوج بلاستك 2 عين 39*22", "en" => " 39*22 Double Plastic Plate"],
                "code" => "1120",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق شكل كرافت ", "en" => " Caravet Plate"],
                "code" => "1121",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق قطط", "en" => "Cat Collar"],
                "code" => "1122",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق تيمبروولف مقاس 7", "en" => " Timber Wolf 7 round Coller"],
                "code" => "1125",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق تيمبروولف مقاس 8", "en" => " Timber Wolf 8 Coller"],
                "code" => "1126",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق تيمبروولف مقاس 8", "en" => " TimberWolf 8 round Coller"],
                "code" => "1127",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق ووم", "en" => " Whoom Coller  "],
                "code" => "1128",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق حشرات كلاب  xus", "en" => "Dog Fleas Coller  xus "],
                "code" => "1130",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق سوبريم L", "en" => "Suprium Coller L"],
                "code" => "1132",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق صاعقه صغير", "en" => "Army Coller Small"],
                "code" => "1135",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق طلق كبير", "en" => "Large Spiky Coller"],
                "code" => "1137",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق تيمبروولف مقاس 7", "en" => " Timber Wolf size 7 "],
                "code" => "1144",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فرشاة كبير بزرار", "en" => " Jianchi Pet Brush"],
                "code" => "1155",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فرشة اورجو سليكون", "en" => "Silicon Orgo Brush"],
                "code" => "1156",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فرشة حرف تي", "en" => "T Shape Brush"],
                "code" => "1157",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => " بيت زووم فرشه بلاستك اوتوماتك ", "en" => "Pet Zoom Automatic Brush"],
                "code" => "1161",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فرشه بلاستك سنون معدن ", "en" => " Plastic Brush With metal spines"],
                "code" => "1163",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فرشه بوشين", "en" => " Double Faced Brush"],
                "code" => "1164",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فرشه جيور طويله", "en" => "Long Giour Brush"],
                "code" => "1165",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فرمنيتور كلب كبير شعر قصير", "en" => "Short Hair Dog Furminator "],
                "code" => "1166",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فوطه فيبر ص", "en" => " Small Fiber Towel"],
                "code" => "1168",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فوطه فيبر ك", "en" => "Large Fiber Towel"],
                "code" => "1169",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيست L", "en" => "Vest L"],
                "code" => "1170",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "قصافه", "en" => "Nail Clipper "],
                "code" => "1171",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "قصافه مدوره", "en" => "Round Nail Clipper"],
                "code" => "1173",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "قفص كلاب 125 سم *1م *1م", "en" => "Dog Cage125 cm *1m*1m"],
                "code" => "1175",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "قفص مقاس 80 سم* 50سم *50سم", "en" => "Dog Cage 80cm*50cm*50cm "],
                "code" => "1177",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه  شكل بطة", "en" => "Duck Shaped Muzzle"],
                "code" => "1180",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه بلاستك صغيره", "en" => "Small Plasic Muzzle "],
                "code" => "1181",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه بلاستك وسط", "en" => "Medium Plastic Muzzle"],
                "code" => "1183",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه جلد L", "en" => "Leather Muzzle L"],
                "code" => "1184",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه جلد  S", "en" => "Leather Muzzle S"],
                "code" => "1187",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه جلد كبيره", "en" => "Leather Muzzle L"],
                "code" => "1189",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه سليكون 001", "en" => "Silicon Muzzle size 1"],
                "code" => "1191",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه سليكون 002", "en" => " Silicon Muzzle size 2"],
                "code" => "1192",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه سليكون 003", "en" => "Silicon Muzzle size 3"],
                "code" => "1193",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه سليكون 005", "en" => "Silicon Muzzle size 5"],
                "code" => "1195",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كمامه سليكون 006", "en" => "Silicon Muzzle size 6"],
                "code" => "1196",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كوب سيليكون لغسيل الاقدام", "en" => "Silicon Paws Washing Cup  "],
                "code" => "1197",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لعبه  شكل سمكه", "en" => "Fish Shaped Cat Toy "],
                "code" => "1206",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لعبه مكافات", "en" => "Treats Toy "],
                "code" => "1211",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لمامة شعر بيد خشب", "en" => " Wooden Hand Hair Roller "],
                "code" => "1213",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لمامة شعر سفنجة", "en" => " Hair Removal Sponge "],
                "code" => "1214",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لمامة شعر مساحه", "en" => "PLastic Hand Hair Roller "],
                "code" => "1215",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لمامة كاوتش", "en" => "Rupper Hair Roller "],
                "code" => "1216",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => " فير ويزر لمامه لشعر  ", "en" => " fur wizard 3*1 Hair Remover "],
                "code" => "1219",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لمامه سيليكون", "en" => "Silicon Hair Remover "],
                "code" => "1221",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليتر بوكس بسلم", "en" => "Litter Box with ladder"],
                "code" => "1222",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليتر بوكس مغلق ( komodo - pixi - nova", "en" => "Closed Litter Box ( komodo - pixi - nova)"],
                "code" => "1224",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليتر بوكس مغلق", "en" => "Closed Litter Box"],
                "code" => "1225",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليتر بوكس مغلق", "en" => " Cat Shaped Closed Litter Box "],
                "code" => "1226",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رومير ليش M/L", "en" => "Leash ROMER  M-L "],
                "code" => "1227",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تيمبر وولف ليش 100 سم", "en" => " TimberWolf  Leash100cm"],
                "code" => "1228",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "يرون ليش L", "en" => " Uraone Leash l"],
                "code" => "1229",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش جلد ", "en" => "Leather Leash"],
                "code" => "1231",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش حديد فوسفوري", "en" => "Nilon Metalic Leash"],
                "code" => "1232",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش دوجنس  ٦٣سم مطاط", "en" => " Elastic Dogness Leash "],
                "code" => "1235",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش سوبريم يد مبطن L", "en" => "Suprium Leash L"],
                "code" => "1238",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش سوبريم يد مبطن M", "en" => "Suprium Leash M"],
                "code" => "1239",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش سوبريم يد مبطن S", "en" => "Suprium Leash S"],
                "code" => "1240",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش سوبريم يد مبطن xl", "en" => " Suprium Leash XL"],
                "code" => "1241",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش قطط  بصديري", "en" => " Cat Harness With Leash"],
                "code" => "1242",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش ماكس  l", "en" => " Max  Leash L"],
                "code" => "1243",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش مضفر بخناقة كبيرة", "en" => " Leash With Dog Choke Coller L "],
                "code" => "1244",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش مضفر صغير بخناقة", "en" => "Leash With Dog Choke Coller S"],
                "code" => "1245",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش مضفر وسط بخناقة", "en" => "Leash With Dog Choke Coller  M"],
                "code" => "1247",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش نايلون l", "en" => "Nilon leash L"],
                "code" => "1248",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تيمبر وولف ليش60  سم", "en" => "TimberWolf  Leash 60 cm"],
                "code" => "1249",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مشط حشرات  صغير", "en" => "Flea Comb"],
                "code" => "1251",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مشط حشرات كهربي", "en" => " Electric Flea Comb "],
                "code" => "1252",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "معيار", "en" => "Food Scoop    "],
                "code" => "1253",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مفرش طعام مستدير", "en" => " Round Coaster "],
                "code" => "1255",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مفرش طعام مستطيل", "en" => "Rectangular Coaster"],
                "code" => "1256",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مقص اظافر", "en" => "Nail Scissors"],
                "code" => "1257",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ملقاط حشرات", "en" => "Flea Tweezers"],
                "code" => "1258",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هارنس حرف T مبطن مقاسM", "en" => "T shaped Harness M"],
                "code" => "1261",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هوك اوتوماتيك ممغنط", "en" => "Magnetic Hook"],
                "code" => "1263",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هوك بيضاوي l", "en" => "Round Hook L "],
                "code" => "1264",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هوك بيضاوي m", "en" => "Round Hook M"],
                "code" => "1265",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هوك بيضاوي xl", "en" => "Round Hook xl"],
                "code" => "1266",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هوك مشبك 1.5 سم", "en" => "Hook 1.5 cm"],
                "code" => "1267",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليش دوجنس  1م  مطاط", "en" => "Elastic Dogness 1 m"],
                "code" => "1306",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جاروف كبير", "en" => "Large Scoup"],
                "code" => "1316",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "عضاضه كوره بحبل", "en" => "Chew Ball With Rope"],
                "code" => "1321",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مقص اظافر صغير", "en" => "Small Nail Scissors"],
                "code" => "1334",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لعبه قطط 3كور", "en" => "3Balls Cat Toy"],
                "code" => "1346",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "stefanplast بوكس رصاصي  ", "en" => "Stefanplast Gulliver 2 delux - gray"],
                "code" => "1348",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "stefanplastربوكس أخضر في أبيض", "en" => "Stefanplast Gulliver travel chic green- gray-white"],
                "code" => "1352",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خناقة سبريم مفتوحة  3م", "en" => "Open Suprium Choke Coller 3mm "],
                "code" => "1414",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خناقه سوبريم ثلاثيه مغلقه3 مللي", "en" => "Triple Closed Suprium Choke Coller 3mm "],
                "code" => "1469",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مودال طوق و ليش مقاس M", "en" => "Modal Coller&Leash  M"],
                "code" => "1480",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كرة  عنكبوت ملونة كبيره", "en" => "Spider Ball L"],
                "code" => "1502",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سرير مستطيل دبل فيس صغير", "en" => "Spider Ball S"],
                "code" => "04-171",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لعبة شكل ذرة", "en" => "Corn Toy"],
                "code" => "04-192",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Stefanplast رمالة  ", "en" => "Stefanplast Cat toilet FURBA CHIC"],
                "code" => "04-202",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خداشة 012", "en" => "scratch 012"],
                "code" => "04-221",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طوق حجم 3", "en" => "collar size3"],
                "code" => "04-247",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "nunbell ليش", "en" => "nunbell leash fld180216"],
                "code" => "04-252",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيت قطه شكل قطه", "en" => "Cat Shaped Cat home"],
                "code" => "04-266",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ديسبنسر شكل مشروم", "en" => "Mushroom Shaped Dispenser"],
                "code" => "04-267",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بلورة اكل وميه", "en" => "Crystal Food &Water Plate"],
                "code" => "04-268",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Pet moda سرير كريسماس 70*55", "en" => "Pet Moda Christmas Bed 70*55"],
                "code" => "04-272",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فرشاه بالبخار", "en" => "Steam Brush "],
                "code" => "04-278",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رماله  بمصفاة", "en" => "Litter Box with Strainer"],
                "code" => "04-279",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فرشاه بخار", "en" => "Steam Brush "],
                "code" => "04-289",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomi طوق كلاب صغير S", "en" => "Naomi Dog Collar  S we-004 "],
                "code" => "04-316",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomiطوق كلاب M", "en" => "Naomi Dog Collar M  we-005"],
                "code" => "04-317",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomi 'طوق كلاب بليش S", "en" => "Naomi Dog Collar  & Leash S we-032"],
                "code" => "04-318",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => " Naomi 'طوق كلاب بليشM", "en" => "Naomi Dog Collar  & Leash M we-033"],
                "code" => "04-319",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomi 'طوق كلاب بسكارف", "en" => "Naomi Scarf collar we-038 "],
                "code" => "04-320",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomi طوق كلاب", "en" => "Naomi collar we-030"],
                "code" => "04-321",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomiطوق قطط بجرس", "en" => "Naomi cat collar with Bell we-039-04"],
                "code" => "04-322",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomi طوق قطط بفيونكه", "en" => "Naomi Bow Cat Collar we-048 "],
                "code" => "04-323",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomiطوق قطط بينك ", "en" => "Naomi Pink Cat Collar we-0 "],
                "code" => "04-324",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomi طوق قطط بيلمع", "en" => "Naomi cat collar we-065 "],
                "code" => "04-325",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomi طوق قطط بجرافته", "en" => "Naomi Tie Cat Coller we-066 "],
                "code" => "04-326",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomi طوق كلاب مشجر صغير", "en" => "Naomi dog collar S we-075 "],
                "code" => "04-328",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomi طوق كلاب مشجر M", "en" => "Naomi dog collar M we-076 "],
                "code" => "04-329",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomi طوق كلاب مشجر L", "en" => "Naomi dog collar L we-077 "],
                "code" => "04-330",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Naomi فرشاه", "en" => " Naomi Brush"],
                "code" => "04-334",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "قارورة و طبق 2*1", "en" => "Bottle &Bowel"],
                "code" => "04-335",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اكالة شكل عضمة صغيرة", "en" => " Small Bone Shaped Plate"],
                "code" => "04-336",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اكالة شكل عضمة كبيرة", "en" => " Medium Bone Shaped Plate"],
                "code" => "04-337",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كرة ملونة بجرس صغيرة", "en" => "Small Coloured Ball with bell"],
                "code" => "04-338",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مشايه امام الرماله L", "en" => "PVC Mat Large"],
                "code" => "04-339",
                "category" => "cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مشط حشرات  بلاستيك", "en" => "Plastic Flea Comb"],
                "code" => "04-340",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "طبق  مياه سيفتي ا لت", "en" => "Saftey Water Plate "],
                "code" => "04-341",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مشايه بفلتر امام الرماله", "en" => "Mat with filter"],
                "code" => "04-342",
                "category" => "cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كرة ملونة بجرس كبيرة", "en" => "Large Coloured Ball with bell"],
                "code" => "04-343",
                "category" => "cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كرة ملونة بجرس وسط", "en" => " Small Coloured Ball with bell"],
                "code" => "04-344",
                "category" => "cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خداشة 023", "en" => "scratch 023"],
                "code" => "04-345",
                "category" => "cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خداشة 014", "en" => "scratch 014"],
                "code" => "04-346",
                "category" => "cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "خداشة 046", "en" => "scratch 046"],
                "code" => "04-347",
                "category" => "cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لعبة دور كور بريشة", "en" => "Cat TOY "],
                "code" => "04-350",
                "category" => "cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "عضاضه", "en" => "Chew Toy"],
                "code" => "04-36",
                "category" => "cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "M شياله قطط Pet Moda", "en" => "Pet Moda Bag carrier M"],
                "code" => "04-56",
                "category" => "cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => " سويت شيرت فرو Pet Moda مقاس 4", "en" => "Pet Moda Fur Hoodie 4"],
                "code" => "04-62",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سويت شيرت فروPet Moda مقاس 6", "en" => "Pet Moda Fur Hoodie 6"],
                "code" => "04-64",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سويت شيرت فروPet Moda مقاس 7 ", "en" => "Pet Moda Fur Hoodie 7"],
                "code" => "04-65",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Pet Modaسويت شيرت  مقاس 2", "en" => "Pet Moda Pawfect Street Wear Hoodie 2"],
                "code" => "04-68",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Pet Moda سويت شيرت مقاس 6", "en" => "Pet Moda Pawfect Street Wear Hoodie 6"],
                "code" => "04-72",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Pet Moda بيت صغير ", "en" => "Pet Moda House S"],
                "code" => "04-74",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "Pet Moda بيت كبير", "en" => " Pet Moda House L"],
                "code" => "04-75",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اسم المنتج بالعربي", "en" => "اسم الصنف"],
                "code" => "كود الصنف",
                "category" => "categry",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فروتي شامبو 500مللي", "en" => "2vets shampoo fruity 500ml"],
                "code" => "8",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فروتي دراي شامبو 150 جرام", "en" => "2vets dry shampoo powder 150gm"],
                "code" => "9",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فروتي فوم شامبو 150 مللي", "en" => "2vets foam shampoo 150ml"],
                "code" => "10",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فروتي فوم شامبو 250 مللي", "en" => "2vets fruity shampoo 2l"],
                "code" => "11",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فروتي منظف الارجل", "en" => "2vets paw cleaning 150ml"],
                "code" => "12",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برفيوم", "en" => "2vets perfume"],
                "code" => "13",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "2 فيت شامبو 250مللي", "en" => "2vets shampoo 250ml"],
                "code" => "14",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ايرومنت سبراي لمنز", "en" => "Airoment home spray"],
                "code" => "16",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سبراي مضاد للحشرات ", "en" => "Amil care cottoncandy antiflea for puppy 1 l"],
                "code" => "42",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سبراي مضاد لحشرات برائحه الفراوله", "en" => "Amil care puppy strawberry cream antiflea 1L"],
                "code" => "43",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سبراي مضاد للحشرات برائحه البطيخ", "en" => "Amil care  watermelon antiflea 1L"],
                "code" => "44",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اميل كير برفيوم", "en" => "Amilcare perfume"],
                "code" => "45",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اميل كير جاما بوبي برائحه الموز", "en" => "Amilcare gamma puppy banana"],
                "code" => "46",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شامبو بارس 250مللي", "en" => "Bars shampoo 250ml"],
                "code" => "66",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بودر معطر لرمله القطط", "en" => "Cat litter deodorant beads"],
                "code" => "162",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شيري لاين برفيوم 120 مللى", "en" => "Cherry line 120 ml"],
                "code" => "189",
                "category" => "Cats/ Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كوفا شامبو مضاد للحشرات", "en" => "Cova Antiflea shampoo125"],
                "code" => "219",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دودزي شامبو مضاد للحشرات 250 ملل", "en" => "Doodzy flea&tick shampoo 250ml"],
                "code" => "277",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دودزي فوم شامبو 250 مللي", "en" => "Doodzy foam250ml"],
                "code" => "278",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ايليت شامبو و شاور جيل 270 مللي", "en" => "Elite complex shampoo &shower gel-shalls 270ml"],
                "code" => "306",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فاست كيور رش للمنزل", "en" => "Fastcure home spray 500ml"],
                "code" => "311",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيبيت دلتاميثرين", "en" => "Fipet deltamethrin"],
                "code" => "321",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "روكسان فوم شامبو 450 مللي", "en" => "Foam Roxxen 450 ml"],
                "code" => "330",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تو فيت شامبو لحساسيه 300 مللي", "en" => "2vets Fruity Antiallergic shampoo 300ml"],
                "code" => "350",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ايودين شامبو 250 مللي", "en" => "Iodine shampoo 250ml"],
                "code" => "419",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بودر معطر لرمله القطط", "en" => "Litter powder kitty,pina,fraise500gm"],
                "code" => "488",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد سبراي مضاد للخربشه", "en" => "Omni gaurd Anti itch spray 125ml"],
                "code" => "614",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد شامبو مضاد للحشرات", "en" => "Omni guard Antiparasitic shampoo 80 ml"],
                "code" => "615",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد سبراي 225 مللي", "en" => "Omni Guard deodorizing pet spray 225 ml"],
                "code" => "619",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد دراي شامبر 200 جرام", "en" => "Omni guard dry shampoo powder 200 gm"],
                "code" => "620",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد دراي شامبو 400 جرام", "en" => "Omni guard dry shampoo powder 400gm"],
                "code" => "621",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد فوم شامبو 250 مللي", "en" => "Omni guard foaming 250 ml"],
                "code" => "624",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد وايبس", "en" => "Omni guard grooming wipes"],
                "code" => "627",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد شامبو ضد القشره 250 ملي", "en" => "Omni guard scalp shampoo 250 ml"],
                "code" => "628",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد شامبو ضد الحشرات 250 مللي", "en" => "Omni guard shampoo antiparasitic 250 ml"],
                "code" => "630",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد وايبس للعين", "en" => "Omniguard eyes wipes red"],
                "code" => "635",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد بودر ضد الحشرات 150 مللي", "en" => "Omniguard blue powder flea and tick150gm"],
                "code" => "637",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد وايبس ضد احشرات", "en" => "Omniguard wipes blue"],
                "code" => "639",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو دراي شامبو 500 جرام", "en" => "Orgo dry shampoo 500g"],
                "code" => "668",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو سبراي تدريب البوبي", "en" => "Orgo puppy trainer spray"],
                "code" => "675",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيتس ريبابك برفيوم", "en" => "Pets Republic perfum sucre,gum,pink 125ml"],
                "code" => "703",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برفيوم 250 مللي", "en" => "Perfum vanilla,pink,tuti,flowerly 250ml"],
                "code" => "704",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيت بوكس دراي شامبو 500 جم", "en" => "Pet box dry shampoo 500gm"],
                "code" => "705",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيتس بارك شامبو 500 مللي", "en" => "Pets Park shampoo 500ml"],
                "code" => "730",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيتس بارك مناديل مبللة للشعر", "en" => "Pets Park teeth finger wipes 50pcs"],
                "code" => "731",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيتس ريبابلك شامبو ضد القشره 500مللي", "en" => "Pets Republic shampoo antidandruff 500ml"],
                "code" => "732",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فوم شامبو 520 مللي", "en" => " Foam shampoo 520 ml"],
                "code" => "747",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بروتكت دراي شامبو 300جرام", "en" => "Protect dry shampoo 300gm"],
                "code" => "781",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بروتكت لاين دراي شامبو 150 جم", "en" => "Protect line dry shampoo powder150gm"],
                "code" => "782",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بروتكت شامبو 250 مللي", "en" => "Protect shampoo 250ml"],
                "code" => "786",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "روكسان شاور جيل 4 لتر", "en" => "Roxxen shower gel 4l"],
                "code" => "812",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "روكسان شاور جيل 500 مللي", "en" => "Roxxen shower gel 500 ml"],
                "code" => "813",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شامبيت فوم شامبو 250 مللي", "en" => "Shampet foam-gel shampoo 250ml"],
                "code" => "887",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تانجي شامبو", "en" => "Tangy Shampoo"],
                "code" => "940",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تيا جولد شامبو 500 مللي", "en" => "Tia gold grooming shampo 500ml"],
                "code" => "944",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيرا شامبو 200 مللي", "en" => "Vera shampoo 200ml"],
                "code" => "964",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "وايت وايبس جلفز", "en" => "White glove wipes 1pcs"],
                "code" => "984",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بروتكت لاين شامبو ضد احشرات 5 يتر", "en" => "Protect line antiflea shampoo 5 litter"],
                "code" => "1422",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شيري لاين برفيوم 1 لتر", "en" => "Cherryline perfume 1 litter"],
                "code" => "1423",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد انتي شو سبراي", "en" => "Omniguard antichew spray"],
                "code" => "1494",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "زويك شامبو 200مللي", "en" => "Zoik shampoo 200 ml"],
                "code" => "1504",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيتس ريبابك فوم شامبو 250 مللي", "en" => "Pets Republic Foam Dry Shampoo 250"],
                "code" => "1505",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فروتي فوم شامبو ضد الفطريات", "en" => "2vets Fruity Antifungal foam"],
                "code" => "04-205",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اسبراي لازاله تشابك الشعر", "en" => "Tangle Remover Spray 250ml"],
                "code" => "04-257",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيتس ريبابلك دراي شامبو 500جم", "en" => "pets republic dry shampoo powdr 500gm"],
                "code" => "04-259",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيتس ريبابلك دراي شامبو 200جم", "en" => "pets republic dry shampoo powdr 200gm"],
                "code" => "04-260",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيتس ريبابك سبراي ضد الخربشه 250 مللي", "en" => "Pets Republic antiscratch 250ml"],
                "code" => "04-262",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيتس ريبابلك سبراي للعنايه باقدم 250 مللي", "en" => "Pets Republic pawcare250ml"],
                "code" => "04-263",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => " فروتي شامبو 4 لتر", "en" => "Fruity shampoo 4 lL"],
                "code" => "04-306",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اليف طعام جاف لقطط البالغه 1 كجم", "en" => "Aleef adult 1kg"],
                "code" => "17",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اليف طعام جاف لقطط البالغه 20 كجم", "en" => "Aleef adult cats 20 kg"],
                "code" => "18",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "الفا طعام جاف لقطط 4 كجم", "en" => "Alpha cat 4kg"],
                "code" => "25",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "الفا طعام جاف للكلاب 20 كجم", "en" => "Alpha puppies 20kg"],
                "code" => "26",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ارتو طعام جاف للكلاب بطعم الحم البقري 20 كجم", "en" => "Artu beef dog dry food 20 kg"],
                "code" => "60",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ارتو طعام جاف للكلاب بطعم الدجاج  20 كجم", "en" => "Artu chicken dog dry food 20 kg"],
                "code" => "61",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيلكاندو جونيور ماكس 12.5 كجم", "en" => "Belcando maxi junior 12.5"],
                "code" => "71",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيوي مكس 5 كجم", "en" => "Bewi 3mix 5kg"],
                "code" => "94",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيوي ديليكيت بطعم الدجاج 5 كجم", "en" => "Bewi delicate chicken 5kg"],
                "code" => "97",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيوي بطعم الدجاج 5 كجم", "en" => "Bewi poultry 5kg"],
                "code" => "100",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيوي مكس اطعم 10 كجم", "en" => "Bewie mix 10kg"],
                "code" => "102",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيوي مكس اطعم 20 كجم", "en" => "Bewie mix/ poultry /fish 20kg"],
                "code" => "103",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيوي ديليكيت 20 كجم", "en" => "Bewii delicate 20kg"],
                "code" => "104",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بونا كيبو لقطط الصغيره 1.5 كجم ", "en" => "Bona cibo 1.5 kitten"],
                "code" => "114",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كومبي طعام لقطط 10 كجم", "en" => "Compy cat dryfood 10kg"],
                "code" => "217",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ديكاتو طعام للقطط 10 كجم", "en" => "Decato cat 10 kg"],
                "code" => "226",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دوج & دوج 10كجم", "en" => "Dog &Dog 10kg"],
                "code" => "237",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دودزي برميوم لقطط 1 كجم", "en" => "Doodzy cat  premium 1kg"],
                "code" => "265",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دودزي كلاسيك للقطط 1 كجم", "en" => "Doodzy cat classico1kg"],
                "code" => "266",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دودزي سوبر برميوم للقطط 1 كجم", "en" => "Doodzy cat super premium 1kg"],
                "code" => "271",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دودزي للكلاب الكبيره 5 كجم", "en" => "Doodzy dog adult 5 kg"],
                "code" => "274",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دودزي للكلاب الصغيره 15 كجم", "en" => "Doodzy dog junior 15 kg"],
                "code" => "275",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ديرموز للقطط ابالغه 15 كجم", "en" => "Dormeos feline adult cat 15kg"],
                "code" => "281",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ايكوفارم للقطط البالغه 1 كجم", "en" => "Ecofarm cat adult 1kg"],
                "code" => "300",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جيمون للكلاب الكبيره 20 كجم", "en" => "Gemon adult dog regular dry food 20 kg"],
                "code" => "361",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جيمون طعام جاف للقطط ابالغه بطعم الدجاج و الديك الرومي 2 كجم", "en" => "Gemon chicken and turkey adult cat  dry2kg"],
                "code" => "364",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جيمون طعام جاف للقطط الصغيره بطعم الدجاج و الارز 2 كجم", "en" => "Gemon kitten chicken with rice dry food 2 kg"],
                "code" => "367",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جيمون طعام جاف لكلاب الصغيره 20 كجم", "en" => "Gemon PuppyJunior dog20 kg"],
                "code" => "371",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هابي كات قطط المتعقمه 10 كجم", "en" => "Happy cat sterilized 10kg"],
                "code" => "398",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هابي كات طعام لعلاج مشاكل الجهاز البولي 1.5 كجم", "en" => "Happy cat urinary 1.5 kg"],
                "code" => "401",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جوسي كات بطعم الدجاج 18 كجم", "en" => "Josi Cat Poultry 18 kg"],
                "code" => "426",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جوسي سوليدو دوج 15 كجم", "en" => "Josi Solido Dog 15kg (green)"],
                "code" => "429",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كي نين جستروانتستينال 2 كجم", "en" => "K9 Gastrointestinal 2kg"],
                "code" => "435",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كي نين للقطط المتعقمه 2 كجم", "en" => "K9 Sterilized Feline 2kg"],
                "code" => "441",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كي نين للقطط للعنايه بالجهاز البولي 2 كجم", "en" => "K9 Urinary Care Feline 2kg"],
                "code" => "443",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كي نين للقطط للعنايه بالجهاز البولي 2 كجم", "en" => "K9 Urinary S\O Feline 2kg"],
                "code" => "446",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كوكا باتي لكلاب البالغه 15 كجم", "en" => "Koca Pati Dog Adult 15kg"],
                "code" => "466",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كوكا باتي لكلاب البالغه 15 كجم (عالي الطاقه )", "en" => "Koca Pati Dog Adult 15kg High Energy(green)"],
                "code" => "467",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كوكا باتي دوج للكلاب الصغيره 15 كجم", "en" => "koca Pati Dog Puppy15kg (orange)"],
                "code" => "468",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليجندز قطط البالغه 3 كجم", "en" => "Legends Adult Cat Dry 3kg"],
                "code" => "475",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليجندز للقطط الصغيره 3 كجم", "en" => "Legends Kitten Dry 3kg"],
                "code" => "479",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليجندز للكلاب الصغيره 5 كجم", "en" => "Legends Puppy Dog Dry 5kg"],
                "code" => "480",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليوناردو بطعم البط 7.5 كجم", "en" => "Leonardo Duck 7.5kg"],
                "code" => "485",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليوناردو للقطط الصغيره 7.5 كجم", "en" => "Leonardo Kitten 7.5kg"],
                "code" => "486",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ميرا كلاسيك قطط 20 كجم", "en" => "Mera Cat Classic 20 kg"],
                "code" => "504",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ميجما قطط 20 كجم", "en" => "Migma Cat 20kg"],
                "code" => "522",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ميجما دوج للكلاب البالغه 20 كجم", "en" => "Migma Dog adult 20kg"],
                "code" => "523",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ميتو للقطط البالغه 15 كجم", "en" => "Mito Adult Cat 15 kg"],
                "code" => "527",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ميتو ميكس 15 كجم", "en" => "Mito Mix15kg"],
                "code" => "528",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مونج سوبر برميوم للكلاب البالغه 3 كجم", "en" => "Monge Super Premium Adult Dog Dry Food 3 kg"],
                "code" => "535",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "موستاش تريس للقطط 20 كجم", "en" => "Moustache Tris Cat Dry Food 20 kg"],
                "code" => "554",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مستر بين للقطط 10 كجم", "en" => "Mr Bean Dry Food Cat 10kg"],
                "code" => "556",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ماي دير قطط 1.5 كجم", "en" => "My Dear Cat Dry Food 1.5kg"],
                "code" => "565",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ماي دير 8 كجم", "en" => "My Dear 8kg"],
                "code" => "566",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نيوترنوفا قطط 20 كجم", "en" => "Nutrinova Cat 20kg"],
                "code" => "606",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "وان & وان دوج ميني 1 كجم", "en" => "One and OnlyDog Adult Mini Turkey1 kg"],
                "code" => "643",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوشا كات 20 كجم", "en" => "Osha Cat Dry Food 20kg"],
                "code" => "679",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوزو كات 10 كجم", "en" => "Ozzo Cat Adult 10kg"],
                "code" => "682",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوزو دوج 4 كجم", "en" => "Ozzo Dog Adult 4kg"],
                "code" => "686",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوزو كيتين 1 كجم", "en" => "Ozzo Kitten 1kg"],
                "code" => "688",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوزو كيتين 4 كجم", "en" => "Ozzo Kitten 4kg"],
                "code" => "689",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوزو بابي 15 كجم ", "en" => "Ozzo Puppy 15kg"],
                "code" => "690",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوزو بابي 4 كجم", "en" => "Ozzo Puppy 4kg"],
                "code" => "692",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "باور كات قطط باغه 10 كجم", "en" => "Pawer Cat Adult 10kg"],
                "code" => "698",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو ليو كيتين", "en" => "Pro Leo Kitten"],
                "code" => "763",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو بيرفورمانس كلاسيك 20 كجم", "en" => "Pro Performance Classic 2kg"],
                "code" => "764",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو فورمانس ايندور 2 كجم", "en" => "Pro Performance Indoor 2kg"],
                "code" => "765",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو فورمانس مازر & بيبي 2 كجم بطعم السلامون", "en" => "Pro Performance Mother &Baby Salamon 2kg"],
                "code" => "767",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين كالم قطط 2 كجم ", "en" => "Royal Canin Calm Feline 2 kg"],
                "code" => "815",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين قطط للعنايه بالجهاز الهضمي 2 كجم", "en" => "Royal Canin Digestive Care Feline 2kg"],
                "code" => "817",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين للقطط الصغيره 4 كجم ", "en" => "Royal Canin Feline Kitten  4kg"],
                "code" => "819",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين للقطط 10 كجم ", "en" => "Royal Canin Feline  Indoor 10 kg"],
                "code" => "820",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانيين عنايه بالجهاز الهضمي قطط 2 كجم ", "en" => "Royal Canin Gastro Intestinal Feline 2kg"],
                "code" => "824",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين ميني كاب البالغه 2 كجم", "en" => "Royal Canin  Mini Adult 4 kg"],
                "code" => "846",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانيين للعنايه بالكلي 2 كجم", "en" => "Royal Canin Renal Feline 2 kg"],
                "code" => "851",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانيين للعنايه بالجهاز بالبولي  2 كجم", "en" => "Royal Canin Urinary Care 2 kg"],
                "code" => "857",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانيين للعنايه بالجهاز بالبولي  2 كجم", "en" => "Royal Canin Urinary S\O Feline 1.5 kg"],
                "code" => "859",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيمبا للقطط البالغه 300 جرام", "en" => "Simba Adult 300 gm"],
                "code" => "891",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيمبا ميكس للقطط 300 جرام", "en" => "Simba Mix 300gm"],
                "code" => "898",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيمبا لقطط المتعقمه 300 جرام", "en" => "Simba Sterilized 300gm"],
                "code" => "899",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سوبر كانيدو للكلاب الصغيره 10 كجم", "en" => "Super Kanedoo Puppy 10kg"],
                "code" => "936",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سوبر كانيدو للقطط 20 كجم", "en" => "Super Kanedo cat 20kg"],
                "code" => "937",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تيد بيت لقطط 10 كجم", "en" => "Tidbet Cat Dry Cockail 10kg"],
                "code" => "947",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "زي كات 1.5 كجم", "en" => "Zee Cat  Dry Food 1.5kg"],
                "code" => "992",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيرباك للقطط لجهاز البولي 1.5 كجم", "en" => "Virbac Cat Urology1.5kg"],
                "code" => "1269",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيرباك للقطط للعنايه بالجهاز الهضمي  1.5 كجم", "en" => "Virbac Cat Digestive1.5kg"],
                "code" => "1270",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيرباك لقطط مرضي السكر 1.5 كجم", "en" => "Virbac Cat weight loss&diabetes1.5kg"],
                "code" => "1271",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيرباك كلاب لدعم الجهاز الهضمي 3 كجم", "en" => "Virbac Dog Digestive Support 3kg"],
                "code" => "1272",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيرباك طعام جاف للكلاب للحساسيه بالسمك", "en" => "Virbac Dog Hypoallergy Hydrolysed Fish Protien 3kg"],
                "code" => "1274",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيرباك كلاب لدعم الكلي 3 كجم", "en" => "Virbac Dog Kidney Support  3kg"],
                "code" => "1277",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوزو بابي 1 كجم", "en" => "Ozzo Puppy 1 kg"],
                "code" => "1294",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيرباك كلاب للمشاكل الجلديه 3 كجم", "en" => "Virbac Dog Dermatology 3kg"],
                "code" => "1300",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جوسي كيتين 2 كجم", "en" => "Josi Kitten  2 kg"],
                "code" => "1381",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوزو دوج 1 كجم", "en" => "Ozzo Dog Adult 1kg"],
                "code" => "1405",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ميرا اكسكلوسيف للكلاب البالغه 15 كجم", "en" => "Mera Dog Active 15 kg Exklusive"],
                "code" => "1461",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ميتشو للقطط البالغه 15 كجم", "en" => "Micho cat Adult 15 kg"],
                "code" => "1462",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هابي كات مينكس 10 كجم", "en" => "Happy Cat Minks  10kg"],
                "code" => "1470",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هوج دوج 20 كجم", "en" => "Hug dog 20 kg"],
                "code" => "1491",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كيكي بارتي فيستيفال 10 كجم ", "en" => "Keke Party Fiesta 10kg"],
                "code" => "04-1",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليجندز قطط البالغه 10 كجم", "en" => "Legends Adult Cat10kg"],
                "code" => "04-103",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليجندز كلاب كبيره 10 كجم ", "en" => "Legends Adult Dog10kg"],
                "code" => "04-104",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليوناردو 15 كجم", "en" => "Leonardo 15 kg"],
                "code" => "04-105",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مونج سوبر برميوم للكلاب البالغه 15 كجم", "en" => "Monge Adult Dog Super Premium 15kg"],
                "code" => "04-109",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مونج سوبر برميوم كلاب صغيره 15 كجم ", "en" => "Monge Super Premium Puppy&Junior 15kg"],
                "code" => "04-110",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ناتشورال ترانير طعام قطط بطعم الفراخ 10 كجم", "en" => "Natural Trainer Chicken Cat10kg"],
                "code" => "04-111",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نترنوفا كلاب كبيره 20 كجم ", "en" => "Nutrinova Adult Dog 20kg"],
                "code" => "04-113",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "وان اند اونلي كلاب بطعم البط 12 كجم ", "en" => "One&Only Dog Duck 12kg"],
                "code" => "04-114",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "وان اند اونلي قطط صغيره بطعم الديك الرومي و الارز 2 كجم", "en" => "One&Only Kitten Turkey,Rice 2kg"],
                "code" => "04-115",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوزو كلاب 15 كجم", "en" => "Ozzo Dog Adult15kg"],
                "code" => "04-119",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شقو دوج 20 كجم ", "en" => "Shiqow Dog 20kg"],
                "code" => "04-122",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيتا داي قطط 20 كجم ", "en" => "Vita day Cat 20kg"],
                "code" => "04-127",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "قيتا داي للقطط المتعقمه 10 كجم ", "en" => "Vitaday Sterilized10kg"],
                "code" => "04-130",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "باي كارت نيوتري بيست صغيره 15 كجم", "en" => "Picart Nutribest Puppy15kg"],
                "code" => "04-133",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين للحساسيه 8 كجم", "en" => "Royal Canin Anallergenic 8kg"],
                "code" => "04-135",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين للقطط الشيرازي 10 كجم ", "en" => "Royal Canin Persian 10kg"],
                "code" => "04-138",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين S/O 7كجم", "en" => "Royal urinary s/o 7kg"],
                "code" => "04-140",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيتا ستا قطط 10 كجم", "en" => "Vet star cat10kg"],
                "code" => "04-141",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو بلان للجراوي بطعم الدجاج 3 كجم", "en" => "Proplan Puppy Chicken 3kg"],
                "code" => "04-177",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو بلان للكلاب البالغه المعقمه بطعم الدجاج 14 كجم", "en" => "Proplan adult dog sterilized chicken 14kg"],
                "code" => "04-179",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ريفليكس قطط 15 كجم", "en" => "Reflix cat 15 kg"],
                "code" => "04-18",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "يرو بلان للقطط البالغه بطعم السالمون 15 كجم", "en" => "Proplan vital functions adult cats salmon 1.5kg"],
                "code" => "04-180",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو بلان قطط لتنظيم السمنه 1ز5 كجم", "en" => "Proplan cats obesity managment 1.5kg"],
                "code" => "04-181",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو بلان للكلاب البالغه بطعم الدجاج 14 كجم", "en" => "Proplan Adult Dog Large Athletic 14kg"],
                "code" => "04-182",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو بان لايت للكاب المعقمه 3 كجم", "en" => "Proplan Light Sterilized Dog all sizes 3kg"],
                "code" => "04-184",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو بلان للكلاب للجلد الحساس بطعم السالمون 3 كجم", "en" => "Proplan Medium Adult Dog Sensitive Skin Salmon 3kg"],
                "code" => "04-187",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو بلان قطط للعنايه بالكلي بطعم الدجاج 1ز5 كجم", "en" => "Proplan Cat Renal Plus Chicken 1.5kg"],
                "code" => "04-188",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو بلان للكلاب البالغه للعنايه بالجهاز البولي 3 كجم", "en" => "Proplan Adult Dog Urinary 3kg"],
                "code" => "04-190",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين للعنايه بالكلي 2 كجم", "en" => "Royal Canin Dog Renal 2kg"],
                "code" => "04-206",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيربو 1 كجم", "en" => "Birbo 1kg"],
                "code" => "04-214",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بلاكي 20 كجم", "en" => "Blacky 20kg"],
                "code" => "04-215",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيزار كات 1 كجم", "en" => "Cezar Cat 1kg"],
                "code" => "04-218",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "وان اند اونلي لجميع الفصائل بطعم الديك الرومي 3 كجم", "en" => "One&Only all breed turkey 3kg"],
                "code" => "04-225",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين قطط للعنايه بالاسنان 2 كجم", "en" => "Royal Canin Dental Feline2kg"],
                "code" => "04-254",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليوناردو قطط بطعم السمك 15 كجم", "en" => "Leonardo Adult Fish 15 kg"],
                "code" => "04-298",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيوي قطط مكس 1كجم", "en" => "Bewi Cat 3 mix 1 kg"],
                "code" => "04-299",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ميجما كلاب 2.8 كجم", "en" => "Migma Dog Adult 2.8kg"],
                "code" => "04-301",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين للعنايه بالجهاز البولي 4 كجم", "en" => "Royal Canin Urinary Care 4 kg"],
                "code" => "04-309",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين  3.5 كجم S/O", "en" => "Royal Canin Urinary S/O 3.5kg"],
                "code" => "04-310",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو برفورمانس للقطط المعقمه بطعم السلمون ة اللحم الضاني 2 كجم", "en" => "Pro Performance Cat Steralized  Salmon & Lamb 2 kg"],
                "code" => "04-40",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين لل كلاب البالغه 4 كجم", "en" => "Royal Canin Medium Adult 4kg"],
                "code" => "04-45",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "موراندو كلاب 15 كجم", "en" => "Morando Dog 15kg"],
                "code" => "04-54",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "الييف كلاب 20 كجم", "en" => "Aleef dog 20kg"],
                "code" => "04-77",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ارتي فاكت 20 كجم", "en" => "Artifact 20kg"],
                "code" => "04-79",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيوي ديليكت 10 كجم", "en" => "Bewie Delicate10kg"],
                "code" => "04-80",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيوي بطعم السمك 10 كجم", "en" => "Bewie Fish10kg"],
                "code" => "04-81",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيوي بطعم الدجاج 10 كجم", "en" => "Bewi Poultry10kg"],
                "code" => "04-82",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كاسيتا قطط 10 كجم", "en" => "Casitas Cat10kg"],
                "code" => "04-83",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دودزي كات برميوم 15 كجم", "en" => "Doodzy Cat Premium15kg"],
                "code" => "04-90",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دودزي كلاسيكو قطط 20 كجم", "en" => "Doodzy Clssico Cat 20kg"],
                "code" => "04-92",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فريسكس قطط 7.5 كجم", "en" => "Friskies Cat7.5kg"],
                "code" => "04-94",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جيمون قطط بطعم الدجاج و الديك الرومي 20 كجم", "en" => "Gemon Cat Chicken&Turkey20kg"],
                "code" => "04-95",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جيمون دوج برفورمانس 20 كجم", "en" => "Gemon Dog Performance 20kg"],
                "code" => "04-96",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هابي كات يورينري 10 كجم", "en" => "Happy Cat Urinary 10kg"],
                "code" => "04-97",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جوسي كات للقطط المعقمه 10 كجم", "en" => "Josi Cat Steralized10kg"],
                "code" => "04-98",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جوسي كيتين 10 كجم", "en" => "Josi Kitten10kg"],
                "code" => "04-99",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اسم المنتج بالعربي", "en" => "اسم الصنف"],
                "code" => "كود الصنف",
                "category" => "Categry",
                "price" => 0
            ],
            [
                "name" => ["ar" => "الونزو سيست 50 مللي", "en" => "Alonzo Cyst 50 ml"],
                "code" => "28",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "الونزو هير 50 مللي", "en" => "Alonzo Hair 50ml"],
                "code" => "29",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "الونزو اميونتي 50 مللي", "en" => "Alonzo Immunity 50ml"],
                "code" => "31",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "الونزو زوينت 100مللي", "en" => "Alonzo Joint 100ml"],
                "code" => "32",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "الونزو زوينت 150مللي", "en" => "Alonzo Joint 50ml"],
                "code" => "33",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "الونزو مالتي فيتامين 50 مللي", "en" => "Alonzo Multivitamin 50ml"],
                "code" => "34",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيوتي كات 30 مللي", "en" => "Beauty Cat 30ml"],
                "code" => "67",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كات تشوبس 5 جم", "en" => "Cat Choice 5gm"],
                "code" => "159",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لعبه كره بها كات نيب ", "en" => "Catnip Ball Toy"],
                "code" => "171",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كات نيب بالنعناع 5 جم", "en" => "Catnip Mint 5g"],
                "code" => "172",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "زيت كبد الحوت", "en" => "Cod Liver Oil"],
                "code" => "207",
                "category" => "Cats\Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كومبلفيت", "en" => "Complivit"],
                "code" => "215",
                "category" => "Cats\Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => " اصابع كوشيدا & تيستي ", "en" => "Coshida and Tasty Sticks"],
                "code" => "218",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "عظم دودزي 3 قطع", "en" => "Doodzy Bone 3pcs"],
                "code" => "264",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دريميز بطعم  البط 60 جم", "en" => "Dreamies Duck 60gm"],
                "code" => "283",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دريميز بطعم  اللحم البقري و الجبنه 60 جم", "en" => "Dreamies Meat &Cheese 60gm"],
                "code" => "284",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "انزوينت 100قرص", "en" => "Enjoynt 100 Tablets"],
                "code" => "308",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيليكس 200جم", "en" => "Felix Treats 200gm"],
                "code" => "315",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جلوتاماكس فورت 120 قرص", "en" => "Glutamax Forte (Liver Support) 120Tab"],
                "code" => "379",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جرو جارد100مللي", "en" => "Grow Guard 100ml"],
                "code" => "391",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "PTI هيباتون 100مللي", "en" => "Hpatone PTI 100ml"],
                "code" => "410",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اميونو ماكس 100 مللي", "en" => "Immuno Max 100ml"],
                "code" => "418",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ايكسيرا تريتس", "en" => "Ixira Treats"],
                "code" => "423",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كي ناين كات نيب 60 جم", "en" => "K9 Catnip Cat Treats 60gm"],
                "code" => "432",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كي ناين جاج بلس  للكلاب 80 جم", "en" => "K9 GaG Plus Dog Treats 80gm"],
                "code" => "434",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كي نين لمنع تكون كرات الشعر 60 جم", "en" => "K9 Hairball Cat Treats 60gm"],
                "code" => "439",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كي نين للعنايه بالشعر و الجلد 60 جم", "en" => "K9 Skin&Coat Cat Treats 60gm"],
                "code" => "440",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كونج دينتال ستيك  M", "en" => "Kong Dental Stick Medium"],
                "code" => "470",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لعبه علي شكل افوكادو بها كات نيب ", "en" => "Large Catnip Avocado Toy"],
                "code" => "473",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بسكويت ميجما بطعم الفراخ 400 جم", "en" => "Migma Biscuits Chicken 400gm Treats"],
                "code" => "520",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ميني ستيك كات نيب", "en" => "Mini Sticky Catnip"],
                "code" => "524",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مالتي بلس 100 مللي", "en" => "Multi plus 100 ml"],
                "code" => "557",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مانشيز بطعم الدجاج و الخضروات", "en" => "Munchies 100gm 45gm Vegetables &Chicken"],
                "code" => "559",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميجا بس روكسان ", "en" => "Omega Plus Roxxen"],
                "code" => "612",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني بي كومبلكس 100 مللي", "en" => "Omni Bcomp 100ml"],
                "code" => "613",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو للقطط البالغه بطعم الدجاج و الارز", "en" => "Orgo - Adult Chicken & Rice - 500g"],
                "code" => "661",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو 7 دايز للقطط", "en" => "Orgo 7Days Cats"],
                "code" => "665",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو فارم 270 جم", "en" => "Orgo Farm Treats 270gm"],
                "code" => "669",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بسكويت اورجو للجراوي 150 جم", "en" => "Orgo Organic Biscits Puppy 150gm"],
                "code" => "671",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو بارتي ميكس 1 كجم", "en" => "Orgo Party Mix Treats 1kg"],
                "code" => "672",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو بيلو للقطط بطعم السمك 80 جم", "en" => "Orgo Pillow Cat-Fish 80gm"],
                "code" => "673",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيين بيت سناكس ", "en" => "Peien Pet Snacks"],
                "code" => "700",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيتي برو", "en" => "Peti Pro 50g"],
                "code" => "727",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برميجومعجون للقطط 30 مللي", "en" => "Primigo Cat A-Z Plus Paste 30ml"],
                "code" => "754",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برميجو لكلاب 60 قرص", "en" => "Primigo Dog  A-Z  Plus 60 Tab"],
                "code" => "758",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برميجو معجون للكلاب60 مللي", "en" => "Primigo Dog  A-Z Plus Paste 60ml"],
                "code" => "759",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برميجو دوج 60 قرص", "en" => "Primigo Dog Senior 60 Tabs"],
                "code" => "761",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ريلفكس هابي اور بطعم الدجاج و الجبن", "en" => "Reflex Happy Hour Choosy ( Chicken + Cheese)"],
                "code" => "797",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ريلفكس هابي اور بطعم الدجاج و التوت", "en" => "Reflex Happy Hour Urinary  (Chicken + Blue Berry)"],
                "code" => "798",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كرنش سناكي", "en" => "Snacky Crunch Treats"],
                "code" => "909",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "توربينو 125 مللي", "en" => "Turbino 125ml"],
                "code" => "956",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تربينو 30 مللي", "en" => "Turbino 30ml"],
                "code" => "957",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "يونيتابس ستيري كات 120 قرص", "en" => "Unitabs Steril Cat 120 Tabs"],
                "code" => "961",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيتوي 100 مللي", "en" => "Vetoy 100ml"],
                "code" => "966",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اصابع فيتا ماكس للكلاب بطعم اللحم و الدجاج", "en" => "Vita Max Sticks for Dogs Beef and Chicken"],
                "code" => "973",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيتارا 30 مللي", "en" => "Vitara 30ml Solution"],
                "code" => "978",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيتا زنك كلاب 125 مللي", "en" => "Vita Zinc Dogs 125 ml"],
                "code" => "980",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "وانبي كريمي ترييتس ", "en" => "Wanpy Creamy Treats"],
                "code" => "981",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "روكسان بيت صوص 100 جم", "en" => "Roxxen Pet Sauce100gm"],
                "code" => "1477",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دريميز مكس سمك و جبن ", "en" => "Dreamies Mix Fish &Cheese Treats 60gm"],
                "code" => "04-168",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ويسكس تريتس", "en" => "Wiskas Treats 60gm"],
                "code" => "04-169",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كريمي تريتس", "en" => "Cat Creamy Treats"],
                "code" => "04-199",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => " معجون بينتيفيتال انتي هير بول ", "en" => "Bentifital Anti Hairball Paste"],
                "code" => "04-207",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => " معجون بينتيفيتال ستيريل 30 جم", "en" => "Benifital Sterile Paste 30gm"],
                "code" => "04-208",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "عظم فيتا ماكس بطعم الدجاج و اللحم و الكبده", "en" => "Vita Max Bone Buff Chicken,Beef,Liver"],
                "code" => "04-21",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو بطعم الديك الرومي و الارز", "en" => "Orgo - Adult Turkey & Rice - 500g"],
                "code" => "04-219",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو بيلو للقطط بطعم اللحم البقري 80 جم", "en" => "Orgo Pillow Cat-Beef 80gm"],
                "code" => "04-24",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو بيلو للقطط بطعم  الدجاج 80 جم", "en" => "Orgo Pillow Cat Chicken 80gm"],
                "code" => "04-25",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "زيت سالمون 250 مللي", "en" => "Salmon Oil 250ml"],
                "code" => "04-258",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو بيلو للقطط بطعم الكبده 80 جم", "en" => "Orgo Pillow Treat Cat Liver"],
                "code" => "04-269",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو 7 دايز لكلاب", "en" => "Orgo 7days Dogs"],
                "code" => "04-281",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "عظم مانتيز 45 جم", "en" => "Munchies Bone 45gm"],
                "code" => "04-288",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "عظم اورجو للكلاب للعنايه بالفم و الاسنان 2 قطعه", "en" => "Orgo Bones for Dog Dental & Oral Care 2 pcs"],
                "code" => "04-304",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "عظم اورجو للكلاب للعنايه بالفم و الاسنان1 قطعه", "en" => "Orgo Bones for Dog Dental & Oral Care 1 pcs"],
                "code" => "04-305",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اورجو ميتي ستيكس ", "en" => "Orgo Meaty Sticks"],
                "code" => "04-313",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دودزي كات 80 جم", "en" => "Doodzy Treats Cat  80 gm"],
                "code" => "04-314",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "وانبي تريتس 80 جم", "en" => "Wanpy Oven- Roasted Treats 80 gm"],
                "code" => "04-46",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كوفا هيباتو 60 مللي", "en" => "Cova Hepato 60ml"],
                "code" => "04-50",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اسم الصنف بالعربي", "en" => "اسم الصنف"],
                "code" => "كود الصنف",
                "category" => "Categry",
                "price" => 0
            ],
            [
                "name" => ["ar" => "انيبراتيل ", "en" => "Aniprantel cat tab"],
                "code" => "52",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "انيبرازول", "en" => "Aniprazol tab"],
                "code" => "53",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ابوكويل 16 ملليجرام", "en" => "Apoquel fct 16mg"],
                "code" => "54",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ابوكويل 3.6 ملليجرام", "en" => "Apoquel fct 3.6mg"],
                "code" => "55",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ابوكويل 5.4 مليجرام", "en" => "Apoquel fct 5.4mg"],
                "code" => "56",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بارس كلاب", "en" => "Bars Dog"],
                "code" => "65",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برافيكتو 20:40 كجم", "en" => "Bravecto 1000mg (20-40"],
                "code" => "119",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برافيكتو >40 كجم", "en" => "Bravecto 1400mg (>40-"],
                "code" => "120",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برافيكتو 4.5 :10 كجم", "en" => "Bravecto 250ml (>4.5-10kg)"],
                "code" => "121",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برافيكتو 10:20 كجم", "en" => "Bravecto 500ml (>10-20kg)"],
                "code" => "125",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كليني اورال سبراي 100 مللي", "en" => "Cliny Oral Spray 100ml"],
                "code" => "200",
                "category" => "Dogs/Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كوفا سبراي", "en" => "Cova Spray Lavender Spray"],
                "code" => "222",
                "category" => "Dogs/Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ديهنيل كات", "en" => "Dehinel Cat tab"],
                "code" => "230",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ديهنيل بلس دوج", "en" => "Dehinel Plus Dog tab"],
                "code" => "231",
                "category" => "Dogs ",
                "price" => 0
            ],
            [
                "name" => ["ar" => "درونتال قطط", "en" => "Drontal Plus Cats"],
                "code" => "290",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "افيتيكس كلاب 40:60 كجم", "en" => "Effitix Dgs 40-60 kg"],
                "code" => "304",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ايفاتراي", "en" => "Evatri"],
                "code" => "309",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فاست كيور سبراي 50 مللي", "en" => "Fastcure Spray 50ml"],
                "code" => "313",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيرو سبراي ضد الحشرات و القراد 35 مللي", "en" => "Fero Antiflea&Tick Spray 35ml"],
                "code" => "319",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيبيت بس كلاب", "en" => "Fipet Plus Dog"],
                "code" => "322",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيبرولنت", "en" => "Fiprolent 30ml"],
                "code" => "323",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيبرولنت سبراي 60 مللي", "en" => "Fiprolent Spray 60ml"],
                "code" => "324",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فرونت لاين قطط", "en" => "Frontline Combo (Cat)"],
                "code" => "345",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جوبلوت سبراي للفطريات", "en" => "Goblot Anti Fungal Spray"],
                "code" => "381",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هير باك سبراي 60 مللي", "en" => "Hair Back For Dogs&Cats 60ml"],
                "code" => "392",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نيكس جارد 25:50 كجم", "en" => "Nexgard  25-50kg"],
                "code" => "576",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد ضد القشره 125 مللي", "en" => "Omni Guard Dandex 125 ml"],
                "code" => "616",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد ضد القشره 30 مللي", "en" => "Omni Guard Dandex 30 ml"],
                "code" => "618",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد نقط للاذن 15 مللي", "en" => "Omni Guard Ear Mites Drops 15 ml"],
                "code" => "622",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد سبراي للمنزل ضد الحشرات 500 مللي", "en" => "Omni Guard Flea&Tick Home Spray 500 ml"],
                "code" => "623",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اوميني جارد معطر للفم 120 مللي", "en" => "Omni Guard Fresh Breath Solution 120ml"],
                "code" => "626",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برازيتاب", "en" => "Prazitap"],
                "code" => "749",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيتي اي للفطريات", "en" => "PTI Fungnil"],
                "code" => "787",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ريفليوشن 120 ملليجرام", "en" => "Revolution 12% 120 mg red"],
                "code" => "802",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رييفليوشن 240 ملليجرام", "en" => "Revolution 12% 240 mg green"],
                "code" => "803",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رينجو سبراي", "en" => "Ringoo Spray"],
                "code" => "810",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيف لاين كلاب 40 كجم", "en" => "Safeline Dog Spot on 40kg"],
                "code" => "866",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيف لاين 20:40 كجم", "en" => "Safeline Spot on 20-40kg"],
                "code" => "867",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيف لاين سبراي قطط 40 مللي", "en" => "Safeline Spray Cat 40ml"],
                "code" => "868",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيف لاين سبراي 120 مللي", "en" => "Safeline Spray Dog& Cat 120ml"],
                "code" => "869",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سافرو سبراي 50 مللي", "en" => "Savro Spray 50ml Cat&Puppy"],
                "code" => "872",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سافرو سبراي كلاب", "en" => "Savro Spray for Dog 50ml"],
                "code" => "873",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيلافورت 45  ملليجرام", "en" => "Selafort 45 mg Cats"],
                "code" => "882",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيمباريكا 10:20كجرام", "en" => "Simparica Trio 10-20kg"],
                "code" => "900",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيمباريكا 20:40 كجم", "en" => "Simparica Trio20-40kg"],
                "code" => "902",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سينوكوين >25 كجم", "en" => "Synoquin Large Breed >25"],
                "code" => "939",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تيا جولد سبراي للحشرات 60 مللي", "en" => "Ttia Gold Flea&Tick Spray 60ml"],
                "code" => "943",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اتكوانتينال", "en" => "Atcoanthenal"],
                "code" => "1339",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "درونتال بس كلاب", "en" => "Drontal Plus Dog 6tab"],
                "code" => "1498",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فرونت لاين 20:40 كجم", "en" => "Front Line Combo l 2.68ml 20-40kg"],
                "code" => "1499",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فرونت لاين >40 كجم", "en" => "Front Line Combo Xl over 40kg"],
                "code" => "1500",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ريفيلوشن 45 مليجرام", "en" => "Revolution 6% 45mg Blue Cat"],
                "code" => "04-162",
                "category" => "Cats ",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ادويزو سبراي", "en" => "Adwizile Spray1% 100ml"],
                "code" => "04-191",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيبيست قطط", "en" => "Fypryst Cat Spot On"],
                "code" => "04-193",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيبيست سبراي", "en" => "Fypryst Spray"],
                "code" => "04-194",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيمباريكا 2.5 :5 كجم", "en" => "Simparica Ttrio 2.5_5kg"],
                "code" => "04-201",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بارس قطط", "en" => "Bars Cat"],
                "code" => "04-223",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فلي اواي", "en" => "Fleaway Small"],
                "code" => "04-28",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فلي اواي", "en" => "Fleaway Medium"],
                "code" => "04-29",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فلي اواي", "en" => "Fleaway Large "],
                "code" => "04-30",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بي تي اي نقط لاذن", "en" => "PTI OTI Cleaner Ear drops"],
                "code" => "04-308",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بي تي ااي 120 مللي", "en" => "PTI OTI Cleaner 120 ml"],
                "code" => "04-315",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيت زولين نقط للاذن", "en" => "Petzoline Ear drop"],
                "code" => "04-47",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هير ماتن", "en" => "Hairmaten Spray 60ml"],
                "code" => "04-49",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بروماكس", "en" => "Promax Large Breed"],
                "code" => "04-5",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "نيزلنت سبراي 60 مللي", "en" => "Nezlent Spray 60ml"],
                "code" => "04-51",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كوفا رينال 60 مللي", "en" => "Cova Renal1 Oxalate 60ml"],
                "code" => "04-52",
                "category" => "Cats ",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كوفا رينال 60 مللي", "en" => "Cova Renal1 Struvite 60ml"],
                "code" => "04-53",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اسم الصنف بالعربي", "en" => "اسم الصنف"],
                "code" => "كود الصنف",
                "category" => "Categry",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ارتو قطع بطعم اللحم للكلاب", "en" => "Artu Chunks Meat Dog Wet"],
                "code" => "63",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت باوتش بطعم الحم البقري", "en" => "BestPet Beef Pouch 85gm"],
                "code" => "77",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت كانز بطعم اللحم الضاني 400 جم", "en" => "BestPet Cat Lamb Can 400 gm"],
                "code" => "79",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت كانز بطعم السالمون 400 جم", "en" => "BestPet Cat Salmon Can 400 gm"],
                "code" => "80",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت للقطط الصغيره بطعم الدجاج 400 جم", "en" => "BestPet Chicken Kitten Can 400 gm"],
                "code" => "81",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست نبيت باوتش بطعم الدجاج 85 جم", "en" => "BestPet Chicken Pouch 85 gm"],
                "code" => "82",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت كانز بطعم اللحم البقري 400 جم", "en" => "BestPet Dog Beef can 400 gm"],
                "code" => "83",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت كانز بطعم اللحم الضاني 400 جم", "en" => "BestPet Dog Lamb can 400 gm"],
                "code" => "84",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت كانز بطعم اسالمون 400 جم", "en" => "BestPet Dog Salamon Can 400gm"],
                "code" => "85",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت جورميه  كانز  لقطط المتعقمه بطعم السالمون  100 جم", "en" => "BestPet Gourmet Salamon Sterilized Can 100g"],
                "code" => "87",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست  بيت جورميه كانز لقطط البالغه بطعم السالمون 100 جم", "en" => "BestPetGourmet Salmon Adult Can 100g"],
                "code" => "88",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت جورميه  كانز  لقطط المتعقمه بطعم التونه  100 جم", "en" => "BestPet Gourmet Tuna& Anchovy can 100g"],
                "code" => "89",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت باوتش بطعم الحم الضاني 85 جم", "en" => "BestPet Lamb Pouch 85gm"],
                "code" => "90",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت كانز بطعم الجم الضاني للكلاب 400 جم", "en" => "BestPet Lamb Puppy Can 400gm"],
                "code" => "91",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت باوتش بطعم السالمون 85 جم", "en" => "BestPet Salmon Pouch 85gm"],
                "code" => "92",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت باوتش بطعم التونه 85 جم", "en" => "BestPet Tuna& Anchovy Pouch 85gm"],
                "code" => "93",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كاسيتا كانز 400 جم", "en" => "Casita Cans 400g"],
                "code" => "152",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كلبفور بوز للقطط الصغيره بطعم الفراخ 80 جم", "en" => "Club 4 Paws  Kitten Chicken 80gm"],
                "code" => "201",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كلبفور بوز للقطط الصغيره بطعم الفراخ 80 جم", "en" => "Club 4 Paws Adult Beef  80gm"],
                "code" => "202",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كلبفوربوز بطعم الفراخ 100 جم", "en" => "Club 4 Paws Chicken gravy 100gm"],
                "code" => "203",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كابفور بوز للقطط الصغيره بطعم الديك الرومي 80 جم", "en" => "Club 4 Paws Turkey Kitten jelly 80gm"],
                "code" => "206",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيليكس باوتش بطعم الدجاج للقطط الصغيره 85 جم ", "en" => "Felix Ktten Chicken in jelly 85"],
                "code" => "314",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيليكس باوتش بطعم التونه للقطط  85 جم ", "en" => "Felix Tuna in jelly 85gm"],
                "code" => "316",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فليكس", "en" => "Felix"],
                "code" => "317",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فريسكس باونش للقطط الصغيره بطعم الفراخ 85 جم ", "en" => "Friskies Junior With Chicken in gravy 85 gm"],
                "code" => "338",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فريسكس باونش للقطط  بطعم اللحم البقري85 جم ", "en" => "Friskies With Beef in gravy 85 gm"],
                "code" => "340",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فريسكس باوتش بطعم الدجاج 85 جم", "en" => "Friskies With Chicken in gravy 85 gm"],
                "code" => "341",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فريسكس باوتش بطعم السلمون85 جم", "en" => "Friskies With Salmon in gravy 85 gm"],
                "code" => "343",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فريسكس باوتش بطعم الديك الرومي 85 جم ", "en" => "Friskies With Turkey in gravy 85 gm"],
                "code" => "344",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فازي وايبس ", "en" => "Fuzzy Wipes"],
                "code" => "354",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جيمون كانز بقطع اللحم البقري 415 جم", "en" => "Gemon Chunkies Beef Cat Can 415 gm"],
                "code" => "366",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "جروفي كانز للقطط خالي من الجلوتين 250 جرام", "en" => "Groovy Cat Delight GrainFree 250g"],
                "code" => "387",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هابي كات لعلاج كرات الشعر 10 كجم", "en" => "Happy Cat Hair Ball10kg"],
                "code" => "395",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هابي كات باوتش لحسلسيه الجلد ", "en" => "Happy Cat Sensitive Pouch"],
                "code" => "397",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هابي كات كانز ستوفيت 200 جرام ", "en" => "Happy Cat Struvit Can 200gm"],
                "code" => "400",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هولي بيت سي", "en" => "Holy Pet C Cats & Dogs"],
                "code" => "414",
                "category" => "Cats/Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كيبي كات باتيه بطعم اللحم البقري 400 جم", "en" => "Kippy Cat Pate 400gm Beef"],
                "code" => "454",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كيبي كات باتيه بطعم الدجاج 400 جم", "en" => "Kippy Cat Pate 400gm Chicken"],
                "code" => "455",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كيبي كات باتيه بطعم الارانب 400 جم ", "en" => "Kippy Cat Pate 400gm Rabbit"],
                "code" => "457",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كيبي كات باتيه بطعم التونه 400 جم", "en" => "Kippy Cat Pate 400gm Tuna"],
                "code" => "459",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كيبي كات بطعم اللحم البتلو 400 جم", "en" => "Kippy Cat Pate 400gm Veal"],
                "code" => "460",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كيبي كات باتيه للقطط المعقمه بطعم الديك الرومي 400 جم", "en" => "Kippy Cat Pate Sterilised 400gm Turkey"],
                "code" => "461",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كيبي دوج باتيه بطعم الدجاج 400جم ", "en" => "Kippy Dog Pate 400gm Chicken"],
                "code" => "463",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ليوناردو كات كانز 400جم", "en" => "Leonardo Can 400gm Cat"],
                "code" => "482",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ميجلور كات قطع بطعم السمك", "en" => "Miglor Cat  Fish Chucks"],
                "code" => "508",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ميجلور كات باتيه بطعم اللحم و الكبده", "en" => "Miglor Cat Lamb &Liver Pate"],
                "code" => "510",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ميجلور كات بطعم السالمون و التونه", "en" => "Miglor Cat Tuna Salamon"],
                "code" => "512",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مونج  دوج سوبر برميوم قطع بطعم البط 400 جم", "en" => "Monge Super Premium Chuncks Duck Dog wet food 400 gm"],
                "code" => "536",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "موراندو كات قطع بطعم الدجاج و الديك الرومي", "en" => "Morando Cat Chicken & Turkey Chunks"],
                "code" => "541",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "موراندو كات قطع بطعم الدجاج و الكبده", "en" => "Morando Cat Chicken &Liver Chucks"],
                "code" => "542",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "موراندو كات باتيه بطعم الارانب", "en" => "Morando Cat Rabbit Pate"],
                "code" => "545",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "موراندو كات قطع بطعم السالمون و الجمبري", "en" => "Morando Cat Salamon &Shrrimp Chucks"],
                "code" => "546",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "موراندو كات باتيه بطعم اللحم البتلو", "en" => "Morando Cat Veal Pate"],
                "code" => "548",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "موستاش كات قطع بطعم السمك 415 جم", "en" => "Moustache Chunkies Fish Cat wet food 415 gm"],
                "code" => "553",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بي نين قطط بطعم اللحم البقري 400 جم", "en" => "P9 Cat Beef 400gm"],
                "code" => "693",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيت ريلاكستين روكسان", "en" => "Pet Relaxin Roxxen"],
                "code" => "709",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيزير للقطط المعقمه 100 جم", "en" => "         Paisir Sterilized 100 gm"],
                "code" => "743",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "برو كات بطعم اللحم البقري و الكبده 100 جم", "en" => "Procat Beef &Liver 100gm"],
                "code" => "770",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بروكات بطعم اللحم البقري 415 جم", "en" => "     Procat Beef in Gravy 415 gm"],
                "code" => "771",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بروكات بطعم الدجاج و الكبده100  جم", "en" => "Procat Chicken &Liver 100gm"],
                "code" => "772",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بروكات بطعم البط 415 جم", "en" => "Procat Duck in Gravy 415gm"],
                "code" => "773",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بروكات كيتين 100جم", "en" => "Procat Kittens 100gm"],
                "code" => "774",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بروكات بطعم الديك الرومي و الكبده 100جم", "en" => "Procat Turkey &Liver 100gm"],
                "code" => "775",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بروبلان كيتين بطعم الديك الرومي 85 جم", "en" => "ProplanKitten 85gm turkey"],
                "code" => "779",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ريتش كات كانز 400جم", "en" => "Rich Can Cat 400gm"],
                "code" => "805",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ريتش دوج كانز 400 جم", "en" => "Rich Dog Can 400gm"],
                "code" => "807",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين انتنس بيوتي", "en" => "Royal Canin Intense Beauty"],
                "code" => "835",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "شيبا بوتش", "en" => "Sheba Pouch"],
                "code" => "889",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيمبا كات قطع بطعم اللحم البقري 415 جم", "en" => "Simba Cat Beef Chunks 415gm"],
                "code" => "892",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيمبا كات قطع بطعم اللحم الدجاج 415 جم", "en" => "Simba Cat Chicken Chunks415gm"],
                "code" => "893",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيمبا كات قطع بطعم البط 415 جم", "en" => "Simba Cat Duck Chunks415gm"],
                "code" => "894",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيمبا كات قطع بطعم التونه 415  جم", "en" => "Simba Cat Tuna Chunks 415gm"],
                "code" => "895",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيمبا دوج قطع بطعم اللحم البقري", "en" => "Simba Dog Beef Chunks 415gm"],
                "code" => "896",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "سيمبا دوج قطع بطعم الدجاج و الديك الرومي 415 جم", "en" => "Simba Dog Chicken +Tturkey chunks 415gm"],
                "code" => "897",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "تومي باوتش ", "en" => "Tomi Pouch"],
                "code" => "950",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ويسكاس باوتش", "en" => "Wiskas Pouch"],
                "code" => "987",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كوشيدا باوتش 100جم", "en" => "Coshida Pouch 100gm"],
                "code" => "1357",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "مالتي فيت باوتش 100 جم", "en" => "Multifit Pouch 100gm"],
                "code" => "1360",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "هابتشين باوتش 100 جم", "en" => "Happchen Pouch 100gm"],
                "code" => "1362",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "موراندوا كات باتيه بطعم السالمون و الجمبري", "en" => "Morando Cat Salamon & Shirmp Pate"],
                "code" => "1389",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "موراندو كات باتيه بطعم التونه و السالمون", "en" => "Morando Cat Tuna & Salamon Pate"],
                "code" => "1390",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويالست باوتش", "en" => "Royalist Pouch"],
                "code" => "1402",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيليكس باوتش بطعم الدجاج 85 جم", "en" => "FELIX CHICKEN IN JELLY 85GM"],
                "code" => "1432",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت جورميه بطعم الدجاج 100 جم", "en" => "BestPet Gourmet Chicken 100gm"],
                "code" => "1435",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت جورميه بطعم اللحم البقري 100 جم", "en" => "BestPet Gourmet Beef Can 100g"],
                "code" => "1436",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كلب فو بوز بطعم الارانب 100 جم", "en" => "Club 4 Paws Rabbit in jelly100gm"],
                "code" => "1441",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "موراندو كات باتيه بطعم الدجاج و الديك الرومي", "en" => "Morando Cat Chicken &Turkey Pate"],
                "code" => "1464",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كيبي كات باتيه للقطط المعقمه بطعم الديك الرومي 400 جم", "en" => "Kippy Cat Pate Stralized 400 gm Turkey"],
                "code" => "1471",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيلوس كانز بطعم الدجاج 400 جم ", "en" => "Filos Chicken 400gm Cans"],
                "code" => "1485",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيلوس كانز بطعم اللحم البقري400 جم ", "en" => "Filos Beef 400gm cans"],
                "code" => "1486",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "يامي كات كانز 400جم", "en" => "Yummy Cat Cans 400 gm"],
                "code" => "04-175",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "لامس باوتش", "en" => "Iams Pouch"],
                "code" => "04-204",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بلوبو باوتش بطعم اللحم البقري 85 جم", "en" => "Blubo Pouch 85 gm Beef"],
                "code" => "04-216",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بلوبو باوتش بطعم الدجاج 85 جم", "en" => "Blubo Pouch 85gm Chicken"],
                "code" => "04-217",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت كات للقطط المعقمه 400 جم", "en" => "Best Pet Steralized Cat Salmon 400gm"],
                "code" => "04-228",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت كيتين بطعم الدجاج 85 جم", "en" => "Best Pet Kitten Chicken in jelly 85gm"],
                "code" => "04-229",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيليس بطعم السالمون 85 جم", "en" => "Felix Salmon85gm"],
                "code" => "04-244",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيليس بطعم اللحم البقري 85 جم", "en" => "Felix Beef85gm"],
                "code" => "04-245",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "فيليكس بطعم السالمون مع الفاصوليا الخضراء 85 جم", "en" => "Felix Trout & Green Beans 85 gm"],
                "code" => "04-280",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت قطط بطعمتااحم البتلو 400 جم", "en" => "Best Pet Cat Veal 400 gm"],
                "code" => "04-285",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيست بيت بطعم السالمون للقطط المعقمه 85 جم", "en" => "Best Pet Salmon Sterlized 85 gm"],
                "code" => "04-286",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كيبي كيتين", "en" => "Kippy Kitten"],
                "code" => "04-307",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين  باوتش للعنايه بالكلي ", "en" => "Royal Canin Renal Chicken Pouch"],
                "code" => "04-311",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رويال كانين باوتش S/O", "en" => "Royal Canin Urinary S/O Pouch"],
                "code" => "04-312",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اسم المنتج بالعربي", "en" => "اسم الصنف"],
                "code" => "كود الصنف",
                "category" => "Categry",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله بينتي 20 لتر", "en" => "Benty Sandy 20L"],
                "code" => "74",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله بونجو 5 لتر", "en" => "Bonjo 5L"],
                "code" => "117",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله كاندي كات 5 لتر", "en" => "Candy Cat Litter 5L"],
                "code" => "149",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله خشب كتكوته 15 لتر", "en" => "Cat - Kota Wooden Cat Litter-15kg "],
                "code" => "155",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله كات فن 5 لتر", "en" => "Cat Fun  Litter 5 L"],
                "code" => "160",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله كات منيا 10 لتر", "en" => "Catmania Liter 10L"],
                "code" => "167",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله كات كلاب 10 لتر", "en" => "Cats Clap 10L"],
                "code" => "173",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله كات زون 10 لتر لافندر", "en" => "Catzone Litter  Lavender 10 kg"],
                "code" => "179",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله كريستال كلين بان 3.8 لتر", "en" => "Clean Plan Crystal Litter 3.8L"],
                "code" => "193",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "كريزي باد", "en" => "Crazy Pads"],
                "code" => "224",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دايبر ", "en" => "Diapers all size"],
                "code" => "239",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دودزي ترينين باد 60*90", "en" => "Doodzy Training Pads 60*90"],
                "code" => "279",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "دراي نايت باد", "en" => "Dry Nights Pads"],
                "code" => "292",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "ايزي دايبر", "en" => "Easy Diaber"],
                "code" => "295",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله ايكو ساند 5 لتر", "en" => "Eco Sand Cat litter 5L"],
                "code" => "298",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله جارفيلد\ هالو كيتي 5 لتر", "en" => "Garfield /Hello Kitty Baby Powder Cat Litter  5L"],
                "code" => "356",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله جارفيلد\ هالو كيتي 10 لتر", "en" => "Garfield / Hello Kitty Lavender Cat Litter 10L"],
                "code" => "357",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله جارفيلد\ هالوكيتي 5 لتر لافندر", "en" => "Garfield / Hello Kitty Lavender Cat Litter  5L"],
                "code" => "358",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اي بيت ترينين باد 10 قطع", "en" => "I Pet Pads Training 10 pcs"],
                "code" => "420",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط كيارا 5 لتر", "en" => "Kiara Cat Litter 5L"],
                "code" => "450",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط كيكي 5 لتر", "en" => "Kiki Cat Litter 5L"],
                "code" => "453",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط لونا جولد 5 لتر", "en" => "Luna Gold Cat Litter 5L"],
                "code" => "492",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله ماي دير 5 لتر", "en" => "My Dear Cat Litter  5L"],
                "code" => "564",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله اوميني جارد 5 لتر", "en" => "Omni Guard Cat Litter 5L"],
                "code" => "634",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "يارون باد 60*90", "en" => "Pads Uarone 60*90cm"],
                "code" => "695",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بيت مات 60*90 30 قطه", "en" => "pet mat 60*90 30 pcs"],
                "code" => "708",
                "category" => "Dogs",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط بيت ساند 5 لتر", "en" => "Pet Sand Cat Litter 5L"],
                "code" => "710",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط بيتفان 10 لتر", "en" => "Petfan Cat Litter Active Carbon 10 L"],
                "code" => "716",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط بيت فان 5 لتر", "en" => "Petfan Cat Litter Active Carbon 5 L"],
                "code" => "717",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط بيت فان 10 لتر", "en" => "Petfan Cat Litter Baby Powder 10 L"],
                "code" => "718",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط بيت فان لافندر 10 لتر", "en" => "Petfan Cat Litter Lavender 10 L"],
                "code" => "720",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط بيت فان لافندر 5 لتر", "en" => "Petfan Cat Litter Lavender 5 L"],
                "code" => "721",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط بيت فان برائحه الصابون 10 لنر", "en" => "Petfan Cat Litter Soap 10 L"],
                "code" => "724",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط بيت فان برائحه الصابون 5 لتر", "en" => "Petfan Cat Litter Soap 5 L"],
                "code" => "725",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط خشب بريميوم 15 لتر", "en" => "Premium Wood Cat Litter 15L"],
                "code" => "751",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط خشب برميوم 5 لتر", "en" => "Premium Wooden Cat Litter 5kg"],
                "code" => "752",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله رويال كات 5 لتر", "en" => "Royal Cat Plus Ulta 5L"],
                "code" => "816",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله رويال 5 لتر ", "en" => "Royal Cat Litter  5L"],
                "code" => "862",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله سمارت كات 6 لتر", "en" => "Smart Cat Litter  6 L"],
                "code" => "906",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله تيدي كات 4.5 كجم", "en" => "Tidy Cat Litter 4.54 kg"],
                "code" => "948",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط فيتا ماكس 20 لتر", "en" => "Vita Max Cat Litter 20 L "],
                "code" => "972",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط زيي كات 5 لتر", "en" => "Zee Cat Litter 5L"],
                "code" => "993",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله خشب 15 كجم", "en" => "Wooden Ca t Litter"],
                "code" => "1053",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله كات فن 10 لتر", "en" => "Cat Fun Cat Litter  10 L"],
                "code" => "1282",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله ماكس كات 10 لتر", "en" => "Max Cat Litter 10L"],
                "code" => "1289",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله كات زون 10 لتر بدون رائحه", "en" => "CatZone Cat Litter  NonScent 10Ll"],
                "code" => "1338",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله جارفيد\ هالو كيتي 20 لتر برائحه بابي بودر", "en" => "Garfield / Hello Kitty Baby Powder  Cat Litter 20 L"],
                "code" => "1374",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله جارفيد \ هالو كيتي برائحه الصابون 10 لتر", "en" => "Garfield / Hello Kitty Soap 10L"],
                "code" => "1377",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله سويت بو 10 لتر", "en" => "Sweet Paws Cat Litter 10L"],
                "code" => "1410",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله سويت بوز 5 لتر", "en" => "Sweet Paws Cat litter  5L"],
                "code" => "1411",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله جوزيل 10 لتر", "en" => "Guzel Cat Litter 10 L"],
                "code" => "1425",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله كات ومان 5 لتر", "en" => "Cat Woman Cat Litter  5L"],
                "code" => "04-224",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "رمله قطط فيتا ماكس 10 لتر", "en" => "Vita Max Cat Litter 10L"],
                "code" => "04-300",
                "category" => "Cats",
                "price" => 0
            ],
            [
                "name" => ["ar" => "اسم الصنف بالعربي", "en" => "اسم الصنف"],
                "code" => "كود الصنف",
                "category" => "Categry",
                "price" => 0
            ],
            [
                "name" => ["ar" => "بي نين قطط بطعم الدجاج 400 جم", "en" => "P9 Cat Chicken 400gm"],
                "code" => "694",
                "category" => "Cats",
                "price" => 0
            ],
        ];

        foreach ($products as $data) {
            $category = Category::whereTranslation('name', $data['category'])->first();

            if (! $category) {
                $this->warn("Category not found for: " . json_encode($data));
                continue;
            }

            $product = new Product();
            $product->translateOrNew('ar')->name = $data['name']['ar'];
            $product->translateOrNew('en')->name = $data['name']['en'];
            $product->price = $data['price'];
            $product->code = $data['code'];
            $product->category_id = $category->id;
            $product->save();

            $product->categoryProducts()->create([
                'category_id' => $category->id,
                'product_id' => $product->id,
            ]);

            $this->info("Imported: " . $product->name);
        }

        $this->info('Import completed successfully.');
    }
}