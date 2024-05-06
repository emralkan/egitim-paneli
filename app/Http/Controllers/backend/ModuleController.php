<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ModuleController extends Controller
{
    public function module()
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("$apiUrl/modules");

            $userData = $response->json();

            return view('backend.module.index', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }


    public function moduleCreate()
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("$apiUrl/module-create");

            $userData = $response->json();

            return view('backend.module.create', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }


    public function moduleCreated(Request $request)
    {
        try {
            $accessToken = Session::get('token');

            if (empty($accessToken)) {
                return response()->json(['success' => false, 'error' => 'Unauthorized - Access Token Missing'], 401);
            }

            $apiUrl = env('API_URL');

            $url = $apiUrl . '/module-created/';

            $requestData = [
                'name' => $request->input('name'),
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->post($url, $requestData);

            if ($response->successful()) {
                return redirect()->route('module');
            } else {
                $statusCode = $response->status();
                $apiResponse = $response->json();

                return response()->json(['success' => false, 'error' => $apiResponse], $statusCode);
            }
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'error' => $exception->getMessage()], 500);
        }
    }


    public function moduleUpdate($id)
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("$apiUrl/module-update/$id");

            $userData = $response->json();

            return view('backend.module.edit', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }


    public function moduleUpdated(Request $request)
    {
        try {
            $accessToken = Session::get('token');
            $formData = $request->all();
            $apiUrl = env('API_URL') . '/module-updated';

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->post($apiUrl, $formData);

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


    public function moduleDelete($id)
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $url = $apiUrl . '/module-delete/' . $id;

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
