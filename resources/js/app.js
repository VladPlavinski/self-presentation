import './bootstrap';

import.meta.glob([
    '../images/**',
]);

document.addEventListener('DOMContentLoaded', function(){
    document.getElementById("themeSwitcher").addEventListener("change", () => {
        toggleClass(document.getElementsByTagName("body")[0], 'dark');
    });

    document.querySelectorAll('.scroller').forEach(function(e){
        e.addEventListener("click", () => {
            scrollTo(e.dataset['to']);
        });
    });

    document.getElementById("sliderLeft").addEventListener("click", () => {
        changeSlide('prev');
    });

    document.getElementById("sliderRight").addEventListener("click", () => {
        changeSlide('next');
    });
});

function toggleClass(element, className = '')
{
    let classes = element.className.split(' ');
    if(classes.includes(className)){
        classes = classes.filter((c) => {
            return c == className ? '' : c;
        });
    }else{
        classes.push('dark');
    }
    element.className = classes.join(' ');
}

function scrollTo(to)
{
    let element = document.getElementById(to);
    console.log(element);
    element.scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
}

function changeSlide(direction){
    let slider = document.getElementById("slider");
    let children = slider.children;
    let currentIndex = -1;
    for(let i = 0; i < children.length; i++){
        currentIndex = inView(children[i]) ? i : currentIndex;
    }
    let targetIndex = direction == 'next' ? currentIndex + 1
    : direction == 'prev' ? currentIndex - 1 : -1;
    if(targetIndex >= 0){
        children[targetIndex].scrollIntoView({ behavior: "smooth", inline: "center", block: "nearest"});
    }
}

function inView(element)
{
    let elementBorders = element.getBoundingClientRect();
    let sliderLeftBorder = document.getElementById("sliderLeft").getBoundingClientRect().left;
    return (elementBorders.left > sliderLeftBorder && elementBorders.right < window.innerWidth);
}
