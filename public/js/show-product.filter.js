// js show product zoom image 

function updateMainImage(src) {
  const mainImage = document.getElementById('mainImage');
  mainImage.src = src;
}

document.addEventListener('DOMContentLoaded', () => {
  const lens = document.getElementById('zoomLens');
  const container = document.querySelector('.zoom-container');
  const mainImage = document.getElementById('mainImage');

  container.addEventListener('mousemove', function (e) {
    const rect = mainImage.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    lens.style.display = 'block';
    lens.style.left = `${x - lens.offsetWidth / 2}px`;
    lens.style.top = `${y - lens.offsetHeight / 2}px`;

    lens.style.backgroundImage = `url('${mainImage.src}')`;
    lens.style.backgroundSize = `${mainImage.width * 2}px ${mainImage.height * 2}px`;
    lens.style.backgroundPosition = `-${x * 2 - lens.offsetWidth / 2}px -${y * 2 - lens.offsetHeight / 2}px`;
  });

  container.addEventListener('mouseleave', () => {
    lens.style.display = 'none';
  });
});
