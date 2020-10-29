const API_US = '../core/api/usuario.php?action=';

//Funcion de cerrar sesión de usuario por inactividad.
function signOffInactivity() {
    swal({
        title: 'Advertencia',
        text: 'La sesion se cerrara por inactividad, por favor inicie session de nuevo',
        icon: 'warning',            
        closeOnClickOutside: false,
        closeOnEsc: false
    })
        .then(function (value) {
            // Se verifica si fue cliqueado el botón Aceptar para hacer la petición de cerrar sesión, de lo contrario se continua con la sesión actual.
            if (value) {
                $.ajax({
                    dataType: 'json',
                    url: API_US + 'logout'
                })
                    .done(function (response) {
                        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                        if (response.status) {
                            sweetAlert(1, response.message, 'index.php');
                        } else {
                            sweetAlert(2, response.exception, null);
                        }
                    })
                    .fail(function (jqXHR) {
                        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
                        if (jqXHR.status == 200) {
                            console.log(jqXHR.responseText);
                        } else {
                            console.log(jqXHR.status + ' ' + jqXHR.statusText);
                        }
                    });
            } else {
                sweetAlert(4, 'Puede continuar con la sesión', null);
            }
        });
}

/**
 * Document    : Auto Logout Script
 * Descriptcion: Force a logout automatically after a certain amount of time using HTML/JQuery/PHP. 

*/


$(function()
{

    function timeChecker()
    {
        setInterval(function()
        {
            var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");  
            timeCompare(storedTimeStamp);
        },3000);
    }


    function timeCompare(timeString)
    {
        var maxMinutes  = 1;  //MAYOR A 1 MIN.
        var currentTime = new Date();
        var pastTime    = new Date(timeString);
        var timeDiff    = currentTime - pastTime;
        var minPast     = Math.floor( (timeDiff/60000) ); 

        if( minPast > maxMinutes)
        {
            sessionStorage.removeItem("lastTimeStamp");
            signOffInactivity();
            
            return false;
        }else
        {
            //JUST ADDED AS A VISUAL CONFIRMATION
            console.log(currentTime +" - "+ pastTime+" - "+minPast+" min past");
        }
    }

    if(typeof(Storage) !== "undefined") 
    {
        $(document).mousemove(function()
        {
            var timeStamp = new Date();
            sessionStorage.setItem("lastTimeStamp",timeStamp);
        });

        timeChecker();
    }  
});//END JQUERY

