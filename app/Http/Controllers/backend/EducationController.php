<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{

    public function education()
{
    $accessToken = Session::get('token');

    if ($accessToken) {
        $apiUrl = env('API_URL');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get($apiUrl . '/education');

        $userData = $response->json();

        return view('backend.education.index', ['userData' => $userData, 'accessToken' => $accessToken]);
    } else {
        return redirect()->route('login');
    }
}



    public function educationCreate()
{
    $accessToken = Session::get('token');

    if ($accessToken) {
        $apiUrl = env('API_URL');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get($apiUrl . '/education-create');

        $userData = $response->json();

        return view('backend.education.create', ['userData' => $userData, 'accessToken' => $accessToken]);
    } else {
        return redirect()->route('login');
    }
}


   public function educationCreated(Request $request)
{
    try {
        $accessToken = Session::get('token');

        if (empty($accessToken)) {
            return response()->json(['success' => false, 'error' => 'Unauthorized - Access Token Missing'], 401);
        }

        $apiUrl = env('API_URL');

        $url = $apiUrl . '/education-created/';


        $requestData = [
            'name' => $request->input('name'),
            'contents' => $request->input('contents'),
            'package_options' => $request->input('package_options'),
            'games' => $request->input('games'),

        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->post($url, $requestData);

        if ($response->successful()) {
            return redirect()->route('education');
        } else {
            $statusCode = $response->status();
            $apiResponse = $response->json();

            return response()->json(['success' => false, 'error' => $apiResponse], $statusCode);
        }
    } catch (\Exception $exception) {
        return response()->json(['success' => false, 'error' => $exception->getMessage()], 500);
    }
}


    public function educationUpdate($id)
    {
        $accessToken = session('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $educationUrl = "$apiUrl/education-update/$id";
            $educationResponse = Http::withHeaders([
                'Authorization' => "Bearer $accessToken",
            ])->get($educationUrl);

            $packageUrl = "$apiUrl/education-create";
            $packageResponse = Http::withHeaders([
                'Authorization' => "Bearer $accessToken",
            ])->get($packageUrl);

            if ($educationResponse->successful() && is_array($educationResponse->json('education')) && $packageResponse->successful()) {
                $userData = (object) $educationResponse->json('education');
                $packages = $packageResponse->json();

                return view('backend.education.edit', compact('userData', 'packages', 'accessToken'));
            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }



    public function educationUpdated(Request $request)
{
    $accessToken = Session::get('token');

    try {
        $formData = $request->all();
        $photo = $request->file('photo');

        $photoPath = null;

        if ($photo) {
            $photoFileName = 'photo_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('educate'), $photoFileName);
            $photoPath = 'educate/' . $photoFileName;
        }

        $apiUrl = env('API_URL');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->post($apiUrl . '/education-updated', array_merge($formData, ['photo' => $photoPath]));

        $responseData = json_decode($response->body(), true);

        if (isset($responseData['success']) && $responseData['success']) {
            return redirect()->back()->with('success', $responseData['message']);
        } else {
            $errorMessage = isset($responseData['error']) ? $responseData['error'] : 'Kayıt işlemi sırasında bir hata oluştu.';
            return redirect()->back()->withErrors(['errors' => [$errorMessage]])->withInput();
        }
    } catch (\Exception $exception) {
        return redirect()->back()->withErrors(['errors' => [$exception->getMessage()]])->withInput();
    }
}


    public function educationDeleted($id)
{
    $accessToken = Session::get('token');

    if ($accessToken) {
        $apiUrl = env('API_URL');

        $url = $apiUrl . '/educate-delete/' . $id;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get($url);

        if ($response->successful()) {
            return redirect()->back();
        } else {
            return redirect()->route('login');
        }
    } else {
        return redirect()->route('login');
    }
}











}
