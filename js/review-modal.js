function initReviewModal() {
  const modal = document.getElementById('review-modal');
  const modalImg = modal.querySelector('.modal__img');

  document.querySelector('.reviews__list').addEventListener('click', (e) => {
    const target = e.target;
    if (target.tagName === 'IMG' && target.closest('.reviews__item')) {
      modalImg.src = target.src;
      modal.classList.add('modal--active');
    }
  });

  modal.addEventListener('click', () => {
    modal.classList.remove('modal--active');
    modalImg.src = '';
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      modal.classList.remove('modal--active');
      modalImg.src = '';
    }
  });
}

document.addEventListener('DOMContentLoaded', initReviewModal);