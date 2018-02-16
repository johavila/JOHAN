function ajax(url, data, typeResponse, procesando, completado) {
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange = function () {
        if (connect.readyState == 4 && connect.status == 200) {
            if(Number(typeResponse) == 2){
               completado(connect.responseText);
            }else if(Number(typeResponse) == 1){
               completado(connect.responseXML);
            }
        }else if (connect.readyState != 4) {
            if(procesando != null){
                procesando();
            }
        }
    }
    connect.open('POST', url, true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(data);
}