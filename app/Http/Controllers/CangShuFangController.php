<?php
/**
 * Created by PhpStorm.
 * User: shory
 * Date: 2016-12-10
 * Time: 20:20
 */

namespace App\Http\Controllers;

use App\Books;
use App\Comment;
use App\Rating;
use App\User;
use Illuminate\Http\Request;


class CangShuFangController extends Controller
{
    /**
     * 首页视图
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $books = Books::select('*')
            ->orderBy('id', 'DESC')
            ->take(20)
            ->get();
        return view('cangshufang.home', [
            'books' => $books
        ]);
    }

    /**
     * 输出书籍详情页的model数据以及视图
     * @param $isbn
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function detail($isbn)
    {
        if (strlen($isbn) != 13) {
            //isbn不正确，返回到首页
            return redirect('/');    //否则重定向到首页
        } else {
            //获取查询到图书资源
            $book = Books::where('isbn', $isbn)->first();
            //查看是否有书籍存在，如果有就显示书籍详情，否则返回首页
            if($book) {
                //获取图书相对应评论
                $comments = Comment::select('content', 'comment_by','comment_thumb', 'updated_at')
                    ->where('isbn', $isbn)
                    ->orderBy('updated_at', 'DESC')
                    ->get();
                //计算评论数
                $counts = $comments->count();
                //获取头像

                //获取评分
                $starRatingResult = Rating::where('isbn', $isbn)->avg('star_rating');
                //将5分制转换成10分制
                if ($starRatingResult != 0 || $starRatingResult != '') {
                    $starRatingResult = ($starRatingResult - 1) * 9 / 4 + 1;
                    //保留1位小数
                    $starRatingResult = round($starRatingResult, 1);
                } else {
                    $starRatingResult = 0;
                }
                //

                return view('cangshufang.detail', [
                    'bookDetail' => $book,
                    'count' => $counts,
                    'comments' => $comments,
                    'starRating' => $starRatingResult
                ]);
            } else {
                return redirect('/');    //否则重定向到首页
            }
        }
    }

    /**
     * 书籍分类控制器
     * 当只有categoryName时，显示当前分类下的书籍
     * 当存在bookName时，显示书籍详情
     * @param $categoryName
     * @param null $isbn
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($categoryName, $isbn = null)
    {
        if ($isbn == null) {
            $categoryBooks = Books::where('category', $categoryName)->get();
            $counts = $categoryBooks == null ? '0' : $categoryBooks->count();
            return view('cangshufang.category', [
                'categoryName' => $categoryName,
                'counts' => $counts,
                'category' => $categoryBooks
            ]);
        } else {
            return CangShuFangController::detail($isbn);
        }
    }

    /**
     * 搜索结果显示
     * @param $bookInfo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search($bookInfo = '无')
    {
        $bookSearched = Books::select('title', 'isbn')
            ->where('title', 'like', '%'.$bookInfo.'%')
            ->orWhere('author', 'like', '%'.$bookInfo.'%')
            ->orWhere('translator', 'like', '%'.$bookInfo.'%')
            ->orWhere('publisher', 'like', '%'.$bookInfo.'%')
            ->get();
        return view('cangshufang.search', [
            'books' => $bookSearched,
            'bookInfo' => $bookInfo
        ]);
    }

    public function catalog()
    {
        $books = Books::select('title', 'isbn', 'updated_at')
            ->orderBy('updated_at', 'DESC')
            ->get();
        $count = $books->count();
        return view('cangshufang.catalog', [
            'books' => $books,
            'count' => $count,
        ]);
    }
    

    /**
     * 关于我们
     */
    public function about()
    {
        return view('cangshufang.about');
    }

    /**
     * 博客
     */
    public function blog()
    {
        $data = '123456789';
        return view('cangshufang.blog', [
            'data' => $data
        ]);
    }

    /**
     * 动态页面数据
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dynamic()
    {
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

        //获取月份统计
        $monthCount = Books::select('created_at')->get();
//        $bookCount = [];
//        foreach($monthCount as $key=>$value) {
//            $bookCount[$key] = $value;
//        }
        //从时间字符串中截取出年和月
        //月
        $Jan = 0;
        $Feb = 0;
        $Mar = 0;
        $Apr = 0;
        $May = 0;
        $Jun = 0;
        $Jul = 0;
        $Aug = 0;
        $Sep = 0;
        $Nov = 0;
        $Oct = 0;
        $Dec = 0;

        for($i = 0; $i < count($monthCount); $i++) {
            $month[$i] = substr($monthCount[$i]->created_at, 5, 2);
            //开始计数
            switch($month[$i]) {
                case 1:$Jan++;break;
                case 2:$Feb++;break;
                case 3:$Mar++;break;
                case 4:$Apr++;break;
                case 5:$May++;break;
                case 6:$Jun++;break;
                case 7:$Jul++;break;
                case 8:$Aug++;break;
                case 9:$Sep++;break;
                case 10:$Nov++;break;
                case 11:$Oct++;break;
                case 12:$Dec++;break;
            }
        }
        return view('cangshufang.dynamic', [
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
            'Jan' => $Jan,
            'Feb' => $Feb,
            'Mar' => $Mar,
            'Apr' => $Apr,
            'May' => $May,
            'Jun' => $Jun,
            'Jul' => $Jul,
            'Aug' => $Aug,
            'Sep' => $Sep,
            'Nov' => $Nov,
            'Oct' => $Oct,
            'Dec' => $Dec,
        ]);
    }


}