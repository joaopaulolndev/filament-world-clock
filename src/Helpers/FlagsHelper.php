<?php

namespace Joaopaulolndev\FilamentWorldClock\Helpers;

class FlagsHelper
{
    public static function get(string $timezone): string
    {
        $timezones = [
            'Europe/London' => '🇬🇧', // London
            'Europe/Paris' => '🇫🇷', // Paris
            'Europe/Berlin' => '🇩🇪', // Berlin
            'Europe/Madrid' => '🇪🇸', // Madrid
            'Europe/Rome' => '🇮🇹', // Rome
            'Europe/Amsterdam' => '🇳🇱', // Amsterdam
            'Europe/Brussels' => '🇧🇪', // Brussels
            'Europe/Vienna' => '🇦🇹', // Vienna
            'Europe/Stockholm' => '🇸🇪', // Stockholm
            'Europe/Athens' => '🇬🇷', // Athens
            'Europe/Warsaw' => '🇵🇱', // Warsaw
            'Europe/Zurich' => '🇨🇭', // Zurich
            'Europe/Prague' => '🇨🇿', // Prague
            'Europe/Oslo' => '🇳🇴', // Oslo
            'Europe/Copenhagen' => '🇩🇰', // Copenhagen
            'Europe/Helsinki' => '🇫🇮', // Helsinki
            'Europe/Istanbul' => '🇹🇷', // Istanbul
            'Europe/Lisbon' => '🇵🇹', // Lisbon
            'Europe/Budapest' => '🇭🇺', // Budapest
            'Europe/Bucharest' => '🇷🇴', // Bucharest
            'Europe/Dublin' => '🇮🇪', // Dublin
            'Europe/Ljubljana' => '🇸🇮', // Ljubljana
            'Europe/Luxembourg' => '🇱🇺', // Luxembourg
            'Europe/Minsk' => '🇧🇾', // Minsk
            'Europe/Monaco' => '🇲🇨', // Monaco
            'Europe/Riga' => '🇱🇻', // Riga
            'Europe/San_Marino' => '🇸🇲', // San Marino
            'Europe/Sarajevo' => '🇧🇦', // Sarajevo
            'Europe/Skopje' => '🇲🇰', // Skopje
            'Europe/Sofia' => '🇧🇬', // Sofia
            'Europe/Tallinn' => '🇪🇪', // Tallinn
            'Europe/Vaduz' => '🇱🇮', // Vaduz
            'Europe/Vatican' => '🇻🇦', // Vatican
            'Europe/Vilnius' => '🇱🇹', // Vilnius
            'Europe/Zagreb' => '🇭🇷', // Zagreb
            'America/New_York' => '🇺🇸', // New York
            'America/Los_Angeles' => '🇺🇸', // Los Angeles
            'America/Chicago' => '🇺🇸', // Chicago
            'America/Toronto' => '🇨🇦', // Toronto
            'America/Mexico_City' => '🇲🇽', // Mexico City
            'America/Buenos_Aires' => '🇦🇷', // Buenos Aires
            'America/Sao_Paulo' => '🇧🇷', // São Paulo
            'America/Bogota' => '🇨🇴', // Bogotá
            'America/Lima' => '🇵🇪', // Lima
            'America/Caracas' => '🇻🇪', // Caracas
            'America/Santiago' => '🇨🇱', // Santiago
            'America/Halifax' => '🇨🇦', // Halifax
            'America/Phoenix' => '🇺🇸', // Phoenix
            'America/Anchorage' => '🇺🇸', // Anchorage
            'America/Honolulu' => '🇺🇸', // Honolulu
            'America/Montevideo' => '🇺🇾', // Montevideo
            'Asia/Dhaka' => '🇧🇩', // Dhaka
            'Asia/Jakarta' => '🇮🇩', // Jakarta
            'Asia/Singapore' => '🇸🇬', // Singapore
            'Asia/Tokyo' => '🇯🇵', // Tokyo
            'Asia/Seoul' => '🇰🇷', // Seoul
            'Asia/Beijing' => '🇨🇳', // Beijing
            'Asia/Taipei' => '🇹🇼', // Taipei
            'Asia/Kuala_Lumpur' => '🇲🇾', // Kuala Lumpur
            'Asia/Bangkok' => '🇹🇭', // Bangkok
            'Asia/Dubai' => '🇦🇪', // Dubai
            'Asia/Kolkata' => '🇮🇳', // Mumbai (Standard Time for India)
            'Asia/Hong_Kong' => '🇭🇰', // Hong Kong
            'Australia/Sydney' => '🇦🇺', // Sydney
            'Pacific/Auckland' => '🇳🇿', // Auckland
            'Etc/UTC' => '🕒', // Default flag (UTC)
        ];

        return $timezones[$timezone] ?? '🕒';
    }
}
