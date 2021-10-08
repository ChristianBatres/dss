  <!DOCTYPE html>
  <html lang="es">
      <head>
          <meta charset="utf-8"/>
          <!--Import Google Icon Font-->
          <link href="../css/icons.css" rel="stylesheet">
          <title>Inicio</title>
          <!--Import materialize.css-->
          <link type="text/css" rel="stylesheet" href="../css/icon.css"  media="screen,projection"/>
          <!--Let browser know website is optimized for mobile-->
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

          <!--  archivos css-->
          <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection"/>
          <link type="text/css" rel="stylesheet" href="css/mystyle-sheet.css" media="screen,projection"/>
      </head>
      <body>

        <!--Aqui se muestra el menu-->
        <?php
        include("inc/menu.php");
        ?>
    
        <!--Aqui comienza la pagina-->
        <div class="container">

            <!--primera fila-->
            <div class= "row">
                <div class="card-panel">
                    <h4 class="center-align">CAUSAS Y CONSECUENCIAS</h4>
                    <ul class="collapsible popout" data-collapsible="accordion">
                        <!--1-->
                        <li>
                            <div class="active collapsible-header">
                                ¿Cuáles son las causas de migrar?
                            </div>
                            <div class="collapsible-body">
                                <p>
                                    Durante la Jornada Mundial del Emigrante en 2003, Juan Pablo segundo también hace referencia a las causas y consecuencias de la emigración.  
                                </p>
                                <p>
                                    Dentro de las causas el Papa Juan Pablo II menciona que los  factores detonantes de la migración son los conflictos bélicos, la persecución política,
                                    los desastres naturales y la exclusión social que mantiene a la mayor parte de la población en situación económica precaria o de extrema pobreza, lo cual les obliga a buscar fuera de su país nuevas oportunidades económicas o a escapar de los riesgos que implica el permanecer en un territorio con altos índices de violencia, guerras o desastres naturales
                                </p>
                                <div class="carousel">
                                    <a class="carousel-item" href="#one!"><img src="img/migrantes/causa6.jpg"></a>
                                    <a class="carousel-item" href="#two!"><img src="img/migrantes/causa1.jpg"></a>
                                    <a class="carousel-item" href="#three!"><img src="img/migrantes/causa2.jpg"></a>
                                    <a class="carousel-item" href="#four!"><img src="img/migrantes/causa3.jpg"></a>
                                    <a class="carousel-item" href="#five!"><img src="img/migrantes/causa4.jpg"></a>
                                    <a class="carousel-item" href="#six!"><img src="img/migrantes/causa5.jpg"></a>
                                </div>
                            </div> 
                        </li>
            
                        <!--2-->
                        
                        <li>
                            <div class="collapsible-header">
                                ¿Que consecuencias existen de migrar?
                            </div>
                            <div class="collapsible-body">
                                <p>
                                    Una de las consecuencias más serias de esta migración, común a todas las zonas 
                                    en vías de desarrollo es la constante pérdida de capital humano, es decir de la población 
                                    altamente calificada. Esto amenaza la consolidación de una masa crítica de conocimiento, lo que delimita las posibilidades de las naciones de origen para contar con estos profesionales necesarios para aumentar la competitividad. En cambio el país de acogida recibe grandes contingentes de capital humano sin que su formación le haya significado ningún costo.
                                </p>
                                <p>
                                    Otras de las muchas consecuencias negativas de este proceso son la pérdida de poblaciones en edad productiva, la trata de personas, el tráfico de migrantes, la movilidad, constante discriminación racial, irrespeto de los derechos del inmigrante ilegal y la desintegración familiar.
                                </p>
                                <div class="carousel">
                                    <a class="carousel-item" href="#uno!"><img src="img/migrantes/conse1.jpg"></a>
                                    <a class="carousel-item" href="#dos!"><img src="img/migrantes/conse2.jpg"></a>
                                    <a class="carousel-item" href="#tres!"><img src="img/migrantes/conse3.jpg"></a>
                                    <a class="carousel-item" href="#cuatro!"><img src="img/migrantes/conse4.jpg"></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
             </div>
         </div>
            

        <!--Aqui se muestra el pie de pagina-->
        <?php
        include("inc/footer.php");
        ?>
          

    </body>
  </html>