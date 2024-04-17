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
        $times = ['Today', 'Yesterday', 'Week', 'Month'];
        
        foreach ($times as $time) {
            // Obtener la fecha correcta según el tiempo especificado
            switch ($time) {
                case 'today':
                    $date = date('d/m/Y');
                    break;
                case 'yesterday':
                    $date = date('d/m/Y', strtotime('-1 day'));
                    break;
                case 'week':
                    // Ajustar la fecha para obtener el inicio de la semana
                    $date = date('d/m/Y', strtotime('last Monday'));
                    break;
                case 'month':
                    // Ajustar la fecha para obtener el primer día del mes
                    $date = date('d/m/Y', strtotime('first day of this month'));
                    break;
                default:
                    $date = date('d/m/Y');
                    break;
            }
            
            foreach ($horoscopes as $horoscope) {
                $text  = file_get_contents("https://www.astrology-zodiac-signs.com/api/call.php?time=$time&sign=$horoscope");
                Horoscope::create([
                    'date' => $date,
                    'lang' => 'en',
                    'sign' => $horoscope,
                    'time' => $time,
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
