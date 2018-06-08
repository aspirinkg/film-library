</div>
 <!-- build:jsLibs js/libs.js -->
 <script src="libs/jquery/jquery.min.js"></script><!-- endbuild -->
<!-- build:jsVendor js/vendor.js -->
    <script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script><!-- endbuild -->
<!-- build:jsMain js/main.js -->
    <script src="js/main.js"></script><!-- endbuild -->
    <script defer="defer" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script type="text/javascript">

    

      	$('.buttonJS').on('click' , function(e){
          e.preventDefault();
          
          function showEr(text){
           $('.error').text(text);
           $('.error').fadeIn();
          }

          if($('input[name=title]').val() == ''){
           showEr('Название фильма не может быть пустым.');
          }
          else if($('input[name=genre]').val() == ''){
           showEr('Жанр фильма не может быть пустым.');
          }
          else if($('input[name=year]').val() == ''){
           showEr('Год фильма не может быть пустым.');
          }
          else{
           $('.error').fadeOut(1000,function(){       
             $('form').submit();
           });
          }
});

    </script>
  </body>
</html>