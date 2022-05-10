let areaId = document.getElementById('area')
let subareaId = document.getElementById('subarea')

const areas1 = ['Gestión de datos y control organizacional', 'Relaciones Públicas']
const areas2 = ['Planificación, Control y Evaluación de Proyectos PCEP', 'Capacitación, Desarrollo y Mejora de Procesos CDMP']
const areas3 = ['Marketing', 'Comunicación y Desarrollo Interno']

const options1 = `<option value=5 selected>Gestión de datos y control organizacional</option>
                  <option value=6>Relaciones Públicas</option>`;

const options2 = `<option value=3 selected>Planificación, Control y Evaluación de Proyectos PCEP</option>
                  <option value=4>Capacitación, Desarrollo y Mejora de Procesos CDMP</option>`;

const options3 = `<option value=1 selected>Marketing</option>
                  <option value=2>Comunicación y Desarrollo Interno</option>`

areaId.addEventListener('change', () => {
    let valor = areaId.value
    switch(valor) {
        case '1':
            subareaId.innerHTML = options1
            break
        case '2':
            subareaId.innerHTML = options2
            break
        case '3':
            subareaId.innerHTML = options3
            break
        default:
            console.log("gaaa")
            break
    }
})