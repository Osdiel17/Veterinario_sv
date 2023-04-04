$(document).ready(function () {
  // Cargar los datos por defecto al cargar la página
  cargarDatos("");

  // Asignar el evento de búsqueda al input de búsqueda
  $("#busqueda-mascota").keyup(function () {
    var termino = $(this).val();
    cargarDatos(termino);
  });
});

function cargarDatos(termino) {
  // Hacer la petición AJAX
  $.ajax({
    url: "ajax/cargar_mascota.php",
    type: "GET",
    dataType: "json",
    data: { termino: termino },
      success: function (resultados) {
          // Limpiar la tabla antes de agregar los datos
          var tbody = $("#tabla-mascotas tbody");
          tbody.empty();

          // Agregar los datos a la tabla
          $.each(resultados, function (index, mascota) {
              var tr = $("<tr>");
              tr.append("<td>" + mascota.nombre + "</td>");
              tr.append("<td>" + mascota.raza + "</td>");
              tr.append("<td>" + mascota.color + "</td>");
              tr.append("<td>" + mascota.peso + "</td>");
              tr.append("<td>" + mascota.altura + "</td>");
              tr.append("<td>" + mascota.sexo + "</td>");
              tr.append("<td>" + mascota.fecha_nacimiento + "</td>");
              tr.append("<td>" + mascota.id_cliente + "</td>");
              tr.append(
                  "<td><button data-bs-toggle='modal' data-bs-target='#exampleModal' class='editar-mascota btn btn-outline-warning bi bi-pencil-square' data-id='" +
                  mascota.id_mascotas +
                  "'></button></td>"
              ); // Botón de edición
              tr.append(
                  "<td><button class='eliminar-mascota btn btn-outline-danger bi bi-trash' data-id='" +
                  mascota.id_mascotas +
                  "'></button></td>"
              ); // Botón de eliminación
              tbody.append(tr);
          });
          $(".editar-mascota").click(function () {
        var idMascota = $(this).data("id");
        //************************************************************************************** */
        // Hacer la petición AJAX para obtener los datos del cliente para editar
        $.ajax({
          url: "ajax/obtener_mascota.php?id=" + idMascota,
          type: "GET",
          dataType: "json",
          success: function (mascota) {
            // Llenar los campos del formulario con los datos de la mascota para editar
            $("#nomMasc").val(mascota.nomMasc);
            $("#raza").val(mascota.raza);
            $("#color").val(mascota.color);
            $("#peso").val(mascota.peso);
            $("#alt").val(mascota.alt);
            $("#sexo").val(mascota.sexo);
            $("#nacMas").val(mascota.nacMas);
            $("#cliente_id").val(mascota.cliente_id);  

            // Cambiar el texto del botón de submit para indicar que se está editando
            $("button[type='submit']").text("Editar");

            // Agregar el atributo data-id al formulario para enviar el ID de la mascota a editar
            $("#form_mascotas").attr("data-id", idMascota);
          },
          error: function () {
            alert("Error al obtener los datos de la mascota");
          },
        });
          });
        /************************************************************************************************* */
      // Asignar el evento de click al botón de eliminación
      $(".eliminar-mascota").click(function () {
        var idMascota = $(this).data("id");

        // Hacer la petición AJAX para eliminar el registro
        $.ajax({
          url: "ajax/eliminar_mascota.php?id=" + idMascota,
          type: "GET",
          success: function () {
            alert("Mascota eliminada exitosamente");
            // Recargar la tabla de mascotas para mostrar los cambios
            cargarDatos("");
          },
          error: function () {
            alert("Error al eliminar la mascota");
          },
        });
      });
    },
    error: function () {
      alert("Error al cargar los datos");
    },
  });
}

$("#form_mascotas").submit(function (event) {
  event.preventDefault(); // detiene el envío del formulario
  guardarCliente(); // llama a la función para guardar la mascota
});
function guardarCliente() {
  var datos = $("#form_mascotas").serialize(); // serializa los datos del formulario
  $.ajax({
    url: "insert_mascotas.php", // archivo PHP para procesar los datos
    type: "post",
    data: datos,
    success: function (response) {
      alert("Mascota guardada exitosamente");
      $("#form_mascotas")[0].reset();

      // hacer algo en respuesta exitosa del servidor
      cargarDatos("");
    },
    error: function (xhr, status, error) {
      alert("Error al guardar la mascota");
      // manejar el error del servidor
    },
  });
}