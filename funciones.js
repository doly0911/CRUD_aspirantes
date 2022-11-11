

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
    let response ;

    console.log("entre a get_aspirant")
       

    $.ajax({
        type: "POST",
        cache: false,
        url: "candidate.php",
        success : function(data)
         {
            const old_tbody = document.getElementById("tableBody")
            old_tbody.innerHTML = data
         }
    })
        
}

function delete_candidate(id_aspirante){
    var id = id_aspirante;
    console.log("llegue al js, id: ", id)

    $.ajax({
        url: "delete_candidate.php",
        type: "POST",
        data: {"id": id}
    })
    .done(function( data, textStatus, jqXHR ) {
        let result = JSON.parse(data);
        console.log(result.status) 
        if (result.status == 1) {
            document.getElementById(id).remove();
            alert(result.data);
        }
        if(result.status== 0){
            alert(result.data);
        }
     })
     .fail(function( jqXHR, textStatus, errorThrown ) {
         console.log("llegue al error de js: ", textStatus)
    });
}

function clear_inputs(){        
    $("#nombre").val("");
    $("#apellido").val("");
    $("#estado").val("");
}
