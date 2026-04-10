function toUpperCaseText(value) {
  return String(value ?? "").toLocaleUpperCase("es-ES");
}

$(function () {
  $("#btnGuardar").on("click", function () {
    const text = $("#nombre").val();
    const upper = toUpperCaseText(text);

    const resultEl = document.getElementById("resultado");
    resultEl.textContent = upper;
  });
});

