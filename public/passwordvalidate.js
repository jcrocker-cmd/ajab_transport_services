
    
//     var up = document.getElementById('upper') .style.display='none';
var num = document.getElementById('num') .style.display='none';
var numlet = document.getElementById('numlet') .style.display='none';
var con9 = document.getElementById('con9') .style.display='none';


function valid()
 {

 var user = document.getElementById('user')
 var up = document.getElementById('upper')
 var num = document.getElementById('num')
 var numlet = document.getElementById('numlet')
 var con9 = document.getElementById('con9')

//    if (user.value.match(/[A-Z]/))
//    {
//         up.style.display ='none'
//    }
//    else
//    {
//         up.style.display ='block'
//    }
if (user.value.match(/[0-9]/))
{
    num.style.display ='none'
}
else
{
    num.style.display ='block'
}

if (user.value.match(/[A-Z]{3}[0-9]{6}/))
{
    numlet.style.display ='none'
}
else
{
    numlet.style.display ='block'
}

if (user.value.length == 9)
{
    con9.style.display ='none'
}
else
{
    con9.style.display ='block'
}
 
if (user.value == "") {

      // up.style.display ='none'
      num.style.display ='none'
      numlet.style.display ='none'
      con9.style.display ='none'
      
}



 if (user.value.match(/[A-Z]{3}[0-9]{6}/))  
 {    
      user.style.color ='green'
 }
 else
 {
      user.style.color ='red'
 }




user.value = user.value.toUpperCase();
}
