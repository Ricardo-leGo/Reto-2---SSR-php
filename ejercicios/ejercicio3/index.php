<?php

$calificacionesUsuarios = [
    'Miguel' => [
        ['curso' => 'Fundamentos de Programación', 'calificacion' => 85],
        ['curso' => 'Desarrollo Web', 'calificacion' => 88]
    ],
    'Carlos' => [
        ['curso' => 'Estructuras de Datos', 'calificacion' => 78],
        ['curso' => 'Fundamentos de Programación', 'calificacion' => 55]
    ],
    'Melva' => [
        ['curso' => 'Fundamentos de Programación', 'calificacion' => 65],
        ['curso' => 'Algoritmos y Lógica', 'calificacion' => 75]
    ],
    'Silvia' => [
        ['curso' => 'Desarrollo Web', 'calificacion' => 92]
    ],
    'Dulce' => [
        ['curso' => 'Algoritmos y Lógica', 'calificacion' => 60]
    ],
    'Karla' => [
        ['curso' => 'Estructuras de Datos', 'calificacion' => 70]
    ]
];


$promediosPorUsuario = [];

foreach ($calificacionesUsuarios as $usuario => $cursos) {
    $sumaCalificaciones = 0;
    $totalCursos = count($cursos);

    foreach ($cursos as $datosCurso) {
        $sumaCalificaciones += $datosCurso['calificacion'];
    }

    $promediosPorUsuario[$usuario] = $totalJugador = ($totalCursos > 0) ? ($sumaCalificaciones / $totalCursos) : 0;
}


$estadosAprobacion = [];

foreach ($promediosPorUsuario as $usuario => $promedio) {
    $estadosAprobacion[$usuario] = ($promedio >= 70) ? 'aprobado' : 'reprobado';
}


$conteoAprobacion = array_reduce(
    $estadosAprobacion,
    function ($acumulador, $estado) {
        if ($estado === 'aprobado') {
            $acumulador['aprobados']++;
        } else {
            $acumulador['reprobados']++;
        }
        return $acumulador;
    },
    ['aprobados' => 0, 'reprobados' => 0] 
);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Calificaciones de Usuarios</title>
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
            <span class="text-xs font-mono font-bold tracking-widest text-magenta uppercase">[EJERCICIO 03]</span>
            <h1 class="font-syne text-4xl sm:text-6xl font-extrabold uppercase tracking-tight text-black mt-2">
                GESTIÓN DE <span class="font-serif lowercase font-normal italic text-magenta">calificaciones.</span>
            </h1>
            <p class="mt-4 text-base font-medium text-black/70 max-w-xl">
                Cálculo de promedios académicos por usuario, estatus de aprobación y conteo totalizador con funciones de orden superior.
            </p>
        </header>

        <section class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-12">
            <div class="border-2 border-black rounded-3xl p-6 bg-black text-white flex flex-col justify-between">
                <span class="text-xs font-mono uppercase tracking-widest text-magenta">TOTAL APROBADOS</span>
                <span class="text-4xl sm:text-6xl font-syne font-extrabold mt-4"><?php echo $conteoAprobacion['aprobados']; ?></span>
            </div>
            <div class="border-2 border-black rounded-3xl p-6 bg-white text-black flex flex-col justify-between">
                <span class="text-xs font-mono uppercase tracking-widest text-black/50">TOTAL REPROBADOS</span>
                <span class="text-4xl sm:text-6xl font-syne font-extrabold mt-4"><?php echo $conteoAprobacion['reprobados']; ?></span>
            </div>
        </section>

        <section class="mb-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-syne text-2xl font-bold uppercase tracking-tight text-black">
                    PROMEDIO DE CALIFICACIONES POR USUARIO
                </h2>
                <span class="text-xs font-mono uppercase tracking-widest px-3 py-1 border border-black rounded-full">
                    <?php echo count($promediosPorUsuario); ?> ESTUDIANTES
                </span>
            </div>

            <div class="overflow-x-auto border-2 border-black rounded-3xl">
                <table class="w-full text-left text-sm">
                    <thead class="bg-black text-white font-mono text-xs uppercase tracking-widest border-b-2 border-black">
                        <tr>
                            <th class="py-4 px-6">Usuario</th>
                            <th class="py-4 px-6 text-right">Promedio Obtenido</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/10 font-sans">
                        <?php foreach ($promediosPorUsuario as $usuario => $promedio): ?>
                            <tr class="hover:bg-black hover:text-white transition-colors duration-150 group">
                                <td class="py-4 px-6 font-bold font-mono group-hover:text-magenta">
                                    @<?php echo $usuario; ?>
                                </td>
                                <td class="py-4 px-6 text-right font-bold">
                                    <?php echo $promedio; ?> pts
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
                    ESTADO DE APROBACIÓN
                </h2>
                <span class="text-xs font-mono uppercase tracking-widest px-3 py-1 border border-black rounded-full">
                    MIN. 70 PTS
                </span>
            </div>

            <div class="overflow-x-auto border-2 border-black rounded-3xl">
                <table class="w-full text-left text-sm">
                    <thead class="bg-black text-white font-mono text-xs uppercase tracking-widest border-b-2 border-black">
                        <tr>
                            <th class="py-4 px-6">Usuario</th>
                            <th class="py-4 px-6 text-right">Estatus</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-black/10 font-sans">
                        <?php foreach ($estadosAprobacion as $usuario => $estado): ?>
                            <tr class="hover:bg-black hover:text-white transition-colors duration-150 group">
                                <td class="py-4 px-6 font-bold font-mono group-hover:text-magenta">
                                    @<?php echo $usuario; ?>
                                </td>
                                <td class="py-4 px-6 text-right font-bold uppercase tracking-wider text-xs">
                                    <span class="px-3 py-1 rounded-full border <?php echo ($estado === 'aprobado') ? 'border-black group-hover:border-white text-emerald-600 group-hover:text-emerald-400' : 'border-black group-hover:border-white text-rose-600 group-hover:text-rose-400'; ?>">
                                        <?php echo $estado; ?>
                                    </span>
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
