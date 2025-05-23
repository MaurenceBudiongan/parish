<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\BaptismRequest;
use App\Models\ConfirmationRequest;
use App\Models\MarriageRequest;
use App\Models\DeathRequest;

class DocumentController extends Controller
{
    public function getDocument($type, $id)
    {
        try {
            switch ($type) {
                case 'baptism':
                case 'baptismal':
                    $model = BaptismRequest::findOrFail($id);
                    break;
                case 'confirmation':
                    $model = ConfirmationRequest::findOrFail($id);
                    break;
                case 'marriage':
                    $model = MarriageRequest::findOrFail($id);
                    break;
                case 'death':
                    $model = DeathRequest::findOrFail($id);
                    break;
                default:
                    abort(404, 'Invalid document type');
            }
            
            if (!$model->certificate_path) {
                abort(404, 'Certificate not found');
            }
            
            if (!Storage::exists($model->certificate_path)) {
                abort(404, 'File not found');
            }
            
            return response()->file(storage_path('app/' . $model->certificate_path), [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="certificate.pdf"'
            ]);
            
        } catch (\Exception $e) {
            abort(404, $e->getMessage());
        }
    }
}