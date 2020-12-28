<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Session;
use Mail;
use App\Models\config;
use App\Models\product;
use App\Models\setting;
use Exception;

trait GeneralTrait
{
    public function timezone()
    {
        return date_default_timezone_set(config::where('name', 'timezone')->value('value') ?? "Asia/Jakarta");
    }

	public function log_system($modul,$action,$id){
		$ip =  \Request::ip();
		$description = $modul ." ".$action." - ID:".$id;
		DB::table('systemlog')->insert(['user_id' => Session::get('id')??$id,'ipaddress' => $ip,'description' => $description,'timestamp' => now()]);
    }

    public function charOnly($replace,$string){
        return preg_replace("/[^a-zA-Z]/", $replace, $string);
    }

    public function smartDatepast($timestamp)
    {
        $diff = time() - $timestamp;
        if ($diff <= 0) {
            return 'Now';
        } else if ($diff < 60) {
            return $this->_x("%d second ago", "%d seconds ago", floor($diff));
        } else if ($diff < 60 * 60) {
            return $this->_x("%d minute ago", "%d minutes ago", floor($diff / 60));
        } else if ($diff < 60 * 60 * 24) {
            return $this->_x("%d hour ago", "%d hours ago", floor($diff / (60 * 60)));
        } else if ($diff < 60 * 60 * 24 * 30) {
            return $this->_x("%d day ago", "%d days ago", floor($diff / (60 * 60 * 24)));
        } else if ($diff < 60 * 60 * 24 * 30 * 12) {
            return $this->_x("%d month ago", "%d months ago", floor($diff / (60 * 60 * 24 * 30)));
        } else {
            return $this->_x("%d year ago", "%d years ago", floor($diff / (60 * 60 * 24 * 30 * 12)));
        }
    }

    public function smartDatefuture($timestamp)
    {
        $diff =  $timestamp - time();
        if ($diff <= 0) {
            return 'Expired';
        } else if ($diff < 60) {
            return $this->_x("%d second left", "%d seconds left", floor($diff));
        } else if ($diff < 60 * 60) {
            return $this->_x("%d minute left", "%d minutes left", floor($diff / 60));
        } else if ($diff < 60 * 60 * 24) {
            return $this->_x("%d hour left", "%d hours left", floor($diff / (60 * 60)));
        } else if ($diff < 60 * 60 * 24 * 30) {
            return $this->_x("%d day left", "%d days left", floor($diff / (60 * 60 * 24)));
        } else if ($diff < 60 * 60 * 24 * 30 * 12) {
            return $this->_x("%d month left", "%d months left", floor($diff / (60 * 60 * 24 * 30)));
        } else {
            return $this->_x("%d year left", "%d years left", floor($diff / (60 * 60 * 24 * 30 * 12)));
        }
    }

    public function convertday($day)
    {
        if ($day == 'Monday') return "Senin";
        elseif ($day == 'Tuesday') return "Selasa";
        elseif ($day == 'Wednesday') return "Rabu";
        elseif ($day == 'Thursday') return "Kamis";
        elseif ($day == 'Friday') return "Jumat";
        elseif ($day == 'Saturday') return "Sabtu";
        elseif ($day == 'Sunday') return "Minggu";
    }

    public function _x($sg, $pl, $count)
    {
        if ($count == "1") return sprintf($sg, $count);
        elseif ($count > 1) return sprintf($pl, $count);
    }

    public function SendEmail($email, $name, $param)
    {
        try {
            $notif = DB::table('notificationtemplates')->where('name', $name)->first();
            $subject = $notif->subject;
            $msg = $notif->message;
            $username = DB::table('user')->where('email', $email)->value('name');
            $data['mailname'] = $name;
            $data['msg'] = $msg;
            $data['subject'] = $subject;
            $data['name'] = $username;

            (($name == 'password reset') ? $data['reset'] = $param : '');
            if ($name == 'interview') {
                $data['day'] = $param['hari'];
                $data['date'] = $param['tgl'];
                $data['time'] = $param['jam'];
                $data['position'] = $param['position'];
                $data['interviewer'] = $param['interviewer'];
            }

            Mail::send('email', $data, function ($message) use ($subject, $email) {
                $message->subject($subject);
                $message->from(config::where('name', 'email_from')->value('value'), config::where('name', 'name_from')->value('value'));
                $message->to($email);
                // if($CC!=""){
                //     $message->cc($CC);
                // }
                // if($BCC!=""){
                //     $message->bcc($BCC);
                // }
            });
            DB::table('emaillog')->insert(['user_id' => Session::get('id') ?? DB::table('user')->where('email', $email)->value('id'), 'to' => $email, 'subject' => $subject, 'timestamp' => now()]);
            return true;
        } catch (Exception $e) {
            session::flash('error', 'error');
            session::flash('message', $e->getMessage());
            return false;
        }
    }
    public function getSession(string $key)
    {
        return Session($key);
    }
    public function getSettings(string $group, string $name = '')
    {
        if (isset($name) && $name != '') {
            $value = setting::where('group', $group)->where('name', $name)->where('active', true)->firstOrFail()->value;
        } else {
            $query = setting::where('group', $group)->where('active', true)->get();
            foreach ($query as $item) {
                $value[$item->name] = $item->value;
            }
        }
        return $value;
    }
}
