<?php 

    function vista_limpia($vista, $parametros=[]){
     $values = json_decode(json_encode($parametros)); 
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <base href="" >
        <meta charset="utf-8">
        <meta name="author" content="Softnio">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
        <!-- Fav Icon  -->
        <link rel="shortcut icon" href="vista/assets/images/caucho.png">
        <!-- Page Title  -->
        <title>Invercauchos</title>
        
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="vista/assets/css/dashlite.css?ver=2.8.0">
        <link id="skin-default" rel="stylesheet" href="vista/assets/css/theme.css?ver=2.8.0">
        
    </head>
    <body class="nk-body bg-white npc-default has-aside ">
            <!-- main @s -->
            <div class="nk-main ">
                <!-- wrap @s -->
                <div class="nk-wrap ">
                    <!-- main header @e -->
                    <!-- content @s -->
                    <div class="nk-content ">
                        <div class="container wide-xl">
                            <div class="nk-content-inner">
                                <div class="nk-content-body">
                                    <?php require 'vista/'.$vista.".php"?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content @e -->
                </div>
                <!-- wrap @e -->
            <!-- main @e -->
        </div>
        <!-- app-root @e -->
        <!-- JavaScript -->
        <script src="vista/assets/js/bundle.js?ver=2.8.0"></script>
        <script src="vista/assets/js/scripts.js?ver=2.8.0"></script>
    
    </body>
    </html>
<?php }?>

