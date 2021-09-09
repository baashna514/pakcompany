<?php

namespace App\Http\Controllers;

use App\Claim;
use Illuminate\Http\Request;
use Auth;

class ClaimController extends Controller
{
    public function vendor_claims(){
    	
          $claims = Claim::with('claim_gallery', 'user')->where('owner_id', Auth::user()->id)->get();
        
        return view('admin.claim.vendor-claim-list', ['claims' => $claims]);
    }
}
