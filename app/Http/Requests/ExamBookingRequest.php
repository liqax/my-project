<?php
// app/Http/Requests/ExamBookingRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // เพิ่มบรรทัดนี้เพื่อใช้งาน Rule

class ExamBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // อนุญาตให้ทุกคนสามารถส่ง request นี้ได้
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // แปลงค่า 'on' จาก checkbox ให้เป็น true/false
        // ถ้า checkbox ถูกติ๊ก ($this->has('agree_terms')) จะเป็น true, ไม่เช่นนั้นจะเป็น false
        $this->merge([
            'agree_terms' => $this->has('agree_terms') ? true : false,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'exam_type' => 'required|string|max:255',
            'hsk_level' => 'nullable|string|max:255',
            'hskk_level' => 'nullable|string|max:255',
            'yct_level' => 'nullable|string|max:255',
            'exam_date' => 'required|date',
            'exam_center' => 'required|string|max:255',
            'first_name_en' => 'required|string|max:255',
            'last_name_en' => 'required|string|max:255',
            'first_name_th' => 'required|string|max:255',
            'last_name_th' => 'required|string|max:255',
            'first_name_cn' => 'required|string|max:255',
            'last_name_cn' => 'required|string|max:255',
            'pinyin_name' => 'required|string|max:255',
            'national_id' => [
                'required',
                'string',
                'digits:13',
                // เพิ่ม rule unique เพื่อตรวจสอบว่าเลขบัตรประชาชนไม่ซ้ำกันในตาราง exam_bookings
                Rule::unique('exam_bookings', 'national_id'),
            ],
            'school_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|digits:10',
            'gender' => 'required|string|in:male,female,other',
            'date_of_birth' => 'required|date',
            'address' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|digits:5',
            'agree_terms' => 'required|boolean', // เปลี่ยน rule เป็น boolean
        ];
    }

    /**
     * Get the validation messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'national_id.unique' => 'เลขบัตรประชาชนนี้มีการจองสอบอยู่แล้ว โปรดตรวจสอบข้อมูลหรือติดต่อผู้ดูแลระบบ',
            // คุณสามารถเพิ่มข้อความสำหรับ rules อื่นๆ ได้ที่นี่
        ];
    }
}