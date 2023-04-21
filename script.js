const form = document.getElementById('add');
const inputs = document.querySelectorAll('.inputs');

// const expresiones = {
//     nombre: /^\w$/,
//     desc: /^\w{1,255}$/,
//     url: /^\w{1,80}$/
// }

function validarFormulario(e) {
    switch (e.target.name) {
        case "nombre":
            if (e.target.value == "") {
                window.alert("Por ingrese un nombre válido.");
            }
        break;
        case "desc":
            if (e.target.value.length > 255) {
                window.alert("La descripcion supera el límite de 255 caracteres.");
            }
        break;
        case "url":
            if (e.target.value.length > 80) {
                window.alert("La URL supera el límite de 80 caracteres.");
            }
        break;
        case "plat":
                if (e.target.value == "empty") {
                    window.alert("Por favor seleccione una plataforma válida.");
                }
        break;
    }
 
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario())
    input.addEventListener('blur', validarFormulario());
})

form.addEventListener('submit', (e) => {
    e.preventDefault;
})

