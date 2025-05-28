// หนังสือ
document.addEventListener('DOMContentLoaded', () => {
  const btns = document.querySelectorAll('.bookfilter-btn');
  const items = document.querySelectorAll('.book-item');

  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      // สลับคลาส active ของปุ่ม
      btns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filter = btn.dataset.filter;
      // แสดง/ซ่อนการ์ดตาม category
      items.forEach(item => {
        const cat = item.dataset.category;
        item.style.display = (filter === 'all' || cat === filter) ? '' : 'none';
      });
    });
  });
});

// อุปกรณ์วิทย์
document.addEventListener('DOMContentLoaded', () => {
  const btns = document.querySelectorAll('.scifilter-btn');
  const items = document.querySelectorAll('.sci-item');

  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      // สลับคลาส active ของปุ่ม
      btns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filter = btn.dataset.filter;
      // แสดง/ซ่อนการ์ดตาม category
      items.forEach(item => {
        const cat = item.dataset.category;
        item.style.display = (filter === 'all' || cat === filter) ? '' : 'none';
      });
    });
  });
});



// สารเคมี
document.addEventListener('DOMContentLoaded', () => {
  const btns = document.querySelectorAll('.chefilter-btn');
  const items = document.querySelectorAll('.che-item');

  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      // สลับคลาส active ของปุ่ม
      btns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filter = btn.dataset.filter;
      // แสดง/ซ่อนการ์ดตาม category
      items.forEach(item => {
        const cat = item.dataset.category;
        item.style.display = (filter === 'all' || cat === filter) ? '' : 'none';
      });
    });
  });
});

// โดรน
document.addEventListener('DOMContentLoaded', () => {
  const btns = document.querySelectorAll('.dronefilter-btn');
  const items = document.querySelectorAll('.drone-item');

  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      // สลับคลาส active ของปุ่ม
      btns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filter = btn.dataset.filter;
      // แสดง/ซ่อนการ์ดตาม category
      items.forEach(item => {
        const cat = item.dataset.category;
        item.style.display = (filter === 'all' || cat === filter) ? '' : 'none';
      });
    });
  });
});


 





document.addEventListener('DOMContentLoaded', function() {
  /**
   * initFilterCarousel
   * @param {string} carouselId       – id ของ <div class="carousel slide" id="...">
   * @param {string} filterBtnSelector– selector ของปุ่มกรอง (เช่น '.bookfilter-btn')
   * @param {string} itemSelector     – selector ของไอเท็มภายใน carousel (เช่น '.col-auto.book-item')
   */
  function initFilterCarousel(carouselId, filterBtnSelector, itemSelector) {
    const carouselEl   = document.getElementById(carouselId);
    if (!carouselEl) return;

    const carouselInner = carouselEl.querySelector('.carousel-inner');
    // เก็บไอเท็มต้นฉบับไว้
    const originalItems = Array.from(
      carouselInner.querySelectorAll(itemSelector)
    ).map(el => ({
      html: el.outerHTML,
      category: el.dataset.category
    }));

    // สร้าง carousel ใหม่จาก HTML array
    function buildCarousel(htmlArray) {
      carouselInner.innerHTML = '';
      htmlArray.forEach((itemHtml, idx) => {
        const slideIndex = Math.floor(idx / 3);
        let slide = carouselInner.children[slideIndex];
        if (!slide) {
          slide = document.createElement('div');
          slide.classList.add('carousel-item');
          if (slideIndex === 0) slide.classList.add('active');
          const row = document.createElement('div');
          row.className = 'row gx-3 gy-4 justify-content-center';
          slide.appendChild(row);
          carouselInner.appendChild(slide);
        }
        slide.querySelector('.row').insertAdjacentHTML('beforeend', itemHtml);
      });
      // รีเซ็ตไปสไลด์แรก
      const bs = bootstrap.Carousel.getOrCreateInstance(carouselEl, {
        interval: false,
        touch: false
      });
      bs.to(0);
    }

    // ผูก event ให้ปุ่มกรอง
    document.querySelectorAll(filterBtnSelector).forEach(btn => {
      btn.addEventListener('click', function() {
        // update active class บนปุ่มในกลุ่มเดียวกัน
        document.querySelectorAll(filterBtnSelector)
          .forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        // คัดกรอง
        const filter = this.dataset.filter;
        const filtered = filter === 'all'
          ? originalItems
          : originalItems.filter(item => item.category === filter);

        buildCarousel(filtered.map(i => i.html));
      });
    });
  }

  // เรียกใช้กับ carousel แรก
  initFilterCarousel(
    'bookCarousel',    // id ของ carousel
    '.bookfilter-btn', // ปุ่มกรอง
    '.col-auto.book-item' // item selector
  );

  // เรียกใช้ซ้ำกับ carousel ถัดไป (สมมติ id="sciCarousel" และ class ปุ่ม '.scifilter-btn')
  initFilterCarousel(
    'sciCarousel',
    '.scifilter-btn',
    '.col-auto.sci-item'
  );
   initFilterCarousel(
    'cheCarousel',
    '.chefilter-btn',
    '.col-auto.che-item'
  );
});

