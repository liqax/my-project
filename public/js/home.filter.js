// หนังสือ
document.addEventListener('DOMContentLoaded', () => {
  const btns = document.querySelectorAll('.filter-btn');
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