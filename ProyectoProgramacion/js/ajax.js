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

var bootstrap_alert = function() {}
bootstrap_alert.danger = function(message) {
    document.getElementById('alert').innerHTML = '<div class="alert alert-danger alert-dismissable fade in"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><span>'+message+'</span></div>'
}
bootstrap_alert.warning = function(message) {
    document.getElementById('alert').innerHTML = '<div class="alert alert-warning alert-dismissable fade in"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><span>'+message+'</span></div>'
}
bootstrap_alert.success = function(message) {
    document.getElementById('alert').innerHTML = '<div class="alert alert-success alert-dismissable fade in"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><span>'+message+'</span></div>'
}
bootstrap_alert.info = function(message) {
    document.getElementById('alert').innerHTML = '<div class="alert alert-info alert-dismissable fade in"><a class="close" data-dismiss="alert" aria-label="close">&times;</a><span>'+message+'</span></div>'
}