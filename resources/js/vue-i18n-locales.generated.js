export default {
    "ar": {
        "verification": {
            "invalid": "الرمز الذي ادخلته غير صحيح",
            "sent": "تم ارسال رمز التفعيل بنجاح",
            "verified": "رقم الهاتف الخاص بك مفعل.",
            "attributes": {
                "user_id": "المستخدم",
                "phone": "رقم الهاتف",
                "code": "رمز التفعيل"
            }
        },
        "passwords": {
            "reset": "تمت إعادة تعيين كلمة المرور!",
            "sent": "تم إرسال تفاصيل استعادة كلمة المرور الخاصة بك إلى بريدك الإلكتروني!",
            "throttled": "الرجاء الإنتظار قبل إعادة المحاولة.",
            "token": "رمز استعادة كلمة المرور الذي أدخلته غير صحيح.",
            "user": "لم يتم العثور على أيّ حسابٍ بهذا العنوان الإلكتروني."
        },
        "dashboard": {
            "home": "الرئيسية",
            "documentation": "دليل شرح",
            "auth": {
                "logout": "تسجيل خروج",
                "login": {
                    "title": "تسجيل دخول",
                    "info": "يرجى التسجيل للدخول الى لوحة التحكم",
                    "email": "البريد الالكتروني",
                    "password": "كلمة المرور",
                    "remember": "البقاء متصلاً",
                    "submit": "تسجيل دخول",
                    "forget": "نسيت كلمة المرور"
                },
                "register": {
                    "title": "انشاء حساب",
                    "name": "الاسم",
                    "email": "البريد الالكتروني",
                    "password": "كلمة المرور",
                    "password_confirmation": "تأكيد كلمة المرور",
                    "submit": "تسجيل",
                    "login": "لدي حساب بالفعل"
                },
                "forget": {
                    "title": "نسيت كلمة المرور",
                    "info": "ادخل البريد الالكتروني الخاص بك",
                    "email": "البريد الالكتروني",
                    "submit": "ارسال رابط الاستعادة"
                },
                "reset": {
                    "title": "استعادة كلمة المرور",
                    "info": "ادخل كلمة المرور الجديدة",
                    "email": "البريد الالكتروني",
                    "password": "كلمة المرور",
                    "password_confirmation": "تأكيد كلمة المرور",
                    "submit": "استعادة كلمة المرور"
                },
                "confirm": {
                    "title": "التحقق من كلمة المرور",
                    "info": "يرجى تأكيد كلمة المرور قبل المتابعة",
                    "password": "كلمة المرور",
                    "submit": "تأكيد"
                }
            }
        },
        "supervisors": {
            "plural": "المشرفين",
            "singular": "المشرف",
            "empty": "لا توجد مشرفين",
            "select": "اختر المشرف",
            "permission": "ادارة المشرفين",
            "trashed": "المشرفين المحذوفين",
            "perPage": "عدد النتائج في الصفحة",
            "actions": {
                "list": "كل المشرفين",
                "show": "عرض",
                "create": "إضافة",
                "new": "إضافة",
                "edit": "تعديل  المشرف",
                "delete": "حذف المشرف",
                "save": "حفظ",
                "filter": "بحث"
            },
            "messages": {
                "created": "تم إضافة المشرف بنجاح .",
                "updated": "تم تعديل المشرف بنجاح .",
                "deleted": "تم حذف المشرف بنجاح ."
            },
            "attributes": {
                "name": "اسم المشرف",
                "phone": "رقم الهاتف",
                "email": "البريد الالكترونى",
                "created_at": "تاريخ الإنضمام",
                "old_password": "كلمة المرور القديمة",
                "password": "كلمة المرور",
                "password_confirmation": "تأكيد كلمة المرور",
                "type": "نوع المستخدم",
                "avatar": "الصورة الشخصية"
            },
            "dialogs": {
                "delete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف هذا المشرف ?",
                    "confirm": "حذف",
                    "cancel": "إلغاء"
                }
            }
        },
        "auth": {
            "failed": "بيانات الاعتماد هذه غير متطابقة مع البيانات المسجلة لدينا.",
            "password": "كلمة المرور التي ادخلتها غير صحيحة!",
            "throttle": "عدد كبير جدا من محاولات الدخول. يرجى المحاولة مرة أخرى بعد {seconds} ثانية.",
            "welcome": "أهلا بك",
            "login": "تسجيل الدخول",
            "attributes": {
                "code": "رمز التحقق",
                "token": "شفرة التحقق",
                "email": "البريد الالكتروني",
                "phone": "رقم الهاتف",
                "username": "البريد الالكترونى او رقم الهاتف",
                "password": "كلمة المرور"
            },
            "messages": {
                "forget-password-code-sent": "لفد تم ارسال رمز استعادة كلمة المرور على بريدك الالكتروني"
            },
            "emails": {
                "forget-password": {
                    "subject": "استعادة كلمة المرور",
                    "greeting": "عزيزي {user}",
                    "line": "رمز استعادة كلمة المرور الخاص بك هو {code} صالح لمدة {minutes} دقائق",
                    "footer": "شكراً لاستخدامك لتطبيقنا",
                    "salutation": "مع تحيات فريق عمل {app}"
                },
                "reset-password": {
                    "subject": "استعادة كلمة المرور",
                    "greeting": "عزيزي {user}",
                    "line": "تم تغيير كلمة المرور الخاصة بك",
                    "footer": "شكراً لاستخدامك لتطبيقنا",
                    "salutation": "مع تحيات فريق عمل {app}"
                }
            }
        },
        "roles": {
            "singular": "الصلاحية",
            "plural": "الصلاحيات",
            "empty": "لا يوجد صلاحيات حتى الان",
            "count": "عدد الصلاحيات",
            "search": "بحث",
            "select": "اختر الصلاحية",
            "permission": "ادارة الصلاحيات",
            "trashed": "الصلاحيات المحذوفين",
            "perPage": "عدد النتائج بالصفحة",
            "filter": "ابحث عن صلاحية",
            "actions": {
                "list": "عرض الكل",
                "create": "اضافة صلاحية",
                "show": "عرض الصلاحية",
                "edit": "تعديل الصلاحية",
                "delete": "حذف الصلاحية",
                "options": "خيارات",
                "save": "حفظ",
                "filter": "بحث"
            },
            "messages": {
                "created": "تم اضافة الصلاحية بنجاح.",
                "updated": "تم تعديل الصلاحية بنجاح.",
                "deleted": "تم حذف الصلاحية بنجاح.",
                "restored": "تم استعادة الصلاحية بنجاح."
            },
            "attributes": {
                "name": "اسم الصلاحية",
                "%name%": "اسم الصلاحية",
                "created_at": "اضافة في",
                "deleted_at": "حذف في"
            },
            "dialogs": {
                "delete": {
                    "title": "تحذير !",
                    "info": "هل انت متأكد انك تريد حذف الصلاحية",
                    "confirm": "حذف",
                    "cancel": "الغاء"
                },
                "restore": {
                    "title": "تحذير !",
                    "info": "هل انت متأكد انك تريد استعادة هذا الصلاحية",
                    "confirm": "استعادة",
                    "cancel": "الغاء"
                },
                "forceDelete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف هذا الصلاحية نهائياً?",
                    "confirm": "حذف نهائي",
                    "cancel": "الغاء"
                }
            }
        },
        "settings": {
            "plural": "الاعدادات",
            "permission": "التحكم بإعدادات الموقع",
            "actions": {
                "save": "حفظ"
            },
            "tabs": {
                "main": "اعدادات الموقع",
                "contacts": "بيانات التواصل",
                "mail": "بيانات رسائل البريد",
                "pusher": "بيانات ال Pusher",
                "home": "ألصفحه الرئيسية",
                "about": "صفحة من نحن",
                "service": "صفحة الخدمات",
                "terms": "صفحة الشروط والاحكام",
                "privacy": "صفحة سياسة الموقع",
                "advanced": "إعدادات متقدمة"
            },
            "dashboard_templates": {
                "adminlte3": "Adminlte 3",
                "vali": "Vali"
            },
            "frontend_templates": [],
            "messages": {
                "updated": "تم تحديث اعدادات الموقع بنجاح."
            },
            "attributes": {
                "name": "اسم الموقع",
                "%name%": "اسم الموقع",
                "dashboard_template": "قالب لوحة التحكم",
                "frontend_template": "قالب الموقع",
                "facebook": "رابط الفيسبوك",
                "twitter": "رابط التويتر",
                "instagram": "رابط الانستجرام",
                "snapchat": "رابط السناب شات",
                "phone": "رقم الهاتف للتواصل",
                "email": "البريد الالكتروني للتواصل",
                "copyright": "حقوق النشر",
                "%copyright%": "حقوق النشر",
                "logo": "اللوجو",
                "favicon": "الايقونة",
                "about": "من نحن",
                "terms": "الشروط والاحكام",
                "privacy": "سياسة الموقع",
                "mail_driver": "Mail Driver",
                "mail_host": "Mail Host",
                "mail_port": "Mail Port",
                "mail_username": "Mail Username",
                "mail_password": "Mail Password",
                "mail_encryption": "Mail Encryption",
                "mail_from_address": "Mail From Address",
                "mail_from_name": "Mail From Name",
                "broadcast_driver": "Broadcast Driver",
                "pusher_app_id": "Pusher App ID",
                "pusher_app_key": "Pusher App Key",
                "pusher_app_secret": "Pusher App Secret",
                "pusher_app_cluster": "Pusher App Cluster",
                "pusher_app_host": "Pusher App Host",
                "pusher_app_port": "Pusher App Port",
                "pusher_app_encrypted": "Pusher App Encrypted",
                "pusher_app_scheme": "Pusher App Scheme",
                "android_version": "اصدار الاندرويد",
                "iphone_version": "اصدار الايفون",
                "android_url": "رابط الاندرويد",
                "iphone_url": "رابط الايفون",
                "loginLogo": "لوجو تسجيل الدخول",
                "loginBackground": "خلفية تسجيل الدخول",
                "welcome_comment": "تعليق صفحة الترحيب",
                "login_background_color": "لون خلفية الدخول",
                "login_background_op": "شفافية لون خلفية الدخول",
                "login_side_text": "النص الجانبي للدخول"
            }
        },
        "pagination": {
            "previous": "&laquo; السابق",
            "next": "التالي &raquo;"
        },
        "permissions": {
            "plural": "الصلاحيات"
        },
        "cities": {
            "plural": "المدن",
            "singular": "المدينة",
            "empty": "لا توجد مدن",
            "select": "اختر المدينة",
            "select-type": "الكل",
            "perPage": "عدد النتائج في الصفحة",
            "filter": "ابحث عن مدينة",
            "actions": {
                "list": "عرض الكل ",
                "show": "عرض",
                "create": "إضافة مدينة جديدة",
                "edit": "تعديل  المدينة",
                "delete": "حذف المدينة",
                "save": "حفظ",
                "filter": "بحث"
            },
            "messages": {
                "created": "تم إضافة المدينة بنجاح .",
                "updated": "تم تعديل المدينة بنجاح .",
                "deleted": "تم حذف المدينة بنجاح ."
            },
            "attributes": {
                "name": "اسم المدينة",
                "%name%": "اسم المدينة",
                "country_id": "الدولة",
                "shipping_price": "سعر الشحن"
            },
            "default": {
                "name": "اسم المدينة"
            },
            "dialogs": {
                "delete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف هذه المدينة ?",
                    "confirm": "حذف",
                    "cancel": "إلغاء"
                }
            }
        },
        "check-all": {
            "actions": {
                "delete": "حذف المحدد",
                "restore": "استعادة المحدد"
            },
            "messages": {
                "deleted": "تم حذف {type} بنجاح.",
                "restored": "تم استعادة {type} بنجاح."
            },
            "dialogs": {
                "delete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف {type}",
                    "confirm": "حذف",
                    "cancel": "إلغاء"
                },
                "restore": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد استعادة {type}",
                    "confirm": "استعادة",
                    "cancel": "إلغاء"
                },
                "forceDelete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف {type} نهائياً",
                    "confirm": "حذف نهائي",
                    "cancel": "إلغاء"
                }
            }
        },
        "backup": {
            "download": "تحميل قاعدة البيانات",
            "not-found": "لا يوجد نسخة احتياطية"
        },
        "areas": {
            "plural": " الحي",
            "singular": " الحي",
            "empty": "لا توجد مناطق",
            "select": "اختر  الحي",
            "select-type": "الكل",
            "perPage": "عدد النتائج في الصفحة",
            "filter": "ابحث عن قضاء",
            "actions": {
                "list": "عرض الكل ",
                "show": "عرض",
                "create": "إضافةقضاء جديدة",
                "edit": "تعديل الحي",
                "delete": "حذف  الحي",
                "save": "حفظ",
                "filter": "بحث"
            },
            "messages": {
                "created": "تم إضافة  الحي بنجاح .",
                "updated": "تم تعديل  الحي بنجاح .",
                "deleted": "تم حذف  الحي بنجاح ."
            },
            "attributes": {
                "name": "اسم  الحي",
                "%name%": "اسم  الحي",
                "city_id": "قضاء",
                "shipping_price": "سعر الشحن"
            },
            "default": {
                "name": "اسم  الحي"
            },
            "dialogs": {
                "delete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف هذه  الحي ?",
                    "confirm": "حذف",
                    "cancel": "إلغاء"
                }
            }
        },
        "users": {
            "plural": "العضويات",
            "since": "عضو {date}",
            "profile": "الملف الشخصي",
            "verified": "مفعل",
            "unverified": "غير مفعل",
            "types": {
                "admin": "مسئول",
                "supervisor": "مشرف",
                "customer": "عميل"
            },
            "impersonate": {
                "go": "الذهاب للوحة التحكم",
                "leave": "العودة للحساب السابق"
            }
        },
        "excel": {
            "actions": {
                "import": "استيراد اكسل",
                "export": "تصدير اكسل",
                "example_export": "مثال اكسل"
            },
            "messages": {
                "imported": "تم استيراد {type} بنجاح",
                "import_failed": "هناك مشكله في استيراد {type} راجع البيانات"
            },
            "attributes": {
                "file": "الملف"
            },
            "dialogs": {
                "import": {
                    "title": "Warning !",
                    "info": "هل انت متأكد انك تريد استيراد {type} ?",
                    "confirm": "استيراد",
                    "cancel": "إلغاء"
                }
            }
        },
        "notifications": {
            "plural": "الاشعارات",
            "singular": "الاشعار",
            "have": "الاشعارات التي لديك",
            "empty": "لا توجد إشعارات",
            "title": "ارسال اشعار",
            "notifiables": "المستلمين",
            "check_all": "إختيار الكل",
            "sent": "تم ارسال الاشعار بنجاح",
            "read": "تم قراءة كل الاشعارات",
            "deleted_all": "حذف كل الإشعارات",
            "choose": "اختر",
            "messages": {
                "deleted": "تم الحذف بنجاح",
                "account-verification": "تم تفعيل الحساب",
                "contact-created": "تم إرسال الرسالة بنجاح",
                "account-switched": "تم تبديل الحساب بنجاح"
            },
            "actions": {
                "list": "عرض الكل ",
                "show": "عرض",
                "create": "إضافة إشعار جديد",
                "delete": "حذف الإشعار",
                "save": "حفظ"
            },
            "attributes": {
                "title": "العنوان",
                "body": "المحتوى",
                "cities": "مدن",
                "areas": "مناطق",
                "customers": "العملاء",
                "owners": "الملاك",
                "page_id": "الصفحة",
                "offer_id": "العرض",
                "created_at": "التاريخ",
                "city_id": "مدن العملاء",
                "cities_customers": "المدن",
                "cities_owners": "المدن"
            },
            "dialogs": {
                "delete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف هذا الإشعار ?",
                    "confirm": "حذف",
                    "cancel": "إلغاء"
                }
            }
        },
        "validation": {
            "accepted": "يجب قبول {attribute}.",
            "active_url": "{attribute} لا يُمثّل رابطًا صحيحًا.",
            "after": "يجب على {attribute} أن يكون تاريخًا لاحقًا للتاريخ {date}.",
            "after_or_equal": "{attribute} يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ {date}.",
            "alpha": "يجب أن لا يحتوي {attribute} سوى على حروف.",
            "alpha_dash": "يجب أن لا يحتوي {attribute} سوى على حروف، أرقام ومطّات.",
            "alpha_num": "يجب أن يحتوي {attribute} على حروفٍ وأرقامٍ فقط.",
            "array": "يجب أن يكون {attribute} ًمصفوفة.",
            "before": "يجب على {attribute} أن يكون تاريخًا سابقًا للتاريخ {date}.",
            "before_or_equal": "{attribute} يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ {date}.",
            "between": {
                "numeric": "يجب أن تكون قيمة {attribute} بين {min} و {max}.",
                "file": "يجب أن يكون حجم الملف {attribute} بين {min} و {max} كيلوبايت.",
                "string": "يجب أن يكون عدد حروف النّص {attribute} بين {min} و {max}.",
                "array": "يجب أن يحتوي {attribute} على عدد من العناصر بين {min} و {max}."
            },
            "boolean": "يجب أن تكون قيمة {attribute} إما true أو false .",
            "confirmed": "حقل التأكيد غير مُطابق للحقل {attribute}.",
            "date": "{attribute} ليس تاريخًا صحيحًا.",
            "date_equals": "يجب أن يكون {attribute} مطابقاً للتاريخ {date}.",
            "date_format": "لا يتوافق {attribute} مع الشكل {format}.",
            "different": "يجب أن يكون الحقلان {attribute} و {other} مُختلفين.",
            "digits": "يجب أن يحتوي {attribute} على {digits} رقمًا/أرقام.",
            "digits_between": "يجب أن يحتوي {attribute} بين {min} و {max} رقمًا/أرقام .",
            "dimensions": "الـ {attribute} يحتوي على أبعاد صورة غير صالحة.",
            "distinct": "للحقل {attribute} قيمة مُكرّرة.",
            "email": "يجب أن يكون {attribute} عنوان بريد إلكتروني صحيح البُنية.",
            "ends_with": "يجب أن ينتهي {attribute} بأحد القيم التالية: {values}",
            "exists": "القيمة المحددة {attribute} غير موجودة.",
            "file": "الـ {attribute} يجب أن يكون ملفا.",
            "filled": "{attribute} إجباري.",
            "gt": {
                "numeric": "يجب أن تكون قيمة {attribute} أكبر من {value}.",
                "file": "يجب أن يكون حجم الملف {attribute} أكبر من {value} كيلوبايت.",
                "string": "يجب أن يكون طول النّص {attribute} أكثر من {value} حروفٍ/حرفًا.",
                "array": "يجب أن يحتوي {attribute} على أكثر من {value} عناصر/عنصر."
            },
            "gte": {
                "numeric": "يجب أن تكون قيمة {attribute} مساوية أو أكبر من {value}.",
                "file": "يجب أن يكون حجم الملف {attribute} على الأقل {value} كيلوبايت.",
                "string": "يجب أن يكون طول النص {attribute} على الأقل {value} حروفٍ/حرفًا.",
                "array": "يجب أن يحتوي {attribute} على الأقل على {value} عُنصرًا/عناصر."
            },
            "image": "يجب أن يكون {attribute} صورةً.",
            "in": "{attribute} غير موجود.",
            "in_array": "{attribute} غير موجود في {other}.",
            "integer": "يجب أن يكون {attribute} عددًا صحيحًا.",
            "ip": "يجب أن يكون {attribute} عنوان IP صحيحًا.",
            "ipv4": "يجب أن يكون {attribute} عنوان IPv4 صحيحًا.",
            "ipv6": "يجب أن يكون {attribute} عنوان IPv6 صحيحًا.",
            "json": "يجب أن يكون {attribute} نصآ من نوع JSON.",
            "lt": {
                "numeric": "يجب أن تكون قيمة {attribute} أصغر من {value}.",
                "file": "يجب أن يكون حجم الملف {attribute} أصغر من {value} كيلوبايت.",
                "string": "يجب أن يكون طول النّص {attribute} أقل من {value} حروفٍ/حرفًا.",
                "array": "يجب أن يحتوي {attribute} على أقل من {value} عناصر/عنصر."
            },
            "lte": {
                "numeric": "يجب أن تكون قيمة {attribute} مساوية أو أصغر من {value}.",
                "file": "يجب أن لا يتجاوز حجم الملف {attribute} {value} كيلوبايت.",
                "string": "يجب أن لا يتجاوز طول النّص {attribute} {value} حروفٍ/حرفًا.",
                "array": "يجب أن لا يحتوي {attribute} على أكثر من {value} عناصر/عنصر."
            },
            "max": {
                "numeric": "يجب أن تكون قيمة {attribute} مساوية أو أصغر من {max}.",
                "file": "يجب أن لا يتجاوز حجم الملف {attribute} {max} كيلوبايت.",
                "string": "يجب أن لا يتجاوز طول النّص {attribute} {max} حروفٍ/حرفًا.",
                "array": "يجب أن لا يحتوي {attribute} على أكثر من {max} عناصر/عنصر."
            },
            "mimes": "يجب أن يكون ملفًا من نوع : {values}.",
            "mimetypes": "يجب أن يكون ملفًا من نوع : {values}.",
            "min": {
                "numeric": "يجب أن تكون قيمة {attribute} مساوية أو أكبر من {min}.",
                "file": "يجب أن يكون حجم الملف {attribute} على الأقل {min} كيلوبايت.",
                "string": "يجب أن يكون طول النص {attribute} على الأقل {min} حروفٍ/حرفًا.",
                "array": "يجب أن يحتوي {attribute} على الأقل على {min} عُنصرًا/عناصر."
            },
            "not_in": "العنصر {attribute} غير صحيح.",
            "not_regex": "صيغة {attribute} غير صحيحة.",
            "numeric": "يجب على {attribute} أن يكون رقمًا.",
            "password": "كلمة المرور غير صحيحة.",
            "present": "يجب تقديم {attribute}.",
            "regex": "صيغة {attribute} .غير صحيحة.",
            "required": "{attribute} مطلوب.",
            "required_if": "{attribute} مطلوب في حال ما إذا كان {other} يساوي {value}.",
            "required_unless": "{attribute} مطلوب في حال ما لم يكن {other} يساوي {values}.",
            "required_with": "{attribute} مطلوب إذا توفّر {values}.",
            "required_with_all": "{attribute} مطلوب إذا توفّر {values}.",
            "required_without": "{attribute} مطلوب إذا لم يتوفّر {values}.",
            "required_without_all": "{attribute} مطلوب إذا لم يتوفّر {values}.",
            "same": "يجب أن يتطابق {attribute} مع {other}.",
            "size": {
                "numeric": "يجب أن تكون قيمة {attribute} مساوية لـ {size}.",
                "file": "يجب أن يكون حجم الملف {attribute} {size} كيلوبايت.",
                "string": "يجب أن يحتوي النص {attribute} على {size} حروفٍ/حرفًا بالضبط.",
                "array": "يجب أن يحتوي {attribute} على {size} عنصرٍ/عناصر بالضبط."
            },
            "starts_with": "يجب أن يبدأ {attribute} بأحد القيم التالية: {values}",
            "string": "يجب أن يكون {attribute} نصًا.",
            "timezone": "يجب أن يكون {attribute} نطاقًا زمنيًا صحيحًا.",
            "unique": "قيمة {attribute} مُستخدمة من قبل.",
            "uploaded": "فشل في تحميل الـ {attribute}.",
            "url": "صيغة الرابط {attribute} غير صحيحة.",
            "uuid": "{attribute} يجب أن يكون بصيغة UUID سليمة.",
            "base64_image": "حقل {attribute} يجب ان يكون صورة من نوع base64",
            "phone": "يجب أن يحتوي الحقل {attribute} على رقم هاتف صحيح",
            "custom": {
                "attribute-name": {
                    "rule-name": "custom-message"
                }
            },
            "attributes": []
        },
        "categories": {
            "singular": "قسم ",
            "plural": "الأقسام ",
            "empty": "لا يوجد أقسام حتى الان",
            "count": "عدد أقسام ",
            "search": "بحث",
            "select": "اختر قسم ",
            "permission": "ادارة أقسام ",
            "trashed": "أقسام  المحذوفين",
            "perPage": "عدد النتائج بالصفحة",
            "filter": "ابحث عن قسم ",
            "actions": {
                "list": "عرض الكل",
                "create": "اضافة قسم ",
                "show": "عرض قسم ",
                "edit": "تعديل قسم ",
                "delete": "حذف قسم ",
                "options": "خيارات",
                "save": "حفظ",
                "filter": "بحث"
            },
            "messages": {
                "created": "تم اضافة قسم  بنجاح.",
                "updated": "تم تعديل قسم  بنجاح.",
                "deleted": "تم حذف قسم  بنجاح.",
                "restored": "تم استعادة قسم  بنجاح."
            },
            "attributes": {
                "name": "اسم قسم ",
                "image": "صورة قسم ",
                "%name%": "اسم قسم ",
                "created_at": "اضافة في",
                "deleted_at": "حذف في"
            },
            "dialogs": {
                "delete": {
                    "title": "تحذير !",
                    "info": "هل انت متأكد انك تريد حذف قسم ",
                    "confirm": "حذف",
                    "cancel": "الغاء"
                },
                "restore": {
                    "title": "تحذير !",
                    "info": "هل انت متأكد انك تريد استعادة هذا قسم ",
                    "confirm": "استعادة",
                    "cancel": "الغاء"
                },
                "forceDelete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف هذا قسم  نهائياً?",
                    "confirm": "حذف نهائي",
                    "cancel": "الغاء"
                }
            }
        },
        "customers": {
            "plural": "العملاء",
            "singular": "العميل",
            "empty": "لا توجد عملاء",
            "select": "اختر العميل",
            "permission": "ادارة العملاء",
            "trashed": "العملاء المحذوفين",
            "perPage": "عدد النتائج في الصفحة",
            "actions": {
                "list": "كل العملاء",
                "show": "عرض",
                "create": "إضافة",
                "new": "إضافة",
                "edit": "تعديل  العميل",
                "delete": "حذف العميل",
                "save": "حفظ",
                "filter": "بحث"
            },
            "messages": {
                "created": "تم إضافة العميل بنجاح .",
                "updated": "تم تعديل العميل بنجاح .",
                "deleted": "تم حذف العميل بنجاح .",
                "restored": "تم استعادة العميل بنجاح ."
            },
            "attributes": {
                "name": "اسم العميل",
                "phone": "رقم الهاتف",
                "email": "البريد الالكترونى",
                "created_at": "تاريخ الإنضمام",
                "old_password": "كلمة المرور القديمة",
                "password": "كلمة المرور",
                "password_confirmation": "تأكيد كلمة المرور",
                "type": "نوع المستخدم",
                "avatar": "الصورة الشخصية"
            },
            "dialogs": {
                "delete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف هذا العميل ?",
                    "confirm": "حذف",
                    "cancel": "إلغاء"
                },
                "restore": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد استعادة هذا العميل ?",
                    "confirm": "استعادة",
                    "cancel": "إلغاء"
                },
                "forceDelete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف هذا العميل نهائياً?",
                    "confirm": "حذف نهائي",
                    "cancel": "إلغاء"
                }
            }
        },
        "admins": {
            "plural": "المسئولين",
            "singular": "المسئول",
            "empty": "لا توجد مسئولين",
            "select": "اختر المسئول",
            "trashed": "المسئولين المحذوفين",
            "perPage": "عدد النتائج في الصفحة",
            "actions": {
                "list": "كل المسئولين",
                "show": "عرض",
                "create": "إضافة",
                "new": "إضافة",
                "edit": "تعديل  المسئول",
                "delete": "حذف المسئول",
                "save": "حفظ",
                "filter": "بحث"
            },
            "messages": {
                "created": "تم إضافة المسئول بنجاح .",
                "updated": "تم تعديل المسئول بنجاح .",
                "deleted": "تم حذف المسئول بنجاح .",
                "restored": "تم استعادة المسئول بنجاح ."
            },
            "attributes": {
                "name": "اسم المسئول",
                "phone": "رقم الهاتف",
                "email": "البريد الالكترونى",
                "created_at": "تاريخ الإنضمام",
                "old_password": "كلمة المرور القديمة",
                "password": "كلمة المرور",
                "password_confirmation": "تأكيد كلمة المرور",
                "type": "نوع المستخدم",
                "avatar": "الصورة الشخصية"
            },
            "dialogs": {
                "delete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف هذا المسئول ?",
                    "confirm": "حذف",
                    "cancel": "إلغاء"
                },
                "restore": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد استعادة هذا المسئول ?",
                    "confirm": "استعادة",
                    "cancel": "إلغاء"
                },
                "forceDelete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف هذا المسئول نهائياً?",
                    "confirm": "حذف نهائي",
                    "cancel": "إلغاء"
                }
            }
        },
        "feedback": {
            "singular": "الرسالة",
            "plural": "رسائل اتصل بنا",
            "empty": "لا يوجد رسائل حتى الان",
            "count": "عدد رسائل اتصل بنا",
            "search": "بحث",
            "select": "اختر الرسالة",
            "permission": "ادارة رسائل اتصل بنا",
            "perPage": "عدد النتائج بالصفحة",
            "filter": "ابحث عن رسالة",
            "actions": {
                "list": "عرض الكل",
                "create": "اضافة رسالة",
                "show": "عرض الرسالة",
                "edit": "تعديل الرسالة",
                "delete": "حذف الرسالة",
                "read": "تحديد كمقروء",
                "unread": "تحديد كغير مقروء",
                "options": "خيارات",
                "save": "حفظ",
                "filter": "بحث"
            },
            "messages": {
                "sent": "تم ارسال الرسالة بنجاح.",
                "deleted": "تم حذف الرسالة بنجاح."
            },
            "attributes": {
                "name": "الاسم",
                "phone": "رقم الهاتف",
                "email": "البريد الالكتروني",
                "message": "نص الرسالة",
                "read_at": "تاريخ القراءة",
                "read": "مقروءة",
                "unread": "غير مقروءة"
            },
            "dialogs": {
                "delete": {
                    "title": "تحذير !",
                    "info": "هل انت متأكد انك تريد حذف الرسالة",
                    "confirm": "حذف",
                    "cancel": "الغاء"
                }
            }
        },
        "select2": {
            "errorLoading": "لا يمكن تحميل النتائج",
            "inputTooLong": "الرجاء حذف {overChars} عناصر",
            "inputTooShort": "الرجاء اضافة {remainingChars} عناصر",
            "loadingMore": "جاري تحميل نتائج إضافية...",
            "maximumSelected": "تستطيع إختيار {maximum} بنود فقط",
            "noResults": "لم يتم العثور على أي نتائج",
            "searching": "جاري البحث …",
            "removeAllItems": "قم بإزالة كل العناصر"
        },
        "countries": {
            "singular": "الدولة",
            "plural": "الدول",
            "empty": "لا يوجد دول.",
            "count": "عدد الدول",
            "search": "بحث",
            "select": "اختر الدولة",
            "perPage": "عدد النتائج بالصفحة",
            "filter": "ابحث عن دولة",
            "actions": {
                "list": "عرض الكل",
                "create": "اضافة دولة",
                "show": "عرض الدولة",
                "edit": "تعديل الدولة",
                "delete": "حذف الدولة",
                "options": "خيارات",
                "save": "حفظ",
                "filter": "بحث"
            },
            "messages": {
                "created": "تم اضافة الدولة بنجاح.",
                "updated": "تم تعديل الدولة بنجاح.",
                "deleted": "تم حذف الدولة بنجاح."
            },
            "attributes": {
                "name": "اسم الدولة",
                "%name%": "اسم الدولة",
                "currency": "العملة",
                "%currency%": "العملة",
                "code": "كود الدولة",
                "key": "مفتاح الدولة",
                "flag": "صورة العلم",
                "is_default": "الافتراضية"
            },
            "dialogs": {
                "delete": {
                    "title": "تحذير !",
                    "info": "هل انت متأكد انك تريد حذف الدولة ؟",
                    "confirm": "حذف",
                    "cancel": "الغاء"
                }
            }
        },
        "frontend": {
            "navbar": {
                "home": "الرئيسيه",
                "about": "حولنا",
                "about_us": "حولنا",
                "our_team": "فريقنا",
                "services": "خدماتنا",
                "all_services": "جميع الخدمات",
                "portfolio": "معرض الاعمال",
                "contact": "اتصل بنا",
                "login": "تسجيل الدخول",
                "register": "تسجيل",
                "EN": "الانجليزيه",
                "AR": "العربية"
            },
            "about_home": {
                "know_more": "اعرف اكثر"
            },
            "plan": {
                "yourly": "سنوي",
                "monthly": "شهري",
                "month": "شهر",
                "your": "سنه",
                "kwd": "دينار كويتي",
                "buy_now": "اشتري الان"
            },
            "blog": {
                "title": "اقرأ",
                "subtitle": "آخر الأخبار والمدونات",
                "read_more": "اقرأ اكثر"
            },
            "work_flow": {
                "title": "سير العمل",
                "subtitle": "عملية العمل لدينا",
                "start_now": "ابداء الان"
            },
            "testmonials": {
                "title": "التوصيات",
                "subtitle": "ماذا يقول عملائنا"
            },
            "errors": {
                "title": "حدث خطاء ما",
                "des": "يرجي مراجعه البيانات والمحاوله مره اخري"
            }
        },
        "pages": {
            "plural": "الصفحات",
            "singular": "الصفحه",
            "empty": "لا توجد صفحات",
            "select": "اختر الصفحه",
            "select-type": "الكل",
            "perPage": "عدد النتائج في الصفحة",
            "filter": "ابحث عن صفحه",
            "actions": {
                "list": "عرض الكل ",
                "show": "عرض",
                "create": "إضافة صفحه جديدة",
                "edit": "تعديل  الصفحه",
                "delete": "حذف الصفحه",
                "save": "حفظ",
                "filter": "بحث"
            },
            "messages": {
                "created": "تم إضافة الصفحه بنجاح .",
                "updated": "تم تعديل الصفحه بنجاح .",
                "deleted": "تم حذف الصفحه بنجاح ."
            },
            "attributes": {
                "title": "اسم الصفحه",
                "%title%": "اسم الصفحه",
                "content": "محتوي الصفحه",
                "%content%": "محتوي الصفحه"
            },
            "default": {
                "name": "اسم الصفحه"
            },
            "dialogs": {
                "delete": {
                    "title": "تحذير !",
                    "info": "هل أنت متأكد انك تريد حذف هذه الصفحه ?",
                    "confirm": "حذف",
                    "cancel": "إلغاء"
                }
            }
        }
    },
    "en": {
        "verification": {
            "invalid": "The verification code is invalid.",
            "sent": "The verification code has been sent successfully.",
            "verified": "Your phone number already verified.",
            "attributes": {
                "user_id": "User",
                "phone": "Phone",
                "code": "Code"
            }
        },
        "passwords": {
            "reset": "Your password has been reset!",
            "sent": "We have e-mailed your password reset link!",
            "throttled": "Please wait before retrying.",
            "token": "This password reset token is invalid.",
            "user": "We can't find a user with that e-mail address."
        },
        "dashboard": {
            "home": "Dashboard",
            "documentation": "Documentation",
            "auth": {
                "logout": "Logout",
                "login": {
                    "title": "Login",
                    "info": "Sign in to start your session",
                    "email": "Email",
                    "password": "Password",
                    "remember": "Remember Me",
                    "submit": "Login",
                    "forget": "I forget my password"
                },
                "register": {
                    "title": "Register",
                    "name": "Name",
                    "email": "Email",
                    "password": "Password",
                    "password_confirmation": "Password Confirm",
                    "submit": "Register",
                    "login": "I already have an account."
                },
                "forget": {
                    "title": "Forget Password",
                    "info": "Enter your email address",
                    "email": "Email",
                    "submit": "Send Reset Password Link"
                },
                "reset": {
                    "title": "Reset Password",
                    "info": "Enter your new password",
                    "email": "Email",
                    "password": "Password",
                    "password_confirmation": "Password Confirm",
                    "submit": "Reset Password"
                },
                "confirm": {
                    "title": "Password Confirm",
                    "info": "Please confirm password before continue.",
                    "password": "Password",
                    "submit": "Confirm"
                }
            }
        },
        "supervisors": {
            "plural": "Supervisors",
            "singular": "Supervisor",
            "empty": "There are no supervisors",
            "select": "Select Supervisor",
            "trashed": "Trashed supervisors",
            "permission": "Manage Supervisors",
            "perPage": "Count Results Per Page",
            "actions": {
                "list": "List Supervisors",
                "show": "Show Supervisor",
                "create": "Create",
                "new": "New",
                "edit": "Edit Supervisor",
                "delete": "Delete Supervisor",
                "save": "Save",
                "filter": "Filter"
            },
            "messages": {
                "created": "The supervisor has been created successfully.",
                "updated": "The supervisor has been updated successfully.",
                "deleted": "The supervisor has been deleted successfully."
            },
            "attributes": {
                "name": "Name",
                "phone": "Phone",
                "email": "Email",
                "created_at": "The Date Of Join",
                "old_password": "Old Password",
                "password": "Password",
                "password_confirmation": "Password Confirmation",
                "type": "User Type",
                "avatar": "Avatar"
            },
            "dialogs": {
                "delete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to delete the supervisor ?",
                    "confirm": "Delete",
                    "cancel": "Cancel"
                }
            }
        },
        "auth": {
            "failed": "These credentials do not match our records.",
            "password": "The password you entered is incorrect.",
            "throttle": "Too many login attempts. Please try again in {seconds} seconds.",
            "welcome": " Welcome",
            "login": "Login",
            "attributes": {
                "code": "Verification Code",
                "token": "Verification Token",
                "email": "Email",
                "phone": "phone",
                "username": "Email Or Phone",
                "password": "Password"
            },
            "messages": {
                "forget-password-code-sent": "The reset password code was sent to your E-mail address."
            },
            "emails": {
                "forget-password": {
                    "subject": "Reset Password",
                    "greeting": "Dear {user}",
                    "line": "Your password recovery code is {code} valid for {minutes} minutes",
                    "footer": "Thank you for using our application!",
                    "salutation": "Regards, {app}"
                },
                "reset-password": {
                    "subject": "Reset Password",
                    "greeting": "Dear {user}",
                    "line": "Your password has been reset successfully.",
                    "footer": "Thank you for using our application!",
                    "salutation": "Regards, {app}"
                }
            }
        },
        "roles": {
            "singular": "Role",
            "plural": "Roles",
            "empty": "There are no roles yet.",
            "count": "Roles Count.",
            "search": "Search",
            "select": "Select Role",
            "permission": "Manage roles",
            "trashed": "Trashed roles",
            "perPage": "Results Per Page",
            "filter": "Search for role",
            "actions": {
                "list": "List All",
                "create": "Create a new role",
                "show": "Show role",
                "edit": "Edit role",
                "delete": "Delete role",
                "options": "Options",
                "save": "Save",
                "filter": "Filter"
            },
            "messages": {
                "created": "The role has been created successfully.",
                "updated": "The role has been updated successfully.",
                "deleted": "The role has been deleted successfully.",
                "restored": "The role has been restored successfully."
            },
            "attributes": {
                "name": "Role name",
                "%name%": "Role name",
                "created_at": "Created At",
                "deleted_at": "Deleted At"
            },
            "dialogs": {
                "delete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to delete the role?",
                    "confirm": "Delete",
                    "cancel": "Cancel"
                },
                "restore": {
                    "title": "Warning !",
                    "info": "Are you sure you want to restore the role?",
                    "confirm": "Restore",
                    "cancel": "Cancel"
                },
                "forceDelete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to force delete the role?",
                    "confirm": "Force",
                    "cancel": "Cancel"
                }
            }
        },
        "settings": {
            "plural": "Settings",
            "permission": "Manage Settings",
            "actions": {
                "save": "Save"
            },
            "tabs": {
                "main": "Main Settings",
                "contacts": "Contact Information",
                "mail": "Mail Credentials",
                "pusher": "Pusher Credentials",
                "about": "About Us",
                "service": "Service",
                "terms": "Terms & Conditions",
                "privacy": "Privacy Policy"
            },
            "dashboard_templates": {
                "adminlte3": "Adminlte 3",
                "vali": "Vali"
            },
            "frontend_templates": [],
            "messages": {
                "updated": "Application settings has been updated successfully."
            },
            "attributes": {
                "name": "Application Name",
                "%name%": "Application Name",
                "dashboard_template": "Dashboard Template",
                "frontend_template": "Frontend Template",
                "facebook": "Facebook",
                "twitter": "Twitter",
                "instagram": "Instagram",
                "snapchat": "Snapchat",
                "apple": "Apple Link",
                "android": "Android Link",
                "phone": "Contact Phone",
                "email": "Contact E-mail",
                "copyright": "Copyright",
                "%copyright%": "Copyright",
                "logo": "Logo",
                "favicon": "Favicon",
                "about": "About Us",
                "terms": "Terms & Conditions",
                "privacy": "Privacy Policy",
                "mail_driver": "Mail Driver",
                "mail_host": "Mail Host",
                "mail_port": "Mail Port",
                "mail_username": "Mail Username",
                "mail_password": "Mail Password",
                "mail_encryption": "Mail Encryption",
                "mail_from_address": "Mail From Address",
                "mail_from_name": "Mail From Name",
                "broadcast_driver": "Broadcast Driver",
                "pusher_app_id": "Pusher App ID",
                "pusher_app_key": "Pusher App Key",
                "pusher_app_secret": "Pusher App Secret",
                "pusher_app_cluster": "Pusher App Cluster",
                "pusher_app_host": "Pusher App Host",
                "pusher_app_port": "Pusher App Port",
                "pusher_app_encrypted": "Pusher App Encrypted",
                "pusher_app_scheme": "Pusher App Scheme",
                "about_home_title": "About Home : Title",
                "about_home_subtitle": "About Home : SubTitle",
                "about_home_des": "About Home : Description",
                "about_home_youtube_link": "About Home : Youtube Video Link",
                "about_home_img": "About Home : Image",
                "online_business_title": "Online Business : Title",
                "online_business_subtitle": "Online Business : SubTitle",
                "online_business_des": "Online Business : Description",
                "online_business_img": "Online Business : Image",
                "online_business_feature": "Online Business : Feature",
                "online_business_feature_img_1": "Online Business : Feature Image 1",
                "online_business_feature_img_2": "Online Business : Feature Image 2",
                "online_business_feature_img_3": "Online Business : Feature Image 3",
                "online_business_feature_img_4": "Online Business : Feature Image 4",
                "work_flow_step": "Work Flow : Step",
                "work_flow_step_img_1": "Work Flow : Step Image 1",
                "work_flow_step_img_2": "Work Flow : Step Image 2",
                "work_flow_step_img_3": "Work Flow : Step Image 3",
                "work_flow_step_img_4": "Work Flow : Step Image 4",
                "countact_us_title": "Countact Us : Title",
                "countact_us_des": "Countact Us : Description",
                "linkedin": "LinkedIn",
                "whatsapp": "WhatsApp",
                "address": "Address",
                "service_title": "Home Service : Title",
                "service_subtitle": "Home Service : Sub Title",
                "service_des": "Home Service : Description",
                "about_title": "About Page : Title",
                "about_subtitle": "About Page : SubTitle",
                "about_des": "About Page : Description",
                "about_img": "About Page : Image",
                "about_background_img": "About Page : Background Image",
                "us_the_best_background_img": "About Page : Us The Best : Background Image",
                "us_the_best_title": "About Page : Us The Best : Title",
                "us_the_best_subtitle": "About Page : Us The Best : Sub Title",
                "us_the_best_des": "About Page : Us The Best : Description",
                "work_together_title": "About Page : Work Together : Title",
                "work_together_subtitle": "About Page : Work Together : Sub Title",
                "work_together_img": "About Page : Work Together : Image",
                "work_together_reasons": "About Page : Work Together : Reasons",
                "service_page_title": " صفحة الخدمات : العنوان الرئيسي",
                "service_page_background_img": " صفحة الخدمات : الصوره الخلفيه",
                "best_match_img": " صفحة الخدمات : قسم لماذا نحن الأنسب : الصورة الجانبيه",
                "best_match_title": " صفحة الخدمات : قسم لماذا نحن الأنسب : العنوان الرئيسي",
                "best_match_des": " صفحة الخدمات : قسم لماذا نحن الأنسب : الوصف",
                "best_match_reasons": "صفحة الخدمات : قسم لماذا نحن الأنسب : سبب",
                "contact_page_background_img": "صفحة اتصل بنا : الصوره الخلفيه",
                "contact_page_phone_icon": "صفحة اتصل بنا : ايقونه الهاتف",
                "contact_page_email_icon": "صفحة اتصل بنا : ايقونه البريد الالكتروني",
                "contact_page_location_icon": "صفحة اتصل بنا : ايقونه العنوان",
                "contact_page_title": "صفحة اتصل بنا : عنوان الصفحه",
                "contact_page_phone_des": "صفحة اتصل بنا : وصف الهاتف",
                "contact_page_email_des": "صفحة اتصل بنا : وصف البريد الالكتروني",
                "contact_page_location_des": "صفحة اتصل بنا : وصف العنوان",
                "get_in_touch_subtitle": "صفحة اتصل بنا : قسم ابقي علي تواصل : العنوان الفرعي ",
                "get_in_touch_title": "صفحة اتصل بنا : قسم ابقي علي تواصل : العنوان الرئيسي ",
                "get_in_touch_des": "صفحة اتصل بنا : قسم ابقي علي تواصل : العنوان الوصف ",
                "android_version": "android version",
                "iphone_version": "iphone version",
                "android_url": "android url",
                "iphone_url": "iphone url",
                "loginLogo": "Login Logo",
                "loginBackground": "Login Background",
                "welcome_comment": "Welcome Comment",
                "login_background_color": "Login Background Color",
                "login_background_op": "Login Background Opacity",
                "login_side_text": "Side Login Text",
                "owner_percentage": "Default percentage for owners",
                "tax_percentage": "Tax percentage"
            }
        },
        "pagination": {
            "previous": "&laquo; Previous",
            "next": "Next &raquo;"
        },
        "permissions": {
            "plural": "Permissions",
            "manage.supervisors": "Manage Supervisors",
            "manage.customers": "Manage Customers",
            "manage.feedback": "Manage Feedback",
            "manage.settings": "Manage Settings"
        },
        "cities": {
            "singular": "City",
            "plural": "Cities",
            "empty": "There are no cities yet.",
            "count": "Cities count",
            "search": "Search",
            "select": "Select City",
            "perPage": "Cities Per Page",
            "filter": "Search for city",
            "actions": {
                "list": "List all",
                "create": "Create City",
                "show": "Show City",
                "edit": "Edit City",
                "delete": "Delete City",
                "options": "Options",
                "save": "Save",
                "close": "Close"
            },
            "messages": {
                "created": "The city has been created successfully.",
                "updated": "The city has been updated successfully.",
                "deleted": "The city has been deleted successfully."
            },
            "attributes": {
                "name": "City Name",
                "%name%": "City Name",
                "country_id": "Country",
                "shipping_price": "Shipping Price"
            },
            "dialogs": {
                "delete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to delete the city ?",
                    "confirm": "Delete",
                    "cancel": "Cancel"
                }
            }
        },
        "check-all": {
            "actions": {
                "delete": "Delete Selected"
            },
            "messages": {
                "deleted": "The {type} has been selected successfully."
            },
            "dialogs": {
                "delete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to delete the {type} ?",
                    "confirm": "Delete",
                    "cancel": "Cancel"
                }
            }
        },
        "backup": {
            "download": "Download Database",
            "not-found": "There are no backups!"
        },
        "users": {
            "plural": "Accounts",
            "since": "Member since {date}",
            "profile": "Profile",
            "verified": "Verified",
            "unverified": "Unverified",
            "types": {
                "admin": "Admin",
                "supervisor": "Supervisor",
                "customer": "Customer"
            },
            "impersonate": {
                "go": "Go To Dashboard",
                "leave": "Back To Previous Account"
            }
        },
        "excel": {
            "actions": {
                "import": "Import Excel",
                "export": "Export Excel",
                "example_export": "Sample Excel"
            },
            "messages": {
                "imported": "The {type} has been selected successfully.",
                "import_failed": "There is a problem importing {type} see data"
            },
            "attributes": {
                "file": "File"
            },
            "dialogs": {
                "import": {
                    "title": "Warning !",
                    "info": "Are you sure you want to Import Excel in the {type} ?",
                    "confirm": "Import",
                    "cancel": "Cancel"
                }
            }
        },
        "validation": {
            "accepted": "The {attribute} must be accepted.",
            "active_url": "The {attribute} is not a valid URL.",
            "after": "The {attribute} must be a date after {date}.",
            "after_or_equal": "The {attribute} must be a date after or equal to {date}.",
            "alpha": "The {attribute} may only contain letters.",
            "alpha_dash": "The {attribute} may only contain letters, numbers, dashes and underscores.",
            "alpha_num": "The {attribute} may only contain letters and numbers.",
            "array": "The {attribute} must be an array.",
            "before": "The {attribute} must be a date before {date}.",
            "before_or_equal": "The {attribute} must be a date before or equal to {date}.",
            "between": {
                "numeric": "The {attribute} must be between {min} and {max}.",
                "file": "The {attribute} must be between {min} and {max} kilobytes.",
                "string": "The {attribute} must be between {min} and {max} characters.",
                "array": "The {attribute} must have between {min} and {max} items."
            },
            "boolean": "The {attribute} field must be true or false.",
            "confirmed": "The {attribute} confirmation does not match.",
            "date": "The {attribute} is not a valid date.",
            "date_equals": "The {attribute} must be a date equal to {date}.",
            "date_format": "The {attribute} does not match the format {format}.",
            "different": "The {attribute} and {other} must be different.",
            "digits": "The {attribute} must be {digits} digits.",
            "digits_between": "The {attribute} must be between {min} and {max} digits.",
            "dimensions": "The {attribute} has invalid image dimensions.",
            "distinct": "The {attribute} field has a duplicate value.",
            "email": "The {attribute} must be a valid email address.",
            "ends_with": "The {attribute} must end with one of the following: {values}.",
            "exists": "The selected {attribute} is invalid.",
            "file": "The {attribute} must be a file.",
            "filled": "The {attribute} field must have a value.",
            "gt": {
                "numeric": "The {attribute} must be greater than {value}.",
                "file": "The {attribute} must be greater than {value} kilobytes.",
                "string": "The {attribute} must be greater than {value} characters.",
                "array": "The {attribute} must have more than {value} items."
            },
            "gte": {
                "numeric": "The {attribute} must be greater than or equal {value}.",
                "file": "The {attribute} must be greater than or equal {value} kilobytes.",
                "string": "The {attribute} must be greater than or equal {value} characters.",
                "array": "The {attribute} must have {value} items or more."
            },
            "image": "The {attribute} must be an image.",
            "in": "The selected {attribute} is invalid.",
            "in_array": "The {attribute} field does not exist in {other}.",
            "integer": "The {attribute} must be an integer.",
            "ip": "The {attribute} must be a valid IP address.",
            "ipv4": "The {attribute} must be a valid IPv4 address.",
            "ipv6": "The {attribute} must be a valid IPv6 address.",
            "json": "The {attribute} must be a valid JSON string.",
            "lt": {
                "numeric": "The {attribute} must be less than {value}.",
                "file": "The {attribute} must be less than {value} kilobytes.",
                "string": "The {attribute} must be less than {value} characters.",
                "array": "The {attribute} must have less than {value} items."
            },
            "lte": {
                "numeric": "The {attribute} must be less than or equal {value}.",
                "file": "The {attribute} must be less than or equal {value} kilobytes.",
                "string": "The {attribute} must be less than or equal {value} characters.",
                "array": "The {attribute} must not have more than {value} items."
            },
            "max": {
                "numeric": "The {attribute} may not be greater than {max}.",
                "file": "The {attribute} may not be greater than {max} kilobytes.",
                "string": "The {attribute} may not be greater than {max} characters.",
                "array": "The {attribute} may not have more than {max} items."
            },
            "mimes": "The {attribute} must be a file of type: {values}.",
            "mimetypes": "The {attribute} must be a file of type: {values}.",
            "min": {
                "numeric": "The {attribute} must be at least {min}.",
                "file": "The {attribute} must be at least {min} kilobytes.",
                "string": "The {attribute} must be at least {min} characters.",
                "array": "The {attribute} must have at least {min} items."
            },
            "multiple_of": "The {attribute} must be a multiple of {value}",
            "not_in": "The selected {attribute} is invalid.",
            "not_regex": "The {attribute} format is invalid.",
            "numeric": "The {attribute} must be a number.",
            "password": "The password is incorrect.",
            "present": "The {attribute} field must be present.",
            "regex": "The {attribute} format is invalid.",
            "required": "The {attribute} field is required.",
            "required_if": "The {attribute} field is required when {other} is {value}.",
            "required_unless": "The {attribute} field is required unless {other} is in {values}.",
            "required_with": "The {attribute} field is required when {values} is present.",
            "required_with_all": "The {attribute} field is required when {values} are present.",
            "required_without": "The {attribute} field is required when {values} is not present.",
            "required_without_all": "The {attribute} field is required when none of {values} are present.",
            "same": "The {attribute} and {other} must match.",
            "size": {
                "numeric": "The {attribute} must be {size}.",
                "file": "The {attribute} must be {size} kilobytes.",
                "string": "The {attribute} must be {size} characters.",
                "array": "The {attribute} must contain {size} items."
            },
            "starts_with": "The {attribute} must start with one of the following: {values}.",
            "string": "The {attribute} must be a string.",
            "timezone": "The {attribute} must be a valid zone.",
            "unique": "The {attribute} has already been taken.",
            "uploaded": "The {attribute} failed to upload.",
            "url": "The {attribute} format is invalid.",
            "uuid": "The {attribute} must be a valid UUID.",
            "phone": "The {attribute} field contains an invalid number.",
            "custom": {
                "attribute-name": {
                    "rule-name": "custom-message"
                }
            },
            "attributes": []
        },
        "categories": {
            "singular": "Category",
            "plural": "Categories",
            "empty": "There are no categories yet.",
            "count": "Categories Count.",
            "search": "Search",
            "select": "Select Category",
            "permission": "Manage categories",
            "trashed": "categories Trashed",
            "perPage": "Results Per Page",
            "filter": "Search for category",
            "actions": {
                "list": "List All",
                "create": "Create a new category",
                "show": "Show category",
                "edit": "Edit category",
                "delete": "Delete category",
                "options": "Options",
                "save": "Save",
                "filter": "Filter"
            },
            "messages": {
                "created": "The category has been created successfully.",
                "updated": "The category has been updated successfully.",
                "deleted": "The category has been deleted successfully.",
                "restored": "The category has been restored successfully."
            },
            "attributes": {
                "name": "Category name",
                "image": "Category Image",
                "%name%": "Category name",
                "created_at": "Created At",
                "deleted_at": "Deleted At"
            },
            "dialogs": {
                "delete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to delete the category?",
                    "confirm": "Delete",
                    "cancel": "Cancel"
                },
                "restore": {
                    "title": "Warning !",
                    "info": "Are you sure you want to restore the category?",
                    "confirm": "Restore",
                    "cancel": "Cancel"
                },
                "forceDelete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to force delete the category?",
                    "confirm": "Force",
                    "cancel": "Cancel"
                }
            }
        },
        "customers": {
            "plural": "Customers",
            "singular": "Customer",
            "empty": "There are no customers",
            "select": "Select Customer",
            "permission": "Manage Customers",
            "trashed": "Trashed Customers",
            "perPage": "Count Results Per Page",
            "actions": {
                "list": "List Customers",
                "show": "Show Customer",
                "create": "Create",
                "new": "New",
                "edit": "Edit Customer",
                "delete": "Delete Customer",
                "save": "Save",
                "filter": "Filter"
            },
            "messages": {
                "created": "The customer has been created successfully.",
                "updated": "The customer has been updated successfully.",
                "deleted": "The customer has been deleted successfully.",
                "restored": "The customer has been restored successfully."
            },
            "attributes": {
                "name": "Name",
                "phone": "Phone",
                "email": "Email",
                "created_at": "The Date Of Join",
                "old_password": "Old Password",
                "password": "Password",
                "password_confirmation": "Password Confirmation",
                "type": "User Type",
                "avatar": "Avatar"
            },
            "dialogs": {
                "delete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to delete the customer ?",
                    "confirm": "Delete",
                    "cancel": "Cancel"
                },
                "restore": {
                    "title": "Warning !",
                    "info": "Are you sure you want to restore the customer ?",
                    "confirm": "Restore",
                    "cancel": "Cancel"
                },
                "forceDelete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to force delete the customer ?",
                    "confirm": "Force",
                    "cancel": "Cancel"
                }
            }
        },
        "admins": {
            "plural": "Admins",
            "singular": "Admin",
            "empty": "There are no admins",
            "select": "Select Admin",
            "trashed": "Trashed Admins",
            "perPage": "Count Results Per Page",
            "actions": {
                "list": "List Admins",
                "show": "Show Admin",
                "create": "Create",
                "new": "New",
                "edit": "Edit Admin",
                "delete": "Delete Admin",
                "save": "Save",
                "filter": "Filter"
            },
            "messages": {
                "created": "The admin has been created successfully.",
                "updated": "The admin has been updated successfully.",
                "deleted": "The admin has been deleted successfully.",
                "restored": "The admin has been restored successfully."
            },
            "attributes": {
                "name": "Name",
                "phone": "Phone",
                "email": "Email",
                "created_at": "The Date Of Join",
                "old_password": "Old Password",
                "password": "Password",
                "password_confirmation": "Password Confirmation",
                "type": "User Type",
                "avatar": "Avatar"
            },
            "dialogs": {
                "delete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to delete the admin ?",
                    "confirm": "Delete",
                    "cancel": "Cancel"
                },
                "restore": {
                    "title": "Warning !",
                    "info": "Are you sure you want to restore the admin ?",
                    "confirm": "Restore",
                    "cancel": "Cancel"
                },
                "forceDelete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to force delete the admin ?",
                    "confirm": "Force",
                    "cancel": "Cancel"
                }
            }
        },
        "feedback": {
            "singular": "Feedback",
            "plural": "Feedback",
            "empty": "There are no feedback yet.",
            "count": "Feedback Count.",
            "search": "Search",
            "select": "Select Feedback",
            "permission": "Manage Feedback",
            "perPage": "Results Per Page",
            "filter": "Search for feedback",
            "actions": {
                "list": "List All",
                "create": "Create a new feedback",
                "show": "Show feedback",
                "edit": "Edit feedback",
                "delete": "Delete feedback",
                "read": "Mark As Read",
                "unread": "Mark As Unread",
                "options": "Options",
                "save": "Save",
                "filter": "Filter"
            },
            "messages": {
                "sent": "The feedback has been sent successfully.",
                "deleted": "The feedback has been deleted successfully."
            },
            "attributes": {
                "name": "Name",
                "phone": "Phone",
                "email": "Email",
                "message": "Message",
                "read_at": "Read at",
                "read": "Read",
                "unread": "Unread"
            },
            "dialogs": {
                "delete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to delete the feedback?",
                    "confirm": "Delete",
                    "cancel": "Cancel"
                }
            }
        },
        "select2": {
            "errorLoading": "The results could not be loaded.",
            "inputTooLong": "Please delete {overChars} characters",
            "inputTooShort": "Please enter {remainingChars} characters",
            "loadingMore": "Loading more results…",
            "maximumSelected": "You can only select {maximum} items",
            "noResults": "No results found",
            "searching": "Searching …",
            "removeAllItems": "Remove all items"
        },
        "countries": {
            "singular": "Country",
            "plural": "Countries",
            "empty": "There are no countries yet.",
            "count": "Countries count",
            "search": "Search",
            "select": "Select Country",
            "perPage": "Countries Per Page",
            "filter": "Search for country",
            "actions": {
                "list": "List all",
                "create": "Create Country",
                "show": "Show Country",
                "edit": "Edit Country",
                "delete": "Delete Country",
                "options": "Options",
                "save": "Save",
                "filter": "Filter"
            },
            "messages": {
                "created": "The country has been created successfully.",
                "updated": "The country has been updated successfully.",
                "deleted": "The country has been deleted successfully."
            },
            "attributes": {
                "name": "Country Name",
                "%name%": "Country Name",
                "currency": "Currency",
                "%currency%": "Currency",
                "code": "Country Code",
                "key": "Country Key",
                "flag": "Flag",
                "is_default": "Is Default"
            },
            "dialogs": {
                "delete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to delete the country ?",
                    "confirm": "Delete",
                    "cancel": "Cancel"
                }
            }
        },
        "frontend": {
            "navbar": {
                "home": "Home",
                "about": "About",
                "about_us": "About Us",
                "our_team": "Our Team",
                "services": "Services",
                "all_services": "All Services",
                "portfolio": "Portfolio",
                "contact": "Contact Us",
                "login": "Login",
                "register": "Register",
                "EN": "En",
                "AR": "AR"
            },
            "about_home": {
                "know_more": "Know More"
            },
            "work_flow": {
                "title": "Work Flow",
                "subtitle": "Our Working Process",
                "start_now": "Start Now"
            },
            "testmonials": {
                "title": "Testmonials",
                "subtitle": "Our Clients Says"
            },
            "plan": {
                "yourly": "Yourly",
                "monthly": "Monthly",
                "month": "Month",
                "your": "Your",
                "kwd": "kwd",
                "buy_now": "Buy Now"
            },
            "blog": {
                "title": "READ OUR",
                "subtitle": "Latest News & Blogs",
                "read_more": "READ More"
            },
            "errors": {
                "title": "Something went wrong",
                "des": "Please review the data and try again"
            }
        },
        "pages": {
            "singular": "Page",
            "plural": "Pages",
            "empty": "There are no Pages yet.",
            "count": "Pages count",
            "search": "Search",
            "select": "Select Page",
            "perPage": "Pages Per Page",
            "filter": "Search for Page",
            "actions": {
                "list": "List all",
                "create": "Create Page",
                "show": "Show Page",
                "edit": "Edit Page",
                "delete": "Delete Page",
                "options": "Options",
                "save": "Save",
                "filter": "Filter"
            },
            "messages": {
                "created": "The Page has been created successfully.",
                "updated": "The Page has been updated successfully.",
                "deleted": "The Page has been deleted successfully."
            },
            "attributes": {
                "title": "Page title",
                "%title%": "Page title",
                "content": "Page content",
                "%content%": "Page content"
            },
            "dialogs": {
                "delete": {
                    "title": "Warning !",
                    "info": "Are you sure you want to delete the Page ?",
                    "confirm": "Delete",
                    "cancel": "Cancel"
                }
            }
        }
    }
}
