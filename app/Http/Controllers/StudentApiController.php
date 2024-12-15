<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Mail\RegistrationConfirmed;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class StudentApiController extends Controller
{
    public function registerStudent(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email|max:255',
            'birthdate' => 'required|date',
            'contact_number' => 'required|string|max:20',
            'course' => 'required|string|max:255',
            'gender' => 'required',

        ]);


        $student = Student::create($validated);

        Mail::to($validated['email'])->send(new RegistrationConfirmed($validated['first_name']));

        return response()->json([
            'message' => 'Student registered successfully',
            'student' => $student
        ], 201);
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->orWhere('email', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(["message" => "The provided credentials are incorrect.", "error" => "true"], 422);
        }

        $token = $user->createToken('YourAppName')->plainTextToken;


        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function examinee(Request $request)
    {
        return response()->json(Student::all());
    }

    public function fetchQuestion(Request $request)
    {
        return response()->json(Question::with('options')->get());
    }
    public function fetchQuestionExam(Request $request)
    {
        return response()->json(Question::with('options')->inRandomOrder()->take(100)->get());
    }


    public function saveQuestion(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:255',
            'correct_answer' => 'nullable',
            'type' => 'required|string|in:Multiple Choice,True/False,Short Answer',
            'choices' => 'required_if:type,Multiple Choice|array|min:1',
            'choices.*' => 'required_if:type,Multiple Choice|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {

            $question = new Question();
            $question->question = $request->question;
            $question->type = $request->type;
            $question->correct_answer = $request->correct_answer ?? '';
            $question->save();

            if ($request->type === 'Multiple Choice') {
                foreach ($request->choices as $choice) {
                    $questionChoice = new Option();
                    $questionChoice->question_id = $question->id;
                    $questionChoice->option = $choice;
                    $questionChoice->save();
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Question saved successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while saving the question',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function confirmStudent(Request $request)
    {

        $request->validate([
            'student_id' => 'required|exists:students,student_id',
        ]);
        $student = Student::where('student_id', $request->student_id)->firstOrFail();
        $randomPassword = Str::random(12);
        $user = User::create([
            'username' => $student->last_name . $student->birthdate,
            'email' => $student->email,
            'password' => Hash::make($randomPassword),
            'user_type' => 'Student',
        ]);

        $student->user_id = $request->student_id;
        $student->is_activated = 1;

        $student->save();

        Mail::to($student->email)->send(new \App\Mail\EntranceExamNotification($student, $randomPassword));

        return response()->json([
            'message' => 'Student confirmed and notified successfully.',
        ], 200);
    }

    public function saveAnswer(Request $request)
    {
        $guest = Auth::guard('api')->user();
        try {
            $request->validate([
                'answers' => 'required|array',
                'answers.*.question_id' => 'required|exists:questions,id',
                'answers.*.answer' => 'required|string',
            ]);

            foreach ($request->answers as $answerData) {
                $question = Question::find($answerData['question_id']);

                if (!$question) {
                    return response()->json(['error' => 'Question not found'], 404);
                }
                $isCorrect = 0;
                if($answerData['answer'] === $question->correct_answer){
                    $isCorrect = 1;
                }

                Answer::create([
                    'question_id' => $answerData['question_id'],
                    'answer' => $answerData['answer'],
                    'correct_answer' => $question->correct_answer,
                    'is_correct' => $isCorrect,
                    'user_id' => $guest->id
                ]);
            }

            $user = User::where('id', $guest->id)->first();
            if ($user) {
                $user->is_exam_taken = 1;
                $user->save();
            }

            return response()->json(['message' => 'Exam submitted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    public function getCheckStudentExam(Request $request){
        $guest = Auth::guard('api')->user();

        return response()->json(User::where('id', $guest->id)->first());
    }

    public function getResult(Request $result){
        $guest = Auth::guard('api')->user();

        return response()->json(Answer::where('user_id', $guest->id)->get());
    }

    public function getStudentResult(Request $request){
        $request->validate([
            'student_id' => 'required',
        ]);
        return response()->json(Answer::where('user_id', $request->student_id)->get());
    }


}
