// Função para adicionar o curso na lista de 'Meus Cursos'
function addCourse(courseName) {
    const myCourses = document.getElementById('my-courses');
    const courseItem = document.createElement('li');
    courseItem.textContent = courseName;

    // Verifica se o curso já foi adicionado
    const exists = [...myCourses.children].some(course => course.textContent === courseName);
    if (!exists) {
        myCourses.appendChild(courseItem);
    } else {
        alert('Esse curso já está na sua lista!');
    }
}
