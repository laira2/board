<?php

namespace App\Services;

use App\Http\Requests\BoardRequest;
use App\Http\Resources\BoardResource;
use App\Models\Board;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BoardService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    
    /**
     * 전체 게시글 조회 (페이지네이션 적용)
     */
    public function getBoards(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $boards = Board::orderBy('created_at', 'desc')->paginate($perPage);
        
        return $boards;
    }

    /**
     * 전체 게시글 조회
     */
    public function getBoardList()
    {
        $boards = Board::all();
        return $boards;
    }

    /**
     * 게시글 단일 조회
     */
    public function getBoard($id)
    {
        try
        {
            $board = Board::whereId($id)
                            -> first();
            return $board;
        }catch(Exception $e)
        {
            $e ->getMessage();
        }
    }

    /**
     * 새 게시글 생성
     */
    public function createPost(Request $request)
    {
        try
        {
            $newboard = Board::create([
                    'title' => $request['title'],
                    'author' => $request['author'],
                    'content' => $request['content'],
                ]);
            return $newboard;
        }catch(Exception $e)
        {
            $e ->getMessage();
        }
    }

    /**
     * 게시글 수정
     */
    public function updateBoard($id, BoardRequest $request)
    {
        $board = $this -> getBoard($id);
        $board->update($request->validated());

        $updated_board = new BoardResource($board);

        return $updated_board->toArray(request());
    }

    /**
     * 게시글 삭제
     */
    public function deleteBoard($id)
    {
        $board = Board::find($id);
        $board ->delete();
    }

    /**
     * 게시글 검색
     */
    public function searchBaord($search_key){

        $board = Board::query()
                        ->where('title','like',"%$search_key%")
                        -> orWhere('author','like',"%$search_key%")
                        ->orderBy('id', 'desc')
                        ->paginate(10);     
        Log::debug('board'.$board);
        return $board;
    }
}
