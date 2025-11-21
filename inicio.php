
<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login-registro.html");
    exit();
}
?>


<?php
$title = "Gastronomía de Brasil";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Montserrat:wght@600;700&family=Lora:wght@400;600&display=swap" rel="stylesheet">

    <style>
      :root {
            --verde: #3ca64a;
            --verde-oscuro: #1d632e;
            --amarillo: #ffd85e;
            --fondo: #f9f9f9;
            --gris: #555;
        }

        * {
            margin: 0; padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f9d1ff;
            color: #222;
        }

        .header {
            position: sticky;
            top: 0;
            background-color: var(--verde-oscuro);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            z-index: 1000;
        }

        .nav {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Montserrat', 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.6rem;
            text-transform: uppercase;
            color: white;
            letter-spacing: 2px;
        }

        .menu {
            list-style: none;
            display: flex;
            gap: 1.5rem;
        }

        .user-actions { display:flex; align-items:center; gap:10px; }
        .user-actions a { display:flex; align-items:center; gap:6px; color:#fff; text-decoration:none; font-weight:600; }
        .user-icon { width:22px; height:22px; display:inline-block; }

        .menu a {
            text-decoration: none;
            color: #fff;
            font-weight: 600;
            position: relative;
            transition: 0.3s;
        }

        .menu a::after {
            content: "";
            position: absolute;
            width: 0;
            height: 3px;
            background-color: #fff;
            bottom: -5px; 
            left: 0;
            transition: 0.3s;
        }

        .menu a:hover::after {
            width: 100%;
        }


        /* HERO */
        .hero {
            position: relative;
            height: 90vh;
            background: url('https://images.pexels.com/photos/18303026/pexels-photo-18303026.jpeg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #d9f4c4ff;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            background-color: white;
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            color: #000000ff;
            animation: fadeIn 1.5s ease;
        }

        .hero h1 {
           color: #4c6f3bff;
            font-size: 1.7rem;
            letter-spacing: 1px;
            margin-bottom: 3rem;
            margin-left: 14px;
        }

        .hero p {
            font-size: 1rem;
            margin-top: 25px;
            margin-bottom: 2rem;
        }

        .btn {
            padding: 0.8rem 1.8rem;
            border-radius: 50px;
            background-color: var(--amarillo);
            color: #222;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: var(--verde);
            color: #fff;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .carrusel {
            position: relative;
            max-width: 950px;
            margin: 4rem auto;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .carrusel img {
            width: 100%;
            display: none;
        }

        .carrusel img.active {
            display: block;
            animation: fade 1s ease-in-out;
        }

        @keyframes fade {
            from {opacity: 0;} to {opacity: 1;}
        }

        .controles {
            position: absolute;
            top: 50%; left: 0; right: 0;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            padding: 0 1rem;
        }

        .carrusel button {
            background: rgba(255,255,255,0.6);
            border: none;
            color: var(--verde-oscuro);
            font-size: 1.8rem;
            cursor: pointer;
            border-radius: 50%;
            width: 45px; height: 45px;
            transition: 0.3s;
        }

        .carrusel button:hover {
            background: var(--amarillo);
        }

        .indicadores {
            text-align: center;
            margin-top: 1rem;
        }

        .indicadores span {
            display: inline-block;
            width: 12px; height: 12px;
            border-radius: 50%;
            background: #ccc;
            margin: 0 4px;
            cursor: pointer;
        }

        .indicadores .activo {
            background: var(--verde);
        }

        .main-content {
            max-width: 1100px;
            margin: 5rem auto;
            padding: 0 1.5rem;
        }

        .intro {
            text-align: center;
            margin-bottom: 3rem;
        }

        .intro h2 {
            font-family: 'Lora', 'Poppins', serif;
            font-size: 2.2rem;
            color: var(--verde-oscuro);
            margin-bottom: 1rem;
        }

        .intro p {
            max-width: 700px;
            margin: 0 auto;
            color: var(--gris);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .card:hover img {
            transform: scale(1.1);
        }

        .card h3 {
            padding: 1rem 1rem 0;
            color: var(--verde);
        }

        .card p {
            padding: 0 1rem 1.5rem;
            color: var(--gris);
            font-size: 0.95rem;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 6px 30px rgba(0,0,0,0.15);
        }

        /* FOOTER */
        .footer {
            background: var(--verde-oscuro);
            color: white;
            text-align: center;
            padding: 2rem 1rem;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 2rem; }
            .menu { flex-wrap: wrap; justify-content: center; }
        }

.sticker {
    position: fixed;
    z-index: 9999;
    pointer-events: none;
}

.sticker img {
    width: 150px;
    opacity: 0.9;
    filter: drop-shadow(0 5px 5px rgba(0,0,0,0.25));
    transform: rotate(-10deg);
    transition: transform 0.4s ease;
}

.sticker img:hover {
    transform: scale(1.05) rotate(0deg);
}

.hoja-izquierda {
    top: 0px;
    left: 0px;
}

.hoja-derecha {
    top: 0px;
    right: 2px;
    transform: rotate(15deg);
}

@keyframes flotando {
    0%, 100% { transform: translateY(0) rotate(-10deg); }
    50% { transform: translateY(-6px) rotate(-8deg); }
}

.sticker img {
    animation: flotando 4s ease-in-out infinite;
}

    </style>
</head>



<body>

<header class="header">
    <nav class="nav">
        <div class="logo">Brasil Gourmet</div>
        <ul class="menu">
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="platos.php">Platos típicos</a></li>
            <li><a href="bebidas.php">Bebidas</a></li>
            <li><a href="postres.php">Postres</a></li>
            <li><a href="index.php">Nosotros</a></li>
        </ul>
        <div class="user-actions">
            <?php if (isset($_SESSION['id'])): ?>
                <a href="logout.php" title="Cerrar sesión">
                    <svg class="user-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="8" r="4" stroke="#ffffff" stroke-width="2"/>
                        <path d="M4 20c2.5-3 6-4 8-4s5.5 1 8 4" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Cerrar sesión
                </a>
            <?php else: ?>
                <a href="login-registro.html" title="Iniciar sesión">
                    <svg class="user-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="8" r="4" stroke="#ffffff" stroke-width="2"/>
                        <path d="M4 20c2.5-3 6-4 8-4s5.5 1 8 4" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Iniciar sesión
                </a>
            <?php endif; ?>
        </div>
    </nav>
</header>

<section class="hero">
    <div class="hero-content">
        <div class="sticker hoja-izquierda">
            <img src="img/hoja.png" alt="hoja tropical decorativa">
        </div>

        <h1>Sabores que conquistan Brasil</h1>
        <p>Descubre los colores, aromas y tradiciones que hacen única la gastronomía brasileña.</p>
        <a href="platos.php" class="btn">Explorar</a>

    </div>
</section>

<section class="carrusel">
    <img src="img/Carrusel1.jpg" class="active" alt="Gastronomía brasileña 1">
    <img src="img/Carrusel2.jpg" alt="Gastronomía brasileña 2">
    <img src="img/Carrusel3.jpg" alt="Gastronomía brasileña 3">
    <img src="img/Carrusel4.jpg" alt="Gastronomía brasileña 4">
    <img src="img/Carrusel5.jpg" alt="Gastronomía brasileña 5">

    <div class="controles">
        <button id="prev">&#10094;</button>
        <button id="next">&#10095;</button>
    </div>
</section>

<div class="indicadores" id="indicadores">
</div>

<main class="main-content">
    <section class="intro">
        <h2>Una mezcla de culturas y sabores</h2>
        <p>
            La cocina brasileña es el resultado de una fusión entre influencias indígenas, africanas y europeas.
            Cada región aporta un toque distinto, creando una experiencia culinaria diversa y vibrante.
        </p>
    </section>

    <section class="destacados">
        <h2 style="text-align:center; color:var(--verde-oscuro); margin-bottom:2rem;">Platos destacados</h2>
        <div class="grid">
            <article class="card">
                <img src="https://recetasdecocina.elmundo.es/wp-content/uploads/2025/01/feijoada.jpg" alt="Feijoada">
                <h3>Feijoada</h3>
                <p>El plato nacional de Brasil, una mezcla de frijoles negros y carne de cerdo.</p>
            </article>
            <article class="card">
                <img src="img/Moqueca.jpg" alt="Moqueca">
                <h3>Moqueca</h3>
                <p>Guiso de pescado con leche de coco y aceite de dendê, típico del noreste.</p>
            </article>
            <article class="card">
                <img src="img/pao de queijo.jpg" alt="Pão de Queijo">
                <h3>Pão de Queijo</h3>
                <p>Deliciosos panecillos de queso originarios de Minas Gerais.</p>
            </article>
        </div>
    </section>
</main>

<div id="imagen">
    <img src="img/targeta.jpg">
</div>

<footer class="footer">
    <p>2025 Gastronomía de Brasil </p>
</footer>

<script>
    const imagenes = document.querySelectorAll('.carrusel img');
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    const indicadores = document.getElementById('indicadores');
    let index = 0;

    imagenes.forEach((_, i) => {
        const dot = document.createElement('span');
        dot.addEventListener('click', () => cambiarImagen(i));
        indicadores.appendChild(dot);
    });

    const puntos = indicadores.querySelectorAll('span');
    puntos[0].classList.add('activo');

    function cambiarImagen(i) {
        imagenes[index].classList.remove('active');
        puntos[index].classList.remove('activo');
        index = i;
        imagenes[index].classList.add('active');
        puntos[index].classList.add('activo');
    }

    next.addEventListener('click', () => cambiarImagen((index + 1) % imagenes.length));
    prev.addEventListener('click', () => cambiarImagen((index - 1 + imagenes.length) % imagenes.length));

    setInterval(() => cambiarImagen((index + 1) % imagenes.length), 5000);
</script>


</body>
</html>
