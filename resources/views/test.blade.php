<!doctype html>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <title>jQuery UI Autocomplete functionality</title>
      
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- Javascript -->
      <script>
         $(function() {
            var availableTutorials  =  [
               "ActionScript",
               "Bootstrap",
               "C",
               "C++",
            ];
            $( "#automplete-1" ).autocomplete({
               source: availableTutorials
            });
         });
      </script>
   </head>
   
   <body>
      <!-- HTML --> 
      <div class = "ui-widget">
         <p>Type "a" or "s"</p>
         <label for = "automplete-1">Tags: </label>
         <input id = "automplete-1">
      </div>
   </body>
</html>
