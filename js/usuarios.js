$(document).ready(function () {
  // Cargar los datos por defecto al cargar la página
  cargarDatos("");

  // Asignar el evento de búsqueda al input de búsqueda
  $("#busqueda-usuarios").keyup(function () {
    var termino = $(this).val();
    cargarDatos(termino);
  });
});

function cargarDatos(termino) {
  // Hacer la petición AJAX
  $.ajax({
    url: "ajax/cargar_usuarios.php",
    type: "GET",
    dataType: "json",
    data: { termino: termino },
      success: function (resultados) {
          // Limpiar la tabla antes de agregar los datos
          var tbody = $("#tabla-usuarios tbody");
          tbody.empty();

          // Agregar los datos a la tabla
          $.each(resultados, function (index, usuario) {
              var tr = $("<tr>");
              tr.append("<td>" + usuario.usuarios + "</td>");
              tr.append("<td>" + usuario.password + "</td>");
              tr.append("<td>" + usuario.email + "</td>");
              tr.append("<td>" + usuario.telefono + "</td>");
              tr.append("<td>" + usuario.status + "</td>");
              tr.append("<td>" + usuario.id_roles + "</td>");
              tr.append(
                  "<td><button data-bs-toggle='modal' data-bs-target='#exampleModal' class='editar-usuario btn btn-outline-warning bi bi-pencil-square' data-id='" +
                  usuario.id_usuario +
                  "'></button></td>"
              ); // Botón de edición
              tr.append(
                  "<td><button class='eliminar-usuario btn btn-outline-danger bi bi-trash' data-id='" +
                  usuario.id_usuario +
                  "'></button></td>"
              ); // Botón de eliminación
              tbody.append(tr);
          });
          $(".editar-usuario").click(function () {
        var idusuario = $(this).data("id");
        //************************************************************************************** */
        // Hacer la petición AJAX para obtener los datos del usuario para editar
        $.ajax({
          url: "ajax/obtener_usuarios.php?id=" + idUsuario,
          type: "GET",
          dataType: "json",
          success: function (usuario) {
            // Llenar los campos del formulario con los datos del usuario para editar
            $("#usuario").val(usuario.usuario);
            $("#contra").val(usuario.contra);
            $("#ema").val(usuario.ema);
            $("#telef").val(usuario.telef);
            $("#status").val(usuario.status);
            $("#rol_id").val(usuario.rol_id);

            // Cambiar el texto del botón de submit para indicar que se está editando
            $("button[type='submit']").text("Editar");

            // Agregar el atributo data-id al formulario para enviar el ID del usuario a editar
            $("#form_usuarios").attr("data-id", idUsuario);
          },
          error: function () {
            alert("Error al obtener los datos del usuario");
          },
        });
          });
        /************************************************************************************************* */
      // Asignar el evento de click al botón de eliminación
      $(".eliminar-usuario").click(function () {
        var idUsuario = $(this).data("id");

        // Hacer la petición AJAX para eliminar el registro
        $.ajax({
          url: "ajax/eliminar_usuarios.php?id=" + idUsuario,
          type: "GET",
          success: function () {
            alert("Usuario eliminado exitosamente");
            // Recargar la tabla del usuario para mostrar los cambios
            cargarDatos("");
          },
          error: function () {
            alert("Error al eliminar el usuario");
          },
        });
      });
    },
    error: function () {
      alert("Error al cargar los datos");
    },
  });
}

$("#form_usuarios").submit(function (event) {
  event.preventDefault(); // detiene el envío del formulario
  guardarCliente(); // llama a la función para guardar la mascota
});
function guardarCliente() {
  var datos = $("#form_usuarios").serialize(); // serializa los datos del formulario
  $.ajax({
    url: "insert_usuarios.php", // archivo PHP para procesar los datos
    type: "post",
    data: datos,
    success: function (response) {
      alert("Usuario guardado exitosamente");
      $("#form_usuarios")[0].reset();

      // hacer algo en respuesta exitosa del servidor
      cargarDatos("");
    },
    error: function (xhr, status, error) {
      alert("Error al guardar el usuario");
      // manejar el error del servidor
    },
  });
}