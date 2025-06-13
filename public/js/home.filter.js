
//js books
  document.addEventListener('DOMContentLoaded', function () {
  const buttons = document.querySelectorAll('.bookfilter-btn');
  const slides = document.querySelectorAll('#bookCarousel .carousel-item');
  const carousel = document.getElementById('bookCarousel');
    
  buttons.forEach(button => {
    button.addEventListener('click', () => {
      const filter = button.dataset.filter;

      // Active class บนปุ่ม
      buttons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');

      // ซ่อนทุกสไลด์ก่อน
      slides.forEach(slide => {
        let match = false;

        const items = slide.querySelectorAll('.book-item');
        items.forEach(item => {
          const variety = item.dataset.variety;
          // ตรวจว่ามีสินค้าตรงหมวดไหม
          if (filter === 'all' || variety === filter) {
            item.style.display = '';
            match = true;
          } else {
            item.style.display = 'none';
          }
        });

        // ซ่อนทั้ง slide ถ้าไม่มีสินค้าตรงหมวด
        slide.style.display = match ? '' : 'none';
        slide.classList.remove('active'); // ปิด active เดิม
      });

      // สไลด์แรกที่ยังแสดงอยู่จะถูกเปิดเป็น active
      const firstVisibleSlide = [...slides].find(slide => slide.style.display !== 'none');
      if (firstVisibleSlide) {
        firstVisibleSlide.classList.add('active');
      }

      // รีเซ็ต Bootstrap Carousel ไปยัง slide ที่ active
      const bs = bootstrap.Carousel.getOrCreateInstance(carousel, {
        interval: false,
        touch: true
      });
      bs.to([...slides].indexOf(firstVisibleSlide));

      // ซ่อนปุ่มเลื่อนถ้ามีแค่ slide เดียว
      const controls = carousel.querySelectorAll('.carousel-control-prev, .carousel-control-next');
      const visibleSlidesCount = [...slides].filter(slide => slide.style.display !== 'none').length;
      controls.forEach(ctrl => {
        ctrl.style.display = visibleSlidesCount > 1 ? '' : 'none';
      });
    });
  });
});

//js science

document.addEventListener('DOMContentLoaded', function () {
  const sciButtons = document.querySelectorAll('.scifilter-btn');
  const sciSlides = document.querySelectorAll('#sciCarousel .carousel-item');
  const sciCarousel = document.getElementById('sciCarousel');

  sciButtons.forEach(button => {
    button.addEventListener('click', () => {
      const filter = button.dataset.filter;

      // เปลี่ยนปุ่ม active
      sciButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');

      // ซ่อน/แสดงแต่ละ slide
      sciSlides.forEach(slide => {
        let match = false;

        const items = slide.querySelectorAll('.sci-item');
        items.forEach(item => {
          const variety = item.dataset.variety?.trim();
          const shouldShow = filter === 'all' || variety === filter;
          item.style.display = shouldShow ? '' : 'none';
          if (shouldShow) match = true;
        });

        // ซ่อนทั้ง slide ถ้าไม่มีสินค้าตรงเงื่อนไข
        slide.style.display = match ? '' : 'none';
        slide.classList.remove('active');
      });

      // กำหนดสไลด์แรกที่แสดง ให้เป็น active
      const firstVisible = [...sciSlides].find(slide => slide.style.display !== 'none');
      if (firstVisible) firstVisible.classList.add('active');

      // รีเซ็ต Bootstrap Carousel
      const bs = bootstrap.Carousel.getOrCreateInstance(sciCarousel, {
        interval: false,
        touch: true
      });
      bs.to([...sciSlides].indexOf(firstVisible));

      // ซ่อนปุ่มเลื่อนถ้ามีแค่ slide เดียวที่แสดง
      const visibleCount = [...sciSlides].filter(slide => slide.style.display !== 'none').length;
      const controls = sciCarousel.querySelectorAll('.carousel-control-prev, .carousel-control-next');
      controls.forEach(ctrl => {
        ctrl.style.display = visibleCount > 1 ? '' : 'none';
      });
    });
  });
});



// js chemistry


document.addEventListener('DOMContentLoaded', function () {
  const cheButtons = document.querySelectorAll('.chefilter-btn');
  const cheSlides = document.querySelectorAll('#cheCarousel .carousel-item');
  const cheCarousel = document.getElementById('cheCarousel');

  cheButtons.forEach(button => {
    button.addEventListener('click', () => {
      const filter = button.dataset.filter;

      // เปลี่ยนปุ่ม active
      cheButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');

      // ซ่อน/แสดงสินค้าในแต่ละสไลด์
      cheSlides.forEach(slide => {
        let hasMatch = false;

        const items = slide.querySelectorAll('.che-item');
        items.forEach(item => {
          const variety = item.dataset.variety?.trim();
          const show = filter === 'all' || variety === filter;
          item.style.display = show ? '' : 'none';
          if (show) hasMatch = true;
        });

        // ซ่อน slide ถ้าไม่มีสินค้าตรงหมวด
        slide.style.display = hasMatch ? '' : 'none';
        slide.classList.remove('active');
      });

      // สไลด์แรกที่ยังแสดงอยู่ → set เป็น active
      const firstVisible = [...cheSlides].find(slide => slide.style.display !== 'none');
      if (firstVisible) firstVisible.classList.add('active');

      // รีเซ็ต Bootstrap Carousel
      const bs = bootstrap.Carousel.getOrCreateInstance(cheCarousel, {
        interval: false,
        touch: true
      });
      bs.to([...cheSlides].indexOf(firstVisible));

      // ซ่อนปุ่ม prev/next ถ้ามีแค่ slide เดียวที่แสดง
      const visibleCount = [...cheSlides].filter(slide => slide.style.display !== 'none').length;
      const controls = cheCarousel.querySelectorAll('.carousel-control-prev, .carousel-control-next');
      controls.forEach(ctrl => {
        ctrl.style.display = visibleCount > 1 ? '' : 'none';
      });
    });
  });
});


//js drone

document.addEventListener('DOMContentLoaded', function () {
  const droneButtons = document.querySelectorAll('.dronefilter-btn');
  const droneSlides = document.querySelectorAll('#droCarousel .carousel-item');
  const droneCarousel = document.getElementById('droCarousel');

  droneButtons.forEach(button => {
    button.addEventListener('click', () => {
      const filter = button.dataset.filter;

      // เปลี่ยนปุ่ม active
      droneButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');

      // ซ่อน/แสดงสินค้าในแต่ละ slide
      droneSlides.forEach(slide => {
        let hasMatch = false;

        const items = slide.querySelectorAll('.drone-item');
        items.forEach(item => {
          const variety = item.dataset.variety?.trim();
          const show = filter === 'all' || variety === filter;
          item.style.display = show ? '' : 'none';
          if (show) hasMatch = true;
        });

        // ซ่อนทั้ง slide ถ้าไม่มีสินค้า
        slide.style.display = hasMatch ? '' : 'none';
        slide.classList.remove('active');
      });

      // เปิดสไลด์แรกที่ยังมีสินค้า
      const firstVisible = [...droneSlides].find(slide => slide.style.display !== 'none');
      if (firstVisible) firstVisible.classList.add('active');

      // รีเซ็ต Bootstrap Carousel
      const bs = bootstrap.Carousel.getOrCreateInstance(droneCarousel, {
        interval: false,
        touch: true
      });
      bs.to([...droneSlides].indexOf(firstVisible));

      // ซ่อนปุ่มเลื่อนถ้ามีแค่ slide เดียว
      const visibleCount = [...droneSlides].filter(slide => slide.style.display !== 'none').length;
      const controls = droneCarousel.querySelectorAll('.carousel-control-prev, .carousel-control-next');
      controls.forEach(ctrl => {
        ctrl.style.display = visibleCount > 1 ? '' : 'none';
      });
    });
  });
});



document.addEventListener('DOMContentLoaded', function() {
  const loginPane    = document.getElementById('loginTab');
  const registerPane = document.getElementById('registerTab');
  const forgotPane   = document.getElementById('forgotTab');
  const authTabs     = document.getElementById('authTabs'); // แท็บ login/register

  // ฟังก์ชันช่วยสลับ pane พร้อม hide/show nav-tabs
  function showPane(pane) {
    // ซ่อนทุก pane
    [loginPane, registerPane, forgotPane].forEach(el => el.classList.remove('show','active'));
    // ซ่อนหรือแสดง nav-tabs
    if (pane === forgotPane) authTabs.classList.add('d-none');
    else                    authTabs.classList.remove('d-none');
    // แสดง pane ที่ต้องการ
    pane.classList.add('show','active');
  }

  // ลิงก์ "ลืมรหัสผ่าน?"
  document.getElementById('forgot-tab').addEventListener('click', function(e) {
    e.preventDefault();
    showPane(forgotPane);
  });

  // ลิงก์ย้อนกลับไปล็อกอิน (ใน forgotTab)
  document.querySelector('#forgotTab a[data-bs-target="#loginTab"]')
    .addEventListener('click', function(e) {
      e.preventDefault();
      showPane(loginPane);
  });

  // ถ้าใช้ nav-link ของ register/login ธรรมดา ก็ bind เพิ่มให้กลับมาแสดง nav-tabs
  document.querySelectorAll('#authTabs a[data-bs-toggle="tab"]').forEach(link => {
    link.addEventListener('shown.bs.tab', () => {
      authTabs.classList.remove('d-none');
    });
  });
});



  document.addEventListener('DOMContentLoaded', function() {
            // 3.1 Category Carousel
            new Swiper('.category-carousel', {
                slidesPerView: 'auto', // แสดงกี่ slide ตามความกว้างของเนื้อหา
                spaceBetween: 16, // ช่องว่างระหว่าง slide (px)
                navigation: {
                    prevEl: '.category-carousel-prev',
                    nextEl: '.category-carousel-next',
                },
                // ถ้าต้องการให้ loop
                loop: false,
            });

            // 3.2 Brand Carousel
            new Swiper('.brand-carousel', {
                slidesPerView: 3, // Desktop แสดง 3 แถว
                spaceBetween: 16,
                navigation: {
                    prevEl: '.brand-carousel-prev',
                    nextEl: '.brand-carousel-next',
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1
                    }, // Mobile
                    576: {
                        slidesPerView: 2
                    }, // Tablet
                    992: {
                        slidesPerView: 3
                    } // Desktop
                },
                loop: false,
            });
            new Swiper('.new-carousel', {
                slidesPerView: 5, 
                spaceBetween: 4,
                navigation: {
                    prevEl: '.new-carousel-prev',
                    nextEl: '.new-carousel-next',
                },
              
                loop: false,
            });

        });

document.addEventListener('DOMContentLoaded', function() {
  const backBtn = document.getElementById('backToTop');
  const showAfter = 400;  // เลื่อนลงมาเกิน 300px จึงแสดงปุ่ม

  // ตรวจเช็คการเลื่อน
  window.addEventListener('scroll', () => {
    if (window.pageYOffset > showAfter) {
      backBtn.classList.add('show');
    } else {
      backBtn.classList.remove('show');
    }
  });

  // กดปุ่ม → เลื่อนขึ้นบนสุดแบบ smooth
  backBtn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

});


