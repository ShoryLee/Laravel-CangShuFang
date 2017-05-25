<?php

namespace App\Http\Controllers;

use App\Books;
use App\Comment;
use App\Rating;
use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AjaxController extends Controller
{
    /**
     * 使用Ajax实现搜索建议
     * @param $value
     */
    public function searchSuggest($value)
    {
        $searchContent = Books::select('title', 'isbn')
            ->where('title', 'like', '%' . $value . '%')
            ->get();
        echo json_encode($searchContent);
    }

    /**
     * 书籍评论
     * @param Request $request
     */
    public function commentPost(Request $request)
    {
        $bookId = $request->input('bookId');
        $bookTitle = $request->input('title');
        $bookIsbn = $request->input('bookIsbn');
        $content = $request->input('content');
        $comment_by = $request->input('username');
        $thumb = $request->input('thumb');

        $commentInsert = new Comment();
        $commentInsert->book_id = $bookId;
        $commentInsert->comment_by = $comment_by;
        $commentInsert->comment_thumb = $thumb;
        $commentInsert->title = $bookTitle;
        $commentInsert->isbn = $bookIsbn;
        $commentInsert->content = $content;
        if ($commentInsert->save()) {
            $returnBack = ['result' => true];
            echo json_encode($returnBack);
        } else {
            $returnBack = ['result' => false];
            echo json_encode($returnBack);
        }
    }

    /**
     * 星星评分
     * @param Request $request
     */
    public function starRating(Request $request)
    {
        $bookId = $request->input('bookId');
        $bookTitle = $request->input('title');
        $bookIsbn = $request->input('bookIsbn');
        $clickStar = $request->input('star');
        $rating_by = $request->input('username');

        $starRatingInsert = new Rating();
        $starRatingInsert->book_id = $bookId;
        $starRatingInsert->rating_by = $rating_by;
        $starRatingInsert->title = $bookTitle;
        $starRatingInsert->isbn = $bookIsbn;
        $starRatingInsert->star_rating = $clickStar;
        if ($starRatingInsert->save()) {
            $returnBack = ['result' => true];
            echo json_encode($returnBack);
        } else {
            $returnBack = ['result' => false];
            echo json_encode($returnBack);
        }
    }

    /**
     * 新增一本书
     * @param Request $request
     */
    public function addNewBook(Request $request)
    {
        $title = $request->input('title');
        $isbn = $request->input('isbn13');
        $hasBook = Books::where([['title', $title], ["isbn", $isbn]])->count();
        if ($hasBook) {
            $returnBack = ['result' => 'hasOne'];
            echo json_encode($returnBack);
        } else {
            $addBook = new Books();
            $addBook->title = $title;
            $addBook->sub_title = $request->input('sub_title');
            $addBook->original_title = $request->input('origin_title');
            $addBook->translator = $request->input('translator');
            $addBook->author = $request->input('author');
            $addBook->pages = $request->input('pages');
            $addBook->price = $request->input('price');
            $addBook->rating = $request->input('rating');
            $addBook->serials = $request->input('serials');
            $addBook->img = $request->input('img');
            $addBook->isbn = $isbn;
            $addBook->publisher = $request->input('publisher');
            $addBook->pub_date = $request->input('pub_date');
            $addBook->url = $request->input('alt');
            $addBook->author_intro = $request->input('author_intro');
            $addBook->description = $request->input('summary');
            $addBook->mark = '1';
            $addBook->category = $request->input('category');
            $addBook->tags = $request->input('tags');

            if ($addBook->save()) {

                //将书籍封面下载
                Storage::disk('local')->put($isbn.'.jpg', file_get_contents($request->input('img')));

                $returnBack = ['result' => true];
                echo json_encode($returnBack);
            } else {
                $returnBack = ['result' => false];
                echo json_encode($returnBack);
            }
        }
    }

    /**
     * 更新/编辑一本书
     * @param Request $request
     */
    public function updateBook(Request $request)
    {
        $updated = Books::find($request->input('id'));

        $updated->title = $request->input('title');
        $updated->sub_title = $request->input('sub_title');
        $updated->original_title = $request->input('origin_title');
        $updated->translator = $request->input('translator');
        $updated->author = $request->input('author');
        $updated->pages = $request->input('pages');
        $updated->price = $request->input('price');
        $updated->rating = $request->input('rating');
        $updated->serials = $request->input('serials');
        $updated->img = $request->input('img');
        $updated->isbn = $request->input('isbn');
        $updated->publisher = $request->input('publisher');
        $updated->pub_date = $request->input('pub_date');
        $updated->url = $request->input('alt');
        $updated->author_intro = $request->input('author_intro');
        $updated->description = $request->input('summary');
        $updated->mark = $request->input('mark');;
        $updated->category = $request->input('category');;
        $updated->tags = $request->input('tags');

        if ($updated->save()) {
            $returnBack = ['result' => true];
            echo json_encode($returnBack);
        } else {
            $returnBack = ['result' => false];
            echo json_encode($returnBack);
        }

    }

    /**
     * 更新/编辑评论
     * @param Request $request
     */
    public function updateComment(Request $request)
    {
        $commentUpdated = Comment::find($request->input('id'));

        $commentUpdated->title = $request->input('title');
        $commentUpdated->comment_by = $request->input('comment_by');
        $commentUpdated->content = $request->input('content');
        if($commentUpdated->save()) {
            $returnBack = ['result' => true];
            echo json_encode($returnBack);
        } else {
            $returnBack = ['result' => false];
            echo json_encode($returnBack);
        }
    }

    /**
     * 注册管理员时候ajax判断用户名和邮箱是否存在
     * @param $name
     */
    public function checkAdmin($name)
    {
        $valueExists = Admin::where('name', '=', $name)->count();
        if($valueExists) {
            $returnBack = ['result' => true];
            echo json_encode($returnBack);
        } else {
            $returnBack = ['result' => false];
            echo json_encode($returnBack);
        }
    }
    /**
     * 注册用户时候ajax判断用户名和邮箱是否存在
     * @param $name
     */
    public function checkUser($name)
    {
        $userExists = User::where('name', '=', $name)->count();
        if($userExists) {
            $returnBack = ['result' => true];
            echo json_encode($returnBack);
        } else {
            $returnBack = ['result' => false];
            echo json_encode($returnBack);
        }
    }

}