$(document).ready(function () {
  // Cargar los datos por defecto al cargar la página
  cargarDatos("");

  // Asignar el evento de búsqueda al input de búsqueda
  $("#busqueda-cliente").keyup(function () {
    var termino = $(this).val();
    cargarDatos(termino);
  });
});

function cargarDatos(termino) {
  // Hacer la petición AJAX
  $.ajax({
    url: "ajax/cargar_clientes.php",
    type: "GET",
    dataType: "json",
    data: { termino: termino },
      success: function (resultados) {
          // Limpiar la tabla antes de agregar los datos
          var tbody = $("#tabla-clientes tbody");
          tbody.empty();

          // Agregar los datos a la tabla
          $.each(resultados, function (index, cliente) {
              var tr = $("<tr>");
              tr.append("<td>" + cliente.nombre + "</td>");
              tr.append("<td>" + cliente.telefono + "</td>");
              tr.append("<td>" + cliente.dui + "</td>");
              tr.append("<td>" + cliente.direccion + "</td>");
              tr.append("<td>" + cliente.email + "</td>");
              tr.append("<td>" + cliente.estatus + "</td>");
              tr.append(
                  "<td><button data-bs-toggle='modal' data-bs-target='#exampleModal' class='editar-cliente btn btn-outline-warning bi bi-pencil-square' data-id='" +
                  cliente.id_cliente +
                  "'></button></td>"
              ); // Botón de edición
              tr.append(
                  "<td><button class='eliminar-cliente btn btn-outline-danger bi bi-trash' data-id='" +
                  cliente.id_cliente +
                  "'></button></td>"
              ); // Botón de eliminación
              tbody.append(tr);
          });
          $(".editar-cliente").click(function () {
        var idcliente = $(this).data("id");
        //************************************************************************************** */
        // Hacer la petición AJAX para obtener los datos del cliente para editar
        $.ajax({
          url: "ajax/obtener_clientes.php?id=" + idCliente,
          type: "GET",
          dataType: "json",
          success: function (cliente) {
            // Llenar los campos del formulario con los datos del cliente para editar
            $("#nombre").val(cliente.nombre);
            $("#telefono").val(cliente.telefono);
            $("#dui").val(cliente.dui);
            $("#direccion").val(cliente.direccion);
            $("#email").val(cliente.email);
            $("#estatus").val(cliente.estatus);

            // Cambiar el texto del botón de submit para indicar que se está editando
            $("button[type='submit']").text("Editar");

            // Agregar el atributo data-id al formulario para enviar el ID de la mascota a editar
            $("#form_clientes").attr("data-id", idCliente);
          },
          error: function () {
            alert("Error al obtener los datos del cliente");
          },
        });
          });
        /************************************************************************************************* */
      // Asignar el evento de click al botón de eliminación
      $(".eliminar-cliente").click(function () {
        var idCliente = $(this).data("id");

        // Hacer la petición AJAX para eliminar el registro
        $.ajax({
          url: "ajax/eliminar_clientes.php?id=" + idCliente,
          type: "GET",
          success: function () {
            alert("Cliente eliminado exitosamente");
            // Recargar la tabla de mascotas para mostrar los cambios
            cargarDatos("");
          },
          error: function () {
            alert("Error al eliminar el cliente");
          },
        });
      });
    },
    error: function () {
      alert("Error al cargar los datos");
    },
  });
}

$("#form_clientes").submit(function (event) {
  event.preventDefault(); // detiene el envío del formulario
  guardarCliente(); // llama a la función para guardar la mascota
});
function guardarCliente() {
  var datos = $("#form_clientes").serialize(); // serializa los datos del formulario
  $.ajax({
    url: "insert_clientes.php", // archivo PHP para procesar los datos
    type: "post",
    data: datos,
    success: function (response) {
      alert("Cliente guardado exitosamente");
      $("#form_clientes")[0].reset();

      // hacer algo en respuesta exitosa del servidor
      cargarDatos("");
    },
    error: function (xhr, status, error) {
      alert("Error al guardar el cliente");
      // manejar el error del servidor
    },
  });
}