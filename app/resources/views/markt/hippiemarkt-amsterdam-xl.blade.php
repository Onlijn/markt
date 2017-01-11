<!DOCTYPE html>
<html>
	<head>
		<title>Hippie markt de ronde venen</title>

		<!-- FONTS -->
		<!-- <link rel="stylesheet" type="text/css" href="css/fonts/stylesheet.css"> -->

		<!-- STYLES -->
		<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
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

                $(".test-form").submit(function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    $.ajax({
        				type: "POST",
        				url: "http://app.directevenementen.dev/aanmelding/markt",
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
                            console.log(jXHR);
                            alert("textStatus: " + textStatus);
                            alert("errorThrown: " + errorThrown);
        					//alert("Er is iets foutgegaan. Herlaad de pagina en probeer opnieuw.\n\nMocht dit probleem zich voor blijven doen stuur dan een e-mail naar ibizamarktabcoude@gmail.com.");
        				}
        			});
                });
            });
        </script>
	</head>
	<body>
        <form class="test-form" action="test.php" method="post">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="markt_id" value="2" />
            <table>
                <tr class="verkoper">
                    <td>
                        <label>Bedrijfsnaam</label>
                    </td>
                    <td>
                        <input name="bedrijfsnaam" class="field" type="text">
                    </td>
                </tr>
                <tr class="verkoper">
                    <td>
                        <label>Voornaam*</label>
                    </td>
                    <td>
                        <input name="voornaam" class="required field" type="text">
                    </td>
                </tr>
                <tr class="verkoper">
                    <td>
                        <label>Achternaam*</label>
                    </td>
                    <td>
                        <input name="achternaam" class="required field" type="text">
                    </td>
                </tr>
                <tr class="verkoper">
                    <td>
                        <label>Straat</label>
                    </td>
                    <td>
                        <input name="straat" class="field" type="text">
                    </td>
                </tr>
                <tr class="verkoper">
                    <td>
                        <label>Huisnummer</label>
                    </td>
                    <td>
                        <input name="huisnummer" class="field" type="text">
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
                        <label>postcode</label>
                    </td>
                    <td>
                        <input name="postcode" class="field" type="text">
                    </td>
                </tr>
                <tr class="verkoper">
                    <td>
                        <label>Woonplaats*</label>
                    </td>
                    <td>
                        <input name="woonplaats" class="field" class="required" type="text">
                    </td>
                </tr>
                <tr class="verkoper">
                    <td>
                        <label>Telefoon*</label>
                    </td>
                    <td>
                        <input name="telefoon" class="field" class="required" type="text">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>E-mail*</label>
                    </td>
                    <td>
                        <input type="email" class="required field" name="email" placeholder="info@hippiemarktderondevenen.nl">
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
                        <label>Food/non food</label>
                    </td>
                    <td>
                        <select name="foodNonfood">
                            <option value="food">food</option>
                            <option value="nonfood">non food</option>
                        </select>
                    </td>
                </tr>
                <tr class="verkoper">
                    <td>
                        <label>Kramen</label>
                    </td>
                    <td>
                        <input name="kramen" class="field" type="text">
                    </td>
                </tr>
                <tr class="verkoper">
                    <td>
                        <label>Grondplekken</label>
                    </td>
                    <td>
                        <input name="grondplekken" class="field" type="text">
                    </td>
                </tr>
                <tr class="verkoper">
                    <td>
                        <label>Producten</label>
                    </td>
                    <td>
                        <input type="checkbox" class="producten" name="producten[0]" value="Grote maten kleding">Grote maten kleding<br>
                        <input type="checkbox" class="producten" name="producten[1]" value="dameskleding">dameskleding<br>
                        <input type="checkbox" class="producten" name="producten[2]" value="herenkleding">herenkleding<br>
                        <input type="checkbox" class="producten" name="producten[3]" value="kinderkleding">kinderkleding<br>
                        <input type="checkbox" class="producten" name="producten[4]" value="babykleding">babykleding<br>
                        <input type="checkbox" class="producten" name="producten[5]" value="kledingaccesoires">kledingaccesoires<br>
                        <input type="checkbox" class="producten" name="producten[6]" value="schoenen">schoenen<br>
                        <input type="checkbox" class="producten" name="producten[7]" value="lifestyle">lifestyle<br>
                        <input type="checkbox" class="producten" name="producten[8]" value="woonaccessoires">woonaccessoires<br>
                        <input type="checkbox" class="producten" name="producten[9]" value="kunst">kunst<br>
                        <input type="checkbox" class="producten" name="producten[10]" value="sieraden">sieraden<br>
                        <input type="checkbox" class="producten" name="producten[11]" value="tassen">tassen<br>
                        <input type="checkbox" class="producten" name="producten[12]" value="brocante">brocante<br>
                        <input type="checkbox" class="producten" name="producten[13]" value="dierenspullen">dierenspullen<br>
                        <input type="checkbox" class="producten" name="producten[14]" value="anders">anders
                    </td>
                </tr>
            </table>
            <input type="submit" class="submit-button">
        </form>
        <pre>
            <div class="output">
            </div>
        </pre>
	</body>
</html>
