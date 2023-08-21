const wrapper = document.querySelector(".wrapper");

// --- Gallery --- //
const carousel_1 = document.querySelector(".carousel_1");

const firstCardWidth = carousel_1.querySelector(".card").offsetWidth;
const arrowBtns = document.querySelectorAll(".carousel_01");
const carouselChildrens = [...carousel_1.children];

let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;
let cardPerView = Math.round(carousel_1.offsetWidth / firstCardWidth);

carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
    carousel_1.insertAdjacentHTML("afterbegin", card.outerHTML);
});

carouselChildrens.slice(0, cardPerView).forEach(card => {
    carousel_1.insertAdjacentHTML("beforeend", card.outerHTML);
});

carousel_1.classList.add("no-transition");
carousel_1.scrollLeft = carousel_1.offsetWidth;
carousel_1.classList.remove("no-transition");

arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel_1.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
    });
});

const dragStart = (e) => {
    isDragging = false;
    carousel_1.classList.add("dragging");
    startX = e.pageX;
    startScrollLeft = carousel_1.scrollLeft;
}

const dragging = (e) => {
    if (!isDragging) return;
    carousel_1.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    carousel_1.classList.remove("dragging");
}

const infiniteScroll = () => {
    if (carousel_1.scrollLeft === 0) {
        carousel_1.classList.add("no-transition");
        carousel_1.scrollLeft = carousel_1.scrollWidth - (2 * carousel_1.offsetWidth);
        carousel_1.classList.remove("no-transition");
    }
    else if (Math.ceil(carousel_1.scrollLeft) === carousel_1.scrollWidth - carousel_1.offsetWidth) {
        carousel_1.classList.add("no-transition");
        carousel_1.scrollLeft = carousel_1.offsetWidth;
        carousel_1.classList.remove("no-transition");
    }

    clearTimeout(timeoutId);
    if (!wrapper.matches(":hover")) autoPlay();
}

const autoPlay = () => {
    if (window.innerWidth < 800 || !isAutoPlay) return;
    timeoutId = setTimeout(() => carousel_1.scrollLeft += firstCardWidth, 2500);
}
autoPlay();

carousel_1.addEventListener("mousedown", dragStart);
carousel_1.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel_1.addEventListener("scroll", infiniteScroll);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper.addEventListener("mouseleave", autoPlay);

// --- Products --- //
const carousel_2 = document.querySelector(".carousel_2");

const firstCardWidth_2 = carousel_2.querySelector(".card").offsetWidth;
const arrowBtns_2 = document.querySelectorAll(".carousel_02");
const carouselChildrens_2 = [...carousel_2.children];

let isDragging_2 = false, isAutoPlay_2 = true, startX_2, startScrollLeft_2, timeoutId_2;
let cardPerView_2 = Math.round(carousel_2.offsetWidth / firstCardWidth_2);

carouselChildrens_2.slice(-cardPerView_2).reverse().forEach(card => {
    carousel_2.insertAdjacentHTML("afterbegin", card.outerHTML);
});

carouselChildrens_2.slice(0, cardPerView_2).forEach(card => {
    carousel_2.insertAdjacentHTML("beforeend", card.outerHTML);
});

carousel_2.classList.add("no-transition");
carousel_2.scrollLeft = carousel_2.offsetWidth;
carousel_2.classList.remove("no-transition");

arrowBtns_2.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel_2.scrollLeft += btn.id == "left" ? -firstCardWidth_2 : firstCardWidth_2;
    });
});

const dragStart_2 = (e) => {
    isDragging_2 = false;
    carousel_2.classList.add("dragging");
    startX_2 = e.pageX;
    startScrollLeft_2 = carousel_2.scrollLeft;
}

const dragging_2 = (e) => {
    if (!isDragging_2) return;
    carousel_2.scrollLeft = startScrollLeft_2 - (e.pageX - startX_2);
}

const dragStop_2 = () => {
    isDragging_2 = false;
    carousel_2.classList.remove("dragging");
}

const infiniteScroll_2 = () => {
    if (carousel_2.scrollLeft === 0) {
        carousel_2.classList.add("no-transition");
        carousel_2.scrollLeft = carousel_2.scrollWidth - (2 * carousel_2.offsetWidth);
        carousel_2.classList.remove("no-transition");
    }
    else if (Math.ceil(carousel_2.scrollLeft) === carousel_2.scrollWidth - carousel_2.offsetWidth) {
        carousel_2.classList.add("no-transition");
        carousel_2.scrollLeft = carousel_2.offsetWidth;
        carousel_2.classList.remove("no-transition");
    }

    clearTimeout(timeoutId_2);
    if (!wrapper.matches(":hover")) autoPlay_2();
}

const autoPlay_2 = () => {
    if (window.innerWidth < 800 || !isAutoPlay_2) return;
    timeoutId_2 = setTimeout(() => carousel_2.scrollLeft += firstCardWidth_2, 2500);
}
autoPlay_2();

carousel_2.addEventListener("mousedown", dragStart_2);
carousel_2.addEventListener("mousemove", dragging_2);
document.addEventListener("mouseup", dragStop_2);
carousel_2.addEventListener("scroll", infiniteScroll_2);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId_2));
wrapper.addEventListener("mouseleave", autoPlay_2);
