<?php

namespace App\Http\Controllers\contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function contact()
    {
        try {
            $response = Http::get('http://localhost:8001/contact');

            if ($response->successful()) {
                $responseData = $response->json();
                if ($responseData['success']) {
                    $contacts = $responseData['contacts'];
                    return view('backend.contact.index', ['contacts' => $contacts]);
                } else {
                    return view('backend.contact.index')->withErrors(['error' => $responseData['message']]);
                }
            } else {
                $error = $response->json();
                return view('backend.contact.index')->withErrors(['error' => $error]);
            }
        } catch (\Exception $exception) {
            return view('backend.contact.index')->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function message($id)
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $url = 'http://localhost:8001/contact-message/'. $id;

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($url);
            if ($response->successful() && is_array($response->json('contacts'))) {
                $userData = (object) $response->json('contacts');

                return view('backend.contact.messages', ['userData' => $userData, 'accessToken' => $accessToken]);
            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function member(Request $request)
    {
        try {
            $formData = $request->all();
            $response = Http::post('http://localhost:8001/contact-member', $formData);
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

    public function members()
    {
        return view('backend.contact.member.create');
    }



}
