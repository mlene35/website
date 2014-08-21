<?php
session_start();
?>
<html>
<head>
    <?php include './../layout/head.php'; ?>
</head>
<body>
    <div class="container">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <form action="/login/login_script.php" method="post">
                <fieldset>
                        <legend>Einloggen</legend>
                        <label>Benutzername: <input type="text" name="username" /></label>
                        <label>Password: <input type="password" name="password" /></label>
                    <input type="submit" name="formaction" value="Einloggen" class="btn btn-success"/>
                </fieldset>
            </form>
        </div>
    </div>
</body>


