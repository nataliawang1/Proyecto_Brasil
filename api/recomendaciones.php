<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../conexion.php';

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($method === 'GET') {
    $filterPlatillo = isset($_GET['filter_platillo']) ? intval($_GET['filter_platillo']) : 0;
    $page = max(1, intval($_GET['page'] ?? 1));
    $limit = max(1, min(100, intval($_GET['limit'] ?? 10)));
    $offset = ($page - 1) * $limit;

    $where = '';
    if ($filterPlatillo > 0) { $where = 'WHERE r.id_platillo = '. $filterPlatillo; }

    $sql = "SELECT r.id_recomendacion, r.motivo, u.nombre AS usuario, p.nombre_platillo AS platillo
            FROM recomendacion_platillo r
            JOIN usuarios u ON u.id = r.id_usuario
            JOIN platillo p ON p.id_platillo = r.id_platillo
            $where
            ORDER BY r.id_recomendacion DESC
            LIMIT $limit OFFSET $offset";
    $res = $conn->query($sql);
    $data = [];
    if ($res) { while ($row = $res->fetch_assoc()) { $data[] = $row; } }

 
    $resC = $conn->query("SELECT COUNT(*) c FROM recomendacion_platillo r $where");
    $total = 0; if ($resC) { $total = intval(($resC->fetch_assoc())['c'] ?? 0); }

    echo json_encode(['ok' => true, 'page' => $page, 'limit' => $limit, 'total' => $total, 'data' => $data], JSON_UNESCAPED_UNICODE);
    exit;
}

http_response_code(405);
echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
