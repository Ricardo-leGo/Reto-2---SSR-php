<?php

$menuRestauranteMxn = [
    'Tacos al pastor' => ['categoria' => 'Plato fuerte', 'precioMxn' => 120],
    'Guacamole'       => ['categoria' => 'Entrada',     'precioMxn' => 90],
    'Churros'         => ['categoria' => 'Postre',      'precioMxn' => 80],
    'Pozole'          => ['categoria' => 'Plato fuerte', 'precioMxn' => 150],
    'Quesadillas'     => ['categoria' => 'Plato fuerte', 'precioMxn' => 110],
    'Ceviche'         => ['categoria' => 'Entrada',     'precioMxn' => 130],
    'Flan'            => ['categoria' => 'Postre',      'precioMxn' => 70],
    'Sopes'           => ['categoria' => 'Plato fuerte', 'precioMxn' => 100]
];

define('TASA_CAMBIO_USD', 18);

$menuRestauranteUsd = array_map(
    function ($datosPlatillo) {
        $precioUsd = $datosPlatillo['precioMxn'] / TASA_CAMBIO_USD;
        $datosPlatillo['precioUsd'] = number_format($precioUsd, 2);
        return $datosPlatillo;
    },
    $menuRestauranteMxn
);

$platillosPorCategoria = [
    'Entrada'     => [],
    'Plato fuerte' => [],
    'Postre'      => []
];

foreach ($menuRestauranteUsd as $nombrePlatillo => $datosPlatillo) {
    $categoria = $datosPlatillo['categoria'];
    
    
    if (isset($platillosPorCategoria[$categoria])) {
        $platillosPorCategoria[$categoria][$nombrePlatillo] = $datosPlatillo['precioUsd'];
    }
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Menú de Restaurante</title>
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
            <span class="text-xs font-mono font-bold tracking-widest text-magenta uppercase">[EJERCICIO 04]</span>
            <h1 class="font-syne text-4xl sm:text-6xl font-extrabold uppercase tracking-tight text-black mt-2">
                MENÚ DE <span class="font-serif lowercase font-normal italic text-magenta">restaurante.</span>
            </h1>
            <p class="mt-4 text-base font-medium text-black/70 max-w-xl">
                Conversión de precios de pesos mexicanos (MXN) a dólares (USD) y clasificación de platillos por categoría.
            </p>
        </header>

        <section class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-syne text-2xl font-bold uppercase tracking-tight text-black">
                    MENÚ CON PRECIOS EN DÓLARES
                </h2>
                <span class="text-xs font-mono uppercase tracking-widest px-3 py-1 border border-black rounded-full">
                    TASA: 1 USD = 18 MXN
                </span>
            </div>

            <div class="overflow-x-auto border-2 border-black rounded-3xl">
                <table class="w-full text-left text-sm">
                    <thead class="bg-black text-white font-mono text-xs uppercase tracking-widest border-b-2 border-black">
                        <tr>
                            <th class="py-4 px-6">Platillo</th>
                            <th class="py-4 px-6">Categoría</th>
                            <th class="py-4 px-6 text-right">Precio (USD)</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/10 font-sans">
                        <?php foreach ($menuRestauranteUsd as $nombrePlatillo => $datosPlatillo): ?>
                            <tr class="hover:bg-black hover:text-white transition-colors duration-150 group">
                                <td class="py-4 px-6 font-bold font-mono group-hover:text-magenta">
                                    <?php echo $nombrePlatillo; ?>
                                </td>
                                <td class="py-4 px-6 font-medium text-black/70 group-hover:text-white/80">
                                    <?php echo $datosPlatillo['categoria']; ?>
                                </td>
                                <td class="py-4 px-6 text-right font-bold font-mono">
                                    $<?php echo $datosPlatillo['precioUsd']; ?>
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
                    PLATILLOS POR CATEGORÍA
                </h2>
                <span class="text-xs font-mono uppercase tracking-widest px-3 py-1 border border-black rounded-full">
                    CLASIFICACIÓN
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($platillosPorCategoria as $categoria => $platillos): ?>
                    <div class="border-2 border-black rounded-3xl p-6 bg-white hover:bg-black hover:text-white transition-colors duration-200 group flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-mono font-bold uppercase tracking-widest text-magenta block mb-4 border-b border-black group-hover:border-white/30 pb-2">
                                [<?php echo $categoria; ?>]
                            </span>
                            <ul class="space-y-3 font-sans">
                                <?php foreach ($platillos as $nombrePlatillo => $precioUsd): ?>
                                    <li class="flex items-center justify-between text-sm">
                                        <span class="font-bold font-mono group-hover:text-white">• <?php echo $nombrePlatillo; ?></span>
                                        <span class="text-xs font-mono font-bold text-black/70 group-hover:text-magenta">$<?php echo $precioUsd; ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </div>

</body>
</html>