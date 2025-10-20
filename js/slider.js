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

  createScrollableSlider({
    listSelector: '.images__list',
    prevBtnSelector: '.images__btn--prev',
    nextBtnSelector: '.images__btn--next',
    gap: 30
  });
});

// card photo changes
document.addEventListener('DOMContentLoaded', () => {
    const list = document.querySelector('.images__list');
    const imgItems = list.querySelectorAll('.images__item');
    const thumbs = document.querySelectorAll('.card__thumbnail img');

    thumbs.forEach((thumb, index) => {
        thumb.addEventListener('click', (evt) => {
        evt.preventDefault();

        const currentActive = document.querySelector('.card__thumbnail--active');
        if (currentActive) currentActive.classList.remove('card__thumbnail--active');
        thumb.parentElement.classList.add('card__thumbnail--active');

        const targetItem = imgItems[index];
        if (!targetItem) return;

        list.scrollTo({
            left: targetItem.offsetLeft,
            behavior: 'smooth'
        });
        });
    });
});