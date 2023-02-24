<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sendMail extends Model
{
    use HasFactory;

    protected $fillable = ['branch', 'role', 'to', 'subject', 'content'];

    public function saveMail($data)
    {
        $mail = new sendMail();

        $mail->branch = $data['branch'];
        $mail->role = $data['role'];
        $mail->to = $data['to'];
        $mail->subject = $data['subject'];
        $mail->content = $data['content'];

        $mail->save();
    }
}
