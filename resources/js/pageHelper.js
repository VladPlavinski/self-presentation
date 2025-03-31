export {helper};

var helper = {
    init: function (){
        document.getElementById("themeSwitcher").addEventListener("change", () => {
            this.toggleClass(document.body, 'dark');
        });
        this.bindScrollers();
        this.hideLoader();
    },
    toggleClass: function (element, className){
        let classes = element.className.split(' ');
        if(classes.includes(className)){
            classes = this.removeClass(classes, className)
        }else{
            classes.push(className);
        }
        element.className = classes.join(' ');
    },
    removeClass: function(classes, className){
        classes = classes.filter((name) => {
            return name == className ? '' : name;
        });
        return classes;
    },
    bindScrollers: function(){
        let scrollers = document.querySelectorAll('.scroller');
        let helper = this;
        scrollers.forEach(function (element){
            element.addEventListener("click", () => {
                helper.scrollToElementById(element.dataset['to']);
            });
        });
    },
    scrollToElementById: function(id){
        let element = document.getElementById(id);
        element.scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
    },
    hideLoader: function (){
        let loader = document.getElementById("loader");
        loader.setAttribute('checked','checked');
        setTimeout(() => {
            loader.parentElement.className = 'hidden';
        }, 300);
    },
};
