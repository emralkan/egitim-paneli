<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class GamesController extends Controller
{

    public function games()
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($apiUrl . '/games');

            $userData = $response->json();

            return view('backend.games.index', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('logins');
        }
    }


    public function gamesCreate()
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($apiUrl . '/games-create');

            $userData = $response->json();

            return view('backend.games.create', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }


    public function gamesCreated(Request $request)
    {
        try {
            $accessToken = Session::get('token');

            if (empty($accessToken)) {
                return response()->json(['success' => false, 'error' => 'Unauthorized - Access Token Missing'], 401);
            }

            $apiUrl = env('API_URL');

            $url = $apiUrl . '/games-created/';

            $requestData = [
                'name' => $request->input('name'),
                'positionX' => $request->input('positionX'),
                'positionY' => $request->input('positionY'),
                'start_frame' => $request->input('start_frame'),
                'flagX' => $request->input('flagX'),
                'flagY' => $request->input('flagY'),
                'sentence' => $request->input('sentence'),
                'box_color' => $request->input('box_color'),
                'part' => $request->input('part'),
                'toolbox' => $request->input('toolbox'),
                'modules' => $request->input('modules'),
            ];

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->post($url, $requestData);

            if ($response->successful()) {
                return redirect()->route('games');
            } else {
                $statusCode = $response->status();
                $apiResponse = $response->json();

                return response()->json(['success' => false, 'error' => $apiResponse], $statusCode);
            }
        } catch (\Exception $exception) {
            return response()->json(['success' => false, 'error' => $exception->getMessage()], 500);
        }
    }


    public function gameUpdate($id)
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("$apiUrl/games-update/$id");

            $userData = $response->json();

            return view('backend.games.edit', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }


    public function gameUpdated(Request $request)
    {
        try {
            $accessToken = Session::get('token');
            $formData = $request->all();
            $apiUrl = env('API_URL') . '/games-updated';

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


    public function gameDelete($id)
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $url = $apiUrl . '/games-delete/' . $id;

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
