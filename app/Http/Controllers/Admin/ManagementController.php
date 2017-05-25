<?php

namespace App\Http\Controllers\Admin;

use App\Books;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ManagementController extends Controller
{
    //中间件验证是否登录
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * 返回后台管理首页，概览书籍数量
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function management()
    {
        //总数
        $countAll = Books::count();
        //小说
        $novel = Books::where('category', '小说')->count();

        //诗词
        $poem = Books::where('category', '诗词')->count();

        //哲学
        $philosophy = Books::where('category', '哲学')->count();

        //散文
        $prose = Books::where('category', '散文')->count();

        //童话
        $tale = Books::where('category', '童话')->count();

        //社科
        $social = Books::where('category', '社会')->count();

        //传记
        $biography = Books::where('category', '传记')->count();

        //推理
        $whodunit = Books::where('category', '推理')->count();

        //其他
        $others = Books::where('category', '其它')->count();

        //历史
        $history = Books::where('category', '历史')->count();

        //古典
        $classical = Books::where('category', '古典')->count();

        //戏剧
        $drama = Books::where('category', '戏剧')->count();

        //评论
        $countComment = Comment::count();

        //今日添加
        $today = time() - date('H')*3600 - date('i')*60 - date('s');

        $countToday = Books::where('created_at', '>=', $today)->count();
        if(!$countToday) {
            $countToday = 0;
        }

        return view('admin.management.management', [
            'countAll' => $countAll,
            'countNovel' => $novel,
            'countPoem' => $poem,
            'countPhilosophy' => $philosophy,
            'countProse' => $prose,
            'countTale' => $tale,
            'countSocial' => $social,
            'countBiography' => $biography,
            'countWhodunit' => $whodunit,
            'countOthers' => $others,
            'countHistory' => $history,
            'countClassical' => $classical,
            'countDrama' => $drama,
            'countComment' => $countComment,
            'countToday' => $countToday,
        ]);
    }

    /**
     * 新增书籍
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addBook()
    {

        return view('admin.management.addBook');
    }

    /**
     * 书籍管理，包括跳转查看详情，编辑，删除
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageBook()
    {
        $books = Books::select('id', 'title', 'author', 'isbn')
            ->orderBy('id', 'DESC')
            ->paginate(15);
        return view('admin.management.manageBook', [
            'books' => $books,
        ]);
    }

    /**
     * 后台编辑书籍
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editBook(Request $request)
    {
        $getEditBook = Books::find($request->input('id'));
        return view('admin.management.editBook', [
            'getEditBook' => $getEditBook
        ]);

    }

    /**
     * 后台删除书籍
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteBook(Request $request)
    {
        //从数据库中查找需要删除的书籍
        $needToDelete = Books::find($request->input('id'));
        //获取需要删除的封面图片
//        $deleteImg = $request->input('isbn').'.jpg';
//        && Storage::disk('local')->delete($deleteImg)
        if($needToDelete->delete()) {
            return redirect('admin/manageBook');
        } else {
            return redirect('admin/management');
        }
    }


    /**
     * 评论管理
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageComment()
    {
        $comments = Comment::select()
            ->orderBy('updated_at', 'DESC')
            ->paginate(15);
        $count = $comments->count();
        return view('admin.management.manageComment', [
            'comments' => $comments,
            'count' => $count
        ]);
    }

    /**
     * 编辑书籍
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editComment(Request $request)
    {
        $commentId = $request->input('id');
        $getEditComment = Comment::find($commentId);

        return view('admin.management.editComment', [
            'getEditComment' => $getEditComment
        ]);
    }

    /**
     * 删除评论
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteComment(Request $request)
    {
        $getDeleteComment = Comment::find($request->input('id'))->delete();

        if($getDeleteComment) {
            return redirect('admin/manageComment');
        } else {
            return redirect('admin/manageComment');
        }

    }
}