<?php

namespace App\Exports;

use App\Models\ExamBooking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // เพิ่มอันนี้
use Maatwebsite\Excel\Concerns\WithStyles;     // เพิ่มอันนี้
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet; // เพิ่มอันนี้

class ExamBookingsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles // เพิ่มชื่อ Traits ที่นี่
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // ส่วนนี้จะดึงข้อมูลการจองสอบทั้งหมด
        return ExamBooking::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        // กำหนดหัวคอลัมน์สำหรับไฟล์ Excel ของคุณ
        return [
            'ID การจอง',
            'ประเภทการสอบ',
            'ระดับ (HSK)',
            'ระดับ (HSKK)',
            'ระดับ (YCT)',
            'วันที่สอบ',
            'ศูนย์สอบ',
            'ชื่อ (EN)',
            'นามสกุล (EN)',
            'ชื่อ (TH)',
            'นามสกุล (TH)',
            'ชื่อ (CN)',
            'นามสกุล (CN)',
            'ชื่อพินอิน',
            'เลขบัตรประชาชน',
            'โรงเรียน/สถาบัน',
            'อีเมล',
            'เบอร์โทรศัพท์',
            'เพศ',
            'วันเกิด',
            'ที่อยู่',
            'จังหวัด',
            'รหัสไปรษณีย์',
            'ยอมรับข้อกำหนด',
            'วันที่สร้าง',
            'วันที่อัปเดต',
        ];
    }

    /**
     * @param mixed $examBooking
     * @return array
     */
    public function map($examBooking): array
    {
        // แมปแอตทริบิวต์ของโมเดลตามลำดับหัวข้อของคุณ
        return [
            $examBooking->id,
            $examBooking->exam_type,
            $examBooking->hsk_level,
            $examBooking->hskk_level,
            $examBooking->yct_level,
            $examBooking->exam_date ? $examBooking->exam_date->format('Y-m-d') : '',
            $this->getExamCenterDisplayName($examBooking->exam_center),
            $examBooking->first_name_en,
            $examBooking->last_name_en,
            $examBooking->first_name_th,
            $examBooking->last_name_th,
            $examBooking->first_name_cn,
            $examBooking->last_name_cn,
            $examBooking->pinyin_name,
            // แปลงเลขบัตรประชาชนเป็นข้อความ เพื่อป้องกันการแสดงผลแบบ scientific notation ใน Excel
            "'" . $examBooking->national_id, // เพิ่ม ' เพื่อให้ Excel อ่านเป็นข้อความ
            $examBooking->school_name,
            $examBooking->email,
            $examBooking->phone,
            $examBooking->gender,
            $examBooking->date_of_birth ? $examBooking->date_of_birth->format('Y-m-d') : '',
            $examBooking->address,
            $examBooking->province,
            $examBooking->postal_code,
            $examBooking->agree_terms ? 'Yes' : 'No',
            $examBooking->created_at->format('Y-m-d H:i:s'),
            $examBooking->updated_at->format('Y-m-d H:i:s'),
        ];
    }

    /**
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        // ปรับขนาดตัวอักษรของหัวข้อ (แถวแรก) ให้ใหญ่ขึ้น
        return [
            1    => ['font' => ['bold' => true, 'size' => 14]], // แถวที่ 1 (หัวข้อ)
        ];
    }

    // เมธอดตัวช่วยสำหรับแปลงรหัส exam_center เป็นชื่อที่แสดง
    private function getExamCenterDisplayName($code)
    {
        switch ($code) {
            case 'CENTER_BKK': return 'กรุงเทพฯ';
            case 'CENTER_CHIANGMAI': return 'เชียงใหม่';
            case 'CENTER_HATYAI': return 'หาดใหญ่';
            case 'CENTER_KHONKAEN': return 'ขอนแก่น';
            default: return $code;
        }
    }
}