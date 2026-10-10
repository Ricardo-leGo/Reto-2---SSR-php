<?php

$ventaBoletosConcierto = [
    'A' => [
        'precioBoleto'    => 500,
        'totalEspacios'   => 200,
        'espaciosVendidos' => 150
    ],
    'B' => [
        'precioBoleto'    => 300,
        'totalEspacios'   => 300,
        'espaciosVendidos' => 200
    ],
    'C' => [
        'precioBoleto'    => 200,
        'totalEspacios'   => 500,
        'espaciosVendidos' => 300
    ]
];

$boletosDisponiblesPorZona = [];
$totalDineroRecaudado = 0;

foreach ($ventaBoletosConcierto as $zona => $datosZona) {
    $precio = $datosZona['precioBoleto'];
    $totalEspacios = $datosZona['totalEspacios'];
    $vendidos = $datosZona['espaciosVendidos'];

    $disponibles = $totalEspacios - $vendidos;
    
    $boletosDisponiblesPorZona[$zona] = [
        'espaciosVendidos' => $vendidos,
        'boletosDisponibles' => $disponibles
    ];

    if ($vendidos > 0 && $precio > 0) {
        $subtotalZona = $precio * $vendidos;
        $totalDineroRecaudado += $subtotalZona;
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 - Venta de Boletos</title>
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
            <span class="text-xs font-mono font-bold tracking-widest text-magenta uppercase">[EJERCICIO 05]</span>
            <h1 class="font-syne text-4xl sm:text-6xl font-extrabold uppercase tracking-tight text-black mt-2">
                VENTA DE <span class="font-serif lowercase font-normal italic text-magenta">boletos.</span>
            </h1>
            <p class="mt-4 text-base font-medium text-black/70 max-w-xl">
                Control de aforo, gestión de localidades por zona y cálculo de recaudación monetaria total para conciertos.
            </p>
        </header>

        <section class="mb-12 border-2 border-black rounded-3xl p-6 sm:p-8 bg-black text-white flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <span class="text-xs font-mono uppercase tracking-widest text-magenta block">TOTAL RECAUDADO DE LAS VENTAS</span>
                <span class="text-sm text-white/70">Monto total acumulado multiplicando el precio por boletos vendidos en cada localidad.</span>
            </div>
            <div class="text-3xl sm:text-5xl font-syne font-extrabold text-magenta">
                $<?php echo number_format($totalDineroRecaudado, 2); ?> <span class="text-xs text-white font-mono uppercase">MXN</span>
            </div>
        </section>

        <section>
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-syne text-2xl font-bold uppercase tracking-tight text-black">
                    BOLETOS DISPONIBLES POR ZONA
                </h2>
                <span class="text-xs font-mono uppercase tracking-widest px-3 py-1 border border-black rounded-full">
                    <?php echo count($boletosDisponiblesPorZona); ?> ZONAS
                </span>
            </div>

            <div class="overflow-x-auto border-2 border-black rounded-3xl">
                <table class="w-full text-left text-sm">
                    <thead class="bg-black text-white font-mono text-xs uppercase tracking-widest border-b-2 border-black">
                        <tr>
                            <th class="py-4 px-6">Zona</th>
                            <th class="py-4 px-6 text-center">Espacios Vendidos</th>
                            <th class="py-4 px-6 text-right">Boletos Disponibles</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/10 font-sans">
                        <?php foreach ($boletosDisponiblesPorZona as $zona => $datos): ?>
                            <tr class="hover:bg-black hover:text-white transition-colors duration-150 group">
                                <td class="py-4 px-6 font-bold font-mono group-hover:text-magenta">
                                    Zona <?php echo $zona; ?>
                                </td>
                                <td class="py-4 px-6 text-center font-bold">
                                    <?php echo $datos['espaciosVendidos']; ?>
                                </td>
                                <td class="py-4 px-6 text-right font-bold font-mono text-black/80 group-hover:text-magenta">
                                    <?php echo $datos['boletosDisponibles']; ?>
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