<script>
    document.addEventListener("click", () => {
    const navOverlay = document.getElementById("nav_overlay");
    const hamburger = document.getElementById("hamburger_icon");
    const cross = document.getElementById("cross_icon");
    const navSlider = document.getElementById("nav_slider");

    hamburger.addEventListener("click", () => {
        navOverlay.style.display = "block";
        navSlider.style.transform = "translateX(0)";
    });

    cross.addEventListener("click", () => {
        navOverlay.style.display = "none";
        navSlider.style.transform = "translateX(105%)";
    });
});

  </script>