//  Como somos pocos no sirve el efecto gaa
let h4Datos = document.getElementById('h4_datos')
let h4Relaciones = document.getElementById('h4_relaciones')

const count = (steps, time, etiqueta) => {
    let period = time / steps
    let contador = 1
    console.log("Periodo: ",period)
    console.log("Cantidad a contar: ", steps)
    console.log("Tiempo en el que se ejecuta:", time)
    let myInterval = setInterval(() => {
        etiqueta.innerHTML = contador
    }, period);
    if(contador == steps){
        clearInterval(myInterval)
    } else {
        contador++
    }
}

//count(parseInt(h4Datos.getAttribute('cant')), 5000, h4Datos)
//count(parseInt(h4Relaciones.getAttribute('cant')), 5000, h4Relaciones)