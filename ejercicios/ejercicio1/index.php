<?php

$puntuacionesJugadores = [
    'pixel_hero96'   => ['puntuacion' => 1200, 'fecha' => '2024-06-15'],
    'cyber_ninja22'  => ['puntuacion' => 1500, 'fecha' => '2024-07-02'],
    'storm_wolf'     => ['puntuacion' => 1800, 'fecha' => '2024-07-10'],
    'galactic_gamer' => ['puntuacion' => 1100, 'fecha' => '2024-06-30'],
    'arcade_master'  => ['puntuacion' => 1600, 'fecha' => '2024-07-15'],
    'star_chaser91'  => ['puntuacion' => 1400, 'fecha' => '2024-05-25'],
    'vortex_warrior' => ['puntuacion' => 1700, 'fecha' => '2024-07-20'],
    'lone_wolf47'    => ['puntuacion' => 1300, 'fecha' => '2024-06-05'],
    'game_wizard99'  => ['puntuacion' => 1450, 'fecha' => '2024-07-28'],
    'cosmic_rider22' => ['puntuacion' => 1550, 'fecha' => '2024-04-10']
];

$sumaPuntuaciones = 0;
$totalJugadores = count($puntuacionesJugadores);
$promedioPuntuaciones = 0.0;

foreach ($puntuacionesJugadores as $jugador => $datos) {
    $sumaPuntuaciones += $datos['puntuacion'];
}

if ($totalJugadores > 0) {
    $promedioPuntuaciones = $sumaPuntuaciones / $totalJugadores;
}

$puntuacionesJulio2024 = array_filter(
    $puntuacionesJugadores,
    function ($datos) {
        return strpos($datos['fecha'], '2024-07') === 0;
    }
);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Puntuaciones de Jugadores</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@1&family=Syne:wght@700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        magenta: '#ff2a85',
                    },
                    fontFamily: {
                        syne: ['Syne', 'sans-serif'],
                        serif: ['"Instrument Serif"', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white text-black font-sans antialiased selection:bg-magenta selection:text-white">

    <div class="border-b border-black py-3 px-6 sm:px-12 flex justify-between items-center text-xs tracking-widest uppercase font-mono">
        <a href="/" class="hover:text-magenta transition-colors duration-200 font-bold">&larr; VOLVER AL MENÚ PRINCIPAL</a>
    </div>

    <div class="max-w-5xl mx-auto px-6 sm:px-12 py-12">

        <header class="mb-12">
            <span class="text-xs font-mono font-bold tracking-widest text-magenta uppercase">[EJERCICIO 01]</span>
            <h1 class="font-syne text-4xl sm:text-6xl font-extrabold uppercase tracking-tight text-black mt-2">
                PUNTUACIONES DE <span class="font-serif lowercase font-normal italic text-magenta">jugadores.</span>
            </h1>
            <p class="mt-4 text-base font-medium text-black/70 max-w-xl">
                Análisis de métricas, cálculo de promedios generales y filtrado de puntuaciones registradas en Julio 2024.
            </p>
        </header>

        <section class="mb-12 border-2 border-black rounded-3xl p-6 sm:p-8 bg-black text-white flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <span class="text-xs font-mono uppercase tracking-widest text-magenta block">PROMEDIO CALCULADO</span>
                <span class="text-sm text-white/70">Suma total de puntuaciones dividida entre el total de jugadores (<?php echo $totalJugadores; ?>).</span>
            </div>
            <div class="text-3xl sm:text-5xl font-syne font-extrabold text-magenta">
                <?php echo number_format($promedioPuntuaciones, 2); ?>
            </div>
        </section>

        <section>
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-syne text-2xl font-bold uppercase tracking-tight text-black">
                    RESULTADO DEL FILTRO <span class="text-xs font-mono text-black/50 lowercase font-normal">(julio 2024)</span>
                </h2>
                <span class="text-xs font-mono uppercase tracking-widest px-3 py-1 border border-black rounded-full">
                    <?php echo count($puntuacionesJulio2024); ?> REGISTROS
                </span>
            </div>

            <div class="overflow-x-auto border-2 border-black rounded-3xl">
                <table class="w-full text-left text-sm">
                    <thead class="bg-black text-white font-mono text-xs uppercase tracking-widest border-b-2 border-black">
                        <tr>
                            <th class="py-4 px-6">Jugador</th>
                            <th class="py-4 px-6 text-center">Puntuación</th>
                            <th class="py-4 px-6 text-right">Fecha de Registro</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/10 font-sans">
                        <?php foreach ($puntuacionesJulio2024 as $jugador => $datos): ?>
                            <tr class="hover:bg-black hover:text-white transition-colors duration-150 group">
                                <td class="py-4 px-6 font-bold font-mono group-hover:text-magenta">
                                    @<?php echo $jugador; ?>
                                </td>
                                <td class="py-4 px-6 text-center font-bold">
                                    <?php echo $datos['puntuacion']; ?> pts
                                </td>
                                <td class="py-4 px-6 text-right font-mono text-xs text-black/60 group-hover:text-white/80">
                                    <?php echo $datos['fecha']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

    </div>

</body>
</html>