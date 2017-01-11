<!DOCTYPE html>
<html>
	<head>
		<title>Hippie markt de ronde venen</title>

		<!-- FONTS -->
		<!-- <link rel="stylesheet" type="text/css" href="css/fonts/stylesheet.css"> -->
		<link rel="stylesheet" type="text/css" href="assets/fonts/stylesheet.css">

		<!-- STYLES -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="{!! Html::style('/assets/style.css') !!}">
		<!-- <link rel="stylesheet" href="css/bjqs.css"> -->

		<!-- JS -->
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("input").each(function(){
                    if(!$(this).hasClass("submit-button") && ($(this).attr("name") != "_token") && !($(this).hasClass("producten")) && ($(this).attr("name") != "markt_id") ){
                        if($(this).attr("name") == "email"){
                            $(this).val("test@test.nl");
                        } else {
                            $(this).val("test");
                        }
                    }
                });

                // $("")

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
                                $(".output").html(data);
            				},
            				error: function (jXHR, textStatus, errorThrown) {
                                $(".output").html(jXHR);
                                console.log(jXHR.status);
                                // alert("textStatus: " + textStatus);
                                // alert("errorThrown: " + errorThrown);
                                if(jXHR.status == 503)
                                {
                                    alert("Niet alle velden zijn goed ingevuld");
                                }
                                else if (jXHR.status == 404)
                                {
                                    alert("We konden de opgegeven markt niet vinden. Wij zouden u willen vragen om een e-mail te sturen naar xxx@xxx.nl");
                                }
                                else
                                {
                                    alert("Er is iets fout gegaan. Onze excuses voor het ongemak. Wij zouden u willen vragen om een e-mail te sturen naar xxx@xxx.nl");
                                }
            					//alert("Er is iets foutgegaan. Herlaad de pagina en probeer opnieuw.\n\nMocht dit probleem zich voor blijven doen stuur dan een e-mail naar ibizamarktabcoude@gmail.com.");
            				}
            			});
                    }
                });
            });
        </script>
	</head>
	<body>

        <div class="round datum">
            ZONDAG
            <div class="day">26</div>
            MAART
        </div>

        <div class="round kramen">
            +200<br>
            KRAMEN
        </div>

        <div class="round xl">
            XL
        </div>

        <div class="footer">
            FASHION | FOOD | DRINKS | MUSIC | LIFESTYLE
        </div>

        <div class="form-wrapper">
            <form class="test-form" action="test.php" method="post">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <input type="hidden" name="markt_id" value="2" />
                <table>
                    <tr class="verkoper">
                        <td>
                            <label>Bedrijfsnaam*</label>
                        </td>
                        <td>
                            <input name="bedrijfsnaam" class="field" type="text" required>
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>Voornaam*</label>
                        </td>
                        <td>
                            <input name="voornaam" class="required field" type="text" required>
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>Achternaam*</label>
                        </td>
                        <td>
                            <input name="achternaam" class="required field" type="text" required>
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>Straat*</label>
                        </td>
                        <td>
                            <input name="straat" class="field" type="text" required>
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>Huisnummer*</label>
                        </td>
                        <td>
                            <input name="huisnummer" class="field number-field" type="tel" required>
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>Toevoeging</label>
                        </td>
                        <td>
                            <input name="toevoeging" class="field" type="text">
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>postcode*</label>
                        </td>
                        <td>
                            <input name="postcode" class="field" type="text" maxlength="10" required>
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>Woonplaats*</label>
                        </td>
                        <td>
                            <input name="woonplaats" class="field" class="required" type="text" required>
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>Telefoon*</label>
                        </td>
                        <td>
                            <input name="telefoon" class="field" class="required number-field" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>E-mail*</label>
                        </td>
                        <td>
                            <input type="email" class="required field" name="email" placeholder="info@hippiemarktderondevenen.nl" required>
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>Website</label>
                        </td>
                        <td>
                            <input name="website" class="field" type="text">
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>Food/non food*</label>
                        </td>
                        <td>
                            <input type="radio" name="foodNonfood" value="food" checked="checked" />food<span style="display:inline-block;width:20px;"></span>
                            <input type="radio" name="foodNonfood" value="nonfood" checked="checked" />non food
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>Kramen</label>
                        </td>
                        <td>
                            <input name="kramen" class="field" type="number" value="0">
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>Grondplekken</label>
                        </td>
                        <td>
                            <input name="grondplekken" class="field" type="number" value="0">
                        </td>
                    </tr>
                    <tr class="verkoper">
                        <td>
                            <label>Producten*</label>
                        </td>
                        <td>
                            <input type="checkbox" class="producten" name="producten[0]" value="grote-maten">Grote maten kleding<br>
                            <input type="checkbox" class="producten" name="producten[1]" value="dames-kleding">Dameskleding<br>
                            <input type="checkbox" class="producten" name="producten[2]" value="heren-kleding">Herenkleding<br>
                            <input type="checkbox" class="producten" name="producten[3]" value="kinder-kleding">Kinderkleding<br>
                            <input type="checkbox" class="producten" name="producten[4]" value="baby-kleding">Babykleding<br>
                            <input type="checkbox" class="producten" name="producten[5]" value="fashion-accesoires">Kledingaccesoires<br>
                            <input type="checkbox" class="producten" name="producten[6]" value="schoenen">Schoenen<br>
                            <input type="checkbox" class="producten" name="producten[7]" value="lifestyle">Lifestyle<br>
                            <input type="checkbox" class="producten" name="producten[8]" value="woon-accessoires">Woonaccessoires<br>
                            <input type="checkbox" class="producten" name="producten[9]" value="kunst">Kunst<br>
                            <input type="checkbox" class="producten" name="producten[10]" value="sieraden">Sieraden<br>
                            <input type="checkbox" class="producten" name="producten[11]" value="tassen">Tassen<br>
                            <input type="checkbox" class="producten" name="producten[12]" value="brocante">Brocante<br>
                            <input type="checkbox" class="producten" name="producten[13]" value="dierenspullen">Dierenspullen<br>
                            <input type="checkbox" class="producten" name="producten[14]" value="anders">Anders
                        </td>
                    </tr>
                </table>
                <input type="submit" class="submit-button">
            </form>
        </div>

        <pre>
            <div class="output">
            </div>
        </pre>
	</body>
</html>
