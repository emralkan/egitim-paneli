<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function languages()
    {
        $accessToken = Session::get('token');
        $apiBaseUrl = env('API_URL');

        if ($accessToken) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($apiBaseUrl . '/language');

            $userData = $response->json();

            return view('backend.language.index', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }



    public function languageCreate()
    {
        $accessToken = Session::get('token');
        $apiBaseUrl = env('API_URL');

        if ($accessToken) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($apiBaseUrl . '/language-create');

            $userData = $response->json();

            return view('backend.language.create', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }

    public function languageCreated(Request $request)
    {
        try {
            $accessToken = Session::get('token');

            if (empty($accessToken)) {
                return response()->json(['success' => false, 'error' => 'Unauthorized - Access Token Missing'], 401);
            }

            $apiBaseUrl = env('API_URL');
            $url = $apiBaseUrl . '/language-created/';

            $requestData = [
                'language' => $request->input('language'),
                'langkey' => $request->input('langkey'),
                'status' => $request->input('status'),
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->post($url, $requestData);

            if ($response->successful()) {
                return redirect()->route('languages');
            } else {
                $statusCode = $response->status();
                $apiResponse = $response->json();

                return response()->json(['success' => false, 'error' => $apiResponse], $statusCode);
            }
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'error' => $exception->getMessage()], 500);
        }
    }


    public function languageUpdate($id)
    {
        $accessToken = Session::get('token');
        $apiBaseUrl = env('API_URL');

        if ($accessToken) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("$apiBaseUrl/language-update/$id");

            $userData = $response->json();

            return view('backend.language.edit', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }


    public function languageUpdated(Request $request)
    {
        $accessToken = Session::get('token');

        try {
            $formData = $request->all();
            $apiBaseUrl = env('API_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->post("$apiBaseUrl/language-updated", $formData);

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

    public function languageDelete($id)
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');
            $url = "$apiUrl/language-delete/$id";

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($url);

            if ($response->successful()) {
                return redirect()->route('languages');
            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function languagesLine()
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("$apiUrl/languagesLine");

            $userData = $response->json();

            return view('backend.language.translation.index', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }

    public function languagesLineCreate()
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("$apiUrl/languagesLine-create");

            $userData = $response->json();

            return view('backend.language.translation.create', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }

    public function languagesLineCreated(Request $request)
    {
        try {
            $accessToken = Session::get('token');

            if (empty($accessToken)) {
                return response()->json(['success' => false, 'error' => 'Unauthorized - Access Token Missing'], 401);
            }

            $apiUrl = env('API_URL');
            $url = "$apiUrl/languagesLine-created/";

            $requestData = [
                'group' => $request->input('group'),
                'key' => $request->input('key'),
                'text' => $request->input('text'),
                'language' => $request->input('language'),
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->post($url, $requestData);

            if ($response->successful()) {
                return redirect()->route('languagesLine');
            } else {
                $statusCode = $response->status();
                $apiResponse = $response->json();

                return response()->json(['success' => false, 'error' => $apiResponse], $statusCode);
            }
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'error' => $exception->getMessage()], 500);
        }
    }

    public function languagesLineUpdate($id)
    {
        $accessToken = Session::get('token');
        $apiBaseUrl = env('API_URL');

        if ($accessToken) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("$apiBaseUrl/languagesLine-update/$id");

            $userData = $response->json();

            return view('backend.language.translation.edit', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }

    public function languagesLineUpdated(Request $request)
    {
        try {
            $accessToken = Session::get('token');

            if (empty($accessToken)) {
                return response()->json(['success' => false, 'error' => 'Unauthorized - Access Token Missing'], 401);
            }

            $apiUrl = env('API_URL');
            $url = "$apiUrl/languagesLine-updated/";

            $requestData = [
                'key' => $request->input('key'),
                'text' => $request->input('text'),
                'language' => $request->input('language'),
                'id' => $request->input('id'),
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->post($url, $requestData);

            if ($response->successful()) {
                return redirect()->route('languagesLine');
            } else {
                $statusCode = $response->status();
                $apiResponse = $response->json();

                return response()->json(['success' => false, 'error' => $apiResponse], $statusCode);
            }
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'error' => $exception->getMessage()], 500);
        }
    }

    public function languagesLineDelete($id)
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');
            $url = "$apiUrl/languagesLine-delete/$id";

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($url);

            if ($response->successful()) {
                return redirect()->route('languagesLine');
            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }


}
