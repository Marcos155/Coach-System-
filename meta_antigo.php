<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Meta</title>
    <link rel="shortcut icon" href="assets/images/favico.png" type="image/x-icon">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.teal-deep_purple.min.css">
    <link rel="stylesheet" href="assets/css/style-profile.css">
    <link rel="stylesheet" href="assets/css/meta.css">
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Roboto:300,300i,400,400i,500,700,900"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script defer src=https://kit.fontawesome.com/79b5047e4f.js crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
    <style>
        .mdl-layout__header {
            background-color: rgb(255, 0, 0);
        }

        .table-wrapper {
            max-height: 500px;
            overflow-y: auto;
        }

        label,
        p,
        button,
        .form-check {
            color: #000;
            margin-left: 0.3vw;
        }

        .espace {
            margin-right: 1rem;
            margin-left: 1rem;
        }

        .alinhar {
            text-align: center;
        }
    </style>
    <script>

    </script>
</head>

<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header administration">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <div class="current-user">
                    <i class="material-icons">account_circle</i>
                    <!-- 
                    <i class="material-icons" onclick="clicar()" onmouseenter="mouse()">account_circle</i>
                    <span class="foto">Clique no icone para selecionar a foto de perfil</span>
                    <div class="file">
                        <input type="file" id="file" accept="image/*" placeholder="Selecione a foto de perfil">
                        <label class="hover" for="file">Selecione a foto de perfil
                        </label>
                    </div>-->
                    <?php echo "olá, $nome!" ?>
                </div>
            </div>
            <div class="mdl-layout-spacer"></div>
        </header>
        <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">
        <?php
          echo $nome; 
        ?>
      </span>
            <nav class="mdl-navigation">
                <br>
                <nav class="mdl-navigation">
                    <?php
            echo "<a class='mdl-navigation__link' href='testando.php?cod=$user_data[cod]'>Formulário</a>";
          ?>
                    <br>
                    <a class="mdl-navigation__link" href="show_sistema_persona.php">Conta</a>
                    <br>
                    <a class="mdl-navigation__link active" href="meta.php">meta</a>
                    <br>
                    <a class="mdl-navigation__link" href="notas.php">Notas</a>
          <br>
                    <a class="mdl-navigation__link" href="sair.php">Sair</a>
                </nav>
        </div><br><br><br><br>
        <main class="mdl-layout__content">
            <div class="page-content">
                <div class="m-5">
                    <h1>Meta</h1>
                </div>
                <div class="bar">
                    <input class="bar-input" type="radio" name="input" id="input_0" />
                    <div class="bar-view">
                        <label class="bar-button" for="input_0">5</label>
                    </div>
                    <input class="bar-input" type="radio" name="input" id="input_1" />
                    <div class="bar-view">
                        <label class="bar-button" for="input_1">4</label>
                    </div>
                    <input class="bar-input" type="radio" name="input" id="input_2" />
                    <div class="bar-view">
                        <label class="bar-button" for="input_2">3</label>
                    </div>
                    <input class="bar-input" type="radio" name="input" id="input_3" />
                    <div class="bar-view">
                        <label class="bar-button" for="input_3">2</label>
                    </div>
                    <input class="bar-input" type="radio" name="input" id="input_4" />
                    <div class="bar-view">
                        <label class="bar-button" for="input_4">1</label>
                    </div>
                </div>
                <div class="command">Clique no objetivo que foi concluido</div><br><br>
                <form action="obrigado.html" method="POST">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" >
                            <label class="form-check-label" for="invalidCheck">
                                1: Formulário preenchido
                            </label><br>
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" >
                            <label class="form-check-label" for="invalidCheck">
                                2: Aulas realizadas
                            </label><br>
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" >
                            <label class="form-check-label" for="invalidCheck">
                                3: Anotação preenchida
                            </label><br>
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" >
                            <label class="form-check-label" for="invalidCheck">
                                4: Acompanhamento realizado
                            </label><br>
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" >
                            <label class="form-check-label" for="invalidCheck">
                                5 : Meta concluída
                            </label><br><br><br>
                            <div class="form-group espace">
                                <label for="exampleFormControlTextarea1">Faça anotações do que foi feito na
                                    semana</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                </form>
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>
        </main>
        <script>

            function clicar() {
                document.getElementsByClassName('file')[0].style.display = "flex";
                document.getElementsByClassName('foto')[0].style.display = "none";
            }
            function mouse() {
                document.getElementsByClassName('foto')[0].style.display = "block";
            }
            const progressBar = document.getElementById("progress-bar");
            const progressNext = document.getElementById("progress-next");
            const progressPrev = document.getElementById("progress-prev");
            const steps = document.querySelectorAll(".step");
            let active = 1;

            progressNext.addEventListener("click", () => {
                active++;
                if (active > steps.length) {
                    active = steps.length;
                }
                updateProgress();
            });

            progressPrev.addEventListener("click", () => {
                active--;
                if (active < 1) {
                    active = 1;
                }
                updateProgress();
            });

            const updateProgress = () => {
                // toggle active class on list items
                steps.forEach((step, i) => {
                    if (i < active) {
                        step.classList.add("active");
                    } else {
                        step.classList.remove("active");
                    }
                });
                // set progress bar width  
                progressBar.style.width =
                    ((active - 1) / (steps.length - 1)) * 100 + "%";
                // enable disable prev and next buttons
                if (active === 1) {
                    progressPrev.disabled = true;
                } else if (active === steps.length) {
                    progressNext.disabled = true;
                } else {
                    progressPrev.disabled = false;
                    progressNext.disabled = false;
                }
            };
        </script>
</body>
</html>