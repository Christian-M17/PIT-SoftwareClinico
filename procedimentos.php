<!DOCTYPE html>
<html>

<head>
    <title>LampClinic</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" href="img/logo1.ico" type="image/x-icon">
</head>

<body class="body-parte2">
    <header>
        <div class="logo">
            <a href="logado.php"><img src="img/logo.png" alt="Logo"></a>
        </div>
        <div class="profile">


        </div>
    </header>
    <main>
        <div class="agenda">
            <h1>Realizar Procedimento</h1>
            <form method="post">
           
                <div class="divselect">
                    <label for="data">Usuario :</label>
                    <select class="select" name="procedimento">
                        <option value="0"><!-- Edita aqui --></option>
                    </select>
                    <button type="submit">Enviar</button>
                </div>
                <div class="divselect">
                <label for="data">Clientes :</label>
                    <select class="select" name="usuario">
                        <option value="0"><!-- Edita aqui --></option>
                    </select>
                    <button type="submit">Enviar</button>
                </div>
                <div class="divselect">
                    <label for="data">Procedimento:</label>
                    <select class="select" name="usuario">
                        <option value="0"><!-- Edita aqui --></option>
                    </select>
                    <button type="submit">Enviar</button>
                </div>
                <div class="divselect">
                    <label for="data">Digite a data:</label>
                    <input type="date" name="data" class="data">
                    <button type="submit">Enviar</button>
                </div>
               
           
            </form>
        </div>
        </div>
    </main>
</body>

</html>