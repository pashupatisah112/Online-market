$(window).on('load', function() {
    setTimeout(function(){
      $('#subscribeModal').modal('show');
  }, 1000);
  setTimeout(function(){
      $('.subscribeModal-lg').modal('show');
  }, 10000);
});
$('#Reloadpage').click(function() {
   location.reload();
}); 