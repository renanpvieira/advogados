 function displayFormMsg(valid, div, msg) {

            if(valid){
                $(div).addClass('sucesso');
            }else{
                $(div).addClass('erro');
             }

            $(div).html('');
            $(div).append(msg);

            $(div).delay(1500).fadeOut(2000, function () {
                $(div).css('background-color', 'white');
                $(div).html('');
                $(div).fadeIn(1);
            });

      }
    
      function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
          return "";
      }
    