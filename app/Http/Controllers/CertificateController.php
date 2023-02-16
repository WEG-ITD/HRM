<?php
namespace App\Http\Controllers;

use App\Http\Resources\CertificateCollection;
use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Certificate::class, 'templates');
    }

    public function index()
    {
        return new CertificateCollection(Certificate::orderBy('id')->get());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'branch_id' => 'required|exists:branches,id',
            'user_id' => 'required|exists:users,id',
            'page_layout' => 'required|string',
            'user_photo_style' => 'required|string',
            'layout_spacing_top' => 'required|string',
            'layout_spacing_bottom' => 'required|string',
            'layout_spacing_right' => 'required|string',
            'layout_spacing_left' => 'required|string',
            'signature_image' => 'required|image',
            'logo_image' => 'required|image',
            'background_image' => 'required|image',
            'certificate_content' => 'required|string',
        ]);

        // save signature image
        $signatureImage = $request->file('signature_image');
        $signatureImagePath = Storage::putFile('public/certificates/signatures', $signatureImage);

        // save logo image
        $logoImage = $request->file('logo_image');
        $logoImagePath = Storage::putFile('public/certificates/logos', $logoImage);

        // save background image
        $backgroundImage = $request->file('background_image');
        $backgroundImagePath = Storage::putFile('public/certificates/backgrounds', $backgroundImage);

        $certificate = new Certificate();
        $certificate->title = $validatedData['title'];
        $certificate->branch_id = $validatedData['branch_id'];
        $certificate->user_id = $validatedData['user_id'];
        $certificate->page_layout = $validatedData['page_layout'];
        $certificate->user_photo_style = $validatedData['user_photo_style'];
        $certificate->layout_spacing_top = $validatedData['layout_spacing_top'];
        $certificate->layout_spacing_bottom = $validatedData['layout_spacing_bottom'];
        $certificate->layout_spacing_right = $validatedData['layout_spacing_right'];
        $certificate->layout_spacing_left = $validatedData['layout_spacing_left'];
        $certificate->signature_image = $signatureImagePath;
        $certificate->logo_image = $logoImagePath;
        $certificate->background_image = $backgroundImagePath;
        $certificate->certificate_content = $validatedData['certificate_content'];
        $certificate->save();

        return new CertificateResource($certificate);
    }

    public function show(Certificate $certificate)
    {
        return new CertificateResource($certificate);
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'branch_id' => 'required|exists:branches,id',
            'user_id' => 'required|exists:users,id',
            'page_layout' => 'required|string',
            'user_photo_style' => 'required|string',
            'layout_spacing_top' => 'required|string',
            'layout_spacing_bottom' => 'required|string',
            'layout_spacing_right' => 'required|string',
            'layout_spacing_left' => 'required|string',
            'signature_image' => 'nullable|image',
            'logo_image' => 'nullable|image',
            'background_image' => 'nullable|image',
            'certificate_content' => 'required|string'
        ]);
        if ($request->hasFile('signature_image')) {
            // delete old signature image
            Storage::delete($certificate->signature_image);

            // save new signature image
            $signatureImage = $request->file('signature_image');
            $signatureImagePath = Storage::putFile('public/certificates/signatures', $signatureImage);
            $certificate->signature_image = $signatureImagePath;
        }

        if ($request->hasFile('logo_image')) {
            // delete old logo image
            Storage::delete($certificate->logo_image);

            // save new logo image
            $logoImage = $request->file('logo_image');
            $logoImagePath = Storage::putFile('public/certificates/logos', $logoImage);
            $certificate->logo_image = $logoImagePath;
        }

        if ($request->hasFile('background_image')) {
            // delete old background image
            Storage::delete($certificate->background_image);

            // save new background image
            $backgroundImage = $request->file('background_image');
            $backgroundImagePath = Storage::putFile('public/certificates/backgrounds', $backgroundImage);
            $certificate->background_image = $backgroundImagePath;
        }

        $certificate->title = $validatedData['title'];
        $certificate->branch_id = $validatedData['branch_id'];
        $certificate->user_id = $validatedData['user_id'];
        $certificate->page_layout = $validatedData['page_layout'];
        $certificate->user_photo_style = $validatedData['user_photo_style'];
        $certificate->layout_spacing_top = $validatedData['layout_spacing_top'];
        $certificate->layout_spacing_bottom = $validatedData['layout_spacing_bottom'];
        $certificate->layout_spacing_right = $validatedData['layout_spacing_right'];
        $certificate->layout_spacing_left = $validatedData['layout_spacing_left'];
        $certificate->certificate_content = $validatedData['certificate_content'];
        $certificate->save();

        // return new CertificateResource($certificate);
        return [
            'message'=> 'Certificate has been created!',
            'snackColor'=> 'success',
        ];
    }

    public function destroy(Certificate $certificate)
    {
        // delete images
        Storage::delete($certificate->signature_image);
        Storage::delete($certificate->logo_image);
        Storage::delete($certificate->background_image);

        $certificate->delete();

        return response()->noContent();
    }
}
