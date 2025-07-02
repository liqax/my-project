<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExamBookingRequest; // Import the Request class you'll create
use App\Models\ExamBooking;
use App\Exports\ExamBookingsExport; // นำเข้า Export Class ของคุณ
use Maatwebsite\Excel\Facades\Excel; // นำเข้า Excel Facade


class ExamBookingController extends Controller
{
    /**
     * Display the exam booking form.
     *
     * @return \Illuminate\View\View
     */
    public function showBookingForm()
    {
        return view('exams.booking');
    }

    /**
     * Handle the exam booking form submission.
     *
     * @param  \App\Http\Requests\ExamBookingRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitBookingForm(ExamBookingRequest $request)
    {
        

        // Log the data for debugging (optional)
        \Log::info('Exam Booking Data:', $request->validated());

         ExamBooking::create($request->validated());
        // Redirect back with a success message
        return redirect()->route('exam.booking.form')->with('success', 'การจองสอบของคุณได้รับการบันทึกเรียบร้อยแล้ว!');
    }

   public function exportBookings()
    {
        $fileName = 'exam_bookings_' . now()->format('Ymd_His') . '.xlsx';
        return Excel::download(new ExamBookingsExport, $fileName);
    }
}