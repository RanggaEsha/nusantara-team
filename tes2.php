<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <style>
      /* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  display: flex;
  padding: 0 35px;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: linear-gradient(to left top, #031A9A, #8B53FF);
}
.wrapperbest {
  max-width: 1100px;
  width: 100%;
  position: relative;
}
.wrapperbest i {
  top: 50%;
  height: 50px;
  width: 50px;
  cursor: pointer;
  font-size: 1.25rem;
  position: absolute;
  text-align: center;
  line-height: 50px;
  background: #fff;
  border-radius: 50%;
  box-shadow: 0 3px 6px rgba(0,0,0,0.23);
  transform: translateY(-50%);
  transition: transform 0.1s linear;
}
.wrapperbest i:active{
  transform: translateY(-50%) scale(0.85);
}
.wrapperbest i:first-child{
  left: -22px;
}
.wrapperbest i:last-child{
  right: -22px;
}
.wrapperbest .carouselbest{
  display: grid;
  grid-auto-flow: column;
  grid-auto-columns: calc((100% / 3) - 12px);
  overflow-x: auto;
  scroll-snap-type: x mandatory;
  gap: 16px;
  border-radius: 8px;
  scroll-behavior: smooth;
  scrollbar-width: none;
}
.carouselbest::-webkit-scrollbar {
  display: none;
}
.carouselbest.no-transition {
  scroll-behavior: auto;
}
.carouselbest.dragging {
  scroll-snap-type: none;
  scroll-behavior: auto;
}
.carouselbest.dragging .cardbest {
  cursor: grab;
  user-select: none;
}
.carouselbest :where(.cardbest, .img) {
  display: flex;
  justify-content: center;
  align-items: center;
}
.carouselbest .cardbest {
  scroll-snap-align: start;
  height: 342px;
  list-style: none;
  background: #fff;
  cursor: pointer;
  padding-bottom: 15px;
  flex-direction: column;
  border-radius: 8px;
}
.carouselbest .cardbest .img {
  background: #8B53FF;
  height: 148px;
  width: 148px;
  border-radius: 50%;
}
.cardbest .img img {
  width: 140px;
  height: 140px;
  border-radius: 50%;
  object-fit: cover;
  border: 4px solid #fff;
}
.carouselbest .cardbest h2 {
  font-weight: 500;
  font-size: 1.56rem;
  margin: 30px 0 5px;
}
.carouselbest .cardbest span {
  color: #6A6D78;
  font-size: 1.31rem;
}

@media screen and (max-width: 900px) {
  .wrapperbest .carouselbest {
    grid-auto-columns: calc((100% / 2) - 9px);
  }
}

@media screen and (max-width: 600px) {
  .wrapperbest .carouselbest {
    grid-auto-columns: 100%;
  }
}
    </style>
    <meta charset="utf-8">
    <title>Infinite cardbest Slider JavaScript | CodingNepal</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="script.js" defer></script>
  </head>
  <body>
    <div class="wrapperbest">
      <i id="left" class="fa-solid fa-angle-left"></i>
      <ul class="carouselbest">
        <li class="cardbest">
          <div class="img"><img src="images/img-1.jpg" alt="img" draggable="false"></div>
          <h2>Blanche Pearson</h2>
          <span>Sales Manager</span>
        </li>
        <li class="cardbest">
          <div class="img"><img src="images/img-2.jpg" alt="img" draggable="false"></div>
          <h2>Joenas Brauers</h2>
          <span>Web Developer</span>
        </li>
        <li class="cardbest">
          <div class="img"><img src="images/img-3.jpg" alt="img" draggable="false"></div>
          <h2>Lariach French</h2>
          <span>Online Teacher</span>
        </li>
        <li class="cardbest">
          <div class="img"><img src="images/img-4.jpg" alt="img" draggable="false"></div>
          <h2>James Khosravi</h2>
          <span>Freelancer</span>
        </li>
        <li class="cardbest">
          <div class="img"><img src="images/img-5.jpg" alt="img" draggable="false"></div>
          <h2>Kristina Zasiadko</h2>
          <span>Bank Manager</span>
        </li>
        <li class="cardbest">
          <div class="img"><img src="images/img-6.jpg" alt="img" draggable="false"></div>
          <h2>Donald Horton</h2>
          <span>App Designer</span>
        </li>
      </ul>
      <i id="right" class="fa-solid fa-angle-right"></i>
    </div>

<script>
  const wrapperbest = document.querySelector(".wrapperbest");
const carouselbest = document.querySelector(".carouselbest");
const firstCardWidth = carouselbest.querySelector(".cardbest").offsetWidth;
const arrowBtns = document.querySelectorAll(".wrapperbest i");
const carouselChildrens = [...carouselbest.children];

let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

// Get the number of cards that can fit in the carouselbest at once
let cardPerView = Math.round(carouselbest.offsetWidth / firstCardWidth);

// Insert copies of the last few cards to beginning of carouselbest for infinite scrolling
carouselChildrens.slice(-cardPerView).reverse().forEach(cardbest => {
    carouselbest.insertAdjacentHTML("afterbegin", cardbest.outerHTML);
});

// Insert copies of the first few cards to end of carouselbest for infinite scrolling
carouselChildrens.slice(0, cardPerView).forEach(cardbest => {
    carouselbest.insertAdjacentHTML("beforeend", cardbest.outerHTML);
});

// Scroll the carouselbest at appropriate postition to hide first few duplicate cards on Firefox
carouselbest.classList.add("no-transition");
carouselbest.scrollLeft = carouselbest.offsetWidth;
carouselbest.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carouselbest left and right
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carouselbest.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
    });
});

const dragStart = (e) => {
    isDragging = true;
    carouselbest.classList.add("dragging");
    // Records the initial cursor and scroll position of the carouselbest
    startX = e.pageX;
    startScrollLeft = carouselbest.scrollLeft;
}

const dragging = (e) => {
    if(!isDragging) return; // if isDragging is false return from here
    // Updates the scroll position of the carouselbest based on the cursor movement
    carouselbest.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    carouselbest.classList.remove("dragging");
}

const infiniteScroll = () => {
    // If the carouselbest is at the beginning, scroll to the end
    if(carouselbest.scrollLeft === 0) {
        carouselbest.classList.add("no-transition");
        carouselbest.scrollLeft = carouselbest.scrollWidth - (2 * carouselbest.offsetWidth);
        carouselbest.classList.remove("no-transition");
    }
    // If the carouselbest is at the end, scroll to the beginning
    else if(Math.ceil(carouselbest.scrollLeft) === carouselbest.scrollWidth - carouselbest.offsetWidth) {
        carouselbest.classList.add("no-transition");
        carouselbest.scrollLeft = carouselbest.offsetWidth;
        carouselbest.classList.remove("no-transition");
    }

    // Clear existing timeout & start autoplay if mouse is not hovering over carouselbest
    clearTimeout(timeoutId);
    if(!wrapperbest.matches(":hover")) autoPlay();
}

const autoPlay = () => {
    if(window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
    // Autoplay the carouselbest after every 2500 ms
    timeoutId = setTimeout(() => carouselbest.scrollLeft += firstCardWidth, 2500);
}
autoPlay();

carouselbest.addEventListener("mousedown", dragStart);
carouselbest.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carouselbest.addEventListener("scroll", infiniteScroll);
wrapperbest.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapperbest.addEventListener("mouseleave", autoPlay);
</script>

    
  </body>
</html>