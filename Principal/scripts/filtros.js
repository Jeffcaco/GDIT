function get_valor_filtro() {
    let elements = ["valor_escuela", "valor_sexo", "valor_area", "valor_estado", "valor"];

    for (let i = 0; i < elements.length; i++) {
        $("#" + elements[i]).hide();
    }



    var criterio = $("#criterio").val();
    if (criterio == "Escuela") {
        $("#valor_escuela").show();
    } else if (criterio == "sexo") {
        $("#valor_sexo").show();
    } else if (criterio == "Area") {
        $("#valor_area").show();
    } else if (criterio == "estado") {
        $("#valor_estado").show();
    } else {
        $("#valor").show();
    }
    return valor;
}