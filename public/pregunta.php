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

        <!--Aqui cominza la pagina-->
        <div class="container">
            <!--panel principal-->
            <div class="card-panel">
                <!--titulo-->
                <h4>Preguntas frecuentes</h4>
                <!--comienza el collapsible-->
                <ul class="collapsible popout" data-collapsible="accordion">
                  <!--1-->
                  <li>
                    <div class="active collapsible-header">¿Se debe inmigrar?</div>
                    <div class="collapsible-body">
                        
                           <p>Lo ideal seria que no se viaje de forma ilegal a otros paises ya que son muchas las consecuencias que se tendra que enfrentar</p>
                        
                    </div>
                  </li>

                  <!--2-->
                  <li>
                    <div class="collapsible-header">¿Qué hago si no puedo inmigrar?</div>
                    <div class="collapsible-body">
                    <p>Busca la ayuda ideal en tu pais, ya que existen muchas organizaciones que te ayudan a establecerte economicamente bien, mediante programas de aprendizajes de oficios. Ademas que los gobernantes de tu pais se deben preocupar por tu bienestar.</p>
                    </div>
                  </li>

                  <!--3-->
                  <li>
                    <div class="collapsible-header">¿Qué hago si tengo amenazas en mi pais?</div>
                    <div class="collapsible-body"><p>Busca inmediatamente ayuda de las autoridades, ellos deben de darte alguna solucion. Ademas que la acciones que hagan ellos serviran de evidencia si realmente no puedes estar en el pais, para pedir ascilo en otro pais. Pero tampoco vayas armar un show para buscar el ascilo, ya que este esta en peligro de ser quitado; porque muchas personas lo solicitan y muchos de esos casos son falsos y pueden perder ayuda personas que realmente lo necesitan.</p></div>
                  </li>

                  <!--4-->
                  <li>
                    <div class="collapsible-header">¿Que debo hacer si estoy siendo explotado en el trabajo en otro pais y soy inmigrante ilegal?</div>
                    <div class="collapsible-body"><p>Informa inmediatamente a las autoridades locales, trata de conseguir evidencias que reflejen lo que testifiques. Ya que esto te puede ayudar en tu estado migratorio, ademas ten en cuenta que no te van a deportar en ningun momento si denuncias cualquier tipo de abuso</p></div>
                  </li>
                </ul>
                
            </div>
        </div>
      

      
      <!--Aqui se muestra el pie de pagina-->
      <?php
      include("inc/footer.php");
      ?>
        

  </body>
</html>