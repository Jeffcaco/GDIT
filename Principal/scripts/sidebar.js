//Hover
let list = document.querySelectorAll('.sidebar li')
function activeLink(){
    list.forEach((item) => 
        item.classList.remove('hovered'));
    this.classList.add('hovered')
}
list.forEach((item) =>
    item.addEventListener('click', activeLink))

//Comprimir sidebar
let toggle = document.querySelector('.menu_icon')
let sidebar = document.querySelector('.sidebar')
let content = document.querySelector('.content')

toggle.onclick = () => {
    sidebar.classList.toggle('active')
    content.classList.toggle('active')
}

