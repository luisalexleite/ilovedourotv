<?php
include('css.php')
?>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Rubik&display=swap");

    body,
    html {
        padding: 0;
        margin: 0;
        border: 0;
        font-family: 'Rubik';
    }

    #cover {
        background: #FFF;
        background-size: cover;
        height: 100%;
        text-align: center;
        display: flex;
        align-items: center;
        position: relative;
    }

    #cover-caption {
        width: 100%;
        position: relative;
        z-index: 1;
    }

    form:before {
        content: '';
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%;
        background-color: #e92829;
        z-index: -1;
        border-radius: 10px;
    }
</style>
<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <h1 class="display-4 py-2 text-truncate">Login</h1>
                    <div class="px-2">
                        <?php if (isset($_GET['e']) && $_GET['e'] == 'errado') {
                            echo "<p color:white;> Dados de Login Incorretos";
                        } ?>
                        <form method="post" action="session.php" class="justify-content-center">
                            <div class="form-group">
                                <label class="sr-only">Utilizador</label>
                                <input name='user' type="text" class="form-control" placeholder="Nome de Utilizador">
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Palavra-Passe</label>
                                <input name='password' type="password" class="form-control" placeholder="Palavra-passe">
                            </div>
                            <button type="submit" style="color:red" class="btn btn-white btn-lg">LOGIN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>