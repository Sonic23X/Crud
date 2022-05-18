var pais = document.querySelector('#select-pais');
var ciudad = document.querySelector('#select-ciudad');
pais.onchange = mandoPais;

function reciboCiudad(respuesta) {

  limpiar(); 

                var option = "";
               respuesta.forEach(element => {
                option +=
                "<option value=" +
                parseInt(element.id) +
                ">" +
                element.Name +
                "</option>";
                });
                ciudad.innerHTML =  '';
                ciudad.innerHTML =  option;


}

function mandoPais() {
    const getRequest = async (URL) => {
        try {

            const response = await fetch(URL);
            const responseJSON = await response.json();
            reciboCiudad(responseJSON);
            console.log(responseJSON);
        } catch (error) {
            console.log(error);
        }

    }
    getRequest('/cities/' + pais.value);
}

function limpiar(){
while(ciudad.options.length > 0){                
    ciudad.remove(0);
  } 
}

$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );


