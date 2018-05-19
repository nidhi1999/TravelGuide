<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;
use App\Tourists;
use App\Destinations;
class StatusController extends Controller
{
    public function updateGuide(Request $request)
    {
        $guide_id=$request->input('guideId');
        $check=$request->input('check');
        $guide=Guide::where('guide_id',$guide_id)->update(['status'=>$check]);
        return redirect('/remove/guide');
    }

    public function updateTourist(Request $request)
    {
        $tourist_id=$request->input('touristId');
        $check=$request->input('check');
        $tourist=Tourists::where('tourist_id',$tourist_id)->update(['status'=>$check]);
        return redirect('remove/tourist');
    }

    public function verifySuggestions(Request $request)
    {
        $destination_id=$request->input('destinationId');
        $check=$request->input('check');
        $guide=Guide::where('guide_id',$destination_id)->update(['status'=>$check]);
        return redirect('/view/suggestions');
    }
}
