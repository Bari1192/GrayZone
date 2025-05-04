<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Http\Resources\ChatResource;
use App\Models\Chat;
use App\Services\ChatResponderService;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::all();
        return ChatResource::collection($chats);
    }

    public function store(StoreChatRequest $request, Chat $chat, ChatResponderService $chatResponderService)
    {
        $data = $request->validated(); // Elsőnek validáljuk le, amit beküld
        $response = $chatResponderService->responed($data['message']); // Ezt tovább küldjük utána a Service-nek feldolgozásra.
        Chat::create($data); // Nem küldjük vissza a beírt szövegét, hanem csak a választ adjuk meg rá.
        // return new ChatResource($response);
        return response()->json([
            'válasz/reply' => $response
        ]);
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
