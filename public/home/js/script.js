const menuBar = document.querySelector('.menuBar');
const menuBtn = document.querySelector('#menuBtn')
const menuClose = document.querySelector('#menuClose')


//show sidebar
menuBtn.addEventListener('click', () => {
    menuBar.style.display = 'block';
})

 //colse sidebar
 menuClose.addEventListener('click', () => {
    menuBar.style.display = 'none';
})
