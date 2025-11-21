<?php
session_start();
$title = "Postres de Brasil";
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

<main>
    <section class="intro">
        <h2>Postres típicos de Brasil</h2>
        <p>Conoce los postres más deliciosos y tradicionales del país, llenos de sabor tropical y dulzura.</p>
    </section>

    <section class="grid">

        <article class="card">
            <img src="https://braziliancorner.shop/cdn/shop/articles/Brigadeiro_3_1024x.jpg?v=1699998957" alt="Brigadeiro">
            <h3>Brigadeiro</h3>
            <p>El postre más famoso de Brasil: bolitas de chocolate hechas con leche condensada y cacao.</p>
        </article>

        <article class="card">
            <img src="https://i.panelinha.com.br/i1/bk-5745-beijinhoreceita.webp" alt="Beijinho">
            <h3>Beijinho</h3>
            <p>Dulces de coco similares al brigadeiro pero con sabor tropical y textura suave.</p>
        </article>

        <article class="card">
            <img src="https://www.196flavors.com/wp-content/uploads/2016/08/quindim-FP.jpg" alt="Quindim">
            <h3>Quindim</h3>
            <p>Postre brillante de coco y yema de huevo, dulce, suave y con origen portugués.</p>
        </article>

        <article class="card">
            <img src="https://www.receiteria.com.br/wp-content/uploads/pudim-de-leite-1.jpg" alt="Pudim de Leite">
            <h3>Pudim de Leite</h3>
            <p>Flan cremoso de leche condensada con caramelo, muy popular en celebraciones.</p>
        </article>

        <article class="card">
            <img src="https://www.receitasnestle.com.br/sites/default/files/srh_recipes/d5c3b12263781084d3e84b11c2d33027.jpg" alt="Bolo de Rolo">
            <h3>Bolo de Rolo</h3>
            <p>Pastel enrollado típico de Pernambuco, relleno con dulce de guayaba.</p>
        </article>

        <article class="card">
            <img src="https://www.receiteria.com.br/wp-content/uploads/pave-de-chocolate.jpg" alt="Pavê">
            <h3>Pavê</h3>
            <p>Postre frío en capas de galletas, crema y chocolate, tradicional en navidad.</p>
        </article>

        <article class="card">
            <img src="https://i.panelinha.com.br/i1/bk-9789-manjar-de-coco.webp" alt="Manjar de Coco">
            <h3>Manjar de Coco</h3>
            <p>Gelatina de coco acompañada de salsa de ciruelas. Suave y muy refrescante.</p>
        </article>

        <article class="card">
            <img src="https://static.itdg.com.br/images/360-240/b2b92774c7fec4a05604e5573ef5a294/365326-original.jpg" alt="Bolo de Cenoura">
            <h3>Bolo de Cenoura</h3>
            <p>Bizcocho de zanahoria con cobertura de chocolate, esponjoso y muy popular en todo el país.</p>
        </article>

        <article class="card">
            <img src="https://mariafgimenez.wordpress.com/wp-content/uploads/2013/02/romeu-e-julieta-p.jpg" alt="Romeu e Julieta">
            <h3>Romeu e Julieta</h3>
            <p>Clásica combinación de queso con dulce de guayaba. Simple pero deliciosa.</p>
        </article>

        <article class="card">
            <img src="https://cdn.casaeculinaria.com/wp-content/uploads/2023/10/17141549/Tapioca-doce-1.webp" alt="Tapioca Doce">
            <h3>Tapioca Doce</h3>
            <p>Crepe de harina de yuca relleno con coco, leche condensada o frutas.</p>
        </article>

        <article class="card">
            <img src="https://cdn.casaeculinaria.com/wp-content/uploads/2023/07/18112305/Cuscuz-de-tapioca.webp" alt="Cuscuz de Tapioca">
            <h3>Cuscuz de Tapioca</h3>
            <p>Postre frio de tapioca con leche de coco, azúcar y coco rallado.</p>
        </article>

        <article class="card">
            <img src="https://st2.depositphotos.com/3033681/5278/i/450/depositphotos_52786989-stock-photo-coconut-candy-cocada-different-tastes.jpg" alt="Cocada">
            <h3>Cocada</h3>
            <p>Dulce de coco tradicional en múltiples versiones: blanca, quemada o de leche condensada.</p>
        </article>

    </section>
</main>

<footer class="footer">
    <p>2025 Postres de Brasil</p>
</footer>

</body>
</html>
