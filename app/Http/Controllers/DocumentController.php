<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaptismRequest;
use App\Models\ConfirmationRequest;
use App\Models\MarriageRequest;
use App\Models\DeathRequest;
class DocumentController extends Controller
{
   public function showDocument($type, $id)
{
    // Fetch the request data based on type and ID
    switch ($type) {
        case 'baptismal':
            $document = BaptismRequest::where('baptismrequest_id', $id)->firstOrFail();
            break;
        case 'confirmation':
            $document = ConfirmationRequest::where('confirmationrequest_id', $id)->firstOrFail();
            break;
        case 'marriage':
            $document = MarriageRequest::where('marriagerequest_id', $id)->firstOrFail();
            break;
        case 'death':
            $document = DeathRequest::where('deathrequest_id', $id)->firstOrFail();
            break;
        default:
            abort(404);
    }

    // Pass the document and type to the view
    return view('documents.show', compact('document', 'type'));
}

}
