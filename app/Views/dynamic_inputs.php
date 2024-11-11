<!-- app/Views/dynamic_inputs.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Inputs - CodeIgniter 4</title>
</head>
<body>
    <form action="<?= site_url('dynamicinputs/save_data') ?>" method="post" id="dynamic-form">
        <div id="inputs-container">
            <!-- Aquí se agregarán los grupos de 4 inputs dinámicamente -->
        </div>
        <button type="button" onclick="addInputs()">Agregar 4 Inputs</button>
        <button type="submit">Enviar</button>
    </form>

    <script>
        let groupId = 0;

        function addInputs() {
            const inputsContainer = document.getElementById('inputs-container');
            const groupDiv = document.createElement('div');
            groupDiv.id = `input-group-${groupId}`;
            for (let i = 0; i < 4; i++) {
                const input = document.createElement('input');
                input.type = 'text';
                input.name = `dynamic_input[]`;
                input.placeholder = `Input ${i + 1}`;
                groupDiv.appendChild(input);
            }
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Eliminar';
            deleteButton.onclick = () => deleteGroup(groupDiv);
            groupDiv.appendChild(deleteButton);
            inputsContainer.appendChild(groupDiv);
            groupId++;
        }

        function deleteGroup(groupDiv) {
            groupDiv.remove();
        }
    </script>
</body>
</html>

