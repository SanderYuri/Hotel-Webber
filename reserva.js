document.getElementById("reservaForm").addEventListener("change", function() {
    const tipoQuarto = document.getElementById("tipoQuarto").value;
    const pessoas = document.getElementById("pessoas").value;

    let valorBase = 0;

    switch(tipoQuarto) {
        case "executivo":
            valorBase = 200;
            break;
        case "superior":
            valorBase = 350;
            break;
        case "elite":
            valorBase = 500;
            break;
        case "luxo":
            valorBase = 900;
            break;
    }

    const valorTotal = valorBase * pessoas;
    document.getElementById("valores").value = `R$ ${valorTotal.toFixed(2)}`;
});
