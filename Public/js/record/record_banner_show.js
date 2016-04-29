/**
 * Created by zhu on 2016/3/9.
 */
$(document).ready(function(){
  var bannerDiv=$("#banner");
    bannerDiv.parent().css({"text-align": "center","background-color": "#1abc9c" })
    if (bannerDiv.length>0){
        var  canvas=bannerDiv[0];
        var height=canvas.height;
        var  width=canvas.width;
        var ctx=canvas.getContext('2d');
        ctx.fillStyle='#ffffff'
        //ctx.fillRect(0,0,width,height);
        ctx.font="bold 40px 宋体"
        ctx.fillText("云韵科技",50,(height)/2);
    }else {
        alert("No id =“banner” find");
    }

});
