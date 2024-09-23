<?php

namespace App\Services;

use App\Models\ContactMethod;

class ContactMethodService
{
    public function getContactMethods()
    {
        $contactMethods = [
            'email' => ContactMethod::pluck('email')->first(),
            'phone' => ContactMethod::pluck('phone')->first(),
            'facebook' => ContactMethod::pluck('facebook')->first(),
            'whatsapp' => ContactMethod::pluck('whatsapp')->first(),
            'telegram' => ContactMethod::pluck('telegram')->first(),
        ];

        $contactIcons = [];
        foreach ($contactMethods as $type => $value) {
            if ($value) { // Ensure there's a value before adding the link
                switch ($type) {
                    case 'whatsapp':
                        $iconClass = 'fab fa-whatsapp';
                        $link = "https://wa.me/{$value}";
                        break;
                    case 'telegram':
                        $iconClass = 'fab fa-telegram';
                        $link = "https://t.me/{$value}";
                        break;
                    case 'email':
                        $iconClass = 'fas fa-envelope';
                        $link = "mailto:{$value}";
                        break;
                    case 'phone':
                        $iconClass = 'fas fa-phone-alt';
                        $link = "tel:{$value}";
                        break;
                    case 'facebook':
                        $iconClass = 'fab fa-facebook';
                        $link = "https://facebook.com/{$value}";
                        break;
                    default:
                        $iconClass = 'fas fa-question';
                        $link = '#';
                        break;
                }

                $contactIcons[] = [
                    'iconClass' => $iconClass,
                    'link' => $link,
                    'value' => $value,
                ];
            }
        }

        return $contactIcons;
    }
}
