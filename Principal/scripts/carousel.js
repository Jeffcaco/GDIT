const slider = document.querySelector('#my_slider')
let sliderSection = document.querySelectorAll('.slider_element')
let sliderLast = sliderSection[sliderSection.length - 1]

slider.insertAdjacentElement('afterbegin', sliderLast)

const moveToRight = () => {
    let sliderFirst = document.querySelectorAll('.slider_element')[0]
    slider.style.marginLeft = '-200%'
    slider.style.transition = 'all 0.5s'
    setTimeout(() => {
        slider.style.transition = 'none'
        slider.insertAdjacentElement('beforeend', sliderFirst)
        slider.style.marginLeft = '-100%'
    }, 500)
}

setInterval(moveToRight, 4000)