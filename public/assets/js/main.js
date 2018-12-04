  // (function(c) {
  //   c('scripted loading')
  //   window.onload = function(){setTimeout(function(){
  //     c(c().replace('loading',''))
  //   },30)}
  // }(function(c){
  //   var h = document.lastChild
  //   return c ? h.className = c : h.className
  // }))


  $(document).ready(function() {
        
                
	/*Menu-toggle*/
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });

    /*Scroll Spy*/
    $('body').scrollspy({ target: '#spy', offset:80});

    /*Smooth link animation*/
    // $('a[href*=#]:not([href=#])').click(function() {
    //     if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

    //         var target = $(this.hash);
    //         target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    //         if (target.length) {
    //             $('html,body').animate({
    //                 scrollTop: target.offset().top
    //             }, 1000);
    //             return false;
    //         }
    //     }
    // });

});


   // add a class of 'loading' to the HTML, then remove it once the page has finished loading


  // add a class of 'loading' to the HTML, then remove it once the page has finished loading
  
