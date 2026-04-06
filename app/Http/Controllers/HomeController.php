<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil data profile pertama
        $profile = Profile::with(['skills', 'projects'])->first();
        $github = null;

        // 2. Jika profile & username github ada, ambil data dari API
        if ($profile && $profile->github_username) {
            $response = Http::get('https://api.github.com/users/' . $profile->github_username);

            if ($response->successful()) {
                $github = $response->json();

                // 3. Ambil data repositori untuk mendapatkan statistik bahasa
                $reposResponse = Http::get("https://api.github.com/users/{$profile->github_username}/repos");

                if ($reposResponse->successful()) {
                    $repos = $reposResponse->json();
                    $languages = [];

                    foreach ($repos as $repo) {
                        $lang = $repo['language'];
                        if ($lang) {
                            $languages[$lang] = ($languages[$lang] ?? 0) + 1;
                        }
                    }

                    arsort($languages);
                    // Masukkan data bahasa ke dalam array github
                    $github['languages'] = $languages;
                }
            }
        }

        // 4. Kirim ke view
        return view('home', compact('profile', 'github'));
    }
}