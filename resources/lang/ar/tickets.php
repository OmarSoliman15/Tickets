<?php

use App\Models\Ticket;

return [
    'plural' => 'التذاكر',
    'singular' => 'التذكرة',
    'empty' => 'لا يوجد تذاكر حتى الان',
    'select' => 'اختر التذكرة',
    'actions' => [
        'list' => 'عرض التذاكر',
        'show' => 'عرض',
        'create' => 'اضافة تذكرة جديد',
        'edit' => 'تعديل',
        'delete' => 'حذف',
        'shipping' => 'اسعار الشحن',
    ],
    'messages' => [
        'created' => 'تم اضافة التذكرة بنجاح.',
        'updated' => 'تم تعديل التذكرة بنجاح.',
        'deleted' => 'تم حذف التذكرة بنجاح.',
    ],
    'attributes' => [
        'avatar' => 'الصورة',
        'body' => 'المحتوى',
        'type' => 'نوع التذكرة',
        'status' => 'حالة التذكرة',
        'user_id' => 'المستخدم',
    ],
    'types' => [
        'select' => 'اختر الحالة',
        'options' => [
            Ticket::ENQUIRY => 'استفسار',
            Ticket::COMPLAINT=> 'شكوى',
        ],
    ],
    'statuses' => [
        'select' => 'اختر الحالة',
        'options' => [
            Ticket::ENABLE_STATUS => 'مفعلة',
            Ticket::DISABLE_STATUS => 'غير مفعلة',
        ],
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'انت على وشك حذف التذكرة !!',
            'info' => 'لا يمكنك التراجع عن هذه الخطوة!',
            'confirm' => 'تأكيد الحذف',
            'cancel' => 'الغاء الامر',
        ],
    ],
    'profile' => [
        'edit' => 'تعديل التذكرة',
    ],
];
