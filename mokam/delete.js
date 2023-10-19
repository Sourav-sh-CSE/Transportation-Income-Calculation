$.ajax({
    type:'POST',
    url:'delete.php',
    data:{del_id:del_id},
    success: function(data){
         if(data=="YES"){
             $ele.fadeOut().remove();
         }else{
             alert("can't delete the row")
         }
    }

     })