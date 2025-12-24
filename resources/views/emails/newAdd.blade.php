<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة محتوى جديد</title>
    <style>
        body {
            background-color: #f5f5f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1f2937;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 650px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #2563eb;
            color: #ffffff;
            text-align: center;
            padding: 25px;
            font-size: 24px;
            font-weight: bold;
        }

        .content {
            padding: 30px;
        }

        .content p {
            line-height: 1.6;
            margin: 15px 0;
        }

        .details {
            background-color: #f1f5f9;
            border-left: 4px solid #2563eb;
            padding: 20px;
            margin: 20px 0;
            border-radius: 6px;
        }

        .details p {
            margin: 8px 0;
        }

        .button {
            display: inline-block;
            background-color: #10b981;
            color: #ffffff;
            padding: 12px 25px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            margin: 20px 0;
            text-align: center;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #6b7280;
            padding: 20px;
            background-color: #f9fafb;
        }

        .footer a {
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        📰 تم إضافة محتوى جديد
    </div>
    <div class="content" style="font-family: Arial, sans-serif; line-height: 1.6; color:#1f2937;">
        <p>مرحباً،</p>
        <p>نود إعلامك بأنه تم إضافة محتوى جديد على موقعنا الصحافي:</p>

        <div class="details" style="background-color:#f1f5f9; padding:20px; border-radius:6px; margin:20px 0;">
            @if(!empty($data['title']))
                <p><strong>العنوان:</strong> {{ $data['title'] }}</p>
            @endif

            {{-- بيانات الكتب --}}
            @if(isset($data['lang']))
                <p><strong>اللغة:</strong> {{ $data['lang'] }}</p>
            @endif
            @if(isset($data['summary']))
                <p><strong>ملخص:</strong> {{ $data['summary'] }}</p>
            @endif
            @if(isset($data['publishing_house']))
                <p><strong>دار النشر:</strong> {{ $data['publishing_house'] }}</p>
            @endif
            @if(isset($data['date']))
                <p><strong>التاريخ:</strong> {{ $data['date'] }}</p>
            @endif
            @if(isset($data['edition_number']))
                <p><strong>رقم الإصدار:</strong> {{ $data['edition_number'] }}</p>
            @endif
            @if(isset($data['pages']))
                <p><strong>عدد الصفحات:</strong> {{ $data['pages'] }}</p>
            @endif
            @if(isset($data['goals']))
                <p><strong>الأهداف:</strong> {{ $data['goals'] }}</p>
            @endif

            {{-- بيانات المقالات --}}
            @if(isset($data['type']))
                <p><strong>نوع المقال:</strong> {{ $data['type'] }}</p>
            @endif
            @if(isset($data['year']))
                <p><strong>السنة:</strong> {{ $data['year'] }}</p>
            @endif
            @if(isset($data['writer']))
                <p><strong>الكاتب:</strong> {{ $data['writer'] }}</p>
            @endif
            @if(isset($data['post_by']))
                <p><strong>تم النشر بواسطة:</strong> {{ $data['post_by'] }}</p>
            @endif
            @if(isset($data['references']))
                <p><strong>المراجع:</strong> {{ $data['references'] }}</p>
            @endif

            {{-- بيانات الصوت --}}


            @if(isset($data['project_id']))
                <p><strong>المشروع:</strong> {{ $data->project->title }}</p>
            @endif

            {{-- بيانات البلوج --}}

            @if(isset($data['publisher']))
                <p><strong>الناشر:</strong> {{ $data['publisher'] }}</p>
            @endif
        </div>


        <div class="footer" style="text-align:center; font-size:12px; color:#6b7280; margin-top:20px;">
            <p>إذا لم تكن مهتماً بهذه الإشعارات، يمكنك تجاهل هذا البريد.</p>
            <p>© {{ date('Y') }} موقعنا الصحافي. جميع الحقوق محفوظة.</p>
        </div>
    </div>
</div>
</body>
</html>
