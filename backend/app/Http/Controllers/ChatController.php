<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Http\Resources\ChatResource;
use App\Models\Chat;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::all();
        return ChatResource::collection($chats);
    }

    public function store(StoreChatRequest $request, Chat $chat)
    {
        $data = $request->validated();
        $chat = Chat::create($data);
        return new ChatResource($chat);
    }

    public function show(Chat $chat)
    {
        return ChatResource::collection($chat);
    }

    public function update(UpdateChatRequest $request, Chat $chat)
    {
        $data = $request->validated();
        $chat->update($data);
        return new ChatResource($chat);
    }
    public function destroy(Chat $chat)
    {
        return ($chat->delete() ? response()->noContent() : abort(500));
    }
}
