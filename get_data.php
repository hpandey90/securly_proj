<?php
include 'db_conn.php'; 
$arg = $_GET['arg'];
$q = $_GET['q'];
$flag = 0;
if($arg==1){
    $query = "select * from students where kidEmail='".$q."'";
    $result = $conn->query($query);
    if($result->num_rows > 0){
        $school="";
        $club="";
        while($row = $result->fetch_assoc()){
            $school=$row['school'];
            $club.= $row['club'].",";
        }
        $club = rtrim($club,",");
        echo "$school involved in $club<br/>";
    }else{
        echo "No records found for $q";   
    }    
}else if($arg==2){
    $query = "select * from students where club='".$q."'";
    $result = $conn->query($query);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "School: ".$row['school']." & Kid Name: ".$row['kid']."<br/>";
        }
    }else{
        echo "No records found $q";   
    }    
}else if($arg==3){
    $kid1 = $q;
    $kid2 = $_GET['kid'];
    $query = "SELECT kid,GROUP_CONCAT(club) as tree FROM students GROUP by kid";
    $result = $conn->query($query);
    if($result->num_rows > 0){
        $tree = array();
        while($row = $result->fetch_assoc()){
            $s = preg_split('/,/',$row['tree']);
            for($i=0;$i<count($s);$i++){
                if(isset($tree[$s[$i]])){
                    $temp = $tree[$s[$i]];
                    $tree[$s[$i]] = array_unique(array_merge($temp,array_splice($s,0,$i),array_splice($s,$i+1,count($s))));        
                }else{
                    $tree[$s[$i]] = array_unique(array_merge(array_splice($s,0,$i),array_splice($s,$i+1,count($s))));         
                }
                $s = preg_split('/,/',$row['tree']);
            }
        }
        $query = "SELECT club,kidEmail FROM students where kidEmail='".$kid1."' or kidEmail='".$kid2."'";
        $result = $conn->query($query);
        $kid1_club=array();
        $kid2_club=array();
        $i=0;$j=0;
        while($row = $result->fetch_assoc()){
            if($row['kidEmail']==$kid1)
                $kid1_club[$i++] = $row['club'];
            else
                $kid2_club[$j++] = $row['club'];
        }
        if(count($kid1_club) > 0 && count($kid2_club) > 0){
            foreach ($kid1_club as $kclub1){
                foreach($kid2_club as $kclub2){
                        dfs($tree,$kclub1,$kclub2,"",[]);
                        if($flag==1)
                            break;
                }
                if($flag==1)
                            break;
            }
        }
        if($flag==1)
            echo "True: there exist a connection between $kid1 and $kid2";
        else 
            echo "False: there doesn't exist connection between $kid1 and $kid2";
    }else{
        echo "No connection exists between $kid1 and $kid2";   
    }
}else{
    echo "Invalid request";   
}
function dfs($tree, $node, $target,$parent,$visited){
    global $flag;
    if($node==$target && $flag==0){
        $flag=1;
        return;
    }
    if($flag==1)
        return;
    if(isset($tree[$node])){
        $list = $tree[$node];
        foreach($list as $club){
            if($parent!=$club){
                if(!isset($visited[$club])){
                    $visited[$club]=1;
                    dfs($tree,$club,$target,$node,$visited);
                }
            }
        }
    }
}
?>