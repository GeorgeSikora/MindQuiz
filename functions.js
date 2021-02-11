let answered = false;

function sendAnswer(id) {
    if (answered) return;
    answered = true;


    $.post( "checkAnswer.php", { id: id })
    .done(function( data ) {
        var obj = JSON.parse(data);

        $('#timeout-bar').animate({
            opacity: .5,
            height: "0"
        }, 50, function() {
                        
/*
           $( "#answer-feedback" ).animate({
                height: "100%",
            }, 150 );
            */

            /*
            if (obj.success) {
                $('#answer-feedback').html('<p class="correct">Správně!</p>');
            } else {
                $('#answer-feedback').html('<p class="incorrect">Špatně.</p>');
            }
            */

            setTimeout(()=>{
                location.reload();
            }, 500);

        });
    });
}

function skipAnswer() {
    $.post( "skipAnswer.php", {})
    .done(function( data ) {
        if (!answered) location.reload();
    });
} 