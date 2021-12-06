const popup = document.querySelector('.popup');
const popupBtnClose = document.querySelector('.popup__close');
const popupBtnOpen = document.querySelector('.btn--add')

if(popup){
  popupBtnOpen.addEventListener('click', () => {
    popup.classList.add('popup--active');
  });
  popupBtnClose.addEventListener('click', () => {
    popup.classList.remove('popup--active');
    console.log('close');
  });
}