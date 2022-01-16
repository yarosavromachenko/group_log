<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Item;
use App\Models\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $items = Item::query()->with('students')->get();
        $students = Student::query()->with('items')->get();

        return view('group.index', compact('students', 'items'));
    }
    /**
     * Show the form for creating a new resource.
     * @param Student $student
     * @param Item $item
     * @return Application|Factory|View
     */
    public function create(Student $student, Item $item)
    {
        return view('group.create', compact('student', 'item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentRequest $request
     * @param Student $student
     * @param Item $item
     * @return RedirectResponse
     */
    public function store(StudentRequest $request, Student $student, Item $item)
    {
        try {
            $student->items()->updateExistingPivot($item, [
                'grade' => $request->grade,
            ]);
        } catch (\Throwable $e) {
            return redirect()->route('home')->with('error', 'Операция не выполнена');
        }

        return redirect()->route('home')->with('success', 'Операция успешно выполнена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StudentRequest $request
     * @param Item $item
     * @param Student $student
     * @return Application|Factory|View
     */
    public function edit(StudentRequest $request, Student $student, Item $item)
    {
        $grade = $request->grade;

        return view('group.edit', compact('student', 'item', 'grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentRequest $request
     * @param Item $item
     * @param Student $student
     * @return RedirectResponse
     */
    public function update(StudentRequest $request, Student $student, Item $item)
    {
        try {
            $student->items()->updateExistingPivot($item, [
                'grade' => $request->grade,]);
        } catch (\Throwable $e) {
            return redirect()->route('home')->with('error', 'Операция не выполнена');
        }

        return redirect()->route('home')->with('success', 'Операция успешно выполнена');
    }
}
