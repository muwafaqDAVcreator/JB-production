<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jason Sanjay 01</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #000;
      color: white;
    }

    /* Navbar styles */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background: #1b1a1a;
      flex-wrap: wrap; /* Allow wrapping on small screens */
    }

    .logo img {
      height: 40px;
      max-width: 100%;
    }

    /* Navigation menu styles */
    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
      margin: 0;
      padding: 0;
      flex-wrap: wrap;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      padding: 8px 12px;
      transition: background 0.3s;
    }

    nav ul li a:hover {
      background: #333;
      border-radius: 4px;
    }

    /* Carousel container styles */
    .carousel {
      position: relative;
      max-width: 100%;
      overflow: hidden;
      margin: 20px auto;
      height: 50%;
    }

    /* Slides wrapper */
    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    /* Individual slide styles */
    .slide {
      min-width: 100%;
      box-sizing: border-box;
    }

    /* Slide images width control */
    .slide img {
      max-width: 80%; /* decreased width of images */
      height: auto;
      display: block;
      margin: 0 auto;
    }

    /* Navigation buttons */
    .prev, .next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(27, 26, 26, 0.7);
      border: none;
      color: white;
      padding: 10px;
      cursor: pointer;
      font-size: 1.5em;
      z-index: 10;
    }

    .prev {
      left: 10px;
    }

    .next {
      right: 10px;
    }

    /* Dots container styles */
    .dots {
      text-align: center;
      margin-top: 10px;
    }

    /* Individual dot styles */
    .dot {
      display: inline-block;
      height: 12px;
      width: 12px;
      margin: 0 5px;
      background-color: #bbb;
      border-radius: 50%;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    /* Active dot style */
    .dot.active {
      background-color: #717171;
    }

    /* Responsive adjustments */
    @media(max-width:768px) {
      /* Navbar adjustments */
      .navbar {
        flex-direction: column;
        align-items: flex-start;
      }
      nav ul {
        flex-direction: column;
        width: 100%;
      }
      nav ul li {
        margin: 10px 0;
      }
    }
  </style>
</head>
<body>

  <!-- Header with Navbar -->
  <header class="navbar">
    <div class="logo">
      <img src="images/logo.png" alt="Lyca Productions" />
    </div>
    <nav>
      <ul>
        <li><a href="#">HOME</a></li>
        <li><a href="#">MOVIES</a></li>
        <li><a href="#">NEWS</a></li>
        <li><a href="#">CSR</a></li>
        <li><a href="#">CONTACT</a></li>
      </ul>
    </nav>
  </header>

  <!-- Carousel Slider -->
  <div class="carousel">
    <button class="prev" onclick="moveSlide(-1)">❮</button>
    <div class="slides" id="slidesContainer">
      <div class="slide">
        <img src="images/image1.jpg" alt="Slide 1" />
      </div>
      <div class="slide">
        <img src="images/image2.jpg" alt="Slide 2" />
      </div>
      <div class="slide">
        <img src="images/image3.jpg" alt="Slide 3" />
      </div>
    </div>
    <button class="next" onclick="moveSlide(1)">❯</button>
  </div>

  <!-- Slide dots -->
  <div class="dots" id="dotsContainer"></div>

  <script>
    const slidesContainer = document.getElementById('slidesContainer');
    const totalSlides = document.querySelectorAll('.slide').length;
    const dotsContainer = document.getElementById('dotsContainer');

    let currentSlide = 0;

    // Initialize dots based on slides
    for (let i = 0; i < totalSlides; i++) {
      const dot = document.createElement('span');
      dot.className = 'dot';
      if(i === 0) dot.classList.add('active');
      dot.dataset.index = i;
      dot.onclick = () => goToSlide(i);
      dotsContainer.appendChild(dot);
    }

    function moveSlide(direction) {
      currentSlide += direction;
      if (currentSlide < 0) {
        currentSlide = totalSlides - 1;
      } else if (currentSlide >= totalSlides) {
        currentSlide = 0;
      }
      updateSlidePosition();
    }

    function goToSlide(index) {
      currentSlide = index;
      updateSlidePosition();
    }

    function updateSlidePosition() {
      const offset = -currentSlide * 100;
      slidesContainer.style.transform = `translateX(${offset}%)`;
      updateDots();
    }

    function updateDots() {
      document.querySelectorAll('.dot').forEach((dot, index) => {
        dot.classList.toggle('active', index === currentSlide);
      });
    }

    // Optional: auto slide
    // setInterval(() => { moveSlide(1); }, 3000);
  </script>

</body>
</html>