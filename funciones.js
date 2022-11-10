

function crearUsuario(){
    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let estado = document.getElementById("estado").value;

    if(nombre == ""){
        alert("no debe ser vacio");
    }

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "add_candidate.php",
        data: {"nombre": nombre, "apellido": apellido, "estado": estado}
    })
    .done(function( data, textStatus, jqXHR ) {
       console.log(data, textStatus)  
       if (data.status == 1) {
        alert(data.data);
       }
       clear_inputs();
       get_aspirant();
    })
    .fail(function( jqXHR, textStatus, errorThrown ) {
        console.log("status crear usuario: ", textStatus)
   });

}

function get_aspirant() {
    var response ;

    console.log("entre a get_aspirant")
       

    $.ajax({
        type: "GET",
        cache: false,
        url: "candidate.php",
        success : function(data)
         {
             response = JSON.parse(data).data;
            const old_tbody = document.getElementById("tableBody")
            const new_tbody = document.createElement('tbody');
            // Insert a row at the end of table
            
            response.forEach(element => {
                var newRow = new_tbody.insertRow();
                var newCell = newRow.insertCell();
                var newText = document.createTextNode(element.id_aspirante);
                newCell.appendChild(newText);

                newCell = newRow.insertCell();
                newText = document.createTextNode(element.nombre);
                newCell.appendChild(newText);

                newCell = newRow.insertCell();
                newText = document.createTextNode(element.apellido);
                newCell.appendChild(newText);

                newCell = newRow.insertCell();
                newText = document.createTextNode(element.id_estado);
                newCell.appendChild(newText);

                newCell = newRow.insertCell();
                newCell.innerHTML = "<a href='edit_candidate.php?id=" + element.id_aspirante + "' class='btn btn-info'>Editar</a>" 
                    + " <a href='delete_candidate.php?id=" + element.id_aspirante + "' class='btn btn-danger'>Eliminar</a>"
            });
            old_tbody.parentNode.replaceChild(new_tbody, old_tbody)

            // Insert a cell at the end of the row
            
             
            console.log(response.data);
         }
    })
        
}

function clear_inputs(){        
    $("#nombre").val("");
    $("#apellido").val("");
    $("#estado").val("");
}
