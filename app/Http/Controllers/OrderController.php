<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\OrderController;
class OrderController extends Controller
{
    /**
     * แสดงประวัติคำสั่งซื้อ
     * รองรับการกรองด้วย 'status' และ 'month' (เป็นเลขเดือน 1–12)
     */
    public function history(Request $request)
    {
        // สร้างข้อมูลตัวอย่าง $orders เป็น Collection ของ Array แต่ละคำสั่งซื้อ
        $orders = collect([
            // id, ชื่อสินค้า, จำนวน, ราคา/หน่วย, สถานะ, วันที่สั่งซื้อ (YYYY-MM-DD)
            [
                'id'     => 1,
                'product'=> 'หนังสือคณิตศาสตร์ ป.6',
                'qty'    => 2,
                'price'  => 120.00,
                'status' => 'shipped',       // shipped, processing, cancelled เป็นต้น
                'date'   => '2024-06-01',
            ],
            [
                'id'     => 2,
                'product'=> 'โดรน GEN2',
                'qty'    => 1,
                'price'  => 12000.00,
                'status' => 'processing',
                'date'   => '2024-06-02',
            ],
            [
                'id'     => 3,
                'product'=> 'สารละลายเมทิลเรด',
                'qty'    => 3,
                'price'  => 75.00,
                'status' => 'cancelled',
                'date'   => '2024-05-28',
            ],
            
            // … สามารถเพิ่มข้อมูลตัวอย่างอีกได้ตามต้องการ
        ]);

        // กรองตาม status ถ้ามี parameter 'status' ส่งมา (เช่น ?status=shipped)
        if ($request->has('status') && $request->status !== 'all') {
            $orders = $orders->where('status', $request->status);
        }

        // กรองตาม month ถ้ามี parameter 'month' ส่งมา (เช่น ?month=6 หมายถึงเดือนมิถุนายน)
        if ($request->has('month') && is_numeric($request->month)) {
            $orders = $orders->filter(function ($o) use ($request) {
                // date-stamp เป็น 'YYYY-MM-DD' → ใช้ date('n') ดึงเลขเดือน
                return intval(date('n', strtotime($o['date']))) === intval($request->month);
            });
        }

        // แปลงให้เป็น Collection ใหม่ (ไม่ใช่า Lazy Collection)
        $orders = $orders->values();

        // ส่งตัวแปร $orders เข้า Blade
        return view('orders.history', [
            'orders'      => $orders,
            // สำหรับ select box สถานะ
            'statusList'  => [
                'all'        => 'ทั้งหมด',
                'processing' => 'กำลังดำเนินการ',
                'shipped'    => 'จัดส่งแล้ว',
                'cancelled'  => 'ยกเลิกแล้ว',
            ],
            // สำหรับ select box เดือน
            'monthList'   => [
                ''  => '-- ทุกเดือน --',
                '1' => 'มกราคม',
                '2' => 'กุมภาพันธ์',
                '3' => 'มีนาคม',
                '4' => 'เมษายน',
                '5' => 'พฤษภาคม',
                '6' => 'มิถุนายน',
                '7' => 'กรกฎาคม',
                '8' => 'สิงหาคม',
                '9' => 'กันยายน',
                '10'=> 'ตุลาคม',
                '11'=> 'พฤศจิกายน',
                '12'=> 'ธันวาคม',
            ],
            // เก็บค่าที่กรองมาแล้ว กลับไปแสดงใน select
            'filterStatus' => $request->status ?? 'all',
            'filterMonth'  => $request->month  ?? '',
        ]);
    }
}
