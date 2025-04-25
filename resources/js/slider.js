export {slider};

var slider = {
    element: document.getElementById("slider"),
    slides: [],
    init: function () {
        document.getElementById("sliderLeft").addEventListener("click", () => {this.toPreviousSlide()});
        document.getElementById("sliderRight").addEventListener("click", () => {this.toNextSlide()});
        this.slides = this.element.children;
    },
    toNextSlide: function (){
        this.changeSlide('next');
    },
    toPreviousSlide: function (){
        this.changeSlide('previous');
    },
    changeSlide: function (direction = 'next'){
        let currentIndex = this.getCurrentSlideIndex();
        let targetIndex = direction == 'next' ? currentIndex + 1
            : direction == 'previous' ? currentIndex - 1 : -1;
        this.scrollToSelectedSlide(targetIndex);
    },
    getCurrentSlideIndex: function (){
        let currentIndex = -1;
        for(let i = 0; i < this.slides.length; i++){
            currentIndex = this.slideInView(this.slides[i]) ? i : currentIndex;
        }
        return currentIndex;
    },
    slideInView: function(slide){
        let slideBorders = slide.getBoundingClientRect();
        let sliderLeftBorder = this.element.getBoundingClientRect().left;
        return (slideBorders.left > sliderLeftBorder && slideBorders.right < window.innerWidth);
    },
    scrollToSelectedSlide(targetIndex){
        if(targetIndex >= 0 && targetIndex < this.slides.length){
            this.slides[targetIndex].scrollIntoView({ behavior: "smooth", block: "nearest"});
        }
    },
};
