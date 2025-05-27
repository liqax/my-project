
  const searchInput = document.getElementById('search');
  const categorySelect = document.getElementById('category');
  const priceMinInput = document.getElementById('price-min');
  const priceMaxInput = document.getElementById('price-max');
  const products = document.querySelectorAll('.product-item');

  // ฟังก์ชันเช็คว่าจะโชว์หรือซ่อน
  function filterProducts() {
    const keyword = searchInput.value.trim().toLowerCase();
    const category = categorySelect.value;
    const priceMin = parseFloat(priceMinInput.value) || 0;
    const priceMax = parseFloat(priceMaxInput.value) || Infinity;

    products.forEach(el => {
      const title = el.querySelector('.product-title').textContent.toLowerCase();
      const cat = el.dataset.category;
      const price = parseFloat(el.dataset.price);

      const matchSearch = title.includes(keyword);
      const matchCategory = (category === 'all' || cat === category);
      const matchPrice = (price >= priceMin && price <= priceMax);

      // ถ้าผ่านทุกเงื่อนไขให้แสดง มิฉะนั้นซ่อน
      el.parentElement.style.display = (matchSearch && matchCategory && matchPrice)
        ? '' : 'none';
    });
  }

  // ผูก event เมื่อมีการพิมพ์หรือเปลี่ยนค่า
  searchInput.addEventListener('input', filterProducts);
  categorySelect.addEventListener('change', filterProducts);
  priceMinInput.addEventListener('input', filterProducts);
  priceMaxInput.addEventListener('input', filterProducts);

