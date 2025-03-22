import './bootstrap';

document.getElementById("themeSwitcher").addEventListener("change", () => {
    toggleClass(document.getElementsByTagName("body")[0], 'dark');
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
