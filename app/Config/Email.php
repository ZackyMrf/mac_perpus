<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    
        public string $fromEmail = 'fastix.id@gmail.com';
        public string $fromName = 'fastix.id';
        public string $recipients = '';
        public string $userAgent = 'CodeIgniter';
    
        public string $protocol = 'smtp';
        public string $SMTPHost = 'smtp.googlemail.com';
        public string $SMTPUser = 'fastix.id@gmail.com'; // Ganti dengan email Anda
        public string $SMTPPass = 'otan laqu rdyl tyki'; // Ganti dengan password aplikasi jika menggunakan 2FA
        public int $SMTPPort = 587; // Gunakan 587 untuk TLS
        public string $SMTPCrypto = 'tls'; // Gunakan TLS // Ganti dengan 'tls'
        public int $SMTPTimeout = 60;
        public bool $wordWrap = true;
        public string $mailType = 'html';
        public string $charset = 'UTF-8';
        public string $CRLF = "\r\n";
        public string $newline = "\r\n";
    
}

