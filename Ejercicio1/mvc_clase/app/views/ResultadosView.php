<!DOCTYPE html>
<html>
<head><title>Resultado</title></head>
<body>
    <h2>Resumen del Cliente</h2>
    <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></p>
    <p><strong>Correo:</strong> <?= htmlspecialchars($correo) ?></p>
    <p><strong>DUI:</strong> <?= htmlspecialchars($dui) ?></p>
    <p><strong>Cuota mensual:</strong> $<?= $cuota ?></p>

    <h2>Tabla de Amortización</h2>
    <table>
        <tr>
            <th>Mes</th>
            <th>Cuota</th>
            <th>Interés</th>
            <th>Capital</th>
            <th>Saldo</th>
        </tr>
        <?php foreach ($tabla as $fila): ?>
        <tr>
            <td><?= $fila['mes'] ?></td>
            <td>$<?= $fila['cuota'] ?></td>
            <td>$<?= $fila['interes'] ?></td>
            <td>$<?= $fila['capital'] ?></td>
            <td>$<?= $fila['saldo'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
