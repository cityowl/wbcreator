<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Auhorization / WBCreator 1.0</title>
        <link href="/theme/css/bootstrap.min.css" rel="stylesheet">
        <link href="/theme/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="/theme/css/sb-admin-2.css" rel="stylesheet">
        <link href="/theme/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/main.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="/theme/js/jquery.js"></script>
        <script src="/theme/js/bootstrap.min.js"></script>
        <script src="/theme/js/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="/theme/js/sb-admin-2.js"></script>
        <script src="/assets/js/auth.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Вход<span class="pull-right logo-title">WB Creator 1.0</span></h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" id="login-form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Логин" name="login" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Пароль" name="password" type="password">
                                    </div>
                                    <div class="checkbox"> 
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Запомнить меня
                                        </label>
                                    </div>
                                    <div class="error_string"></div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <a id="login-button" href="index.html" class="btn btn-lg btn-success btn-block">Авторизация</a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
