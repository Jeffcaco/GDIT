let areaId = document.getElementById('area')
let subareaId = document.getElementById('subarea')

let totalSubareas = subareaId.children

const changeVisibility = (areaId) => {
    let select = 0
    for(let i=0; i < totalSubareas.length; i++){
        totalSubareas[i].removeAttribute('selected')
        if (totalSubareas[i].getAttribute('id_area') == areaId) {
            totalSubareas[i].classList.remove('ocultar_subarea')
            if(select == 0) {
                totalSubareas[i].setAttribute('selected', '')
                select = 1
            }
        } else {
            totalSubareas[i].classList.add('ocultar_subarea')
        }
    }
}

areaId.addEventListener('change', () => {
    let valor = areaId.value
    changeVisibility(valor)
})