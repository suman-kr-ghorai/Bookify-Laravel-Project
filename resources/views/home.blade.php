@vite('resources/css/app.css')

<!-- our header component-->
<x-header/>

{{-- hero component --}}
<x-hero/>

<!-- our services component -->
<x-services/>

<!-- about us component-->
<x-about/>


<!-- why us  component-->
<x-why_us/>

<!-- gallery component-->
<x-gallery/>

<!-- Visit us section component-->
<x-visit_us/>

<!-- footer component-->
<x-footer/>



<script>
    document.getElementById("hamburger").onclick = function toggleMenu() {
        const navToggle = document.getElementsByClassName("toggle");
        for (let i = 0; i < navToggle.length; i++) {
            navToggle.item(i).classList.toggle("hidden");
        }
    };
</script>
<script>
    let currentSlide = 0;

    function moveSlide(direction) {
        const slides = document.querySelectorAll('#carousel > div');
        const totalSlides = slides.length;
        currentSlide = (currentSlide + direction + totalSlides) % totalSlides; // Wrap around logic
        const offset = -currentSlide * 100; // Calculate the offset for the slide

        document.getElementById('carousel').style.transform = `translateX(${offset}%)`;
    }

    // Optional: Auto-advance the slides
    setInterval(() => {
        moveSlide(1);
    }, 3000); // Change slide every 3 seconds
</script>

