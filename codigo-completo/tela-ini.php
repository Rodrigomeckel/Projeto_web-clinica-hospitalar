<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="./js/tela de inicio-js/tela-ini-java.js"></script>
    <script type="text/javascript" src="./plugins/tela de inicio-plugin js/jquery.min.js"></script>
    <script type="text/javascript" src="./plugins/tela de inicio-plugin js/jquery.cycle.all.js"></script>
    <link rel="stylesheet" href="./css/tela de inicio-css/style-tela-ini.css">
    <link rel="shortcut icon" href="./img/icon2.png">
    <title>AASH - Inicio</title>
</head>
<body>
    <div class="header" id="header">
        <button onclick="toggleSidebar()" class="btn_iconheader">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
        </button>
        <div class="logo_aash">
            <img src="./img/logotradicional2.png" alt="LOGO AASH" id="logoheader">
        </div>
        <div class="navegador_header" id="navegador_header">
            <button onclick="toggleSidebar()" class="btn_iconheader">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-unindent" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M13 8a.5.5 0 0 0-.5-.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H12.5A.5.5 0 0 0 13 8Z"/>
                    <path fill-rule="evenodd" d="M3.5 4a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 1 0v-7a.5.5 0 0 0-.5-.5Z"/>
                  </svg>
            </button>
            <a class="ativos" href="tela-ini.php">Inicio</a>
            <a href="marcar-consultas.php">Consulta</a>
            <a href=" fica-medica.php">Ficha Médica</a>
            <a href="perfil.php">Perfil</a>
        </div>
    </div>
    <div tabindex="0" onclick="closesidebar()" class="content" id="content">
        <div id="banner" class="banner" onload="iniciarCiclo()">  
            <img src="./img/tela de inicio-img/anuncios/anuncio1.png">
            <img src="./img/tela de inicio-img/anuncios/anuncio2.png">
            <img src="./img/tela de inicio-img/anuncios/anuncio3.png">
            <img src="./img/tela de inicio-img/anuncios/anuncio4.png">
            <img src="./img/tela de inicio-img/anuncios/anuncio5.png">						
        </div>
        <br>
        <hr>
        <div class="info_site">
            <h1>
                ESPECIALIDADES
            </h1>
            <br>
            <a href="especialidades/pag_cardio.php"><img src="/img/tela de inicio-img/btn_personalizados/cardiologia.png" alt="button_cardio"></a>
            <a href="especialidades/pag_clinica.php"><img src="/img/tela de inicio-img/btn_personalizados/clinicageral.png" alt="button_clinicageral"></a>
            <a href="especialidades/pag_geria.php"><img src="/img/tela de inicio-img/btn_personalizados/geriatria.png" alt="button_geriatria"></a>
            <a href="especialidades/pag_gine.php"><img src="/img/tela de inicio-img/btn_personalizados/ginecologista.png" alt="button_gine"></a>
        </div>
        <br><br><br><br>
        <div class="info_site">
            <a href="especialidades/pag_obstre.php"><img src="/img/tela de inicio-img/btn_personalizados/OBS.png" alt="button_OBS"></a>
            <a href="especialidades/pag_ofto.php"><img src="/img/tela de inicio-img/btn_personalizados/oftomologia.png" alt="button_ofto"></a>
            <a href="especialidades/pag_orto.php"><img src="/img/tela de inicio-img/btn_personalizados/orto.png" alt="button_orto"></a>
            <a href="especialidades/pag_pedia.php"><img src="/img/tela de inicio-img/btn_personalizados/pediatria.png" alt="button_pediatria"></a>
        </div>
            <br><br><br><br>
        <div class="info_site">
            <a href="especialidades/pag_Psic.php"><img src="/img/tela de inicio-img/btn_personalizados/psicologia.png" alt="button_psicologia"></a>
            <a href="especialidades/pag_psiq.php"><img src="/img/tela de inicio-img/btn_personalizados/psiquiatria.png" alt="button_psiquitria"></a>
            <a href="especialidades/pag_urolo.php"><img src="/img/tela de inicio-img/btn_personalizados/urologia.png" alt="button_urologia"></a>
        </div>
    </div>
        <div class="rodape" onclick="closesidebar()">
            <p>AGENDAMENTO ASSISTENCIAL DE SAÚDE HOSPITALAR | AASH.</p>
            <p>CNPJ: 46.266.771/0001-26 - Inscrição Estadual: 145.145.151.111</p>
            <p>Endereço: Av. de Santa Cruz, 9591 - Santíssimo, Rio de Janeiro - RJ, 23010-175</p>
        </div>
</body>
</html>