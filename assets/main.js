//Скрипт для создания кастомного попапа
const popupLinks = document.querySelectorAll('.popup-link');
const body = document.querySelector('body');
const lockPadding = document.querySelectorAll('._lock-padding');

let unlock = true;

const timeout = 300;

if(popupLinks.length > 0) {
  for (let index = 0; index < popupLinks.length; index++) {
    const popupLink = popupLinks[index];
    popupLink.addEventListener('click', e => {
      const popupName = popupLink.getAttribute('href').replace('#', '');
      const currentPopup = document.getElementById(popupName);
      popupOpen(currentPopup);
    })
  }
}

const popupCloseIcon = document.querySelectorAll('.close-popup');
if(popupCloseIcon > 0){
  for (let index = 0; idnex < popupCloseIcon.length; i++){
    const el = popupCloseIcon[index];
    el.addEventListener('click', e => {
      popupClose(el.closest('.popup'));
      e.preventDefault();
    });
  }
}

function popupOpen(currentPopup) {
  if(currentPopup && unlock) {
    const popupActive = document.querySelector('.popup--active');
    if(popupActive){
      popupClose(popupActive, false);
    } else {
      bodyLock();
    }
    currentPopup.classList.add('popup--active');
    currentPopup.addEventListener('click', e => {
      if(!e.target.closest('.popup__content')){
        popupClose(e.target.closest('.popup'));
      }
    })
  }
}
function popupClose(popupActive, doUnlock = true){
  if(unlock){
    popupActive.classList.remove('popup--active');
    if(doUnlock){
      bodyUnLock();
    }
  }
}

function bodyLock() {
  const lockPaddingValue = window.innerWidth - document.querySelector('body').offsetWidth + 'px';

  if(lockPadding > 0){
    for(let index = 0; index < lockPadding.length; index++) {
      const el = lockPadding[index];
      el.style.paddingRight = lockPaddingValue;
    }
  }
  body.style.paddingRight = lockPaddingValue;
  body.classList.add('_lock');

  unlock = false;
  setTimeout(() => unlock = true, timeout);
}
function bodyUnLock() {
  setTimeout(() => {
    if(lockPadding.length > 0 ){
      for(let index = 0; index < lockPadding.length; index++){
        el = lockPadding[index];
        el.style.paddingRight = 'opx';
      }
    }
    body.style.paddingRight = '0px';
    body.classList.remove('_lock');
  }, timeout);

  unlock = false;
  setTimeout(() => unlock = true, timeout);
}


document.addEventListener('keydown', e => {
  if(e.which === 27) {
    const popupActive = document.querySelector('.popup--active');
    popupClose(popupActive);
  }
});