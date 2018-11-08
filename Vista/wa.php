<?php
$comidas = array();

array_push($comidas,["a","b"],[1,2],["c","d"]);

foreach ($comidas as $key => $value){
    echo "valor :".$comidas[$key]."<br>";
}

?>

<script>
   
//   var array = [];
//   
//   array = [[1,2],[3,4]];
//   
//   for(var i=0; i<array.length;i++){
//      for(var j=0; j<array.length; j++){
//          alert("Los datos son:"+array[i][j]);
//      }
//   }


   var array = [];
   
   array.push([5,6]);
   array.push([7,8]);
   array.push([9,10]);
   array.push([11,12]);
   
//   var a = 2;
//   
//   for(var i=0; i<array.length;i++){
//      for(var j=0; j<array.length; j++){
//          if(array[i][j] == a)
//      }
//   }
   
    for(var i=0; i<array.length;i++){
         for(var j=0; j<array.length; j++){
             alert("Los datos son:"+array[i][j]);
         }
    }
   
</script>