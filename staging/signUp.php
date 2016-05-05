<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../webServices/View/Components/_head.php'; ?>
    </head>
    <body>
        <div class="overlay"></div>
        <?php include '../webServices/View/Components/_logo.php'; ?>
            <div class="ui text container signIn">
                <form class="ui inverted form" method="POST">
                  <div class="field">
                    <label>E-mail</label>
                    <input type="text" name="e-mail" placeholder="exam@payponse.com">
                  </div>
                  <div class="field">
                    <label>Şifre</label>
                    <input type="password" name="password">
                  </div>
                  <div class="field">
                    <label>Marka Adı</label>
                    <input type="text" name="mark-name">
                  </div>
                  <button class="ui inverted yellow basic large fluid button">Devam Et</button>
                </form>
                <div class="ui inverted horizontal divider">ya da</div>
                <div class="signUp"><a href="signIn.php" class="fluid ui blue large button">Giriş Yap</a></div>
              </div>
        <?php include '../webServices/View/Components/_head.php'; ?>
    </body>
</html>
