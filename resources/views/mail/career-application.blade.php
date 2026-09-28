<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Career Application</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; color: #1F1F1F; background: #f5f5f5; margin: 0; padding: 0; }
        .wrap { max-width: 620px; margin: 0 auto; background: #fff; }
        .hd { background: #0E2240; padding: 28px 36px; }
        .hd h1 { color: #fff; font-size: 20px; margin: 0 0 4px; font-weight: 700; }
        .hd p { color: rgba(255,255,255,.6); font-size: 13px; margin: 0; }
        .body { padding: 32px 36px; }
        table { width: 100%; border-collapse: collapse; }
        th { width: 140px; text-align: left; padding: 11px 16px 11px 0; border-top: 1px solid #eee; font-size: 12px; font-weight: 700; color: #888; letter-spacing: .04em; text-transform: uppercase; vertical-align: top; }
        td { padding: 11px 0; border-top: 1px solid #eee; font-size: 15px; vertical-align: top; line-height: 1.55; }
        td a { color: #E8132C; text-decoration: none; }
        .cover-cell { white-space: pre-wrap; font-size: 14px; color: #444; }
        .ft { padding: 20px 36px 28px; background: #f9f9f9; font-size: 12px; color: #999; border-top: 1px solid #eee; }
        .ft a { color: #E8132C; }
    </style>
</head>
<body>
<div class="wrap">

    <div class="hd">
        <h1>New Career Application</h1>
        <p>Romina Group — Careers Portal</p>
    </div>

    <div class="body">
        <table>
            <tr>
                <th>Position</th>
                <td><strong>{{ $positionTitle }}</strong></td>
            </tr>
            <tr>
                <th>Full Name</th>
                <td>{{ $data['full_name'] }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td><a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $data['phone'] }}</td>
            </tr>
            @if (!empty($data['cover_letter']))
            <tr>
                <th>Cover Letter</th>
                <td class="cover-cell">{{ $data['cover_letter'] }}</td>
            </tr>
            @endif
        </table>
    </div>

    <div class="ft">
        CV attached · Reply-To is set to the applicant's email ·
        <a href="mailto:info@rominaplc.com">info@rominaplc.com</a>
    </div>

</div>
</body>
</html>
