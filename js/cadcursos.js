// Evento que é disparado quando o DOM (Document Object Model) é completamente carregado
document.addEventListener('DOMContentLoaded', () => {
    // Seleciona os elementos do DOM
    const courseForm = document.getElementById('courseForm');
    const courseList = document.getElementById('courseList');
    const courseIdInput = document.getElementById('courseId');
    const courseNameInput = document.getElementById('courseName');
    const courseDescriptionInput = document.getElementById('courseDescription');
    const formTitle = document.getElementById('formTitle');
    const submitBtn = document.getElementById('submitBtn');

    // Carrega os cursos salvos no Local Storage ou inicializa como um array vazio
    let courses = JSON.parse(localStorage.getItem('courses')) || [];

    // Adiciona um evento de submit ao formulário de cursos
    courseForm.addEventListener('submit', (e) => {
        e.preventDefault(); // Previne o comportamento padrão de envio do formulário
        const id = courseIdInput.value;
        const name = courseNameInput.value;
        const description = courseDescriptionInput.value;

        // Verifica se estamos atualizando um curso existente ou adicionando um novo
        if (id) {
            updateCourse(id, name, description);
        } else {
            addCourse(name, description);
        }

        // Reseta o formulário e ajusta os elementos de UI
        courseForm.reset();
        courseIdInput.value = '';
        formTitle.textContent = 'Adicionar Curso';
        submitBtn.textContent = 'Adicionar Curso';
    });

    // Função para adicionar um novo curso
    const addCourse = (name, description) => {
        const newCourse = { id: Date.now().toString(), name, description }; // Cria um novo objeto de curso
        courses.push(newCourse); // Adiciona o novo curso ao array de cursos
        saveCourses(); // Salva os cursos no Local Storage
        renderCourses(); // Atualiza a lista de cursos na UI
    };

    // Função para atualizar um curso existente
    const updateCourse = (id, name, description) => {
        courses = courses.map(course => course.id === id ? { id, name, description } : course); // Atualiza o curso correspondente no array de cursos
        saveCourses(); // Salva os cursos no Local Storage
        renderCourses(); // Atualiza a lista de cursos na UI
    };

    // Função para deletar um curso
    const deleteCourse = (id) => {
        courses = courses.filter(course => course.id !== id); // Remove o curso do array de cursos
        saveCourses(); // Salva os cursos no Local Storage
        renderCourses(); // Atualiza a lista de cursos na UI
    };

    // Função para editar um curso (preenche o formulário com os dados do curso)
    const editCourse = (id) => {
        const course = courses.find(course => course.id === id); // Encontra o curso correspondente
        courseIdInput.value = course.id;
        courseNameInput.value = course.name;
        courseDescriptionInput.value = course.description;
        formTitle.textContent = 'Editar Curso';
        submitBtn.textContent = 'Atualizar Curso';
    };

    // Função para renderizar a lista de cursos na UI
    const renderCourses = () => {
        courseList.innerHTML = ''; // Limpa a lista de cursos atual
        courses.forEach(course => {
            const li = document.createElement('li'); // Cria um novo elemento de lista
            li.innerHTML = `
                <strong>${course.name}</strong>
                <p>${course.description}</p>
                <button onclick="editCourse('${course.id}')">Editar</button>
                <button class="delete" onclick="deleteCourse('${course.id}')">Excluir</button>
            `; // Define o HTML interno do item de lista
            courseList.appendChild(li); // Adiciona o item de lista à lista de cursos
        });
    };

    // Função para salvar os cursos no Local Storage
    const saveCourses = () => {
        localStorage.setItem('courses', JSON.stringify(courses)); // Converte o array de cursos em uma string JSON e salva no Local Storage
    };

    // Torna as funções editCourse e deleteCourse acessíveis globalmente
    window.editCourse = editCourse;
    window.deleteCourse = deleteCourse;

    // Renderiza a lista de cursos ao carregar a página
    renderCourses();
});