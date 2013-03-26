<script> 

var tmpStepNum = 0;

function wechsel(num) 
{ 


 document.getElementById('step_item'+num).style.backgroundColor='#ADFF2F';
 document.getElementById('comment').value=''
 tmpStepNum = num
$.ajax({
    url: 'ajax.php',
    type: 'POST',
    data: {step_item: num} ,
    success: function (data) {
        document.getElementById("step_description_window").innerHTML=data
    ;
    }              
});
 
} 

function further() 
{
   tmpStepNum +=1
   wechsel(tmpStepNum)   
}
</script>

<?php 
 
class Data_manager
{
    function __construct($source)
    {
       $this->xml = simplexml_load_file($source);

    }


    function get_item($i)
    {
       $x=$this->xml;
       $counter=1;
       foreach ($x->step as $step)
       {
          foreach ($step->item as $item)
          {
             if($i==$counter) 
             {
                return $item;
             }
             else
             {
                ++$counter;
             }
             
          }
       }
       echo "fail";
    }
    
    function get_item_title($i)
    {
       $item=$this->get_item($i);
       return $item['title'];
    }
    function get_item_content($i)
    {
       $item=$this->get_item($i);
       return $item['title'];
    }
    private $xml;
}

$docname='ARIZ.xml';
$dmanager=new Data_manager($docname);

?>
<!DOCTYPE HTML>
<html>
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
     <title>&#1058;&#1077;&#1075; DIV</title>
     <style type="text/css">
        .substrate
        { 
           width: 900px;
           height: 700px;
           background: lightgrey;
           padding: 5px;
           border: solid 1px black; 
           position: relative; 
           top: 5px; 
           font: 22pt sans-serif;
           margin:0 auto
        }
        .name
        {
           padding: 5px;
           position: relative;
           font: 25pt sans-serif;
           
        }
        .top_button_panel
        {
           padding: 5px;
           position: relative;
           font: 25pt sans-serif;
          

        }
        .top_button
        {
           padding: 5px;
           width: 290px;
           position: relative;
           font: 15pt sans-serif;
           text-align: center;
           border-radius: 5px;
           color: white;  

        }
        .red
        {
           background: IndianRed;
        }
        .blue
        {
           background: SteelBlue;
        }
        .green
        {
           background: LimeGreen;
        }
        .gray
        {
           background: Gray;
        }
        .main_part
        {
           
           height: 590px;
        }
        .steps
        {
           
           height: 570px;
           width: 150px;
           position: relative; 
           top: 10px;
           left: 10px;
           background: white;
           font: 10pt sans-serif;
           float:left;
           overflow-y:scroll;
        }
        .description
        {
            
            position: relative;
            float:right;
            height: 150px;
            width: 720px;
            right: 5px;
            top: 7px;
            font: 10pt sans-serif;
            margin-top: 3px;
            background: white;
            overflow-y:scroll;
        }
        .middle_button_panel
        {
           
           
           font: 15pt sans-serif;
           background: lightgrey;
           height: 30px;
           
        }
        .middle_button
        {
           padding: 2px;
           width: 175px;
           position: relative;
           font: 15pt sans-serif;
           text-align: center;
           border-radius: 5px;
           color: white;
           
        }
        .draw_place
        {
           margin-top: 15px;
           height: 180px;
        }
        .draw_button_panel
        {
           width: 358px;
        }
        .step_item
        {
            background-color: #ffffff; 
            border: solid 1px lightgrey;
            
        }
        .textarea
        {
	    resize:none;
            height: 150px;
            width: 720px;            
	}
    </style> 
   </head>
   <body>
      <div class="substrate">
         <div class="name">&#1052;&#1086;&#1076;&#1091;&#1083;&#1100; &#1055;&#1040;&#1056;&#1048;&#1047;</div>
         <div class="top_button_panel">
            <button class="top_button red">&#1048;&#1085;&#1092;&#1086;&#1088;&#1084;&#1072;&#1094;&#1080;&#1086;&#1085;&#1085;&#1099;&#1081; &#1092;&#1086;&#1085;&#1076;</button>
            <button class="top_button blue">&#1054;&#1090;&#1095;&#1077;&#1090;</button> 
            <button class="top_button green">&#1047;&#1072;&#1074;&#1077;&#1088;&#1096;&#1080;&#1090;&#1100;</button>
         </div>
         <div class="main_part">
            <div class="steps">
              <?php 
                 for($count=1; $count<= 40; ++$count) 
                    echo '<div id = "step_item'.$count.'" class="step_item" onclick="javascript: wechsel('.$count.')">'.$count.". ".$dmanager->get_item_title($count)."</div>";
              ?>
            </div>
            <div class="description" id="step_description_window">
            &#1054;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1077; &#1096;&#1072;&#1075;&#1072;
            </div>
            <div class="description">
            <textarea class="textarea" id='comment' name='comment' cols="40" rows="13"></textarea>
            </div>
            <div class="description middle_button_panel">
               <button class="middle_button gray" onclick="javascript: further()">&#1044;&#1072;&#1083;&#1077;&#1077;</button>
               <button class="middle_button blue">&#1055;&#1088;&#1086;&#1087;&#1091;&#1089;&#1090;&#1080;&#1090;&#1100;</button> 
               <button class="middle_button green">&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1092;&#1072;&#1081;&#1083;</button>
               <button class="middle_button red">&#1059;&#1076;&#1072;&#1083;&#1080;&#1090;&#1100; &#1092;&#1072;&#1081;&#1083;</button>
            </div>
            <div class="description draw_place">
            &#1052;&#1077;&#1089;&#1090;&#1086; &#1076;&#1083;&#1103; &#1088;&#1080;&#1089;&#1086;&#1074;&#1072;&#1083;&#1082;&#1080;.
            </div>
            <div class="description middle_button_panel draw_button_panel">
               <button class="middle_button green">&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100;</button>
               <button class="middle_button blue">&#1057;&#1086;&#1093;&#1088;&#1072;&#1085;&#1080;&#1090;&#1100;</button> 
            </div>
            
            
         </div>
      </div> 

   </body>
</html>




