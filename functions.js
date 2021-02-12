let answered = false;

function sendAnswer(id) {
    if (answered) return;
    answered = true;
    
    $('#timeout-bar').animate({
        opacity: .5,
        height: "0"
    }, 100);

    $.post( "checkAnswer.php", { id: id })
    .done(function( data ) {
        var obj = JSON.parse(data);

            
            if (obj.success) {
                $('#answer-feedback').html('<p class="correct">Správně!</p>');
            } else {
                $('#answer-feedback').html('<p class="incorrect">Špatně.</p>');
            }


            var previousCss  = $("#answer-feedback").attr("style");
            $("#answer-feedback").css({
                maxHeight: '100%'
            });
            var optionHeight = $("#answer-feedback").height();
            $("#answer-feedback").attr("style", previousCss ? previousCss : "");

            console.log(optionHeight);

            $("#answer-feedback").animate({
                "max-height": optionHeight
            }, 200, function() {

                setTimeout(()=>{
    
                    $("#answer-feedback").animate({
                        "max-height": "1.2vh"
                    }, 100, function() {

                        
                        $("#inner-content").animate({
                            "opacity": 0
                        }, 150, function() {

                            location.reload();

                        });
                        
                    });

                }, 300);

            });
        
    });
}

function skipAnswer() {
    $.post( "skipAnswer.php", {})
    .done(function( data ) {
        if (!answered) location.reload();
    });
} 