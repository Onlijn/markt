$(document).ready(function(){

    $(".aanmelden").on("click", function(){
        $(".form-overlay").fadeIn(700);
        $(".form-wrapper").fadeIn(700);
    });

    $(".close").on("click", function(){
        $(".form-overlay").fadeOut(700);
        $(".form-wrapper").fadeOut(700);
    });

    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        function doOnOrientationChange()
        {
            switch(window.orientation)
            {
              case -90:
              case 90:
                $(".aanmelden").addClass("landscape");
                $(".logo").addClass("landscape");
                $(".footer").addClass("landscape");
                break;
              default:
                $(".aanmelden").removeClass("landscape");
                $(".logo").removeClass("landscape");
                $(".footer").removeClass("landscape");
                break;
            }
        }

        window.addEventListener('orientationchange', doOnOrientationChange);

        // Initial execution if needed
        doOnOrientationChange();
    }

    $(".test-form").submit(function(e){
        if($(this)[0].checkValidity()){
            e.preventDefault();
            e.stopPropagation();
            $.ajax({
                type: "POST",
                url: "/aanmelding/markt",
                data: $(".test-form").serialize(),
                //beforeSend: function() {
                //	$('#result').html('<img src="loading.gif" />');
                //},
                success: function(data) {
                    alert("U aanmelding is succesvol ontvangen.");
                    $(".form-overlay").fadeOut(700);
                    $(".form-wrapper").fadeOut(700);
                },
                error: function (jXHR, textStatus, errorThrown) {
                    if(jXHR.status == 503)
                    {
                        alert("Nog niet alle velden zijn goed ingevuld.");
                    }
                    else if (jXHR.status == 404)
                    {
                        alert("We konden de opgegeven markt niet vinden. Wij zouden u willen vragen om een e-mail te sturen naar standhouders@directevents.nl.");
                    }
                    else
                    {
                        alert("Er is iets fout gegaan. Onze excuses voor het ongemak. Wij zouden u willen vragen om een e-mail te sturen naar standhouders@directevents.nl als dit probleem zich voor blijft doen.");
                    }
                    //alert("Er is iets foutgegaan. Herlaad de pagina en probeer opnieuw.\n\nMocht dit probleem zich voor blijven doen stuur dan een e-mail naar ibizamarktabcoude@gmail.com.");
                }
            });
        }
    });
    $("body").height($(document).height());
    $(".all").height($(document).height());

    setTimeout(function(){
        $(".beplanting").css("left", $(".beplanting").width()+"px");
        $(".glas-drinken").css("right", $(".glas-drinken").width()+"px");
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $(".dromenvanger").css("right", "30px");
        } else {
            $(".dromenvanger").css("right", "70px");
        }

        setTimeout(function(){
            $(".footer").fadeIn(700);
            $(".bord").css("top", $(".bord").height()+"px");
            setTimeout(function(){
                // $(".dromenvanger").css("top", $(".dromenvanger").height()+"px");
                $(".round").fadeIn(500);
            }, 300);
        }, 1500);
        $(window).resize(function(){
            $(".beplanting").css("left", $(".beplanting").width()+"px");
            $(".glas-drinken").css("right", $(".glas-drinken").width()+"px");
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                $(".dromenvanger").css("right", "30px");
            } else {
                $(".dromenvanger").css("right", "70px");
            }
            $(".bord").css("top", $(".bord").height()+"px");
            $("body").height($(document).height());
            $(".all").height($(document).height());
        });
    }, 1000);
});
