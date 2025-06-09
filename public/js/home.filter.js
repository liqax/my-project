
  $(function () {
    $('.slideshow').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2500,
      arrows: true,
      dots: false,
      responsive: [
        {
          breakpoint: 992,
          settings: { slidesToShow: 3 }
        },
        {
          breakpoint: 768,
          settings: { slidesToShow: 2 }
        },
        {
          breakpoint: 576,
          settings: { slidesToShow: 1 }
        }
      ]
    });
  });



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

