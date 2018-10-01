<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <!-- NAME: FOLLOW UP -->
    <!--[if gte mso 15]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>

<body>

<table>
    <tr>
        <td>Name</td>
        <td>:</td>
        <td>{!! @$data->name !!}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td>{!! @$data->email !!}</td>
    </tr>
    <tr>
        <td>Phone</td>
        <td>:</td>
        <td>{!! @$data->phone !!}</td>
    </tr>
    <tr>
        <td>Description</td>
        <td>:</td>
        <td>{!! @$data->description !!}</td>
    </tr>
</table>

</body>
</html>
