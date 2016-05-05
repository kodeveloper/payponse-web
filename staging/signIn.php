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
                <form class="ui inverted form" method="POST" action="dashboard.php">
                  <div class="field">
                    <label>E-mail</label>
                    <input type="text" name="e-mail" placeholder="exam@payponse.com">
                  </div>
                  <div class="field">
                    <label>Şifre</label>
                    <input type="password" name="password">
                  </div>
                  <div class="field">
                    <div class="ui checkbox">
                      <input type="checkbox" tabindex="0" class="hidden">
                      <label>Beni Hatırla</label>
                    </div>
                  </div>
                  <button class="ui inverted blue basic large fluid button">Giriş yap</button>
                </form>
                <div class="ui inverted horizontal divider">ya da</div>
                <div class="signUp"><a href="signUp.php" class="fluid ui yellow large button">Kayıt Ol</a></div>
              </div>
        <?php include '../webServices/View/Components/_script.php'; ?>
    </body>
</html>
