document.addEventListener('DOMContentLoaded', function() {
    const examTypeSelect = document.getElementById('examType');
    const hskLevelGroup = document.getElementById('hskLevelGroup');
    const hskkLevelGroup = document.getElementById('hskkLevelGroup');
    const yctLevelGroup = document.getElementById('yctLevelGroup');

    function toggleLevelFields() {
        const selectedExamType = examTypeSelect.value;

        // Hide all level groups initially
        hskLevelGroup.style.display = 'none';
        hskkLevelGroup.style.display = 'none';
        yctLevelGroup.style.display = 'none';

        // Set required to false for all, will be set to true for the visible one
        document.getElementById('hskLevel').required = false;
        document.getElementById('hskkLevel').required = false;
        document.getElementById('yctLevel').required = false;

        // Show the relevant level group and set it as required
        if (selectedExamType === 'HSK') {
            hskLevelGroup.style.display = 'block';
            document.getElementById('hskLevel').required = true;
        } else if (selectedExamType === 'HSKK') {
            hskkLevelGroup.style.display = 'block';
            document.getElementById('hskkLevel').required = true;
        } else if (selectedExamType === 'YCT') {
            yctLevelGroup.style.display = 'block';
            document.getElementById('yctLevel').required = true;
        }
    }

    // Add event listener for when the exam type changes
    examTypeSelect.addEventListener('change', toggleLevelFields);

    // Call it once on page load to set initial state based on default selection
    toggleLevelFields();
});



        document.addEventListener('DOMContentLoaded', function() {
            const examCards = document.querySelectorAll('.exam-card'); // ตอนนี้จะมีแค่การ์ดเดียว
            const examBookingFormContainer = document.getElementById('examBookingFormContainer');
            const examTypeSelect = document.getElementById('examType');

            examCards.forEach(card => {
                card.addEventListener('click', function() {
                    const selectedExamTypeFromCard = this.dataset.examType || 'HSK'; 

                    examBookingFormContainer.style.display = 'block';

                    examTypeSelect.value = selectedExamTypeFromCard;

                    updateLevelVisibility(); 

                    examBookingFormContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            });

            const hskLevelGroup = document.getElementById('hskLevelGroup');
            const hskLevelSelect = document.getElementById('hskLevel');
            const hskkLevelGroup = document.getElementById('hskkLevelGroup');
            const hskkLevelSelect = document.getElementById('hskkLevel');
            const yctLevelGroup = document.getElementById('yctLevelGroup');
            const yctLevelSelect = document.getElementById('yctLevel');
            const displayAmount = document.getElementById('displayAmount');
            const totalAmountInput = document.getElementById('totalAmount');
            const selectedPriceDetailInput = document.getElementById('selectedPriceDetail');
            const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
            const paymentDetailsDiv = document.getElementById('paymentDetails');
            const submitBtn = document.getElementById('submitBtn');
            const examBookingForm = document.getElementById('examBookingForm');

            const hskPrices = {
                'HSK1': 550,
                'HSK2': 750,
                'HSK3_SpeakingElementary': 1500,
                'HSK4_SpeakingIntermediate': 2000,
                'HSK5_SpeakingAdvanced': 2500,
                'HSK6_SpeakingAdvanced': 3000,
                'HSK7-9': 3900
            };

            function updateLevelVisibility() {
                hskLevelGroup.style.display = 'none';
                hskkLevelGroup.style.display = 'none';
                yctLevelGroup.style.display = 'none';

                // Reset selected values and prices when exam type changes
                hskLevelSelect.value = '';
                hskkLevelSelect.value = '';
                yctLevelSelect.value = '';

                const selectedExamType = examTypeSelect.value;
                if (selectedExamType === 'HSK') {
                    hskLevelGroup.style.display = 'block';
                } else if (selectedExamType === 'HSKK') {
                    hskkLevelGroup.style.display = 'block';
                } else if (selectedExamType === 'YCT') {
                    yctLevelGroup.style.display = 'block';
                }
                calculateAndDisplayAmount();
            }

            function calculateAndDisplayAmount() {
                let currentAmount = 0;
                let priceDetail = '';

                const selectedExamType = examTypeSelect.value;

                if (selectedExamType === 'HSK') {
                    const selectedOption = hskLevelSelect.options[hskLevelSelect.selectedIndex];
                    const selectedHskLevel = hskLevelSelect.value;
                    currentAmount = hskPrices[selectedHskLevel] || 0;
                    if (selectedHskLevel) {
                        priceDetail = `ประเภท: HSK, ระดับ: ${selectedOption.textContent.trim()}, ราคา: ${currentAmount.toLocaleString('th-TH')} THB`;
                    }
                } else if (selectedExamType === 'HSKK') {
                    const selectedOption = hskkLevelSelect.options[hskkLevelSelect.selectedIndex];
                    const selectedHskkLevel = hskkLevelSelect.value;
                    currentAmount = 0; // HSKK price often combined, or define here if separate
                    if (selectedHskkLevel) {
                        priceDetail = `ประเภท: HSKK, ระดับ: ${selectedOption.textContent.trim()}, ราคา: 0 THB (รวมใน HSK Combined Level)`;
                    }
                } else if (selectedExamType === 'YCT') {
                    const selectedOption = yctLevelSelect.options[yctLevelSelect.selectedIndex];
                    const selectedYctLevel = yctLevelSelect.value;
                    currentAmount = 0; // YCT price check with center
                    if (selectedYctLevel) {
                        priceDetail = `ประเภท: YCT, ระดับ: ${selectedOption.textContent.trim()}, ราคา: 0 THB (กรุณาตรวจสอบกับศูนย์สอบ)`;
                    }
                } else if (selectedExamType === 'Other') {
                    priceDetail = `ประเภท: อื่นๆ, ราคา: 0 THB (กรุณาตรวจสอบกับศูนย์สอบ)`;
                }

                displayAmount.textContent = currentAmount.toLocaleString('th-TH');
                totalAmountInput.value = currentAmount;
                selectedPriceDetailInput.value = priceDetail;
                updatePaymentDetails();
            }

            function updatePaymentDetails() {
                const selectedPaymentMethodRadio = document.querySelector('input[name="payment_method"]:checked');
                let detailsHtml = '';

                if (selectedPaymentMethodRadio) {
                    paymentDetailsDiv.style.display = 'block';
                    if (selectedPaymentMethodRadio.value === 'bank_transfer') {
                        detailsHtml = `
                            <h4>รายละเอียดการโอนเงิน</h4>
                            <p><strong>ธนาคาร:</strong> ธนาคารตัวอย่าง</p>
                            <p><strong>ชื่อบัญชี:</strong> ศูนย์สอบภาษาจีน</p>
                            <p><strong>เลขที่บัญชี:</strong> 123-4-56789-0</p>
                            <p><strong>จำนวนเงิน:</strong> ${displayAmount.textContent} THB</p>
                            <p>กรุณาโอนเงินภายใน 24 ชั่วโมง และอัปโหลดหลักฐานการโอนเงินในหน้าถัดไป</p>
                        `;
                    } else if (selectedPaymentMethodRadio.value === 'credit_card') {
                        detailsHtml = `
                            <h4>ชำระด้วยบัตรเครดิต/เดบิต</h4>
                            <p>คุณจะถูกนำไปยังหน้าชำระเงินที่ปลอดภัยหลังจากกดยืนยันการจองสอบ</p>
                            <p><strong>จำนวนเงิน:</strong> ${displayAmount.textContent} THB</p>
                            <p>รองรับ Visa, MasterCard, JCB</p>
                        `;
                    }
                } else {
                    paymentDetailsDiv.style.display = 'none';
                }
                paymentDetailsDiv.innerHTML = detailsHtml;
            }

            examTypeSelect.addEventListener('change', updateLevelVisibility);
            hskLevelSelect.addEventListener('change', calculateAndDisplayAmount);
            hskkLevelSelect.addEventListener('change', calculateAndDisplayAmount);
            yctLevelSelect.addEventListener('change', calculateAndDisplayAmount);

            paymentMethodRadios.forEach(radio => {
                radio.addEventListener('change', updatePaymentDetails);
            });

            examBookingForm.addEventListener('submit', function() {
                submitBtn.disabled = true;
                submitBtn.innerText = 'กำลังดำเนินการ...';
            });

            // Initial call to set correct visibility and amount based on old input
            if (examTypeSelect.value) { // ตรวจสอบว่ามีการเลือกประเภทสอบเก่าอยู่หรือไม่ (กรณี submit แล้วมี error)
                examBookingFormContainer.style.display = 'block';
                updateLevelVisibility();
                updatePaymentDetails();
            } else {
                 examBookingFormContainer.style.display = 'none'; // ซ่อนฟอร์มเมื่อโหลดครั้งแรก
            }
        });