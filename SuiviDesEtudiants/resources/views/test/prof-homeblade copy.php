<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background: url('{{ asset('img/login-back.jpg') }}') no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand navbar-light fixed-top bg-light m-2 rounded">
    <div class="container-fluid">
        <a class="navbar-brand display-1" href="">Gestion des notes</a>
        <form class="d-flex">
            <button class="btn btn-primary" type="submit">Deconnexion</button>
        </form>
        </div>
    </div>
    </nav>

    <body>
        
    
        <main class="d-flex flex-nowrap">

        <div class="d-flex flex-column align-items-center text-align-center flex-shrink-0 rounded m-3 shadow" style="background-image: url(../assets/img/back3.jpg);background-size: cover;width:240px;background-color: rgba(255, 255, 255, 1);">
    
            <div class="btn d-flex gap-3 align-items-center flex-shrink-0 p-3 link-body-light bg-light text-decoration-none shadow mt-2 mb-2 rounded">
                <a href="menu.php" class=" d-flex align-items-center text-dark text-decoration-none">
                    <img src="../assets/img/add.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>Nouveau demande</strong>
                </a>
            </div>


        <div style="height:1400px;width:220px;scrollbar-width: thin;scrollbar-color: rgb(245, 0, 0) rgb(255, 0, 0),z-index: 0;" class="list-group list-group-flush scrollarea">
        <div class="container">
        <form class="d-grid gap-2" action="menu-conversation.php" method="POST">
        
        <?php
        /*
        $query = "SELECT * FROM conversation where id_user =".$id_user."";
        $resultat = mysqli_query($GLOBALS['conn'], $query);
        $i=1;
        while ($value = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) {
        if($id_conversation==$i){
            echo '<button type="submit" name="id" value="'.$i.'" class="btn text-light shadow bg-primary">'.substr($value["question"], 0, 14).'...</button>';
            
        }
        else{
            echo '<button type="submit" name="id" value="'.$i.'" class="btn shadow bg-light">'.substr($value["question"], 0, 14).'...</button>';
        }
        $i++;
        }

        */
        ?>
        </form>
            </div>
            </div>

            <div class="btn dropdown d-flex gap-3 align-items-center flex-shrink-0 p-3 link-body-emphasis bg-light text-decoration-none shadow mt-2 mb-2 rounded">
            <a  class=" d-flex align-items-center text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../assets/img/116395.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong><h style="color:orange">Pseudo : </h></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark align-items-center text-small shadow">
                <li ><a  class="dropdown-item align-items-center text-center me-5" href="signout.php">Se deconnecter</a></li>
            </ul>
            </div>

            </div>



        <div class="d-flex flex-column align-items-stretch flex-shrink-0 mt-4" style="width:1080px;">

            

            
            <div style="height:1900px;overflow-y: scroll;overflow-y: scroll;bottom: 0;scrollbar-color: blue;scrollbar-thumb-color: blue;" id="scroll" class="list-group shadow bg-light rounded scrollarea mt-5 ms-5 me-5 p-3" >
            

            <?php
            /*

            $query = "SELECT * FROM conversation_reponse where id_conversation =".$id_conversation."";
            $resultat = mysqli_query($GLOBALS['conn'], $query);

            while ($value = mysqli_fetch_array($resultat, MYSQLI_ASSOC)) {
            echo'<div class="d-flex gap-2 bottom-0 end-0 m-3 bd-mode-toggle">
            <div style="" class="form-control bg-primary border-primary shadow text-light">
            '.$value["question"].'
        </div>
        <img src="../assets/img/116395.png" alt="Logo" width="50" height="50" srcset="">
        </div>

            <div class="d-flex gap-2 bottom-0 end-0 m-3 bd-mode-toggle ">
            <img src="../assets/img/401171.png" alt="Logo" width="50" height="50" style="">
            <div style="" class="form-control border-light text-dark shadow">
            '.$value["response"].'
            </div>
            </div>';
            }
            
            */
            
            ?>
            




            </div>
















        
            <div  class="d-flex gap-3 align-items-center flex-shrink-0 p-3  link-body-emphasis text-decoration-none">
            <form class="input-group ps-5 pe-5" action="reponse.php" method="POST">
            <div class="btn shadow ">
            <img src="../assets/img/micro.png" width="30" height="30" alt="" srcset="">
            </div>
            <?php /*echo'<input type="hidden" name="index" value="'.$id_conversation.'">' */?>
            <input type="text" name="message" class="form-control shadow border-none rounded" placeholder="Ecrire votre message ..." maxlength="100"  required>
            <button class="btn btn-outline shadow" type="submit">
            <img src="../assets/img/send1.png" width="30" height="30" alt="" srcset="">
        </button>
        </form>

            </div>
        </div>



        <script>
            const textBox = document.getElementById("scroll");
            textBox.scrollTo(0, textBox.scrollHeight);
        </script>


    </main>
    </body>
</body>
</html>
