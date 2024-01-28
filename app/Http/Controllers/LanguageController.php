<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function change(string $locale)
    {
        if (! in_array($locale, ['en', 'ar']))
        {
            abort(400);
        }

        session()->put('locale', $locale);

        return redirect()->back();
    }

    public function check()
    {
        $currentLocale = app()->currentLocale();
        return [$currentLocale];
    }
}
