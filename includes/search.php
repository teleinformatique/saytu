<?php 
-/*
-*@author : Mouhamadou SEYE
-*@description : Le moteur de recherche
-*/
-// database settings 
$Host = 'localhost'; 
$User = 'root'; 
$Pass = ''; 
$Base = 'saytu'; 

-// mysql table : 
$Table = 'objet'; 
// field used for search 
$champ = 'details'; 
-// number of chars to display 
$NB_carac = 100; 
?> 
<html>
    <head>
        <style>
    .cherche{
        margin-top: 50px;
        margin-left:  500px;
    }
        </style>
    </head>
    <body>
        <form method="post" action="search.php" class="cherche"> 
        <input type="search" name="Psearch" size="50"> 
        <input type="submit" value="Search"> 
        </form> 
        <br /> 
    </body>
</html>



<?php 
if(isset($_POST['Psearch']) && !empty($_POST['Psearch'])) { 

   mysql_connect($Host, $User, $Pass);
   mysql_select_db($Base); 

    $search = trim($_POST['Psearch']); 
    $T = explode(' ', $search); 
    $count = count($T); 

    // build sql request 
    if($count > 1) { 
      $s = " details LIKE '%$search%'
      OR nomTitulaire LIKE '%$search%'
      OR prenomTitulaire LIKE '%$search%'
      OR nomMereTitulaire LIKE '%$search%'
      OR prenomMereTitulaire LIKE '%$search%'
      OR libelle LIKE '%$search%'"; 
      for($i=0; $i<$count; $i++) { 
          if(empty($T[$i])) continue; 
        $s .= " OR details LIKE '%$T[$i]%'
        OR nomTitulaire LIKE '%$T[$i]%'
        OR prenomTitulaire LIKE '%$T[$i]%'
        OR nomMereTitulaire LIKE '%$T[$i]%'
        OR prenomMereTitulaire LIKE '%$T[$i]%'
        OR libelle LIKE '%$T[$i]%'"; 
        $Ns[] = $T[$i]; 
        } 
      } 
    else { 
      $s = " details LIKE '%$search%' 
      OR nomTitulaire LIKE '%$search%'
      OR prenomTitulaire LIKE '%$search%'
      OR nomMereTitulaire LIKE '%$search%'
      OR prenomMereTitulaire LIKE '%$search%'
      OR libelle LIKE '%$search%' "; 
      $Ns[] = $search; 
      } 
    $Requete = "SELECT details from $Table WHERE $s"; 
    $Env = mysql_query($Requete) or die (mysql_error()); 

    if(mysql_num_rows($Env) == 0) $Error = 'No results';
        else $Error = FALSE; 
    echo $Error; 

    echo '<table border="1">'; 
    $i = 1; 
    while ($O = mysql_fetch_object($Env)) { 
      echo '<tr><td>'; 
      echo "<u>Results $i</u> <br /><br />"; 

      $count = count($Ns); 
      if($count > 1) { 
        for($x=0; $x<$count; $x++) { 
          if(empty($Ns[$x])) continue; 
          if(strpos(strtolower($O->$champ),strtolower($Ns[$x]))==TRUE) { 
            $search1 = $T[$x]; 
            continue; 
            } 
          } 
        } 

        else $search1 = $Ns[0]; 
        $pos = strpos(strtolower($O->$champ) , strtolower($search1)); 
        $O->$champ = substr($O->$champ, $pos, $NB_carac); 
        $last_space = strrpos($O->$champ, ' '); 
        $O->$champ = substr($O->$champ, 0, $last_space).' ...'; 
        $O->$champ = htmlspecialchars($O->$champ); 
        $O->$champ = nl2br($O->$champ); 
        $txt = preg_replace('`('.join('|', $Ns).')`i', 
                            '<b>$1</b>', 
                            $O->$champ); 
        $i++; 
        echo $txt; 

        echo '</td></tr>'; 
        } 
  mysql_close();
    echo '</table><br />'; 
    } 
  
?>