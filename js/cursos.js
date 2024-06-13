document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("modal");
    const closeButton = document.getElementById("close-button");
    const nextButton = document.getElementById("next-button");
    const selectedCoursesDiv = document.getElementById("selected-courses");

    function closeModal() {
        modal.style.display = "none";
    }

    function showSelectedCourses() {
        const checkboxes = document.querySelectorAll(".checkbox-container input[type='checkbox']");
        const selectedCourses = [];
        
        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                selectedCourses.push(checkbox.value);
            }
        });

        if (selectedCourses.length > 0) {
            selectedCoursesDiv.innerHTML = `<h3>Cursos Selecionados:</h3><p>${selectedCourses.join(", ")}</p>`;
        } else {
            selectedCoursesDiv.innerHTML = "<h3>Nenhum curso selecionado</h3>";
        }
    }

    closeButton.addEventListener("click", closeModal);
    nextButton.addEventListener("click", () => {
        showSelectedCourses();
        closeModal();
    });
});
