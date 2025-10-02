<!DOCTYPE html>
<html>
<head><title>Simulador de Crédito</title></head>
<body>
    <h2>Formulario de Solicitud de Crédito</h2>
    <form action="/simular" method="POST">
        Nombre: <input type="text" name="nombre" required><br>
        Correo: <input type="email" name="correo" required><br>
        DUI (########-#): <input type="text" name="dui" required><br>
        Monto del crédito: <input type="number" step="0.01" name="capital" required><br>
        Tasa de interés anual (%): <input type="number" step="0.01" name="tasa" required><br>
        Plazo (meses): <input type="number" name="plazo" required><br>
        <button type="submit">Calcular</button>
    </form>
</body>
</html>
