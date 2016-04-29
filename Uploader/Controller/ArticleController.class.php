<?php
namespace Uploader\Controller;

use Think\Controller;
use Uploader\Library\Util\UUIDUtil;

class ArticleController extends Controller
{
    public function edit()
    {
        $value = session('user');
        if (!empty($value)) {

            $this->assign("session", $value);
        } else {
            $this->redirect('/Home/Index/login', 3, '登录超时，页面跳转中...');
        }
        $forum_id = $_GET['forum_id'];
        $article_id = $_GET['article_id'];
        if (empty($forum_id)) {
            if (empty($article_id)) {
                $this->error("请从从本站进入编辑页");
            } else {
                $article = M("Article");
                $article->where("article_id='$article_id'")->find();
                $this->assign("forum_id", $article->forum_id);
                $this->assign("article_id", $article->article_id);
                $this->assign("article", $article);
            }


        } else {
            $this->assign("forum_id", $forum_id);
        };
        $this->display();
    }

    public function add()
    {
        $value = session('user');
        if (!empty($value)) {

            $this->assign("session", $value);
        } else {
            $this->redirect('/Home/Index/login', 3, '登录超时，页面跳转中...');
        }
        $article = M("Article");
        $data = array();
        $uuid = new UUIDUtil();
        if (empty($_POST['article_id'])) {
            //添加
            $data["article_id"] = $uuid->create_uuid();
            $data["forum_id"] = $_POST['forum_id'];
            $data["time"] = date('Y-m-d h:i:s', time());
            $maxPosition = $article->max('position');
            if ($maxPosition == null) {
                $data["position"] = 1;
            } else {
                $data["position"] = $maxPosition + 1;
            }

        } else {
            //更新
            $data["article_id"] = $_POST['article_id'];
        }
        $data["title"] = $_POST['title'];
        $data["description"] = $_POST['description'];;
        $data["img"] = $_POST['img'];
        $data["content"] = $_POST['content'];
        $data["source"] = $_POST['source'];

        $forum_id = $_POST['forum_id'];
        // var_dump($data);
        if ($article->find($data['article_id'])) {
            if ($article->save($data)) {

                $this->success('更新成功', 'listView?forum_id=' . $forum_id);
            } else {
                $this->error('更新失败');
            }
        } else {
            if ($article->add($data)) {

                $forum = M('Forum');
                $forum->where("forum_id='$forum_id'")->setInc('count', 1);
                $forum->where("forum_id='$forum_id'")->setField('updateTime', date('Y-m-d h:i:s', time()));
                $this->success('发布成功', 'listView?forum_id=' . $forum_id);
            } else {
                $this->error('发布失败');
            }
        };

    }

    public function delete()
    {
        $value = session('user');
        if (!empty($value)) {

            $this->assign("session", $value);
        } else {
            $this->redirect('/Home/Index/login', 3, '登录超时，页面跳转中...');
        }
        $article_id = $_GET['article_id'];
        $article = M('Article');
        $article->where("article_id='$article_id'")->find();
        $forum_id = $article->data()['forum_id'];
        $status = $article->where("article_id='$article_id'")->delete();
        if ($status) {
            $forum = M('Forum');
            $forum->where("forum_id='$forum_id'")->setDec('count', 1);
            $forum->where("forum_id='$forum_id'")->setField('updateTime', date('Y-m-d h:i:s', time()));

            $this->success('删除成功', 'listView?forum_id=' . $forum_id);
        } else {
            $this->error('删除失败');
        }
    }

    public function show()
    {
        $article_id = $_GET['article_id'];
        $article = M('Article');
        $article->where("article_id='$article_id'")->find();
        $this->assign("item", $article);
        $this->display();

    }

    public function listView()
    {
        $value = session('user');
        if (!empty($value)) {

            $this->assign("session", $value);
        } else {
            $this->redirect('/Home/Index/login', 3, '登录超时，页面跳转中...');
        }
        $forum_id = $_GET['forum_id'];
        $article = M("Article");
        $restult = $article->where("forum_id='$forum_id'")->order('position asc')->select();
        $this->assign("articleList", $restult);
        $this->assign("forum_id", $forum_id);
        $this->display();
    }

    public function movePostion()
    {
        $value = session('user');
        if (!empty($value)) {

            $this->assign("session", $value);
        } else {
            $this->redirect('/Home/Index/login', 3, '登录超时，页面跳转中...');
        }
        $article_id = $_GET['article_id'];
        $direction = $_GET['direction'];
        $article = M("Article");
        $article->where("article_id='$article_id'")->find();
        $seacheArticle = $article->data();
        //var_dump($seacheArticle);
        $positon = $seacheArticle['position'];
        //echo $positon;
        $forum_id = $seacheArticle['forum_id'];
        $tagetArticle = M("Article");
        $moveArticle = null;
        if ($direction == 'up') {
            //echo "up：true"."<br>";
            $moveArticle = $tagetArticle->where("position<$positon")->order("position desc")->find();

        } else if ($direction == 'down') {
            // echo "up：false"."<br>";
            $moveArticle = $tagetArticle->where("position>$positon")->order("position asc")->find();
        } else {
            $this->error('删除失败');
        }
//        echo "s：".$positon."<br>";
//        echo "t：". $moveArticle['position']."<br>";

        if ($moveArticle != null) {
            $seacheArticle['position'] = $moveArticle['position'];
            $article->data($seacheArticle)->save();
            $moveArticle['position'] = $positon;
            $tagetArticle->data($moveArticle)->save();
        }
        redirect('listView?forum_id=' . $forum_id, 0, "");
    }

    public function getArticle()
    {
        $forum_id = $_GET['forum_id'];
        $position = $_GET['position'];
//        $forum_id= 'cbe2c785-e643-4e49-87d0-a96993cdb86e';
//        $position='100';

        if (empty($forum_id) || empty($position) || !eregi('^[1-9][0-9]*$', $position)) {
            echo json_encode(array('status' => '401', 'msg' => '参数错误'));
            exit();
        } else {
            $article = M('Article');
            $startposition = intval($position) - 1;
            $list = $article->where("forum_id='$forum_id'")->order('position asc')->limit("$startposition,1")->select();
            $result = $list[0];

            if ($result) {
                echo json_encode(array('data' => $result, 'status' => '200'));
            } else {
                echo json_encode(array('status' => '402', 'msg' => '请求内容不存在'));
            }

        }
    }

    public function getArticleById()
    {
        $id = $_GET['id'];
        $article = M('Article');
        $article->find($id);
        $result = $article->data();
        if ($result) {
            echo json_encode(array('data' => $result, 'status' => '200'));
        } else {
            echo json_encode(array('status' => '402', 'msg' => '请求内容不存在'));
        }
    }

}