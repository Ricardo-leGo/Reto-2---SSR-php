<?php

$mascotasVeterinaria = [
    'Bombón' => ['especie' => 'Perro',   'edad' => 4],
    'Nina'   => ['especie' => 'Gato',    'edad' => 2],
    'Iris'   => ['especie' => 'Ave',     'edad' => 1],
    'Nemo'   => ['especie' => 'Pez',     'edad' => 3],
    'Zeus'   => ['especie' => 'Perro',   'edad' => 5],
    'Phoebe' => ['especie' => 'Gato',    'edad' => 6],
    'Oscar'  => ['especie' => 'Lagarto', 'edad' => 2],
    'Luis'   => ['especie' => 'Perro',   'edad' => 3],
    'Ramón'  => ['especie' => 'Gato',    'edad' => 4],
    'Rogelio' => ['especie' => 'Pez',     'edad' => 1]
];

$sumaEdadesPorEspecie = [];
$conteoPorEspecie = [];
$promedioEdadesPorEspecie = [];

foreach ($mascotasVeterinaria as $nombreMascota => $datosMascota) {
    $especie = $datosMascota['especie'];
    $edad = $datosMascota['edad'];

    if (!isset($sumaEdadesPorEspecie[$especie])) {
        $sumaEdadesPorEspecie[$especie] = 0;
        $conteoPorEspecie[$especie] = 0;
    }

    $sumaEdadesPorEspecie[$especie] += $edad;
    $conteoPorEspecie[$especie]++;
}


foreach ($sumaEdadesPorEspecie as $especie => $totalEdad) {
    $promedioEdadesPorEspecie[$especie] = $totalEdad / $conteoPorEspecie[$especie];
}

$conteoRangosEdad = [
    'Menos de 2 años' => 0,
    '2 a 4 años'     => 0,
    'Más de 4 años'   => 0
];

foreach ($mascotasVeterinaria as $nombreMascota => $datosMascota) {
    $edad = $datosMascota['edad'];

    if ($edad < 2) {
        $conteoRangosEdad['Menos de 2 años']++;
    } elseif ($edad >= 2 && $edad <= 4) {
        $conteoRangosEdad['2 a 4 años']++;
    } else {
        $conteoRangosEdad['Más de 4 años']++;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 - Veterinaria</title>
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
        <a href="../../index.html" class="hover:text-magenta transition-colors duration-200 font-bold">&larr; VOLVER AL MENÚ PRINCIPAL</a>
    </div>

    <div class="max-w-5xl mx-auto px-6 sm:px-12 py-12">

        <header class="mb-12">
            <span class="text-xs font-mono font-bold tracking-widest text-magenta uppercase">[EJERCICIO 02]</span>
            <h1 class="font-syne text-4xl sm:text-6xl font-extrabold uppercase tracking-tight text-black mt-2">
                CONTROL VETERINARIO <span class="font-serif lowercase font-normal italic text-magenta">mascotas.</span>
            </h1>
            <p class="mt-4 text-base font-medium text-black/70 max-w-xl">
                Cálculo de promedios de edad por especie y distribución por rangos poblacionales en la clínica.
            </p>
        </header>

        <section class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-syne text-2xl font-bold uppercase tracking-tight text-black">
                    PROMEDIO DE EDAD POR ESPECIE
                </h2>
                <span class="text-xs font-mono uppercase tracking-widest px-3 py-1 border border-black rounded-full">
                    <?php echo count($promedioEdadesPorEspecie); ?> ESPECIES
                </span>
            </div>

            <div class="overflow-x-auto border-2 border-black rounded-3xl">
                <table class="w-full text-left text-sm">
                    <thead class="bg-black text-white font-mono text-xs uppercase tracking-widest border-b-2 border-black">
                        <tr>
                            <th class="py-4 px-6">Especie</th>
                            <th class="py-4 px-6 text-right">Promedio de Edad</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/10 font-sans">
                        <?php foreach ($promedioEdadesPorEspecie as $especie => $promedio): ?>
                            <tr class="hover:bg-black hover:text-white transition-colors duration-150 group">
                                <td class="py-4 px-6 font-bold font-mono group-hover:text-magenta">
                                    <?php echo $especie; ?>
                                </td>
                                <td class="py-4 px-6 text-right font-bold">
                                    <?php echo $promedio; ?> años
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section>
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-syne text-2xl font-bold uppercase tracking-tight text-black">
                    NÚMERO DE MASCOTAS POR RANGO DE EDAD
                </h2>
                <span class="text-xs font-mono uppercase tracking-widest px-3 py-1 border border-black rounded-full">
                    RANGOS
                </span>
            </div>

            <div class="overflow-x-auto border-2 border-black rounded-3xl">
                <table class="w-full text-left text-sm">
                    <thead class="bg-black text-white font-mono text-xs uppercase tracking-widest border-b-2 border-black">
                        <tr>
                            <th class="py-4 px-6">Rango de Edad</th>
                            <th class="py-4 px-6 text-right">Cantidad de Mascotas</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/10 font-sans">
                        <?php foreach ($conteoRangosEdad as $rango => $cantidad): ?>
                            <tr class="hover:bg-black hover:text-white transition-colors duration-150 group">
                                <td class="py-4 px-6 font-bold font-mono group-hover:text-magenta">
                                    <?php echo $rango; ?>
                                </td>
                                <td class="py-4 px-6 text-right font-bold">
                                    <?php echo $cantidad; ?> mascotas
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