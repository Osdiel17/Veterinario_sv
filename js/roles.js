$(document).ready(function () {
  // Cargar los datos por defecto al cargar la página
  cargarDatos("");

  // Asignar el evento de búsqueda al input de búsqueda
  $("#busqueda-roles").keyup(function () {
    var termino = $(this).val();
    cargarDatos(termino);
  });
});

function cargarDatos(termino) {
  // Hacer la petición AJAX
  $.ajax({
    url: "ajax/cargar_roles.php",
    type: "GET",
    dataType: "json",
    data: { termino: termino },
      success: function (resultados) {
          // Limpiar la tabla antes de agregar los datos
          var tbody = $("#tabla-roles tbody");
          tbody.empty();

          // Agregar los datos a la tabla
          $.each(resultados, function (index, roles) {
              var tr = $("<tr>");
              tr.append("<td>" + roles.nombre + "</td>");
              tr.append("<td>" + roles.status + "</td>");
              tr.append(
                  "<td><button data-bs-toggle='modal' data-bs-target='#exampleModal' class='editar-roles btn btn-outline-warning bi bi-pencil-square' data-id='" +
                  roles.id_rol +
                  "'></button></td>"
              ); // Botón de edición
              tr.append(
                  "<td><button class='eliminar-roles btn btn-outline-danger bi bi-trash' data-id='" +
                  roles.id_rol +
                  "'></button></td>"
              ); // Botón de eliminación
              tbody.append(tr);
          });
          $(".editar-roles").click(function () {
        var idroles = $(this).data("id");
        //************************************************************************************** */
        // Hacer la petición AJAX para obtener los datos del rol para editar
        $.ajax({
          url: "ajax/obtener_roles.php?id=" + idRoles,
          type: "GET",
          dataType: "json",
          success: function (roles) {
            // Llenar los campos del formulario con los datos del cliente para editar
            $("#nomRol").val(roles.nomRol);
            $("#estatus").val(roles.estatus);

            // Cambiar el texto del botón de submit para indicar que se está editando
            $("button[type='submit']").text("Editar");

            // Agregar el atributo data-id al formulario para enviar el ID de la mascota a editar
            $("#form_roles").attr("data-id", idRoles);
          },
          error: function () {
            alert("Error al obtener los datos del rol");
          },
        });
          });
        /************************************************************************************************* */
      // Asignar el evento de click al botón de eliminación
      $(".eliminar-roles").click(function () {
        var idRoles = $(this).data("id");

        // Hacer la petición AJAX para eliminar el registro
        $.ajax({
          url: "ajax/eliminar_roles.php?id=" + idRoles,
          type: "GET",
          success: function () {
            alert("Rol eliminado exitosamente");
            // Recargar la tabla de mascotas para mostrar los cambios
            cargarDatos("");
          },
          error: function () {
            alert("Error al eliminar el rol");
          },
        });
      });
    },
    error: function () {
      alert("Error al cargar los datos");
    },
  });
}

$("#form_roles").submit(function (event) {
  event.preventDefault(); // detiene el envío del formulario
  guardarCliente(); // llama a la función para guardar la mascota
});
function guardarCliente() {
  var datos = $("#form_roles").serialize(); // serializa los datos del formulario
  $.ajax({
    url: "insert_roles.php", // archivo PHP para procesar los datos
    type: "post",
    data: datos,
    success: function (response) {
      alert("Rol guardado exitosamente");
      $("#form_roles")[0].reset();

      // hacer algo en respuesta exitosa del servidor
      cargarDatos("");
    },
    error: function (xhr, status, error) {
      alert("Error al guardar el rol");
      // manejar el error del servidor
    },
  });
}