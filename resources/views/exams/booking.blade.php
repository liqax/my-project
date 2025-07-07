<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มจองสอบภาษาจีน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">

</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">อัตราค่าธรรมเนียมการสอบวัดระดับความสามารถภาษาจีน HSK</h1>

        <div class="text-center mb-4">
            {{-- เพิ่ม div นี้เพื่อสร้างกรอบและใส่เอฟเฟกต์ --}}
            <div class="image-effect-container">
                <a href="{{ asset('img/3.2.jpg') }}" data-lightbox="hsk-fee" data-title="HSK Examination Fee">
                    <img src="{{ asset('img/3.2.jpg') }}" alt="HSK Examination Service Fee Standard" class="img-fluid">
                </a>
            </div>
        </div>
        <br>
        <h2 class="text-center mb-4">เลือกประเภทการสอบ</h2>

        <div class="exam-cards-container" id="examCardsContainer">
            <div class="exam-card" data-exam-type="HSK">
                <div class="card-badge">HOT!</div> <img src="{{ asset('img/blog-12.jpg') }}" alt="Chinese Exam Logo">
                <h3>สอบภาษาจีน</h3>
                <p>HSK | HSKK | YCT</p>
                <p class="detail-text">การทดสอบมาตรฐานภาษาจีนระดับสากล
                    เพื่อวัดความสามารถในการใช้ภาษาจีนในการสื่อสารอย่างมีประสิทธิภาพ</p>
                <div class="price">ราคาเริ่มต้น: 550 THB</div>
            </div>

        </div>

        <div class="form-container" id="examBookingFormContainer">
            <h2>แบบฟอร์มจองสอบภาษาจีน</h2>
            <p class="form-description">กรุณากรอกข้อมูลเพื่อทำการจองสอบวัดระดับภาษาจีน HSK, HSKK หรือ YCT</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('exam.booking.submit') }}" method="POST" id="examBookingForm">
                @csrf

                <h3>ข้อมูลการสอบ</h3>

                <div class="form-group">
                    <label for="examType">ประเภทการสอบ <span class="required">*</span></label>
                    <select id="examType" name="exam_type" required>
                        <option value="">-- เลือกประเภทการสอบ --</option>
                        <option value="HSK" {{ old('exam_type') == 'HSK' ? 'selected' : '' }}>HSK</option>
                        <option value="HSKK" {{ old('exam_type') == 'HSKK' ? 'selected' : '' }}>HSKK</option>
                        <option value="YCT" {{ old('exam_type') == 'YCT' ? 'selected' : '' }}>YCT</option>
                        <option value="Other" {{ old('exam_type') == 'Other' ? 'selected' : '' }}>อื่นๆ</option>
                    </select>
                </div>

                <div class="form-group" id="hskLevelGroup" style="display: none;">
                    <label for="hskLevel">ระดับ HSK <span class="required">*</span></label>
                    <select id="hskLevel" name="hsk_level">
                        <option value="" data-price="0">-- เลือกระดับ --</option>
                        <option value="HSK1" data-price="550" {{ old('hsk_level') == 'HSK1' ? 'selected' : '' }}>HSK
                            1
                        </option>
                        <option value="HSK2" data-price="750" {{ old('hsk_level') == 'HSK2' ? 'selected' : '' }}>HSK
                            2
                        </option>
                        <option value="HSK3_SpeakingElementary" data-price="1500"
                            {{ old('hsk_level') == 'HSK3_SpeakingElementary' ? 'selected' : '' }}>HSK 3 + HSK Speaking
                            Elementary</option>
                        <option value="HSK4_SpeakingIntermediate" data-price="2000"
                            {{ old('hsk_level') == 'HSK4_SpeakingIntermediate' ? 'selected' : '' }}>HSK 4 + HSK
                            Speaking
                            Intermediate</option>
                        <option value="HSK5_SpeakingAdvanced" data-price="2500"
                            {{ old('hsk_level') == 'HSK5_SpeakingAdvanced' ? 'selected' : '' }}>HSK 5 + HSK Speaking
                            Advanced</option>
                        <option value="HSK6_SpeakingAdvanced" data-price="3000"
                            {{ old('hsk_level') == 'HSK6_SpeakingAdvanced' ? 'selected' : '' }}>HSK 6 + HSK Speaking
                            Advanced</option>
                        <option value="HSK7-9" data-price="3900" {{ old('hsk_level') == 'HSK7-9' ? 'selected' : '' }}>
                            HSK
                            Level 7-9</option>
                    </select>
                </div>

                <div class="form-group" id="hskkLevelGroup" style="display: none;">
                    <label for="hskkLevel">ระดับ HSKK <span class="required">*</span></label>
                    <select id="hskkLevel" name="hskk_level">
                        <option value="" data-price="0">-- เลือกระดับ --</option>
                        <option value="HSKK_BEGINNER" data-price="0"
                            {{ old('hskk_level') == 'HSKK_BEGINNER' ? 'selected' : '' }}>HSKK ระดับต้น</option>
                        <option value="HSKK_INTERMEDIATE" data-price="0"
                            {{ old('hskk_level') == 'HSKK_INTERMEDIATE' ? 'selected' : '' }}>HSKK ระดับกลาง</option>
                        <option value="HSKK_ADVANCED" data-price="0"
                            {{ old('hskk_level') == 'HSKK_ADVANCED' ? 'selected' : '' }}>HSKK ระดับสูง</option>
                    </select>
                    <small class="form-text-hint">ราคา HSKK จะรวมอยู่ใน HSK Combined Level แล้ว</small>
                </div>

                <div class="form-group" id="yctLevelGroup" style="display: none;">
                    <label for="yctLevel">ระดับ YCT <span class="required">*</span></label>
                    <select id="yctLevel" name="yct_level">
                        <option value="" data-price="0">-- เลือกระดับ --</option>
                        <option value="YCT1" data-price="0" {{ old('yct_level') == 'YCT1' ? 'selected' : '' }}>YCT 1
                        </option>
                        <option value="YCT2" data-price="0" {{ old('yct_level') == 'YCT2' ? 'selected' : '' }}>YCT 2
                        </option>
                        <option value="YCT3" data-price="0" {{ old('yct_level') == 'YCT3' ? 'selected' : '' }}>YCT 3
                        </option>
                        <option value="YCT4" data-price="0" {{ old('yct_level') == 'YCT4' ? 'selected' : '' }}>YCT
                            4
                        </option>
                        <option value="YCT_SPEAKING_PRIMARY" data-price="0"
                            {{ old('yct_level') == 'YCT_SPEAKING_PRIMARY' ? 'selected' : '' }}>YCT Speaking (ระดับต้น)
                        </option>
                        <option value="YCT_SPEAKING_INTERMEDIATE" data-price="0"
                            {{ old('yct_level') == 'YCT_SPEAKING_INTERMEDIATE' ? 'selected' : '' }}>YCT Speaking
                            (ระดับกลาง)</option>
                    </select>
                    <small class="form-text-hint">กรุณาตรวจสอบค่าธรรมเนียม YCT กับศูนย์สอบโดยตรง</small>
                </div>

                <div class="form-group">
                    <label for="examDate">วันที่สอบ <span class="required">*</span></label>
                    <input type="date" id="examDate" name="exam_date" required value="{{ old('exam_date') }}">
                </div>

                <div class="form-group">
                    <label for="examCenter">ศูนย์สอบ <span class="required">*</span></label>
                    <select id="examCenter" name="exam_center" required>
                        <option value="">-- เลือกศูนย์สอบ --</option>
                        <option value="CENTER_BKK" {{ old('exam_center') == 'CENTER_BKK' ? 'selected' : '' }}>กรุงเทพฯ
                        </option>
                        <option value="CENTER_CHIANGMAI"
                            {{ old('exam_center') == 'CENTER_CHIANGMAI' ? 'selected' : '' }}>
                            เชียงใหม่</option>
                        <option value="CENTER_HATYAI" {{ old('exam_center') == 'CENTER_HATYAI' ? 'selected' : '' }}>
                            หาดใหญ่
                        </option>
                        <option value="CENTER_KHONKAEN"
                            {{ old('exam_center') == 'CENTER_KHONKAEN' ? 'selected' : '' }}>
                            ขอนแก่น</option>
                    </select>
                </div>

                <h3>ข้อมูลผู้สมัคร</h3>

                <div class="form-group">
                    <label for="firstNameEN">ชื่อ (ภาษาอังกฤษ) <span class="required">*</span></label>
                    <input type="text" id="firstNameEN" name="first_name_en" required placeholder="First Name"
                        value="{{ old('first_name_en') }}">
                </div>
                <div class="form-group">
                    <label for="lastNameEN">นามสกุล (ภาษาอังกฤษ) <span class="required">*</span></label>
                    <input type="text" id="lastNameEN" name="last_name_en" required placeholder="Last Name"
                        value="{{ old('last_name_en') }}">
                </div>

                <div class="form-group">
                    <label for="firstNameTH">ชื่อ (ภาษาไทย) <span class="required">*</span></label>
                    <input type="text" id="firstNameTH" name="first_name_th" required placeholder="ชื่อ"
                        value="{{ old('first_name_th') }}">
                </div>
                <div class="form-group">
                    <label for="lastNameTH">นามสกุล (ภาษาไทย) <span class="required">*</span></label>
                    <input type="text" id="lastNameTH" name="last_name_th" required placeholder="นามสกุล"
                        value="{{ old('last_name_th') }}">
                </div>

                <div class="form-group">
                    <label for="firstNameCN">ชื่อ (ภาษาจีน - ตัวเต็ม/ย่อ) <span class="required">*</span></label>
                    <input type="text" id="firstNameCN" name="first_name_cn" required placeholder="名字"
                        value="{{ old('first_name_cn') }}">
                </div>
                <div class="form-group">
                    <label for="lastNameCN">นามสกุล (ภาษาจีน - ตัวเต็ม/ย่อ) <span class="required">*</span></label>
                    <input type="text" id="lastNameCN" name="last_name_cn" required placeholder="姓氏"
                        value="{{ old('last_name_cn') }}">
                </div>
                <div class="form-group">
                    <label for="pinyinName">ชื่อพินอิน (Pinyin) <span class="required">*</span></label>
                    <input type="text" id="pinyinName" name="pinyin_name" required placeholder="เช่น Zhang San"
                        value="{{ old('pinyin_name') }}">
                    <small class="form-text-hint">กรุณากรอกชื่อ-นามสกุลตามพินอินที่ใช้ในการสมัครสอบ HSK/HSKK</small>
                </div>

                <div class="form-group">
                    <label for="nationalID">เลขบัตรประชาชน <span class="required">*</span></label>
                    <input type="text" id="nationalID" name="national_id" required pattern="[0-9]{13}"
                        title="กรุณากรอกตัวเลข 13 หลัก" placeholder="xxxxxxxxxxxxx" maxlength="13"
                        value="{{ old('national_id') }}">
                </div>

                <div class="form-group">
                    <label for="schoolName">โรงเรียน / สถาบัน / มหาวิทยาลัย (ปัจจุบัน)</label>
                    <input type="text" id="schoolName" name="school_name"
                        placeholder="ชื่อเต็มของโรงเรียน/สถาบัน" value="{{ old('school_name') }}">
                    <small class="form-text-hint">ใช้สำหรับข้อมูลสถิติหรือการออกใบรับรอง</small>
                </div>

                <div class="form-group">
                    <label for="email">อีเมล <span class="required">*</span></label>
                    <input type="email" id="email" name="email" required placeholder="your@example.com"
                        value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="phone">เบอร์โทรศัพท์ <span class="required">*</span></label>
                    <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}"
                        title="กรุณากรอกตัวเลข 10 หลัก" placeholder="08xxxxxxxx" maxlength="10"
                        value="{{ old('phone') }}">
                </div>

                <div class="form-group">
                    <label for="gender">เพศ <span class="required">*</span></label>
                    <select id="gender" name="gender" required>
                        <option value="">-- เลือกเพศ --</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>ชาย</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>หญิง</option>
                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>อื่นๆ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dob">วันเกิด <span class="required">*</span></label>
                    <input type="date" id="dob" name="date_of_birth" required
                        value="{{ old('date_of_birth') }}">
                </div>

                <div class="form-group">
                    <label for="address">ที่อยู่ <span class="required">*</span></label>
                    <textarea id="address" name="address" rows="3" required
                        placeholder="เลขที่ หมู่บ้าน/อาคาร ถนน แขวง/ตำบล เขต/อำเภอ">{{ old('address') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="province">จังหวัด <span class="required">*</span></label>
                    <input type="text" id="province" name="province" required placeholder="จังหวัด"
                        value="{{ old('province') }}">
                </div>

                <div class="form-group">
                    <label for="postalCode">รหัสไปรษณีย์ <span class="required">*</span></label>
                    <input type="text" id="postalCode" name="postal_code" required pattern="[0-9]{5}"
                        title="กรุณากรอกตัวเลข 5 หลัก" placeholder="xxxxx" maxlength="5"
                        value="{{ old('postal_code') }}">
                </div>

                <div class="payment-section">
                    <h3>สรุปค่าใช้จ่ายและวิธีการชำระเงิน</h3>
                    <div class="form-group total-amount">
                        <label>ยอดรวมที่ต้องชำระ: <span id="displayAmount">0</span> THB</label>
                        <input type="hidden" id="totalAmount" name="total_amount" value="0">
                        <input type="hidden" id="selectedPriceDetail" name="selected_price_detail" value="">
                    </div>

                    <div class="form-group payment-methods">
                        <label>วิธีการชำระเงิน <span class="required">*</span></label>
                        <div style="display:flex; align-items:center;">
                            <input type="radio" id="paymentBankTransfer" name="payment_method"
                                value="bank_transfer" required
                                {{ old('payment_method') == 'bank_transfer' ? 'checked' : '' }}>
                            <label for="paymentBankTransfer">โอนเงิน</label>
                        </div>
                        <div style="display:flex; align-items:center;">
                            <input type="radio" id="paymentCreditCard" name="payment_method" value="credit_card"
                                {{ old('payment_method') == 'credit_card' ? 'checked' : '' }}>
                            <label for="paymentCreditCard">บัตรเครดิต/เดบิต</label>
                        </div>
                    </div>

                    <div id="paymentDetails" class="payment-details" style="display: none;">



                    </div>
                </div>


                <div class="form-group checkbox-group">
                    <input type="checkbox" id="agreeTerms" name="agree_terms" required
                        {{ old('agree_terms') ? 'checked' : '' }}>
                    <label for="agreeTerms">ฉันได้อ่านและยอมรับ <a href="{{ route('terms') }}"
                            target="_blank">ข้อกำหนดและเงื่อนไข</a> รวมถึง <a href="{{ route('privacy') }}"
                            target="_blank">นโยบายความเป็นส่วนตัว</a> <span class="required">*</span></label>
                </div>

                <button type="submit" class="submit-btn" id="submitBtn">ยืนยันการจองสอบ</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/form-scripts.js') }}"></script>
</body>

</html>
