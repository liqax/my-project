document.addEventListener('DOMContentLoaded', function(){
  const searchInput = document.getElementById('search');
  const searchBtn   = document.querySelector('.search-btn');
  const catSelect   = document.getElementById('category');
  const priceMin    = document.getElementById('price-min');
  const priceMax    = document.getElementById('price-max');

  const items = Array.from(document.querySelectorAll('.product-item'));
  const row   = document.getElementById('productRow');

  function applyFilter() {
    const term = searchInput.value.trim().toLowerCase();
    const cat  = catSelect.value;
    const min  = parseFloat(priceMin.value)||0;
    const max  = parseFloat(priceMax.value)||Infinity;

    // สลับคลาสกึ่งกลาง vs ชิดซ้าย
    if (cat==='all' && !term && priceMin.value==='' && priceMax.value==='') {
      row.classList.replace('justify-content-start','justify-content-center');
    } else {
      row.classList.replace('justify-content-center','justify-content-start');
    }

    items.forEach(el=>{
      const title    = el.querySelector('.product-title').textContent.toLowerCase();
      const category = el.dataset.category;
      const price    = parseFloat(el.dataset.price);
      let show = true;
      if (term && !title.includes(term)) show = false;
      if (cat!=='all' && category!==cat) show = false;
      if (price<min || price>max) show = false;
      el.closest('.col-6').style.display = show ? '' : 'none';
    });
  }

  // bind events
  [searchBtn,'click'].forEach(evt=> searchBtn.addEventListener(evt,e=>{e.preventDefault();applyFilter()}));
  searchInput .addEventListener('input', applyFilter);
  catSelect   .addEventListener('change',applyFilter);
  priceMin    .addEventListener('input',applyFilter);
  priceMax    .addEventListener('input',applyFilter);
});




