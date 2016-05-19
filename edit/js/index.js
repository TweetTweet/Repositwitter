function post() {
    var div = document.createElement('div');


    div.innerHTML = '<li> <div class="direction-r"> <div class="flag-wrapper"> <span class="flag">Harvard University</span>\ <span class="time-wrapper"> <span class="time">2008 - 2011</span></span>\ </div>\ <div class="desc">tryhard</div>\ </div>\ </li>';

     document.getElementById('timeline').appendChild(div);
}

$(function(){
   $('button').click( function() {
      if($('#userCmnt').val().length == ''){
       alert('Please Enter Your Comment');
       return true;
      }
      var userCmnt = $('#userCmnt').val();

      else{      
    

  };
  });

