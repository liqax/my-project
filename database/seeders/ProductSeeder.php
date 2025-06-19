<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
Product::create([
    'title' => 'หนังสือวิทยาศาสตร์และเทคโนโลยีเล่ม 1 ม.3',
    'image' => 'img/books/book1.jpg',
    'price' => 110.0,
    'category' => 'books',
    'variety' => 'booksci',
    'size' => 'A4',
    'description' => 'หนังสือเรียนวิทยาศาสตร์พื้นฐาน สำหรับนักเรียนระดับมัธยมศึกษาปีที่ 3'
]);

Product::create([
    'title' => 'หนังสือกุญชาญาณ เพื่อส่งเสริมอัจฉริยภาพคณิตศาสตร์สำหรับเด็ก',
    'image' => 'img/books/book2.jpg',
    'price' => 140.0,
    'category' => 'books',
    'variety' => 'calcu',
    'size' => 'B5',
    'description' => 'คู่มือคณิตศาสตร์เพื่อพัฒนาทักษะอัจฉริยะทางตัวเลขสำหรับเด็กเล็ก'
]);

Product::create([
    'title' => 'หนังสือ เสริมทักษะ อัจฉริยะ ตัวน้อย',
    'image' => 'img/books/book3.jpg',
    'price' => 180.0,
    'category' => 'books',
    'variety' => 'calcu',
    'size' => 'A5',
    'description' => 'หนังสือฝึกทักษะพื้นฐานด้านตรรกะและคณิตศาสตร์สำหรับเด็กอนุบาล'
]);

Product::create([
    'title' => 'หนังสือเมฆน้อยสีเทา',
    'image' => 'img/books/book4.jpg',
    'price' => 100.0,
    'category' => 'books',
    'variety' => 'kid',
    'size' => 'A5',
    'description' => 'นิทานภาพเสริมจินตนาการสำหรับเด็กเล็ก เรื่องราวของเมฆน้อยและมิตรภาพ'
]);

Product::create([
    'title' => 'หนังสือเราเป็นเพื่อนที่ต่อกัน',
    'image' => 'img/books/book5.jpg',
    'price' => 120.0,
    'category' => 'books',
    'variety' => 'kid',
    'size' => 'A5',
    'description' => 'นิทานอบอุ่นใจสอนเรื่องการแบ่งปันและการอยู่ร่วมกันในสังคม'
]);

Product::create([
    'title' => 'หนังสือพี่ชายที่แสนดี',
    'image' => 'img/books/book6.jpg',
    'price' => 110.0,
    'category' => 'books',
    'variety' => 'kid',
    'size' => 'A5',
    'description' => 'นิทานส่งเสริมความรักในครอบครัวสำหรับเด็ก'
]);

Product::create([
    'title' => 'แก้วบีกเกอร์',
    'image' => 'img/science/1.jpg',
    'price' => 250.0,
    'category' => 'kits',
    'variety' => 'glassware',
    'size' => '250ml',
    'description' => 'แก้วบีกเกอร์สำหรับใช้ในการทดลองวิทยาศาสตร์ วัสดุทนความร้อน'
]);

Product::create([
    'title' => 'ขวดทดลอง',
    'image' => 'img/science/2.jpg',
    'price' => 100.0,
    'category' => 'kits',
    'variety' => 'glassware',
    'size' => '100ml',
    'description' => 'ขวดแก้วใสสำหรับใช้เก็บสารเคมีหรือสารทดลอง'
]);

Product::create([
    'title' => 'หลอดทดลอง',
    'image' => 'img/science/3.jpg',
    'price' => 475.0,
    'category' => 'kits',
    'variety' => 'glassware',
    'size' => '16x100mm',
    'description' => 'หลอดทดลองแก้วใสคุณภาพสูง สำหรับใช้งานทั่วไปในห้องแล็บ'
]);

Product::create([
    'title' => 'ถาดหลุม',
    'image' => 'img/science/4.jpg',
    'price' => 50.0,
    'category' => 'kits',
    'variety' => 'testtube',
    'size' => '12 ช่อง',
    'description' => 'ถาดพลาสติกสำหรับใส่สารในปริมาณน้อย ใช้ในการทดลองต่าง ๆ'
]);

Product::create([
    'title' => 'กรวยแก้ว',
    'image' => 'img/science/5.jpg',
    'price' => 85.0,
    'category' => 'kits',
    'variety' => 'glassware',
    'size' => '60mm',
    'description' => 'กรวยแก้วสำหรับกรองสารเคมี ทนกรดด่างได้ดี'
]);

Product::create([
    'title' => 'ถ้วยแก้ว',
    'image' => 'img/science/6.jpg',
    'price' => 70.0,
    'category' => 'kits',
    'variety' => 'glassware',
    'size' => '100ml',
    'description' => 'ถ้วยแก้วสำหรับเตรียมหรือผสมสารในปริมาณเล็กน้อย'
]);

Product::create([
    'title' => 'Hydrochloric Acid (HCl)',
    'image' => 'img/chemistry/1.jpg',
    'price' => 65.0,
    'category' => 'chemecals',
    'variety' => 'all',
    'size' => '100ml',
    'description' => 'กรดไฮโดรคลอริกเข้มข้น เหมาะสำหรับใช้ในห้องปฏิบัติการ'
]);

Product::create([
    'title' => 'Sodium Hydroxide (NaOH)',
    'image' => 'img/chemistry/2.jpg',
    'price' => 80.0,
    'category' => 'chemecals',
    'variety' => 'anin',
    'size' => '100g',
    'description' => 'เบสเข้มข้นในรูปแบบของแข็ง ใช้ในกระบวนการทางเคมีต่าง ๆ'
]);

Product::create([
    'title' => 'sulfuric acid',
    'image' => 'img/chemistry/3.jpg',
    'price' => 80.0,
    'category' => 'chemecals',
    'variety' => 'anin',
    'size' => '100ml',
    'description' => 'กรดซัลฟิวริกสำหรับการทดลองเคมีหรือกระบวนการในห้องแล็บ'
]);

Product::create([
    'title' => 'สารละลายเมทิลเรด',
    'image' => 'img/chemistry/4.jpg',
    'price' => 75.0,
    'category' => 'chemecals',
    'variety' => 'solut',
    'size' => '50ml',
    'description' => 'สารละลายอินดิเคเตอร์ชนิดหนึ่ง สำหรับการไทเทรต'
]);

Product::create([
    'title' => 'สารละลายยูนิเวอร์ซัล',
    'image' => 'img/chemistry/5.jpg',
    'price' => 75.0,
    'category' => 'chemecals',
    'variety' => 'solut',
    'size' => '50ml',
    'description' => 'สารละลายตรวจสอบค่าความเป็นกรด-ด่าง (pH) แบบกว้าง'
]);

Product::create([
    'title' => 'กรดไนตริก เจือจาง 2โมล',
    'image' => 'img/chemistry/6.jpg',
    'price' => 85.0,
    'category' => 'chemecals',
    'variety' => 'solut',
    'size' => '100ml',
    'description' => 'กรดไนตริกเจือจางสำหรับการทดลองทั่วไปในห้องแล็บ'
]);

Product::create([
    'title' => 'โดรน GEN1',
    'image' => 'img/drone/1.jpg',
    'price' => 10000.0,
    'category' => 'drone',
    'variety' => 'gen1',
    'size' => 'กลาง',
    'description' => 'โดรน GEN1 สำหรับใช้งานทั่วไป พร้อมกล้องความละเอียด HD'
]);

Product::create([
    'title' => 'โดรน GEN2',
    'image' => 'img/drone/2.jpg',
    'price' => 12000.0,
    'category' => 'drone',
    'variety' => 'gen2',
    'size' => 'กลาง',
    'description' => 'โดรน GEN2 พร้อมระบบควบคุมระยะไกล และกล้อง Full HD'
]);

Product::create([
    'title' => 'โดรน GEN2 LT',
    'image' => 'img/drone/3.jpg',
    'price' => 15000.0,
    'category' => 'drone',
    'variety' => 'gen2',
    'size' => 'ใหญ่',
    'description' => 'รุ่นอัปเกรดของ GEN2 พร้อมแบตเตอรี่ใช้งานได้นานและ GPS ในตัว'
]);

    }
}
