<?php
session_start();
$title = "Bebidas de Brasil";
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

        /* ==== CONTENIDO ==== */
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

        /* ==== PIE DE PÁGINA ==== */
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
        <h2>Bebidas típicas de Brasil</h2>
        <p>Descubre las bebidas más populares y refrescantes de Brasil, desde cocktails emblemáticos hasta jugos tradicionales.</p>
    </section>

    <section class="grid">

        <article class="card">
            <img src="https://cuberspremium.com/wp-content/uploads/2020/07/receta-caipirinha.jpg" alt="Caipirinha">
            <h3>Caipirinha</h3>
            <p>El cóctel más famoso de Brasil, preparado con cachaça, lima, azúcar y hielo.</p>
        </article>

        <article class="card">
            <img src="https://thefoodtech.com/wp-content/uploads/2020/12/nueva-guarana-antarctica-1.jpg" alt="Guaraná">
            <h3>Guaraná</h3>
            <p>Bebida gaseosa hecha del fruto amazónico guaraná, famosa por su sabor dulce y refrescante.</p>
        </article>

        <article class="card">
            <img src="https://wallpapers.com/images/hd/cup-of-coffee-pictures-fokmpx51c6em1q1c.jpg" alt="Café Brasileiro">
            <h3>Café Brasileiro</h3>
            <p>Uno de los cafés más apreciados del mundo, conocido por su aroma intenso y sabor equilibrado.</p>
        </article>

        <article class="card">
            <img src="https://comidaperuanaweb.org/wp-content/uploads/2019/03/Las-mejores-recetas-con-cupuacu-o-copoazu-Comidaperuanaunaweb-1.jpg" alt="Jugo de Cupuaçu">
            <h3>Jugo de Cupuaçu</h3>
            <p>Jugo amazónico cremoso y aromático hecho con la pulpa del cupuaçu.</p>
        </article>

        <article class="card">
            <img src="https://coctelia.com/wp-content/uploads/2022/03/batida-de-coco.jpg" alt="Batida de Coco">
            <h3>Batida de Coco</h3>
            <p>Mezcla de cachaça, leche de coco y leche condensada. Suave y dulce.</p>
        </article>

        <article class="card">
            <img src="https://media.istockphoto.com/id/1308517446/photo/fresh-sugar-cane-juice-in-a-jar-with-cut-pieces-of-cane-on-rustic-wooden-restaurant-table.jpg?s=612x612&w=0&k=20&c=qDati563eOZs81Jy9hosjxn1UL0zEfxdLWeyL4Fn4xk=" alt="Caldo de Cana">
            <h3>Caldo de Cana</h3>
            <p>Jugo natural de caña de azúcar, muy consumido en ferias y calles del país.</p>
        </article>

        <article class="card">
            <img src="https://pampadirect.com/product_images/uploaded_images/terere-frutas-hielo-verano-lima-naranja-bombilla.png" alt="Tereré">
            <h3>Tereré</h3>
            <p>Bebida fría a base de yerba mate, muy popular en el sur de Brasil.</p>
        </article>

        <article class="card">
            <img src="https://www.cocina-brasilena.com/base/stock/Recipe/jugo-acai/jugo-acai_web.jpg" alt="Açaí">
            <h3>Jugo de Açaí</h3>
            <p>Bebida energética hecha con açaí amazónico, consumido como jugo o batido.</p>
        </article>

        <article class="card">
            <img src="https://st.depositphotos.com/17775888/57538/i/450/depositphotos_575386260-stock-photo-chimarro-traditional-brazilian-yerba-mate.jpg" alt="Chimarrão">
            <h3>Chimarrão</h3>
            <p>Infusión caliente de yerba mate típica del estado de Rio Grande do Sul.</p>
        </article>

        <article class="card">
            <img src="https://www.cocinavital.mx/wp-content/uploads/2017/08/batido-de-maracuya.jpg" alt="Batida de Maracuyá">
            <h3>Batida de Maracuyá</h3>
            <p>Bebida dulce y tropical con cachaça y pulpa de maracuyá.</p>
        </article>

        <article class="card">
            <img src="https://elpoderdelconsumidor.org/wp-content/uploads/2019/07/guanabana-b.jpg" alt="Graviola">
            <h3>Jugo de Graviola</h3>
            <p>Refrescante bebida hecha con la pulpa de la graviola, una fruta tropical muy aromática.</p>
        </article>

        <article class="card">
            <img src="https://www.cocina-brasilena.com/base/stock/Recipe/quentao/quentao_web.jpg" alt="Quentão">
            <h3>Quentão</h3>
            <p>Bebida caliente con jengibre, especias y cachaça, tradicional en fiestas juninas.</p>
        </article>

    </section>
</main>

<footer class="footer">
    <p>2025 Bebidas de Brasil</p>
</footer>

</body>
</html>
