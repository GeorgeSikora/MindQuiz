
function sendAnswer(id) {
    $.post( "checkAnswer.php", { id: id })
    .done(function( data ) {
        location.reload();
        /*
        alert( "Data Loaded: " + data );
        var obj = JSON.parse(data);
        console.log(obj);
        */
    });
}

function skipAnswer() {
    $.post( "skipAnswer.php", {})
    .done(function( data ) {
        location.reload();
    });
}