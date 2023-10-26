<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
class propertyController extends Controller
{
    public function filterproperty(Request $request) {
        $query = Property::query();
        $parameters = $request->only(['property_name', 'city', 'bedroom', 'max_price']);


if (collect($parameters)->values()->filter()->isNotEmpty()) {
        if ($request->filled('property_name')) {
            $query->where('title', 'like', '%' . $request->input('property_name') . '%');
        }
    
        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->input('city') . '%');
        }
    
        if ($request->filled('bedroom')) {
            $query->where('bedroom', $request->input('bedroom'));
        }
    
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }
   
        $properties = $query->get();        

        return response()->json(['properties' => $properties]);
    }
    else {
        return response()->json(['message' => 'Please fill at least one field.'], 400);
    }
    
         
    }

    public function getProperty(Request $request, $id) {
        $property = Property::find($id); 
        
        if (!$property) {
            return abort(404); 
        }
          
        $currentUrl = $request->fullUrl();
        $request->session()->put('redirect_url',$currentUrl );
    
        return view('propertylist', ['propertydetails' => $property]);
    }

    public function sendMessage(Request $request) {

        $property = Property::find($request->input('product_id'));        
      
        $message = new Message;
        $message->user_id = Auth::id(); 
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->contact = $request->input('contact');
        $message->message = $request->input('message');
        $message->prop_id = $request->input('product_id');
        $message->seller_id = $property->seller_id;
        $message->save();
        return back()->with('success', 'Message sent successfully!');
    }
}
