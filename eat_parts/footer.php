<div class="margin-top"></div>



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p><span class="footer-span">Ndihme:</span></p>
                    <ul>
                        <li><a href="rreth_nesh.html">Kontaktoni</a></li>
                        <li><a href="rreth_nesh.html">Raportoni</a></li>
                    </ul> 
                </div>
                <div class="col-md-4">
                    <p><span class="footer-span">Rreth nesh:</span></p>
                    <ul>
                        <li><a href="rreth_nesh.html">Kush jemi ne?</a></li>
                    </ul> 
                </div>
                <div class="col-md-4">
                    <p><span class="footer-span">Na ndicni ne:</span></p>
                    <ul>
                        <li><a href="www.facebook.com">Facebook</a></li>
                        <li><a href="www.facebook.com">Twitter</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; FoodMania @ 2017</p>
                </div>
            </div>
        </div>
    </footer>










<script type="text/javascript" src="jquery-3.2.0.js"></script>
<script src="bootstrap/js/bootstrap.min.js" ></script>






<script type="text/javascript">
  $('[class^=photo-title2]').click(function(){
    var title = $(this).text();
    var description = $(this).parent().next().text();
    $('.modal-title').html(title);
    $('.modal-body').html(description);
    $('#myModal').show();
});
$('.close_btn').click(function(){
    $('#myModal').hide();
});

$('.btn').button(); //Sole line that requires jQueryUI lib  
</script>




</body>
</html>
