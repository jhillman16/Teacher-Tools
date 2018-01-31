<?php
if($_FILES[ 'file'][ 'name' ] != ""){
       copy ( $_FILES[ 'file'][ 'name' ], "C:\Users\Tatiana\Desktop".$_FILES[ 'file'][ 'name' ]);
or 
       die( "Could not copy file!");
    echo $_FILES[ 'file'][ 'name' ];
}else{ 


echo "Sent File".$_FILES[ 'file' ][ 'name']."<BR />";
echo "Size File".$_FILES[ 'file' ][ 'size']."<BR />";
echo "Type File".$_FILES[ 'file' ][ 'type']."<BR />";
}
?>