<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareerApplicationRequest;
use App\Mail\CareerApplicationMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CareersController extends Controller
{
    private function openPositions(): array
    {
        $today = now()->toDateString();

        return array_values(array_filter(config('careers.positions'), function ($pos) use ($today) {
            return $pos['is_open'] && ($pos['deadline'] === null || $pos['deadline'] >= $today);
        }));
    }

    public function index()
    {
        $positions  = $this->openPositions();
        $businesses = array_unique(array_column($positions, 'business'));

        return view('careers.index', [
            'pageTitle'  => 'Careers — Romina Group',
            'pageCode'   => 'Careers',
            'positions'  => $positions,
            'businesses' => array_values($businesses),
        ]);
    }

    public function show(string $slug)
    {
        $position = null;

        foreach ($this->openPositions() as $pos) {
            if ($pos['slug'] === $slug) {
                $position = $pos;
                break;
            }
        }

        abort_if($position === null, 404);

        return view('careers.show', [
            'pageTitle' => "{$position['title']} — Romina Careers",
            'pageCode'  => 'Careers',
            'position'  => $position,
        ]);
    }

    public function apply(CareerApplicationRequest $request)
    {
        // Honeypot — silently accept and drop
        if ($request->input('website')) {
            return redirect()->back()->with('success', true);
        }

        $data = $request->validated();

        try {
            Mail::to(config('careers.notify_email'))
                ->send(new CareerApplicationMail($data, $request->file('cv')));

            if (config('careers.send_confirmation')) {
                $posTitle = $data['position'] === 'general' ? 'Romina Group' : $data['position'];
                $body = "Dear {$data['full_name']},\n\n"
                    . "Thank you for applying to Romina Group. We have received your application "
                    . "and will be in touch if your profile is a strong match.\n\n"
                    . "The Romina Careers Team\n"
                    . "info@rominaplc.com";

                Mail::raw($body, function ($msg) use ($data) {
                    $msg->to($data['email'], $data['full_name'])
                        ->subject('We received your application — Romina Group');
                });
            }
        } catch (\Throwable $e) {
            Log::error('Career application mail failed', [
                'error'    => $e->getMessage(),
                'position' => $data['position'] ?? null,
                'email'    => $data['email'] ?? null,
            ]);

            return redirect()->back()
                ->withInput()
                ->with('mail_error', true);
        }

        return redirect()->back()->with('success', true);
    }
}
