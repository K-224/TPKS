<?PHP 
 
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
       $toreturn="";
       $item=$this->get_item($i);
       $instruction=$item->instruction;
       
       foreach ( $instruction->row as $row)
       {
             
             if($row->intend) 
             {
                $toreturn .= "  ";
             }
             if($row->text) 
             {
                $toreturn .= $row->text;
                $toreturn .= "</br>";
             }
       }
       return  $toreturn;
    }
    private $xml;
}
 


if (isset($_POST['step_item'])) 
{
   $docname='ARIZ.xml';
   $dmanager=new Data_manager($docname);
   $count=$_POST['step_item'];

   echo "&#1064;&#1072;&#1075; ".$count.". ".$dmanager->get_item_title($count)."</br>".$dmanager->get_item_content($count);
}
?>