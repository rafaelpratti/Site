// Função para adicionar o curso na lista de 'Meus Cursos'
function addCourse(courseName) {
    const myCourses = document.getElementById('my-courses');
    
    // Verifica se o curso já foi adicionado
    const exists = [...myCourses.children].some(course => course.textContent.includes(courseName));
    if (!exists) {
        const courseItem = document.createElement('li');
        courseItem.innerHTML = `${courseName} <button class="remove-course" onclick="removeCourse(this)">✖</button>`;
        myCourses.appendChild(courseItem);
    } else {
        alert('Esse curso já está na sua lista!');
    }
}

// Função para remover o curso da lista de 'Meus Cursos'
function removeCourse(button) {
    const courseItem = button.parentElement;
    courseItem.remove();
}


//---------------------------------------------------------------------------------------------------------------------//

var coll = document.getElementById('collapsible');
var accessibilitybox = document.getElementById('acbox');
coll.addEventListener("click", function(){
    console.log("a")
    if (accessibilitybox.style.display === "flex") {
        accessibilitybox.style.display = "none";
      } else {
        accessibilitybox.style.display = "flex";
      }
    })

