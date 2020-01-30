document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        
        timeZone: 'Australia/Melbourne',
        locale: 'en-au',
        plugins: ['interaction', 'dayGrid'],
        //defaultDate: to get the current date, doesnt need to especify
        //defaultDate: '2019-04-12',
        editable: true,
        eventLimit: true, // allows "more" link when too many events
        events: './Calendar/list_events.php',
        cache: true,
        //cache
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        eventClick: function (info) {
            info.jsEvent.preventDefault(); // don't let the browser navigate
            
            $("#del_evento").attr("href", "./Calendar/delete_event.php?id=" + info.event.id);
            console.log(info.event.id);
            console.log("href", "./Calendar/delete_event.php?id=" + info.event.id);
            // will show in modal details
            $('#view #id').text(info.event.id); //message_type
            $('#view #id').val(info.event.id);
            $('#view #title').text(info.event.title); //message_type
            $('#view #title').val(info.event.title);
            $('#view #to_whom').text(info.event.extendedProps.to_whom);
            $('#view #to_whom').val(info.event.extendedProps.to_whom);
            $('#view #start').text(info.event.start.toLocaleString());
            $('#view #start').val(info.event.start.toLocaleString());
            $('#view #content').text(info.event.extendedProps.content); // this is gonna be editable // info.event.content
            $('#view #content').val(info.event.extendedProps.content);
            $('#view #status').text(info.event.extendedProps.status); // this is gonna be editable //
            $('#view #status').val(info.event.extendedProps.status);
            $('#view #color').val(info.event.backgroundColor);
            $('#view').modal('show');
        },
        selectable: true, //make the day box selectable
        selectHelper: true,
        select: function (info) {
            //alert('Event start: ' + info.start.toLocaleString());
            $('#cadastrar #start').val(info.start.toLocaleString());
            //$('#cadastrar #status').val(info.event.extendedProps.status); // fullcalendar isnt recognizing this value
            $('#cadastrar').modal('show');
        }
    });

    calendar.render();
});

//Date and time setting to avoid error on user input
function DataHora(evento, objeto) {
    var keypress = (window.event) ? event.keyCode : evento.which;
    campo = eval(objeto);
    if (campo.value == '00/00/0000 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;
    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
    } else {
        event.returnValue = false;
    }
}

$(document).ready(function () {
    //identifying btn at form
    $("#addevent").on("submit", function (event) {
        event.preventDefault(); //to pause the modal, not closing on click
       $.ajax({
            method: "POST",
            url: "./Calendar/cad_event.php",
            data: new FormData(this), //getting data, instantiating
            //avoiding errors
            contentType: false,
            processData: false,
            success: function (retorna) { //case success or not, returns to calendar or alert
                if (retorna['sit']) {
                    $("#msg-cad").html(retorna['msg']);
                    location.reload(); //reloads the page
                } else {
                    $("#msg-cad").html(retorna['msg']);
                }
            }
        })
    });

$('.btn-canc-vis').on("click", function(){
    $('.visevent').slideToggle();
    $('.formedit').slideToggle();
});

$('.btn-canc-edit').on("click", function(){
    $('.formedit').slideToggle();
    $('.visevent').slideToggle();
});

$("#editevent").on("submit", function (event) {
    event.preventDefault(); //to pause the modal, not closing on click
   $.ajax({
        method: "POST",
        url: "./Calendar/edit_event.php?id="+event.id,
        data: new FormData(this), //getting data, instantiating
        //avoiding errors
        contentType: false,
        processData: false,
        success: function (retorna) { //case success or not, returns to calendar or alert
            if (retorna['sit']) {
                //$("#msg-edit").html(retorna['msg']);
                location.reload(); //reloads the page
            } else {
                $("#msg-edit").html(retorna['msg']);
            }
        }
    })
});

});