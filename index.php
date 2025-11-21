<?php
session_start();
include("conexion.php");
?>
<?php $title = "Encuesta – Gastronomía de Brasil"; ?>

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

        /* Opiniones */
        .opiniones {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        .opinion-item {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            padding: 1rem;
            margin-bottom: 0.75rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }
        .opinion-texto { color: #333; }
        .opinion-meta { color: #666; font-size: 0.9rem; }
        .opinion-actions form { margin: 0; }
        .btn-del {
            background: #ffdddd;
            color: #a70000;
            border: 1px solid #ffbdbd;
            padding: 6px 10px;
            border-radius: 8px;
            cursor: pointer;
        }
        .opiniones .filtros { display:flex; gap:0.5rem; align-items:center; margin: 0.75rem 0 1rem; }
        .opiniones .filtros select { padding:6px 8px; border:1px solid #ddd; border-radius:8px; }
        .opiniones .filtros button { padding:7px 12px; border: none; background: var(--verde); color:#fff; border-radius:8px; cursor:pointer; }
        details { margin-top: 0.5rem; }
        .paginacion { display:flex; gap:8px; justify-content:center; margin-top:12px; }
        .paginacion a, .paginacion span { padding:6px 10px; border:1px solid #ddd; border-radius:8px; text-decoration:none; color:#333; }
        .paginacion .activo { background: var(--amarillo); border-color: #eacb5a; }

        * { margin: 0; padding: 0; box-sizing: border-box; }

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
            bottom: -5px; left: 0;
            transition: 0.3s;
        }

        .menu a:hover::after {
            width: 100%;
        }


        main {
            max-width: 900px;
            margin: 4rem auto;
            padding: 0 1.5rem;
        }

        h2 {
            font-family: 'Lora', 'Poppins', serif;
            font-size: 1.8rem;
            color: var(--verde-oscuro);
            margin-bottom: 1rem;
            text-align: center;
        }

        form {
            background: #fff;
            padding: 2rem;
            margin-bottom: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }

        label {
            font-weight: 600;
            color: var(--verde-oscuro);
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
        }

        textarea {
            height: 120px;
            resize: none;
        }

        input[type=submit] {
            background: var(--verde);
            color: white;
            font-weight: 600;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type=submit]:hover {
            background: var(--verde-oscuro);
        }

        .mensaje {
            padding: 12px;
            margin: 1rem 0;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
        }

        .ok { background: #c8f7c5; color: #256d1b; }
        .error { background: #ffd2d2; color: #b30000; }


        input:required:invalid, select:required:invalid, textarea:required:invalid {
            border-color: #e57373;
            box-shadow: 0 0 0 3px rgba(229,115,115,0.1);
        }
        input:required:valid, select:required:valid, textarea:required:valid {
            border-color: #66bb6a;
            box-shadow: 0 0 0 3px rgba(102,187,106,0.1);
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

        .perfil-container {
            max-width: 520px;
            margin: 2rem auto 0;
            padding: 0 1rem;
        }
        .perfil-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            padding: 0.75rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .perfil-card img {
            width: 100%;
            max-width: 420px;
            height: auto;
            border-radius: 0.75rem;
        }

        .nosotros {
            max-width: 1100px;
            margin: 2rem auto 0;
            padding: 0 1.5rem;
        }
        .nosotros .intro {
            text-align:center;
            margin-bottom: 1.25rem;
            color: #555;
        }
        .cards {
            display:grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1rem;
        }
        .card-info {
            background:#fff;
            border-radius: 14px;
            box-shadow: 0 6px 22px rgba(0,0,0,.06);
            padding: 1.1rem 1.2rem;
        }
        .card-info h3 { color: var(--verde); margin-bottom: .4rem; font-size: 1.1rem; }
        .card-info p { color:#555; font-size:.95rem; }
        .socials { display:flex; gap:10px; margin-top:.6rem; }
        .socials a { display:inline-flex; align-items:center; gap:6px; padding:.5rem .75rem; background:#f5f7f5; border-radius:10px; text-decoration:none; color:#2b2b2b; border:1px solid #e6e6e6; }
        .socials a:hover { background:#eef7ee; border-color:#d9ecd9; }
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

    <section class="perfil-container" style="margin-top:1.5rem;">
        <h2>Sobre el sitio</h2>
        <p style="color: var(--gris); margin: 0.75rem 0 1.25rem; line-height: 1.6;">
            Bienvenido a Brasil Gourmet, un espacio para descubrir, registrar y recomendar los mejores sabores
            de la gastronomía brasileña. Aquí podrás agregar lugares y crear recomendaciones para
            compartir experiencias culinarias.
        </p>
        <h2>Mi ficha de perfil</h2>
        <div class="perfil-card">
            <img src="img/Ficha Natalia Marquez.jpg" alt="Ficha de perfil">
        </div>
    </section>

    <section class="nosotros">
        <div class="intro">Descubre quiénes somos, qué buscamos y cómo participar.</div>
        <div class="cards">
            <div class="card-info">
                <h3>Misión</h3>
                <p>Promover la gastronomía brasileña a través de una comunidad que comparte platillos favoritos
                y recomendaciones auténticas de los lugares y sabores más representativos.</p>
            </div>
            <div class="card-info">
                <h3>Visión</h3>
                <p>Ser una guía práctica y confiable para explorar Brasil a través de su cocina, destacando
                platillos, regiones y tradiciones culinarias.</p>
            </div>
            <div class="card-info">
                <h3>Valores</h3>
                <p>Respeto por la cultura, honestidad en las opiniones, diversidad de sabores y
                colaboración entre usuarios.</p>
            </div>
        </div>

        <div class="cards" style="margin-top:1rem;">
            <div class="card-info">
                <h3>Cómo participar</h3>
                <p>1) Crea platillos. </p>
                <p>2) Recomiéndalos con tus motivos.</p>
                <p>3) Filtra y descubre nuevas ideas.</p>
                <p>4) Edita o elimina tus opiniones cuando lo necesites.</p>
            </div>
        </div>
    </section>


    <h2>Agregar Platillo</h2>

    <form method="POST" action="">
        <label>Nombre del platillo:</label>
        <input type="text" name="nombre_platillo" required minlength="2" maxlength="150">

        <label>Tipo de cocina:</label>
        <input type="text" name="tipo_cocina" placeholder="Ej. Mineira, Bahiana, Amazónica" required minlength="3" maxlength="100">

        <label>Descripción:</label>
        <textarea name="descripcion" maxlength="500" placeholder="Describe el platillo (máx. 500 caracteres)"></textarea>

        <label>Categoría:</label>
        <input type="text" name="categoria" placeholder="Ej. Entrada, Plato fuerte, Postre" maxlength="100">

        <input type="submit" name="guardar_platillo" value="Guardar Platillo">
    </form>

    <?php
    $platillos = $conn->query("SELECT id_platillo, nombre_platillo FROM platillo ORDER BY nombre_platillo");
    ?>

    <h2>Agregar Recomendación de Platillo</h2>

    <form method="POST" action="">
        <?php if (isset($_SESSION['id'])): ?>
            <input type="hidden" name="id_usuario" value="<?= (int)$_SESSION['id'] ?>">
            <p class="opinion-meta" style="margin:0 0 8px;">Opinando como: <strong><?= htmlspecialchars($_SESSION['usuario'] ?? $_SESSION['nombre'] ?? 'Usuario', ENT_QUOTES, 'UTF-8') ?></strong></p>
        <?php else: ?>
            <p class="opinion-meta" style="margin:0 0 8px;">Inicia sesión para recomendar. <a href="login-registro.html">Ir al login</a></p>
        <?php endif; ?>

        <label>Platillo:</label>
        <select name="id_platillo" required>
            <option value="">-- Seleccione un platillo --</option>
            <?php if ($platillos) { $platillos->data_seek(0); while($p = $platillos->fetch_assoc()) echo "<option value='{$p['id_platillo']}'>{$p['nombre_platillo']}</option>"; } ?>
        </select>

        <label>Motivo:</label>
        <textarea name="motivo" required minlength="5" maxlength="400" placeholder="Cuéntanos por qué recomiendas este platillo (mín. 5 caracteres)"></textarea>

        <input type="submit" name="guardar_recomendacion_platillo" value="Guardar Recomendación" <?= isset($_SESSION['id']) ? '' : 'disabled' ?> >
    </form>

    <?php
    if (isset($_POST['guardar_platillo'])) {
        $stmt = $conn->prepare("INSERT INTO platillo (nombre_platillo, tipo_cocina, descripcion, categoria) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $_POST['nombre_platillo'], $_POST['tipo_cocina'], $_POST['descripcion'], $_POST['categoria']);
        echo $stmt->execute() ? "<p class='mensaje ok'>✔ Platillo agregado correctamente.</p>" : "<p class='mensaje error'>❌ Error: ".$stmt->error."</p>";
        $stmt->close();
    }

    if (isset($_POST['guardar_recomendacion_platillo'])) {
        $id_usuario = isset($_SESSION['id']) ? intval($_SESSION['id']) : 0;
        if ($id_usuario <= 0) {
            echo "<p class='mensaje error'>❌ Debes iniciar sesión para recomendar.</p>";
        } else {
         
            $chk = $conn->prepare("SELECT 1 FROM usuarios WHERE id = ?");
            $chk->bind_param("i", $id_usuario);
            $chk->execute();
            $chk->store_result();
            if ($chk->num_rows === 0) {
                echo "<p class='mensaje error'>❌ Tu sesión no es válida. Por favor, vuelve a iniciar sesión.</p>";
            } else {
                $stmt = $conn->prepare("INSERT INTO recomendacion_platillo (id_usuario, id_platillo, motivo) VALUES (?, ?, ?)");
                $id_platillo = intval($_POST['id_platillo'] ?? 0);
                $motivo = $_POST['motivo'] ?? '';
                $stmt->bind_param("iis", $id_usuario, $id_platillo, $motivo);
                echo $stmt->execute() ? "<p class='mensaje ok'>✔ Recomendación agregada correctamente.</p>" : "<p class='mensaje error'>❌ Error: ".$stmt->error."</p>";
                $stmt->close();
            }
            $chk->close();
        }
    }

    if (isset($_POST['eliminar_recomendacion'])) {
        $id_rec = intval($_POST['id_recomendacion'] ?? 0);
        $uid = isset($_SESSION['id']) ? intval($_SESSION['id']) : 0;
        if ($id_rec > 0 && $uid > 0) {
            $stmt = $conn->prepare("DELETE FROM recomendacion_platillo WHERE id_recomendacion = ? AND id_usuario = ?");
            $stmt->bind_param("ii", $id_rec, $uid);
            echo $stmt->execute() && $stmt->affected_rows > 0
                ? "<p class='mensaje ok'>✔ Recomendación eliminada.</p>"
                : "<p class='mensaje error'>❌ No puedes eliminar esta recomendación.</p>";
            $stmt->close();
        } else {
            echo "<p class='mensaje error'>❌ Debes iniciar sesión para eliminar.</p>";
        }
    }

    if (isset($_POST['editar_recomendacion'])) {
        $id_rec = intval($_POST['id_recomendacion'] ?? 0);
        $uid = isset($_SESSION['id']) ? intval($_SESSION['id']) : 0;
        $id_platillo = intval($_POST['id_platillo'] ?? 0);
        $motivo = $_POST['motivo'] ?? '';
        if ($id_rec > 0 && $uid > 0 && $id_platillo > 0) {
            $stmt = $conn->prepare("UPDATE recomendacion_platillo SET id_platillo = ?, motivo = ? WHERE id_recomendacion = ? AND id_usuario = ?");
            $stmt->bind_param("isii", $id_platillo, $motivo, $id_rec, $uid);
            echo $stmt->execute() && $stmt->affected_rows > 0
                ? "<p class='mensaje ok'>✔ Recomendación actualizada.</p>"
                : "<p class='mensaje error'>❌ No puedes editar esta recomendación.";
            $stmt->close();
        } else {
            echo "<p class='mensaje error'>❌ Debes iniciar sesión para editar.</p>";
        }
    }
    $platillosArr = [];
    if ($resP = $conn->query("SELECT id_platillo, nombre_platillo FROM platillo ORDER BY nombre_platillo")) {
        while($row = $resP->fetch_assoc()) { $platillosArr[] = $row; }
    }

    $filterPlatillo = intval($_GET['filter_platillo'] ?? 0);
    $page = max(1, intval($_GET['page'] ?? 1));
    $limit = 10;
    $offset = ($page - 1) * $limit;

    $whereParts = [];
    if ($filterPlatillo > 0) { $whereParts[] = "r.id_platillo = ".$filterPlatillo; }
    $whereSql = count($whereParts) ? ("WHERE ".implode(" AND ", $whereParts)) : "";


    $total = 0;
    if ($resC = $conn->query("SELECT COUNT(*) c FROM recomendacion_platillo r $whereSql")) {
        $rowC = $resC->fetch_assoc();
        $total = intval($rowC['c'] ?? 0);
    }
    $totalPages = max(1, (int)ceil($total / $limit));

    $opiniones = $conn->query("SELECT r.id_recomendacion, u.nombre AS usuario, p.nombre_platillo AS platillo, r.motivo, r.id_usuario, r.id_platillo
                               FROM recomendacion_platillo r
                               JOIN usuarios u ON u.id = r.id_usuario
                               JOIN platillo p ON p.id_platillo = r.id_platillo
                               $whereSql
                               ORDER BY r.id_recomendacion DESC
                               LIMIT $limit OFFSET $offset");
    ?>

    <section class="opiniones">
        <h2>Opiniones recientes</h2>
        <form class="filtros" method="GET" action="">
            <label>Platillo:
                <select name="filter_platillo">
                    <option value="0">Todos</option>
                    <?php foreach($platillosArr as $p): ?>
                        <option value="<?= (int)$p['id_platillo'] ?>" <?= $filterPlatillo==(int)$p['id_platillo']? 'selected':'' ?>>
                            <?= htmlspecialchars($p['nombre_platillo'], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            <button type="submit">Filtrar</button>
        </form>
        <?php if ($opiniones && $opiniones->num_rows > 0): ?>
            <?php while($op = $opiniones->fetch_assoc()): ?>
                <div class="opinion-item">
                    <div>
                        <div class="opinion-texto">"<?= htmlspecialchars($op['motivo'] ?? '', ENT_QUOTES, 'UTF-8') ?>"</div>
                        <div class="opinion-meta">por <?= htmlspecialchars($op['usuario'] ?? '', ENT_QUOTES, 'UTF-8') ?> • platillo <?= htmlspecialchars($op['platillo'] ?? '', ENT_QUOTES, 'UTF-8') ?></div>
                        <?php if (isset($_SESSION['id']) && (int)$_SESSION['id'] === (int)$op['id_usuario']): ?>
                            <details>
                                <summary>Editar</summary>
                                <form method="POST" action="" style="margin-top:0.5rem;">
                                    <input type="hidden" name="id_recomendacion" value="<?= (int)$op['id_recomendacion'] ?>">
                                    <p class="opinion-meta" style="margin:0 0 6px;">Editando como: <strong><?= htmlspecialchars($_SESSION['usuario'] ?? $_SESSION['nombre'] ?? 'Usuario', ENT_QUOTES, 'UTF-8') ?></strong></p>
                                    <label>Platillo:
                                        <select name="id_platillo" required>
                                            <?php foreach($platillosArr as $p): ?>
                                                <option value="<?= (int)$p['id_platillo'] ?>" <?= ((int)$op['id_platillo'] === (int)$p['id_platillo']) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($p['nombre_platillo'], ENT_QUOTES, 'UTF-8') ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </label>
                                    <label>Motivo:
                                        <textarea name="motivo" rows="2" required minlength="5" maxlength="400" style="width:100%; padding:8px; border:1px solid #ddd; border-radius:8px;"><?= htmlspecialchars($op['motivo'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                                    </label>
                                    <button type="submit" name="editar_recomendacion" style="margin-top:6px; padding:7px 12px; border:none; background: var(--verde); color:#fff; border-radius:8px; cursor:pointer;">Guardar</button>
                                </form>
                            </details>
                        <?php endif; ?>
                    </div>
                    <?php if (isset($_SESSION['id']) && (int)$_SESSION['id'] === (int)$op['id_usuario']): ?>
                        <div class="opinion-actions">
                            <form method="POST" action="" onsubmit="return confirm('¿Eliminar esta recomendación?');">
                                <input type="hidden" name="id_recomendacion" value="<?= (int)$op['id_recomendacion'] ?>">
                                <button class="btn-del" type="submit" name="eliminar_recomendacion">Eliminar</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
            <?php if ($totalPages > 1): ?>
                <div class="paginacion">
                    <?php 
                        $base = '?filter_platillo='.(int)$filterPlatillo.'&page=';
                        for($p = 1; $p <= $totalPages; $p++):
                    ?>
                        <?php if ($p == $page): ?>
                            <span class="activo"><?= $p ?></span>
                        <?php else: ?>
                            <a href="<?= $base.$p ?>"><?= $p ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <p class="opinion-meta">Aún no hay opiniones.</p>
        <?php endif; ?>
    </section>

    <?php $conn->close(); ?>

</main>

<footer class="footer">
    <p>2025 Gastronomía de Brasil</p>
</footer>



</body>
</html>
