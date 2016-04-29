<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height = device-height, initial-scale=1">
    <!--不进行转码-->
    <meta http-equiv="Cache-Control" content="no-transform">
    <title><?php echo ($item->title); ?></title>
</head>
<body>
<section class="wx96Diy" data-source="bj.96weixin.com">
    <section class="96wxDiy" style="clear: both; position: relative; width: 100%; margin: 0px auto; overflow: hidden;">
        <section style="margin:0.5em auto;"><section style="margin-top: 10px; margin-bottom: 10px; padding-right: 3px; padding-left: 3px; position: static; box-sizing: border-box; text-align: center;">
            <section class="96wx-bdtc 96wx-bdrc" style="height: 3em; border-right-width: 1px; border-right-style: solid; border-right-color: rgb(53, 28, 241); border-top-width: 1px; border-top-style: solid; border-top-color: rgb(53, 28, 241); margin-top: -2px; box-sizing: border-box; margin-left: 2em;">
            </section>
            <section style="display: inline-block; vertical-align: top; padding-right: 15px; padding-left: 15px;margin-top: -2.5em;font-weight: bold;padding-top:5px;">
                <p><span style="font-size: 20px;"><?php echo ($item->title); ?></span></p>
            </section>
            <section style="margin-top: -3.5em; box-sizing: border-box;">
                <section class="96wx-bdbc 96wx-bdlc" style="height: 3em; border-left-width: 1px; border-left-style: solid; border-left-color: rgb(53, 28, 241); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(53, 28, 241); box-sizing: border-box; margin-right: 2em;"></section>
            </section>
        </section>
        </section>
    </section>

</section>
<br>
<section class="wx96Diy" data-source="bj.96weixin.com">
    <blockquote class="96wx-bdlc" style="margin: 0px; padding: 15px 25px; top: 0px; line-height: 24px; font-size: 14px; vertical-align: baseline; border-left-color: rgb(0, 187, 236); border-left-width: 10px; border-left-style: solid; display: block; -ms-word-wrap: break-word; max-width: 100%; background-color: rgb(239, 239, 239);">
        <p class="96wxDiy"><?php echo ($item->description); ?></p>
    </blockquote>
</section>
<br>
<section class="wx96Diy" data-source="bj.96weixin.com">
    <blockquote class="96wx-bdc" style="margin: 0px; padding: 15px; border-radius: 10px; border: 3px dashed rgb(0, 187, 236);">
        <?php if(!empty($item->img)): ?><p  class="96wxDiy" style="text-align: center"><img src="<?php echo ($item->img); ?>" style="display: inline-block; vertical-align: top; width: 320px; box-sizing: border-box !important; word-wrap: break-word !important; ></p><?php endif; ?>


        <p class="96wxDiy"><?php echo ($item->message); ?></p>
        <p class="96wxDiy"><br/></p>
    </blockquote>
</section>
<section class="wx96Diy" data-source="bj.96weixin.com">
    <section id="96weixinew0814004" class="96wxDiy" style="border-style: none; width: 320px; clear: both; overflow: hidden;margin: 0 auto;" data-width="320px"><br/><section style="width: 100%; float: left; padding: 0 0.1em 0 0;" data-width="100%"><img style="width: 295px; height: auto !important;" src="https://mmbiz.qlogo.cn/mmbiz/z9433rAGTDfiaaFED4iaX8CS6OIzViaEWFd6ukk80t7SpkptbAqZscUdKbXiboibaRzybTDwHCYnmKRCqtiayrvvscFw/0?wx_fmt=gif" width="319" height="199" data-width="319px"/>
        <section style="padding:0.4em 2em;float: left;font-size: 17px; margin-top: -11em; margin-left: 0em;text-align: center; color: #fff; opacity: 0.85; background-color: abg(255,255,255);">
            <img src="https://mmbiz.qlogo.cn/mmbiz/iaGswicCbWm6ibZNRFa5gwkXz2ER9YzWRLpj9hwst4jfOEFa1K1WNTyUJvcUWhq7KNdwvFx95tMQcycQ1CQia6wibUg/0?wx_fmt=jpeg" width="125" height="125" style="width: 125px; height: 125px;" data-width="130px"/>
        </section>
    </section>
    </section>
</section>
</body>
</html>