const preset = require('./vendor/filament/filament/tailwind.config.preset')

module.exports = {
    presets: [preset],
    content: [
        './app/Filament/*/.php',
        './resources/views/filament/*/.blade.php',
        './resources/views/filament/widgets/*/.blade.php',
        './vendor/filament/*/.blade.php',
    ],
    theme: {
        extend: {
            backgroundImage: {
            'day': "url('/vendor/filament-world-clock/images/day.png')",
            'night': "url('/vendor/filament-world-clock/images/night.png')",
            }
        }
    }
}
