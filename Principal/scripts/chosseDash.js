//  Elementos necesarios del DOM
let list1 = document.querySelectorAll('.dash_btn')
let iFrame = document.getElementById('dashb')

//  Acción a ocurrir cada que clicleemos en un botón
list1.forEach((item) =>
    item.addEventListener('click', () => {
        iFrame.setAttribute('src', item.getAttribute('dash'))
    })
)
