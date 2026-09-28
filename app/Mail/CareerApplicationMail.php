<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\UploadedFile;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CareerApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private array $data,
        private UploadedFile $cv
    ) {}

    public function build(): static
    {
        $positionTitle = $this->resolvePositionTitle($this->data['position']);

        return $this
            ->replyTo($this->data['email'], $this->data['full_name'])
            ->subject("New application: {$positionTitle} – {$this->data['full_name']}")
            ->view('mail.career-application')
            ->with([
                'data'          => $this->data,
                'positionTitle' => $positionTitle,
            ])
            ->attachData(
                file_get_contents($this->cv->getRealPath()),
                $this->cv->getClientOriginalName(),
                ['mime' => $this->cv->getMimeType()]
            );
    }

    private function resolvePositionTitle(string $slug): string
    {
        if ($slug === 'general') {
            return 'General Application';
        }

        foreach (config('careers.positions') as $pos) {
            if ($pos['slug'] === $slug) {
                return "{$pos['title']} ({$pos['business']})";
            }
        }

        return $slug;
    }
}
