document.addEventListener('DOMContentLoaded', (event) => {
    loadCourses();
    showPopupIfNoCourses();
});

function submitCourses() {
    console.log("submitCourses function called");  // Log para verificar a chamada da função
    const form = document.getElementById('courses-form');
    const formData = new FormData(form);
    const selectedCourses = formData.getAll('courses');
    const coursesContainer = document.getElementById('courses-container');

    // Limpar cursos existentes
    coursesContainer.innerHTML = '';

    // Salvar cursos no localStorage
    localStorage.setItem('selectedCourses', JSON.stringify(selectedCourses));

    // Adicionar cursos selecionados
    selectedCourses.forEach(course => {
        addCourseToContainer(course);
    });

    // Fechar popup
    const popup = document.getElementById('popup');
    popup.style.display = 'none';
}

function showPopup() {
    const popup = document.getElementById('popup');
    popup.style.display = 'flex';
}

function addCourseToContainer(course) {
    const coursesContainer = document.getElementById('courses-container');
    const courseDiv = document.createElement('div');
    courseDiv.className = 'course';
    courseDiv.innerHTML = `
        <span>${course}</span>
        <button onclick="startCourse()">Iniciar</button>
    `;
    coursesContainer.appendChild(courseDiv);
}

function startCourse() {
    alert('Iniciando curso...');
}

function loadCourses() {
    const savedCourses = JSON.parse(localStorage.getItem('selectedCourses')) || [];
    savedCourses.forEach(course => {
        addCourseToContainer(course);
    });
}

function showPopupIfNoCourses() {
    const savedCourses = JSON.parse(localStorage.getItem('selectedCourses')) || [];
    if (savedCourses.length === 0) {
        showPopup();
    }
}
