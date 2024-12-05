const playbtn = document.getElementById('play-btn');
const logo = document.getElementById('logo');
const modecontent = document.getElementById('modecontent');

playbtn.addEventListener('click', function(){
    playbtn.style.animation = 'fadeout 1s';
    logo.style.animation = 'fadeout 1s';

    playbtn.addEventListener('animationend', function () {
        playbtn.style.display = 'none';
    });

    logo.addEventListener('animationend', function () {
        logo.style.display = 'none';
    });

    modecontent.style.display = 'flex';
    modecontent.style.animation = 'fadein 1s';
});