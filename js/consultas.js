$(document).ready(function () {
  // Cargar los datos por defecto al cargar la página
  cargarDatos("");

  // Asignar el evento de búsqueda al input de búsqueda
  $("#busqueda-consultas").keyup(function () {
    var termino = $(this).val();
    cargarDatos(termino);
  });
});

function cargarDatos(termino) {
  // Hacer la petición AJAX
  $.ajax({
    url: "ajax/cargar_consultas.php",
    type: "GET",
    dataType: "json",
    data: { termino: termino },
      success: function (resultados) {
          // Limpiar la tabla antes de agregar los datos
          var tbody = $("#tabla-consultas tbody");
          tbody.empty();

          // Agregar los datos a la tabla
          $.each(resultados, function (index, consultas) {
              var tr = $("<tr>");
              tr.append("<td>" + consultas.id_mascotas + "</td>");
              tr.append("<td>" + consultas.id_cliente + "</td>");
              tr.append("<td>" + consultas.examen_fisico + "</td>");
              tr.append("<td>" + consultas.diagnostico + "</td>");
              tr.append("<td>" + consultas.medicamentos + "</td>");
              tr.append("<td>" + consultas.proxima_cita + "</td>");
              tr.append("<td>" + consultas.costo + "</td>");
              tr.append(
                  "<td><button data-bs-toggle='modal' data-bs-target='#exampleModal' class='editar-consulta btn btn-outline-warning bi bi-pencil-square' data-id='" +
                  consultas.id_consulta +
                  "'></button></td>"
              ); // Botón de edición
              tr.append(
                  "<td><button class='eliminar-consulta btn btn-outline-danger bi bi-trash' data-id='" +
                  consultas.id_consulta +
                  "'></button></td>"
              ); // Botón de eliminación
              tbody.append(tr);
          });
          $(".editar-consulta").click(function () {
        var idconsulta = $(this).data("id");
        //************************************************************************************** */
        // Hacer la petición AJAX para obtener los datos de la consulta para editar
        $.ajax({
          url: "ajax/obtener_consultas.php?id=" + idConsulta,
          type: "GET",
          dataType: "json",
          success: function (consulta) {
            // Llenar los campos del formulario con los datos de la consulta para editar
            $("#mascota_id").val(consulta.mascota_id);
            $("#cliente_id").val(consulta.cliente_id);
            $("#exaFis").val(consulta.exaFis);
            $("#diagnostic").val(consulta.diagnostic);
            $("#medi").val(consulta.medi);
            $("#citaProxi").val(consulta.citaProxi);
            $("#totPag").val(consulta.totPag);

            // Cambiar el texto del botón de submit para indicar que se está editando
            $("button[type='submit']").text("Editar");

            // Agregar el atributo data-id al formulario para enviar el ID de la consulta a editar
            $("#form_consultas").attr("data-id", idConsulta);
          },
          error: function () {
            alert("Error al obtener los datos de la consulta");
          },
        });
          });
        /************************************************************************************************* */
      // Asignar el evento de click al botón de eliminación
      $(".eliminar-consulta").click(function () {
        var idConsulta = $(this).data("id");

        // Hacer la petición AJAX para eliminar el registro
        $.ajax({
          url: "ajax/eliminar_consultas.php?id=" + idConsulta,
          type: "GET",
          success: function () {
            alert("Consulta eliminada exitosamente");
            // Recargar la tabla de la consulta para mostrar los cambios
            cargarDatos("");
          },
          error: function () {
            alert("Error al eliminar la consulta");
          },
        });
      });
    },
    error: function () {
      alert("Error al cargar los datos");
    },
  });
}

$("#form_consultas").submit(function (event) {
  event.preventDefault(); // detiene el envío del formulario
  guardarCliente(); // llama a la función para guardar la mascota
});
function guardarCliente() {
  var datos = $("#form_consultas").serialize(); // serializa los datos del formulario
  $.ajax({
    url: "insert_consultas.php", // archivo PHP para procesar los datos
    type: "post",
    data: datos,
    success: function (response) {
      alert("Consulta guardada exitosamente");
      $("#form_consultas")[0].reset();

      // hacer algo en respuesta exitosa del servidor
      cargarDatos("");
    },
    error: function (xhr, status, error) {
      alert("Error al guardar la consulta");
      // manejar el error del servidor
    },
  });
}