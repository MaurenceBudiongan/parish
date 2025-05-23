<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\BaptismRequest;
use App\Models\ConfirmationRequest;
use App\Models\MarriageRequest;
use App\Models\DeathRequest;

class CertificateController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'certificate' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'type' => 'required|in:baptism,confirmation,marriage,death',
            'id' => 'required|integer'
        ]);

        try {
            $file = $request->file('certificate');
            $type = $request->type;
            $id = $request->id;
            
            // Store the file
            $path = $file->store('certificates/' . $type);
            
            // Update the appropriate model
            switch ($type) {
                case 'baptism':
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
                    throw new \Exception('Invalid request type');
            }
            
            // Delete old certificate if exists
            if ($model->certificate_path) {
                Storage::delete($model->certificate_path);
            }
            
            $model->certificate_path = $path;
            $model->save();
            
            return response()->json([
                'success' => true,
                'message' => 'Certificate uploaded successfully',
                'path' => $path
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}