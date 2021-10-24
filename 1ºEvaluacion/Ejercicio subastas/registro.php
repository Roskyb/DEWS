<?php include 'cabecera.php' ?>
<?php

if (isset($_POST['register'])) {

    if (
        isset($_POST['username']) &&   !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['realname']) && !empty($_POST['realname']) &&
        isset($_POST['email']) && !empty($_POST['email'])
    ) {
        $inputUsername = $_POST['username'];
        $inputPass = $_POST['password'];

        // comprobamos si el usuario existe
        $queryString = "SELECT count(*) as cont FROM usuario WHERE username = \"$inputUsername\"";
        $result = mysqli_query($conn, $queryString);
        if (mysqli_errno($conn)) die(mysqli_error($conn));
        if (mysqli_fetch_assoc($result)['cont'] == 0) {
            // creamos el usuario
            $inputUsername = $_POST['username'];  
            $inputPassword = $_POST['password'];  
            $inputRealName = $_POST['realname'];  
            $inputEmail = $_POST['email'];  
            $queryString = "INSERT INTO usuario (username, password, nombre, email)
                            VALUES (\"$inputUsername\", \"$inputPassword\", \"$inputRealName\", \"$inputEmail\")" ;
            $result = mysqli_query($conn, $queryString);
            if (mysqli_errno($conn)) die(mysqli_error($conn));
            else header("Location: login.php?newuser");
        } else $err = 'El usuario que has introducido ya existe';
    } else {
        $err = 'Asegurate de introducir todos los campos';
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <?php echo isset($err) ?  "<small>$err</small>" : '' ?>
    <table>
        <tr>
            <td><label for="username">Usuario</label></td>
            <td>
                <input type="text" id="username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>">
            </td>
        </tr>
        <tr>
            <td><label for="realname">Nombre completa</label></td>
            <td>
                <input type="text" id="realname" name="realname">
            </td>
        </tr>

        <tr>
            <td><label for="password">Password</label></td>
            <td>
                <input type="password" id="password" name="password">
            </td>
        </tr>

        <tr>
            <td><label for="repassword">Password (de nuevo)</label></td>
            <td>
                <input type="password" id="repassword" name="repassword">
                <small class="d-hidden">Las contraseñas deven coincidir</small>
            </td>
        </tr>

        <tr>
            <td><label for="email">Correo Electrónico</label></td>
            <td>
                <input type="email" id="email" name="email">
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="register" id="register" value="Registrate"></td>
        </tr>

    </table>
</form>
<script>
    const re = document.getElementById('repassword')
    re.addEventListener('change', (e) => {
        let password = document.getElementById('password')
        if (password.value !== re.value) {
            re.parentElement.querySelector('small').classList.remove('d-hidden')
        } else {
            re.parentElement.querySelector('small').classList.add('d-hidden')
        }


    })
</script>

<?php include 'pie.php' ?>