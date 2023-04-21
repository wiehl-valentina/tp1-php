const form = document.getElementById('add');
const inputs = document.querySelectorAll('.text-type');

const expresiones = {
    nombre: /^\w$/,
    desc: /^\w{1,255}$/,
    url: /^\w{1,80}$/
}

console.log(inputs);

const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(campo).classList.remove('invalid-input');
        document.getElementById(campo).classList.add('valid-input');
    }
    else {
        document.getElementById(campo).classList.add('invalid-input');
        document.getElementById(campo).classList.remove('valid-input');
    }
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
        break;
        case "desc":
            validarCampo(expresiones.desc, e.target, 'desc');
        break;
        case "url":
            validarCampo(expresiones.url, e.target, 'url');
        break;
    }
 
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario)
    input.addEventListener('blur', validarFormulario);
})

form.addEventListener('submit', (e) => {
    e.preventDefault;
})

