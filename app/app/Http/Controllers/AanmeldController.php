<?php

namespace App\Http\Controllers;

use App\Models\Markt as Markt;
use App\Models\Standhouder as Standhouder;
use App\Models\Koppel_standhouders_markten as KoppelStandhoudersMarkten;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AanmeldController extends Controller
{
    /**
     *
     * Behandelt de nieuwe aanmelder
     *
     */
    public function postAanmelding(Request $request)
    {
        // echo "test";
        // dd($request);
        // return $request->foodNonfood;
        $required = ['bedrijfsnaam', 'voornaam', 'achternaam', 'straat', 'postcode', 'huisnummer', 'woonplaats', 'telefoon', 'email', 'foodNonfood'];
        $allValues = ['bedrijfsnaam', 'voornaam', 'achternaam', 'straat', 'postcode', 'huisnummer', 'toevoeging', 'woonplaats', 'telefoon', 'email', 'website', 'kramen', 'grondplekken', 'foodNonfood'];
        $arrayedValues = ['producten'];

        for($x = 0; $x < count($required); $x++){
            $text = "". $required[$x];
            if(strlen($request->$text) < 2){
                // return $request->$text;
                abort(500);
            }
        }



        // Standhouder model
        // protected $fillable = ['Bedrijfsnaam', 'Voornaam', 'Achternaam', 'Straat', 'Postcode', 'Huisnummer', 'Toevoeging', 'Woonplaats', 'Telefoon', 'Email', 'Website'];
        $standhouder = new Standhouder;
        $standhouder->Bedrijfsnaam = $request->bedrijfsnaam;
        $standhouder->Voornaam = $request->voornaam;
        $standhouder->Achternaam = $request->achternaam;
        $standhouder->Straat = $request->straat;
        $standhouder->Postcode = $request->postcode;
        $standhouder->Huisnummer = $request->huisnummer;
        $standhouder->Toevoeging = $request->toevoeging;
        $standhouder->Woonplaats = $request->woonplaats;
        $standhouder->Telefoon = $request->telefoon;
        $standhouder->Email = $request->email;
        $standhouder->Website = $request->website;

        $standhouder->save();

        // get the current markt for signup
        // return \App\Models\Markt::findOrFail(1)->where('id', $request->markt_id);
        // return $request->markt_id;
        $markt = Markt::where('id', $request->markt_id)->firstOrFail();

        // if($markt)
        // foreach ($markt as $markt1)
        // {
        //     dd($markt1);
        // }
        // dd($markt->Naam);
        // return $markt->Naam;

        // Koppel_standhouders_markten
        // protected $fillable = ['markt_id', 'standhouder_id', 'type', 'kraam', 'grondplek', 'bedrag', 'betaald'];

        $koppel_standhouders_markten = new KoppelStandhoudersMarkten;
        $koppel_standhouders_markten->markt_id = $request->markt_id;
        $koppel_standhouders_markten->standhouder_id = $standhouder->id;
        $koppel_standhouders_markten->type = $request->foodNonfood;
        $koppel_standhouders_markten->kraam = $request->kramen;
        $koppel_standhouders_markten->grondplek = $request->grondplekken;
        $koppel_standhouders_markten->bedrag = ($markt->bedrag_grondplek * $request->grondplekken) + ($markt->bedrag_kraam * $request->kramen);
        $koppel_standhouders_markten->betaald = 0;
        $koppel_standhouders_markten->stroom = 0;

        $koppel_standhouders_markten->save();

        // $array = [];
        // $array['bedrijfsnaam'] = $request->bedrijfsnaam;
        // $array['voornaam'] = $request->voornaam;
        // $array['achternaam'] = $request->achternaam;
        // $array['straat'] = $request->straat;
        // $array['postcode'] = $request->postcode;
        // $array['woonplaats'] = $request->woonplaats;
        // $array['land'] = $request->land;
        // $array['telefoon'] = $request->telefoon;
        // $array['email'] = $request->email;
        // $array['website'] = $request->website;
        // $array['typeplek'] = $request->typeplek;
        // $array['producten'] = $request->producten;

        return header("HTTP/1.1 200 OK");
    }
}
