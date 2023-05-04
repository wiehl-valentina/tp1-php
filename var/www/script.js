const form = document.getElementById('add');
const inputs = document.querySelectorAll('.inputs');
const button = document.getElementById('agregar');

function validarCampo(inputs) {
    inputs.forEach(input => {
        switch (input.name) {
            case 'nombre':
                if (input.value == "") {
                    window.alert("Por favor ingrese un nombre válido.");
                }
            break;
            case 'desc':
                if (input.value.length > 255) {
                    window.alert("La descripcion supera el máximo de 255 caracteres permitidos.");
                }
            break;
            case 'plat':
                if (input.value == "empty") {
                    window.alert("Por favor seleccione una plataforma válida.");
                }
            break;
            case 'url':
                if (input.value.length > 80) {
                    window.alert("La URL supera el máximo de 80 caracteres permitidos.");
                }
            break;
            case 'img':
                if (input.value == "") {
                    window.alert("Por favor ingrese una imagen.");
                }
            break;
        }
    })
}



form.addEventListener('submit', (e) => {
    validarCampo(inputs);
})

