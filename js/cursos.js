// Quando o documento HTML for totalmente carregado e analisado, executa a função anônima.
document.addEventListener('DOMContentLoaded', (event) => {
    loadCourses(); // Carrega os cursos salvos no localStorage e os exibe na página.
    showPopupIfNoCourses(); // Mostra o pop-up para seleção de cursos se não houver cursos salvos.
});

// Função chamada ao clicar no botão "Salvar" no pop-up de seleção de cursos.
function submitCourses() {
    console.log("submitCourses function called"); // Log para verificar a chamada da função.
    const form = document.getElementById('courses-form'); // Obtém o formulário de seleção de cursos.
    const formData = new FormData(form); // Cria um objeto FormData com os dados do formulário.
    const selectedCourses = formData.getAll('courses'); // Obtém todos os cursos selecionados.
    const coursesContainer = document.getElementById('courses-container'); // Obtém o container onde os cursos serão exibidos.

    // Limpa todos os cursos existentes no container.
    coursesContainer.innerHTML = '';

    // Salva os cursos selecionados no localStorage.
    localStorage.setItem('selectedCourses', JSON.stringify(selectedCourses));

    // Adiciona os cursos selecionados ao container.
    selectedCourses.forEach(course => {
        addCourseToContainer(course);
    });

    // Fecha o pop-up de seleção de cursos.
    const popup = document.getElementById('popup');
    popup.style.display = 'none';
}

// Função para mostrar o pop-up de seleção de cursos.
function showPopup() {
    const popup = document.getElementById('popup');
    popup.style.display = 'flex'; // Define o estilo display do pop-up como 'flex' para exibi-lo.
}

// Função para adicionar um curso ao container de cursos.
function addCourseToContainer(course) {
    const coursesContainer = document.getElementById('courses-container');
    const courseDiv = document.createElement('div'); // Cria um novo div para o curso.
    courseDiv.className = 'course'; // Define a classe do div como 'course'.
    courseDiv.innerHTML = `
        <span>${course}</span>
        <button onclick="startCourse()">Iniciar</button>
    `; // Define o conteúdo HTML do div com o nome do curso e um botão "Iniciar".
    coursesContainer.appendChild(courseDiv); // Adiciona o div ao container de cursos.
}

// Função chamada ao clicar no botão "Iniciar" em um curso.
function startCourse() {
    alert('Iniciando curso...'); // Exibe um alerta indicando que o curso está sendo iniciado.
}

// Função para carregar os cursos salvos no localStorage e exibi-los na página.
function loadCourses() {
    const savedCourses = JSON.parse(localStorage.getItem('selectedCourses')) || []; // Obtém os cursos salvos ou um array vazio se não houver cursos salvos.
    savedCourses.forEach(course => {
        addCourseToContainer(course); // Adiciona cada curso salvo ao container de cursos.
    });
}

// Função para mostrar o pop-up de seleção de cursos se não houver cursos salvos.
function showPopupIfNoCourses() {
    const savedCourses = JSON.parse(localStorage.getItem('selectedCourses')) || []; // Obtém os cursos salvos ou um array vazio se não houver cursos salvos.
    if (savedCourses.length === 0) { // Verifica se não há cursos salvos.
        showPopup(); // Mostra o pop-up de seleção de cursos.
    }
}
