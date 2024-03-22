<?php

namespace App\Http\Controllers;

use App\Models\Horoscope;
use App\Http\Requests\StoreHoroscopeRequest;
use App\Http\Requests\UpdateHoroscopeRequest;
use App\Models\Lang;

class HoroscopeController extends Controller
{

    public function importHoroscope() {
        $langs = Lang::all();
        $horoscopes = [
            'Aries',
            'Taurus',
            'Gemini',
            'Cancer',
            'Leo',
            'Virgo',
            'Libra',
            'Scorpio',
            'Sagittarius',
            'Capricorn',
            'Aquarius',
            'Pisces'
        ];
        $times = ['today'];
        foreach($times as $time) {
            foreach($horoscopes as $horoscope) {
                $text  = file_get_contents("https://www.astrology-zodiac-signs.com/api/call.php?time=$time&sign=$horoscope");
                Horoscope::create([
                    'date' => date('d/m/Y'),
                    'lang' => 'en',
                    'sign' => $horoscope,
                    'time' => 'today',
                    'phrase' => $text,
                ]);
            }
        }





        }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHoroscopeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Horoscope $horoscopes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horoscope $horoscopes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHoroscopeRequest $request, Horoscope $horoscopes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horoscope $horoscopes)
    {
        //
    }
}
