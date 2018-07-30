<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Category;

class TopicsController extends Controller
{
    /**
     * TopicsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
    /**
     * 话题列表页
     * Created by PhpStorm
     * @param Request $request
     * @param Topic $topic
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * author: sunshanshan
     * return:
     * Date: 2018/7/24 21:20
     */
    public function index(Request $request, Topic $topic)
    {   
        $topics = $topic->withOrder($request->order)->paginate(20);
        //$topics = $topic->paginate(20);
        return view('web.topics.index', compact('topics'));
    }
    
    /**
     * 话题详情页
     * Created by PhpStorm
     * @param Request $request
     * @param Topic $topic
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * author: sunshanshan
     * return:
     * Date: 2018/7/24 21:21
     */
    public function show(Request $request, Topic $topic)
    {
        return view('web.topics.show', compact('topic'));
    }
    
    /**
     * 话题创建页
     * Created by PhpStorm
     * @param Topic $topic
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * author: sunshanshan
     * return:
     * Date: 2018/7/24 21:23
     */
    public function create(Topic $topic)
    {
        $categories = Category::all();
        
        return view('web.topics.topic', compact('topic', 'categories'));
    }
    
    /**
     * 话题操作页
     * Created by PhpStorm
     * @param TopicFormRequest $request
     * @param Topic $topic
     * author: sunshanshan
     * return:
     * Date: 2018/7/24 21:24
     */
    public function store(TopicFormRequest $request, Topic $topic)
    {
    
    }
    
    /**
     * 话题编辑页
     * Created by PhpStorm
     * author: sunshanshan
     * return:
     * Date: 2018/7/24 21:24
     */
    public function edit(Topic $topic)
    {
        return view('web.topics.topic');
    }
    
    /**
     * 话题更新操作
     * Created by PhpStorm
     * @param TopicFormRequest $request
     * @param Topic $topic
     * author: sunshanshan
     * return:
     * Date: 2018/7/24 21:25
     */
    public function update(TopicFormRequest $request, Topic $topic)
    {
    
    }
    
    /**
     * 话题删除操作
     * Created by PhpStorm
     * @param Topic $topic
     * author: sunshanshan
     * return:
     * Date: 2018/7/24 21:26
     */
    public function destroy(Topic $topic)
    {
    
    }
    
}
