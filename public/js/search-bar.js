$('#tr-none').hide();

$(document).ready(function(){  
    $('#search').keyup(function(){  
         search_table($(this).val());  
    });  
    function search_table(value){  
         $('#notif-search tr.file').each(function(){  
              var found = 'false';  
              $(this).each(function(){  
                   if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                   {  
                        found = 'true';  
                   }  
              });  
              if(found == 'true')  
              {  
                   $(this).show(); 
               //     $('#tr-none').hide();
                //    $('#notif-head').show();

                   
              }  
              else  
              {  
                   $(this).hide(); 
               //     $('#tr-none').show();
                //    $('#notif-head').hide();
              }  
         });  
    }  
});