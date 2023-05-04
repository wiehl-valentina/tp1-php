const form = document.getElementById('add');
const inputs = document.querySelectorAll('.inputs');
const button = document.getElementById('agregar');

form.addEventListener("submit", validarCampos)
function validarCampos(e, input){
    inputs.forEach(input => {
        switch (input.name) {
            case 'nombre':
                if (input.value == "") {
                    e.preventDefault()
                    window.alert("Por favor ingrese un nombre válido.");
                }
                if (input.value.length > 255) {
                    e.preventDefault()
                    window.alert("El nombre supera el maximo de caracteres permitidos");
                }
            break;
            case 'desc':
                if (input.value.length > 255) {
                    e.preventDefault()
                    window.alert("La descripcion supera el máximo de 255 caracteres permitidos.");
                }
                if (input.value.length == 0) {
                    e.preventDefault()
                    window.alert("Por favor ingrese una descripcion");
                }
            break;
            case 'plat':
                if (input.value == "") {
                    e.preventDefault()
                    window.alert("Por favor seleccione una plataforma válida.");
                }
            break;
            case 'url':
                if (input.value.length > 80) {
                    e.preventDefault()
                    window.alert("La URL supera el máximo de 80 caracteres permitidos.");
                }
                if (input.value.length == 0) {
                    e.preventDefault()
                    window.alert("Por favor ingrese una url valida");
                }
            break;
        }
    })
}