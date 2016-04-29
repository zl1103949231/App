<?php
namespace Uploader\Controller;
use Think\Controller;
use Think\Exception;
use Uploader\Library\Util\UUIDUtil;


class ImgController extends Controller {
    public function upload(){

       $name=$_FILES['file']['name'];
        $fileName=$_FILES['file']['tmp_name'];
        $strs=  explode(".",$name);
        $type=".".$strs[count($strs)-1];


        try{
            $time=time();
            $year=date('Y',$time);
            $month=date('m',$time);
            $day=date('d',$time);
           // echo C("IMG_PATH");
            if(!file_exists(C("IMG_PATH")))
                mkdir(C("IMG_PATH"));
            if(!file_exists(C("IMG_PATH")."/$year"))
                mkdir((C("IMG_PATH")."/$year"));
            if(!file_exists(C("IMG_PATH")."/$year"."/$month"))
                mkdir(C("IMG_PATH")."/$year"."/$month");
            if(!file_exists(C("IMG_PATH")."/$year"."/$month"."/$day"))
                mkdir(C("IMG_PATH")."/$year"."/$month"."/$day");
            $uuid=new UUIDUtil();
            $id=$uuid->create_uuid();
            //echo $id;
            $path=C("IMG_PATH")."/$year"."/$month"."/$day"."/$id".$type;
            move_uploaded_file($fileName,$path);

        }catch(Exception $e){

        }

     }
    public function listView(){
        $value = session('user');
        if(!empty($value)){

            $this->assign("session",$value);
        }else{
            redirect('/Home/Index/login', 3, '登录超时，页面跳转中...');
        }
    $this->display();
    }
    public function getImg(){
       $id= $_GET['path'];
        $path=C('IMG_PATH').$id;
       $image = file_get_contents($path);  //

        header('Content-type: image/jpg');
        echo $image;

    }
    public function deleteImg(){

        $id= $_POST['path'];
        $path=C('IMG_PATH').$id;
      if(unlink($path)){
          echo  json_encode(array("status"=>'200'));
      } else{
          echo  json_encode(array("status"=>'404'));
      } ;


}
    public  function listImgs(){
       $path= $_POST['path'];
       // $path= $_GET['path'];
        $dir=C('IMG_PATH').$path;
       // echo $dir;
        $imgs=array();
        if(file_exists($dir)&&is_dir($dir)){
            $dh=opendir($dir);
            while(($filename=readdir($dh))!==false){

                if(is_file($dir."/$filename")){
                  //  echo $filename;
                    $id=$path."/$filename";
                    $url=C('IMG_SERVER_HOST')."/App/index.php/Uploader/Img/getImg?path=".$id;
                    $imgs[filemtime($dir."/$filename")]=array("url"=>$url,"path"=>$id);
                }
            }
            closedir($dh);
            rsort($imgs);
            echo json_encode($imgs);
        }


       // echo ;
    }
    public  function createTree(){
        $dir=C("IMG_PATH");
          $baseArray=array();
         $this->getDir($dir,$baseArray,true,$dir);
       echo json_encode($baseArray);

    }
    private  function getDir($parent,&$arr,$first,$path){
       // echo  "搜索：".$path."<br>";

        if(is_dir($path)){
           // echo  "是目录".$path."<br>";
            $dh=opendir($path);
          while(($file_name=readdir($dh))!==false){
              //echo  "找到".$file_name."<br>";
              if(is_file($path."/$file_name")){
                continue;
              }else if(is_dir($path."/$file_name")&& !ereg("\.{1,2}",$file_name)){
                  //echo  "是目录".$path."/$file_name"."<br>";
                  if($first){
                     $subpath= str_replace(C('IMG_PATH')."/",'/',$path."/$file_name");

                      array_push($arr,array('id'=>"$subpath",'parent'=> "#",'text'=>"$file_name")) ;

                      $this->getDir($subpath,$arr,false,$path."/$file_name");

                  }else{
                    $subpath= str_replace(C('IMG_PATH')."/",'/',$path."/$file_name");

                      array_push($arr,array('id'=>"$subpath",'parent'=> "$parent",'text'=>"$file_name")) ;

                      $this->getDir($subpath,$arr,false,$path."/$file_name");

                  }
              }
          }





        }

    }

}
