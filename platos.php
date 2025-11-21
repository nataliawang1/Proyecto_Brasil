<?php
session_start();
$title = "Gastronomía de Brasil";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --verde: #3ca64a;
            --verde-oscuro: #1d632e;
            --amarillo: #ffd85e;
            --fondo: #f9f9f9;
            --gris: #555;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f9d1ff;
            color: #222;
        }

        /* ==== ENCABEZADO ==== */
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

        .user-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-actions a {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .user-icon {
            width: 22px;
            height: 22px;
            display: inline-block;
        }

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

        main {
            max-width: 1100px;
            margin: 5rem auto;
            padding: 0 1.5rem;
        }

        .intro {
            text-align: center;
            margin-bottom: 3rem;
        }

        .intro h2 {
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

        .footer {
            background: var(--verde-oscuro);
            color: white;
            text-align: center;
            padding: 2rem 1rem;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            margin-top: 3rem;
        }

        @media (max-width: 768px) {
            .menu { flex-wrap: wrap; justify-content: center; }
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
                    <svg class="user-icon" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="8" r="4" stroke="#ffffff" stroke-width="2"/>
                        <path d="M4 20c2.5-3 6-4 8-4s5.5 1 8 4" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Cerrar sesión
                </a>
            <?php else: ?>
                <a href="login-registro.html" title="Iniciar sesión">
                    <svg class="user-icon" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="8" r="4" stroke="#ffffff" stroke-width="2"/>
                        <path d="M4 20c2.5-3 6-4 8-4s5.5 1 8 4" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    Iniciar sesión
                </a>
            <?php endif; ?>
        </div>
    </nav>
</header>

<main>
    <section class="intro">
        <h2>Platos típicos de Brasil</h2>
        <p>Explora los 12 platos más representativos de la gastronomía brasileña, llenos de color, sabor y tradición.</p>
    </section>

    <section class="grid">

        <article class="card">
            <img src="https://recetasdecocina.elmundo.es/wp-content/uploads/2025/01/feijoada.jpg" alt="Feijoada">
            <h3>Feijoada</h3>
            <p>Guiso de frijoles negros y carne de cerdo, considerado el plato nacional de Brasil.</p>
        </article>

        <article class="card">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Moqueca.jpg/1200px-Moqueca.jpg" alt="Moqueca">
            <h3>Moqueca</h3>
            <p>Guiso de pescado con leche de coco y aceite de dendê, típico de Bahía y Espírito Santo.</p>
        </article>

        <article class="card">
            <img src="https://receitinhasdadani.com.br/wp-content/uploads/2025/01/Pao-de-queijo-mineiro--1140x720.jpeg" alt="Pão de Queijo">
            <h3>Pão de Queijo</h3>
            <p>Panecillos de queso hechos con almidón de yuca, suaves y esponjosos.</p>
        </article>

        <article class="card">
            <img src="https://hitcooking.com/wp-content/uploads/2020/10/acaraje-hitcooking.jpg" alt="Acarajé">
            <h3>Acarajé</h3>
            <p>Bolas fritas de frijoles con camarones, típicas de la cocina afrobrasileña de Bahía.</p>
        </article>

        <article class="card">
            <img src="https://conexao085.com.br/wp-content/uploads/2025/04/conexao-085-peixada-0.jpg" alt="Peixada Cearense">
            <h3>Peixada Cearense</h3>
            <p>Guiso de pescado con verduras cocido en caldo con leche de coco.</p>
        </article>

        <article class="card">
            <img src="https://yourself-esteem.com/wp-content/uploads/2025/04/Cuscuz-Nordestino-Completo-com-Carne-Um-Prato-Saboroso-e-Facil-de-Fazer-e1744214762282.webp" alt="Cuscuz Nordestino">
            <h3>Cuscuz nordestino</h3>
            <p>Preparación a base de harina de maíz al vapor, servida con huevos, carne o pescado.</p>
        </article>

        <article class="card">
            <img src="https://mandolina.co/wp-content/uploads/2024/02/coxinha-brasil-1080x550-1-1200x720.jpg" alt="Coxinha">
            <h3>Coxinha</h3>
            <p>Empanizado en forma de lágrima relleno con pollo desmenuzado.</p>
        </article>

        <article class="card">
            <img src="https://www.aquinacozinha.com/wp-content/uploads/2025/04/bolinhos_bacalhau.png" alt="Bolinho de Bacalhau">
            <h3>Bolinho de Bacalhau</h3>
            <p>Croquetas de bacalao con papa, una herencia de la cocina portuguesa.</p>
        </article>

        <article class="card">
            <img src="https://imag.bonviveur.com/farofa-como-guarnicion.jpg" alt="Farofa">
            <h3>Farofa</h3>
            <p>Harina de mandioca tostada con mantequilla, cebolla y tocino, acompañante clásico.</p>
        </article>

        <article class="card">
            <img src="https://minervafoods.com/wp-content/uploads/2022/12/Escodidinho-de-mandioca-com-costela-desfiada-hor-1-scaled-1.jpg" alt="Escondidinho">
            <h3>Escondidinho</h3>
            <p>Pastel de puré de yuca relleno de carne seca y queso fundido.</p>
        </article>

        <article class="card">
            <img src="https://www.goya.com/wp-content/uploads/2025/05/Brazilian-Style-Picanha-Steak.jpg" alt="Churrasco">
            <h3>Churrasco</h3>
            <p>Asado de carnes al estilo gaúcho preparado en brasas con sal gruesa.</p>
        </article>

        <article class="card">
            <img src="https://www.cocina-brasilena.com/base/stock/Recipe/vatapa/vatapa_web.jpg" alt="Vatapá">
            <h3>Vatapá</h3>
            <p>Crema espesa de pan, camarones, cacahuate y aceite de dendê, tradicional del noreste.</p>
        </article>

    </section>
</main>

<footer class="footer">
    <p>2025 Gastronomía de Brasil</p>
</footer>

</body>
</html>
