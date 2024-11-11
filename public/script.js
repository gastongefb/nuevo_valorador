function addInput() {
    var container = document.getElementById("emailContainer");
    var input = document.createElement("input");
    input.type = "email";
    input.name = "emails[]"; // Utilizamos un array para manejar múltiples correos
    container.appendChild(input);
}

function removeInput() {
    var container = document.getElementById("emailContainer");
    var inputs = container.getElementsByTagName("input");
    if (inputs.length > 0) {
        container.removeChild(inputs[inputs.length - 1]);
    }
}

function addInput2() {
    var container = document.getElementById("emailContainer");
    var input = document.createElement("input");
    input.type = "email";
    input.name = "emails2[]"; // Utilizamos un array para manejar múltiples correos
    container.appendChild(input);
}

function removeInput2() {
    var container = document.getElementById("emailContainer");
    var inputs = container.getElementsByTagName("input");
    if (inputs.length > 0) {
        container.removeChild(inputs[inputs.length - 1]);
    }
}
