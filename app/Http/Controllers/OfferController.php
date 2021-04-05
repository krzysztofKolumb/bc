<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Picture;
use App\Models\Profession;

class OfferController extends Controller
{
    public function show(Offer $offer)
    {
        $desc = $offer->page->sections->first();
        $professions = Profession::where('type', 1)->get();
        $grouped = $offer->page->experts->groupBy('profession_id');
        $grouped->all();
        $files = File::where('file_category_id', 3)->orderBy('title', 'asc')->get();
        return view('offer.show', compact('offer', 'desc', 'professions', 'files', 'grouped'));

        // return view('offer.show', ['offer' => $offer, 'desc'=>$desc]);
    }

}
