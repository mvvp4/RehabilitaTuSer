document.addEventListener("DOMContentLoaded", function() {
    var accordions = document.querySelectorAll(".accordion-button");
    accordions.forEach(function(button) {
        button.addEventListener("click", function() {
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
                content.style.animation = "slideDown 0.3s ease-out"; // Añade la animación
            }
        });
    });
});
