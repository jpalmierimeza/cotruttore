
       <div>
       <div class="slider-container">  
        
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: black;
            color: yellow;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .slider-container {
            position: relative;
            width: 80%;
            max-width: 800px;
            overflow: hidden;
            border: 2px solid yellow;
            border-radius: 10px;
        }

        .slider {
            display: flex;
            transition: transform 0.5s ease;
        }

        .slide {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: opacity 0.5s ease;
        }

        .slider-container:hover .slide {
            opacity: 0.7;
        }

        /* Estilos para los botones */
        button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: transparent;
            border: 2px solid yellow;
            color: yellow;
            font-size: 30px;
            cursor: pointer;
            z-index: 10;
            padding: 10px;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(255, 255, 0, 0.8), 0 0 20px rgba(255, 255, 0, 0.6);
        }

        button:hover {
            background-color: yellow;
            color: black;
            box-shadow: 0 0 20px rgba(255, 255, 0, 1), 0 0 30px rgba(255, 255, 0, 0.8);
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        /* Efecto de transición para la sombra de la imagen */
        .slide:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(255, 255, 0, 0.7);
        }
        </style>
        <div class="slider">
            <img src="/Nueva carpeta/IMG-20241219-WA0031.jpg" alt="Imagen 1" class="slide">
            <img src="/Nueva carpeta/IMG-20241219-WA0032.jpg" alt="Imagen 2" class="slide">
            <img src="/Nueva carpeta/IMG-20241219-WA0039.jpg" alt="Imagen 3" class="slide">
        </div>
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <script>
        let currentSlide = 0;

        function moveSlide(direction) {
            const slides = document.querySelectorAll('.slide');
            const totalSlides = slides.length;

            currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
            const slider = document.querySelector('.slider');
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }
    </script>
</div>

  

