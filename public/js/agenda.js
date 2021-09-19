document.addEventListener('DOMContentLoaded', function () {

    let formulario = document.getElementById('formAgenda')
    let formularioQuery = document.querySelector("formAgenda");
    var calendarEl = document.getElementById('agenda');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        events: "evento/mostrar",
        dateClick: function (info) {
            formulario.reset();
            formulario.start.value = info.dateStr;
            formulario.end.value = info.dateStr;

            $("#evento").modal("show");
        },
        eventClick: function (info) {
            var evento = info.event;

            // console.log(evento);
            axios.post("evento/editar/" + info.event.id).then(
                (respuesta) => {
                    console.log(respuesta.data.id);
                    formulario.title.value = respuesta.data.title;
                    formulario.description.value = respuesta.data.description;
                    formulario.start.value = respuesta.data.start;
                    formulario.end.value = respuesta.data.end;

                    $("#evento").modal("show");
                }
            ).catch(error => {
                console.log("ERR:: ", error.response.data);

            });

            document.getElementById("btnDelete").addEventListener("click", function () {
                enviarDatos("evento/borrar/"+info.event.id);
                window.alert("Se a eliminado exitosamente");
            });

            document.getElementById("btnEdit").addEventListener("click", function () {
                enviarDatos("evento/modificar/"+info.event.id);
            });
        }
    });
    calendar.render();


    document.getElementById("btnSave").addEventListener("click", function () {
        enviarDatos("evento/agregar");
        Window.alert("El evento se a registrado con exito");
    });




    function enviarDatos(url) {
        const datos = new FormData(formulario);
        console.log(datos);
        console.log(formulario.title.value);
        axios.post(url, datos).then(
            (respuesta) => {
                calendar.refetchEvents();
                $("#evento").modal("hide");
            }
        ).catch(error => {
            console.log("ERR:: ", error.response.data);

        });
    }
});
