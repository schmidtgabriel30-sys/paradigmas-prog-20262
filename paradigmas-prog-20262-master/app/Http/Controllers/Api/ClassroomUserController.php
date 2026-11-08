<?php

namespace App\Http\Controllers\Api;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomUserController extends Controller
{
    public function toggleEnrollment(Request $request)
    {
        $validated = $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'user_id' => 'required|exists:users,id',
            'action' => 'required|in:attach,detach'
        ]);

        $classroom = Classroom::findOrFail($validated['classroom_id']);
        $userId = $validated['user_id'];

        if ($validated['action'] === 'attach') {
            $classroom->users()->syncWithoutDetaching([$userId]);
            $message = 'Usuário matriculado na turma com sucesso.';
        } else {
            $classroom->users()->detach($userId);
            $message = 'Usuário removido da turma com sucesso.';
        }

        return response()->json(['message' => $message, 'classroom' => $classroom->load('users')]);
    }
}