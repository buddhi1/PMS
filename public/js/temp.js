	/*Menu-toggle*/
  $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });

  $(document).ready(function(){
    $("button").click(function(){
        $("#div1").load("example.html");
    });
});