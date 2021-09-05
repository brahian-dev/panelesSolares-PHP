  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">


      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
	<a class='dropdown-button btn' href='#' data-activates='dropdown1'>Drop Me!</a>

      <!-- Dropdown Structure -->
      <ul id='dropdown1' class='dropdown-content'>
        <li><a href="http://materializecss.com/dropdown.html">one</a></li>
        <li><a href="http://materializecss.com/dropdown.html">two</a></li>
        <li class="divider"></li>
        <li><a href="http://materializecss.com/dropdown.html">three</a></li>
      </ul>

   
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	     <script type="text/javascript" >
        $(document).ready(function() {
          $('.dropdown-button').dropdown({hover: true});    
        });
      </script>
    </body>
  </html>