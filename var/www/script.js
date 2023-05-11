const form = document.getElementById('add');
const inputs = document.querySelectorAll('.inputs');
const button = document.getElementById('agregar');

form.addEventListener("submit", validarCampos)
function validarCampos(e, input){
    var errorMsg = "";
    inputs.forEach(input => {
        switch (input.name) {
            case 'nombre':
                if (input.value == "") {
                    e.preventDefault();
                    errorMsg+="Por favor ingrese un nombre válido!\n";
                    break;
                }
                if (input.value.length > 255) {
                    e.preventDefault();
                    errorMsg+="El nombre supera el maximo de caracteres permitidos!\n";
                }
            break;
            case 'imagen':
                if(input.value == ""){
                    e.preventDefault();
                    errorMsg+="Por favor ingrese una imagen!\n";
                    break;
                }
                if(!/\.(jpg|jpeg|png)$/.test(input.value)){
                    e.preventDefault();
                    errorMsg+="El archivo cargado no es una imagen valida!\n";
                }
            break;
            case 'descripcion':
                if (input.value.length == 0) {
                    e.preventDefault();
                    errorMsg+="Por favor ingrese una descripcion!\n";
                    break;
                }
            if (input.value.length > 255) {
                    e.preventDefault();
                    errorMsg+="La descripcion supera el máximo de 255 caracteres permitidos!\n";
                }
            break;
            case 'plataforma':
                if (input.value == "") {
                    e.preventDefault();
                    errorMsg+="Por favor seleccione una plataforma válida!\n";
                }
            break;
            case 'url':
                if (input.value.length == 0) {
                    e.preventDefault();
                    errorMsg+="Por favor ingrese una url valida!\n";
                    break;
                }
                if (input.value.length > 80) {
                    e.preventDefault();
                    errorMsg+="La URL supera el máximo de 80 caracteres permitidos!\n";
                }
            break;
        }
    })
    if (errorMsg != "") window.alert(errorMsg);
}