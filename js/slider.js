function createScrollableSlider({ listSelector, prevBtnSelector, nextBtnSelector, gap = 10 }) {
  const list = document.querySelector(listSelector);
  const prevBtn = document.querySelector(prevBtnSelector);
  const nextBtn = document.querySelector(nextBtnSelector);

  if (!list || !prevBtn || !nextBtn) return;

  const getItemWidth = () => {
    const firstItem = list.querySelector(':scope > *');
    if (!firstItem) return 0;
    const style = getComputedStyle(firstItem);
    return firstItem.offsetWidth + parseInt(style.marginRight || gap);
  };

  nextBtn.addEventListener('click', () => {
    list.scrollBy({ left: getItemWidth(), behavior: 'smooth' });
  });

  prevBtn.addEventListener('click', () => {
    list.scrollBy({ left: -getItemWidth(), behavior: 'smooth' });
  });
}

document.addEventListener('DOMContentLoaded', () => {
  createScrollableSlider({
    listSelector: '.goods__list',
    prevBtnSelector: '.goods__btn--prev',
    nextBtnSelector: '.goods__btn--next',
    gap: 30
  });

  createScrollableSlider({
    listSelector: '.reviews__list',
    prevBtnSelector: '.reviews__btn--prev',
    nextBtnSelector: '.reviews__btn--next',
    gap: 30
  });
});