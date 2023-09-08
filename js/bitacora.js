
        function buscar() {
            // Obtiene el valor de búsqueda
            var input = document.getElementById("myInput");
            var filtro = input.value.toUpperCase();

            // Obtiene la tabla y las filas
            var table = document.getElementById("myTable");
            var rows = table.getElementsByTagName("tr");

            // Itera a través de todas las filas y oculta las que no coinciden con la búsqueda
            for (var i = 1; i < rows.length; i++) {
                var cell = rows[i].getElementsByTagName("td")[0];
                if (cell) {
                    var textoFila = cell.textContent || cell.innerText;
                    if (textoFila.toUpperCase().indexOf(filtro) > -1) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }
        }
    