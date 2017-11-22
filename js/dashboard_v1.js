        function do_something(obj,arg,q1,q2){
            if(arg==1){
                document.getElementById('email').value=q1;
            }else if(arg==2){
                document.getElementById('club').value=q1;
            }else if(arg==3){
                document.getElementById('kid1').value=q1;
                document.getElementById('kid2').value=q2;
            }
        }
        function generate_history(arg,q1,q2){
            q_arr = [q1,q2];
            if(arg==1){
                document.getElementById('list_history').innerHTML+='<li onclick="do_something(this,1,\''+q1+'\')">Searched email '+q1+'</li>';
            }
            else if(arg==2){
                document.getElementById('list_history').innerHTML+='<li onclick="do_something(this,2,\''+q1+'\')">Searched club '+q1+'</li>';
            }
            else if(arg==3){
                document.getElementById('list_history').innerHTML+='<li onclick="do_something(this,3,\''+q1+'\',\''+q2+'\')">Searched connection between '+q1+', '+q2+'</li>';
            }
        }
        function get_data(arg){
            if(arg==1){
                q=document.getElementById('email').value;
                generate_history(1,q,'');
            }
            else if(arg==2){
                q=document.getElementById('club').value;
                generate_history(2,q,'');
            }else if(arg==3){
                q=document.getElementById('kid1').value+'&kid='+document.getElementById('kid2').value;
                generate_history(3,document.getElementById('kid1').value,document.getElementById('kid2').value);
            }else{
                
            }
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("loader").style.display = 'none';
                document.getElementById("response").innerHTML = this.responseText;
            }else{
                document.getElementById("loader").style.display = 'block';
            }
          };
          xhttp.open("GET", "get_data.php?arg="+arg+"&q="+q);
          xhttp.send();
        }
        function check_form(arg){
            if(arg==1){
                if(document.getElementById('email').value==""){
                    document.getElementById('err_1').innerHTML="Please enter an email address";
                    document.getElementById('err_2').innerHTML="";
                    document.getElementById('err_3').innerHTML="";
                    return false;
                }
                document.getElementById('err_1').innerHTML="";
                get_data(1);
            }else if(arg==2){
                if(document.getElementById('club').value==""){
                    document.getElementById('err_1').innerHTML="";
                    document.getElementById('err_2').innerHTML="Please enter a club";
                    document.getElementById('err_3').innerHTML="";
                    return false;
                }
                document.getElementById('err_2').innerHTML="";
                get_data(2); 
            }else{
                if(document.getElementById('kid1').value=="" || document.getElementById('kid2').value==""){
                    document.getElementById('err_1').innerHTML="";
                    document.getElementById('err_2').innerHTML="";
                    document.getElementById('err_3').innerHTML="Please enter email of both the kids";
                    return false;
                }
                document.getElementById('err_3').innerHTML="";
                get_data(3); 
            }
        }