<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MarktenController extends Controller
{
    /**
     * Show the main page
     *
     * @return Response
     */
    public function getIndex()
    {
        $markten = App\Models\Markt::orderBy('datum', 'desc')->get();
        return View('users.markten')->with('markten', $markten);
    }
}
