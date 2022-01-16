<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class MailController extends Controller
{
    /**
     * @param Student $student
     * @return string
     */
    public function send(Student $student)
    {
        $items = Item::all();
        $toEmail = $student->email;
        try {
            Mail::to($toEmail)->send(new FeedbackMail($student, $items));
        } catch (\Throwable $exception) {
            return redirect()->route('home')->with('error', 'Произошла ошибка');
        }

        return redirect()->route('home')->with('success', 'Имейл отправлен');
    }
}
