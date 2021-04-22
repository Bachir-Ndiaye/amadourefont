// preloader
window.addEventListener("load", function(){
    const preloader = document.querySelector(".preloader");
    preloader.className += " hidden";
});

// Make navbar active
$(document).ready(function () {
    let url = window.location;
    $('.collapse a[href="'+ url +'"]').parent().addClass('active');
    $('.collapse a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
});