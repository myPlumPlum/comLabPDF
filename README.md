# comLabPDF
request comLab to PDF file

1. dowload composer in link https://mpdf.github.io/installation-setup/installation-v7-x.html (download this version)
2. follow step in that link to success
3. go to vendor/mpdf/mpdf/ttfonts then add font THSarabunNew, THSarabunNew-Bold, THSarabunNew-Italic, THSarabunNew-BoldItalic (if don't have - just change in name)
4. add This code instead of Old $mpdf
```PHP
    $mpdf = new \Mpdf\Mpdf([
      'fontDir' => array_merge($fontDirs, [
          __DIR__ . '/tmp',
      ]),
      'fontdata' => $fontData + [
          'sarabun' => [
              'R' => 'THSarabunNew.ttf',
              'I' => 'THSarabunNew-Italic.ttf',
              'B' => 'THSarabunNew-Bold.ttf',
              'BI' => 'THSarabunNew-BoldItalic.ttf',
          ]
      ],
      'default_font' => 'sarabun'
    ]);
 ```
5. if have a problem contact me in jirawat5217@gmail.com
