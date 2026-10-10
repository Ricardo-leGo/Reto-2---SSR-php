<?php

$ejercicios = [
    'ejercicio1' => [
        'numero'      => '01',
        'titulo'      => 'GESTIÓN DE PUNTUACIONES',
        'tag'         => 'videojuego',
        'descripcion' => 'Sistema para almacenar y procesar las puntuaciones de los jugadores con arreglos asociativos.',
        'requisitos'  => [
            'Array asociativo con datos de jugador y fecha.',
            'Cálculo del promedio con bucle foreach.',
            'Filtrado con array_filter (Julio de 2024).'
        ],
        'ruta'        => './ejercicios/ejercicio1/'
    ],
    'ejercicio2' => [
        'numero'      => '02',
        'titulo'      => 'VETERINARIA Y MASCOTAS',
        'tag'         => 'agrupamiento',
        'descripcion' => 'Cálculo de promedio de edad por especie y clasificación de animales por rangos de edad.',
        'requisitos'  => [
            'Array asociativo con especie y edad.',
            'Promedio de edad agrupado por especie.',
            'Clasificación por rangos de edad.'
        ],
        'ruta'        => './ejercicios/ejercicio2/'
    ],
    'ejercicio3' => [
        'numero'      => '03',
        'titulo'      => 'CALIFICACIONES DE CURSOS',
        'tag'         => 'evaluación',
        'descripcion' => 'Plataforma educativa para evaluar estatus de estudiantes y totalizar con array_reduce.',
        'requisitos'  => [
            'Estructura anidada de cursos por usuario.',
            'Evaluación de aprobación (>= 70).',
            'Conteo totalizador con array_reduce.'
        ],
        'ruta'        => './ejercicios/ejercicio3/'
    ],
    'ejercicio4' => [
        'numero'      => '04',
        'titulo'      => 'MENÚ DE RESTAURANTE',
        'tag'         => 'divisas & tabla',
        'descripcion' => 'Transformación de precios MXN a USD, despliegue en tabla HTML y clasificación por categorías.',
        'requisitos'  => [
            'Conversión de precios MXN a USD (18 MXN = 1 USD).',
            'Transformación de datos con array_map.',
            'Renderizado en tabla HTML y categorías.'
        ],
        'ruta'        => './ejercicios/ejercicio4/'
    ],
    'ejercicio5' => [
        'numero'      => '05',
        'titulo'      => 'VENTA DE BOLETOS',
        'tag'         => 'concierto',
        'descripcion' => 'Gestión de localidades de concierto, aforo disponible en tiempo real y recaudación total.',
        'requisitos'  => [
            'Array de zonas (A, B, C) con capacidad y ventas.',
            'Cálculo numérico de disponibilidad por zona.',
            'Cálculo condicional de recaudación total.'
        ],
        'ruta'        => './ejercicios/ejercicio5/'
    ]
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hue+Cry Style — Reto 2 UVEG</title>
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

 
    <div class="max-w-7xl mx-auto px-6 sm:px-12 py-16">
        
        <header class="mb-20">
            <h1 class="font-syne text-5xl sm:text-7xl lg:text-8xl font-extrabold uppercase tracking-tight leading-[0.9] text-black">
                
                PROGRAMACIÓN <br>
                SERVER-SIDE 
                <hr>
                <hr>
                <span class="font-serif lowercase font-normal italic text-magenta">r2. Desafío de programación PHP</span>
            </h1>
        
            <div class="mt-8 flex items-center gap-4">
                <span class="inline-block px-6 py-2.5 bg-black text-white rounded-full text-xs font-bold uppercase tracking-widest">
                    5 ENTREGABLES
                </span>
                <span class="text-xs uppercase font-mono tracking-widest text-black/60">
                    - Ricardo Leyva Gonzalez - 
                </span>
            </div>
        </header>

        <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php foreach ($ejercicios as $clave => $info): ?>
                <article class="group relative bg-white border-2 border-black rounded-3xl p-8 flex flex-col justify-between transition-all duration-300 hover:bg-black hover:text-white hover:shadow-[8px_8px_0px_0px_rgba(255,42,133,1)]">
                    
                    <div>
                        <div class="flex items-center justify-between border-b border-black group-hover:border-white/30 pb-4 mb-6">
                            <span class="font-mono text-sm font-bold tracking-widest text-black/40 group-hover:text-magenta">
                                [<?php echo $info['numero']; ?>]
                            </span>
                            <span class="text-[10px] font-mono uppercase tracking-widest px-2.5 py-1 border border-black group-hover:border-white rounded-full">
                                <?php echo $info['tag']; ?>
                            </span>
                        </div>

                        <h2 class="font-syne text-2xl font-extrabold uppercase tracking-tight text-black group-hover:text-white leading-tight">
                            <?php echo $info['titulo']; ?>
                        </h2>

                        <p class="mt-4 text-sm text-black/70 group-hover:text-white/80 leading-relaxed font-sans">
                            <?php echo $info['descripcion']; ?>
                        </p>

                        <div class="mt-6 pt-6 border-t border-black/10 group-hover:border-white/20">
                            <span class="text-[11px] uppercase font-mono tracking-widest text-black/50 group-hover:text-magenta block mb-3">
                                Requerimientos:
                            </span>
                            <ul class="space-y-2">
                                <?php foreach ($info['requisitos'] as $req): ?>
                                    <li class="flex items-start text-xs font-medium text-black/80 group-hover:text-white/90">
                                        <span class="text-magenta mr-2 font-bold">•</span>
                                        <span><?php echo $req; ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-black group-hover:border-white/30">
                        <a href="<?php echo $info['ruta']; ?>" 
                           class="w-full inline-flex items-center justify-between px-6 py-3.5 rounded-full text-xs font-bold uppercase tracking-widest bg-black text-white group-hover:bg-magenta group-hover:text-white transition-all duration-300">
                            <span>VER EJERCICIO</span>
                            <span class="text-lg leading-none">&rarr;</span>
                        </a>
                    </div>

                </article>
            <?php endforeach; ?>

        </main>

        <footer class="mt-24 pt-8 border-t border-black flex flex-col sm:flex-row justify-between items-center text-xs font-mono uppercase tracking-widest text-black/60 gap-4">
            <div>UVEG — PROGRAMACIÓN WEB DEL LADO DEL SERVIDOR V2</div>
            <div>BUILD LOUD, MEASURED PROPERLY.</div>
        </footer>

    </div>

</body>
</html>