
$(function () {
   buscar_datos();
   busqueda();

});

function buscar_datos(consulta) {
    $.ajax({
        url:'../backend/buscar.php',
        type:'post',
        data:{consulta:consulta}
    })
    .done(function(respuesta){
        $('#datos').html(respuesta);
    })
    .fail(function(){
        console.log('error')
    })

}


//utilizando jquery

function busqueda(){
    $(document).on('keyup', function () {
        let valor = $('#busqueda').val();
            if (valor != "") {
                buscar_datos(valor);
            } else {
                buscar_datos();
            }

    })
}



//utilizando javascript 

// document.addEventListener("keyup", function(event) {
//        const busqueda = document.getElementById('busqueda');
//        const valor = busqueda.value;
//        if(valor != ""){
//             buscar_datos(valor);
//         }else {
//             buscar_datos();
//         }
//   });