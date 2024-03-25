/*---------------------------header show menu---------------------------------------*/
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId)

    toggle.addEventListener('click', () =>{
        nav.classList.toggle('show-menu')
        toggle.classList.toggle('show-icon')
    })
}

showMenu('nav-toggle','nav-menu')


/*----------------------------Drinks page carousel-----------------------------------------*/

let list = document.querySelectorAll('.carousel .list .item');
let carousel = document.querySelector('.carousel');
let count = list.length;
let active = 0;

// auto run 3s
setInterval(()=> {
    active = active >= count - 1 ? 0 : active + 1;
    carousel.classList.remove('right');

    let hidden_old = document.querySelector('.item.hidden');
    if(hidden_old) hidden_old.classList.remove('hidden');
    let active_old = document.querySelector('.item.active');
    active_old.classList.remove('active');
    active_old.classList.add('hidden');
    list[active].classList.add('active');
}, 3000);

/*-------------------------Slider-------------------------------- */

$(document).ready(function ($) {
    "use strict";
    new Swiper(".ca-slider", {
        slidesPerView: 5,
        spaceBetween: 1,
        loop: true,
        autoplay: {
            delay: 1000,
            disableOnInteraction: false,
        },
        speed: 2000,
        breakpoints: {
            0: {
                slidesPerView: 2.35,
            },
            768: {
                slidesPerView: 3.17,
            },
            992: {
                slidesPerView: 3.75,
            },
            1200: {
                slidesPerView: 4.5,
            },
        },
    });
    jQuery(".filters").on("click", function () {
        jQuery("#menu-drink").removeClass("bydefault_show");
    });
    $(function () {
        var filterList = {
            init: function () {
                $("#menu-drink").mixItUp({
                    selectors: {
                        target: ".drink-box-wp",
                        filter: ".filter",
                    },
                    animation: {
                        effects: "fade",
                        easing: "ease-in-out",
                    },
                    load: {
                        filter: ".all , .milkshake , .freshjuice, .hotdrink",
                    },
                });
            },
        };
        filterList.init();
    });
});
jQuery(window).on('load', function () {
    $('body').removeClass('body-fixed');

    let targets = document.querySelectorAll(".filter");
    let activeTab = 0;
    let old = 0;
    let animation;

    for (let i = 0; i < targets.length; i++) {
        targets[i].index = i;
        targets[i].addEventListener("click", moveBar);
    }

    gsap.set(".filter-active", {
        x: targets[0].offsetLeft,
        width: targets[0].offsetWidth
    });

    function moveBar() {
        if (this.index !== activeTab) {
            if (animation && animation.isActive()) {
                animation.progress(1);
            }
            animation = gsap.timeline({
                defaults: {
                    duration: 0.4
                }
            });
            old = activeTab;
            activeTab = this.index;
            animation.to(".filter-active", {
                x: targets[activeTab].offsetLeft,
                width: targets[activeTab].offsetWidth
            });

            animation.to(targets[old], {
                color: "#ec5b59",
                ease: "none"
            }, 0);
            animation.to(targets[activeTab], {
                color: "#fff",
                ease: "none"
            }, 0);

        }

    }
});

/*--------------------page loader----------------------*/
function loader(){
    document.querySelector('.preloader').style.display = 'none';
}

function fadeOut(){
    setInterval(loader, 2500);
}

window.onload = fadeOut;

/*---------------------------text animation------------------------------*/
gsap.registerPlugin(ScrollTrigger);
// REVEAL //
gsap.utils.toArray(".revealUp").forEach(function (elem) {
    ScrollTrigger.create({
        trigger: elem,
        start: "top 80%",
        end: "bottom 20%",
        markers: false,
        onEnter: function () {
            gsap.fromTo(
                elem,
                { y: 100, autoAlpha: 0 },
                {
                    duration: 1.25,
                    y: 0,
                    autoAlpha: 1,
                    ease: "back",
                    overwrite: "auto"
                }
            );
        },
        onLeave: function () {
            gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
        },
        onEnterBack: function () {
            gsap.fromTo(
                elem,
                { y: -100, autoAlpha: 0 },
                {
                    duration: 1.25,
                    y: 0,
                    autoAlpha: 1,
                    ease: "back",
                    overwrite: "auto"
                }
            );
        },
        onLeaveBack: function () {
            gsap.fromTo(elem, { autoAlpha: 1 }, { autoAlpha: 0, overwrite: "auto" });
        }
    });
});
/*---------------------------------dessert Page carousel--------------------------------*/
const imageSlider = (currentImg) => {
    document.querySelector('.starbucks').src = currentImg;
}
const imageSlider1 = (currentImg, imageSize) => {
    const starbucksImage = document.querySelector('.starbucks');
    starbucksImage.src = currentImg;
    starbucksImage.style.width = imageSize.width;
    starbucksImage.style.height = imageSize.height;
}
document.getElementById("changeGreen").onclick = function () {
    document.getElementById("output").style.color = '#dbbb70';
    document.querySelector('.starbucks').src = "Images/dessetPage_croissant.png";
    document.querySelector('.circle').style.background = '#dbbb70';
    imageSlider1("Images/dessetPage_croissant.png", { width: '450px', height: '520px' });

}

document.getElementById("changePink1").onclick = function () {
    document.getElementById("output").style.color = '#ba0a04';
    document.querySelector('.starbucks').src = "Images/des.png";
    document.querySelector('.circle').style.background = '#ba0a04';
    imageSlider1("Images/des.png", { width: '380px', height: '520px' });
}
document.getElementById("changePink2").onclick = function () {
    document.getElementById("output").style.color = '#ffadd3';
    document.querySelector('.starbucks').src = "Images/dessetPage_donut.png";
    document.querySelector('.circle').style.background = '#ffadd3';
    imageSlider1("Images/dessetPage_donut.png", { width: '450px', height: '450px' });
}
