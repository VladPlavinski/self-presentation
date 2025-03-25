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
    element.scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
}
