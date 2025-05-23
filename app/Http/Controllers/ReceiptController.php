<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\BaptismRequest;
use App\Models\ConfirmationRequest;
use App\Models\MarriageRequest;
use App\Models\DeathRequest;

class ReceiptController extends Controller
{
    public function generateReceipt($type, $id)
    {
        switch ($type) {
            case 'baptism':
                $request = BaptismRequest::findOrFail($id);
                $amount = 60;
                $title = 'Baptismal Certificate Receipt';
                break;
            case 'confirmation':
                $request = ConfirmationRequest::findOrFail($id);
                $amount = 50;
                $title = 'Confirmation Certificate Receipt';
                break;
            case 'marriage':
                $request = MarriageRequest::findOrFail($id);
                $amount = 70;
                $title = 'Marriage Certificate Receipt';
                break;
            case 'death':
                $request = DeathRequest::findOrFail($id);
                $amount = 80;
                $title = 'Death Certificate Receipt';
                break;
            default:
                abort(404);
        }

        $pdf = PDF::loadView('pdf.receipt', [
            'request' => $request,
            'amount' => $amount,
            'title' => $title,
        ]);

        return $pdf->download("receipt_{$type}_{$id}.pdf");
    }
}

