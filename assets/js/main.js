
window.addEventListener('scroll', function(e) {

    // window.scrollY nous permet d'avoir la distance entre le haut et le scroll effectué
    console.log(window.pageYOffset)

    if(window.pageYOffset > 800) {
        document.getElementById('back-to-top').style.display = 'block';
    } else {
        document.getElementById('back-to-top').style.display = 'none';
    }
});

window.addEventListener('scroll', function(e) {

    // window.scrollY nous permet d'avoir la distance entre le haut et le scroll effectué
    console.log(window.pageYOffset)

    if(window.pageYOffset > 550) {
        document.getElementById('header-top').classList.add('navfixe');
    } else {
        document.getElementById('header-top').classList.remove('navfixe');
    }
});

