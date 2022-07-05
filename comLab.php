<?php

require_once __DIR__ . '/vendor/autoload.php'; 

//grab variable
$monthArr = Array(
    "01"=>"มกราคม",
    "02"=>"กุมภาพันธ์",
    "03"=>"มีนาคม",
    "04"=>"เมษายน",
    "05"=>"พฤษภาคม",
    "06"=>"มิถุนายน", 
    "07"=>"กรกฎาคม",
    "08"=>"สิงหาคม",
    "09"=>"กันยายน",
    "10"=>"ตุลาคม",
    "11"=>"พฤศจิกายน",
    "12"=>"ธันวาคม"
); 

$fullName = $_POST['fullName'];
$studentID = $_POST['studentID'];
$department = $_POST['department'];
$telephone = $_POST['telephone'];
$roomNumber = $_POST['roomNumber'];
$reasons = $_POST['reasons'];

if($_POST['Projector'] || $_POST['Sound'] || $_POST['Other']){

    if($_POST['Projector'] && $_POST['Sound']){

        $Projector = $_POST['Projector'];
        $Sound = $_POST['Sound'];
        $withTool = $Projector.$Sound;

    } elseif($_POST['Projector'] && $_POST['Other']) {

        $Projector = $_POST['Projector'];
        $Other = $_POST['OtherThing'];
        $withTool = $Projector.$Other;

    } elseif($_POST['Sound']){

        $withTool = $_POST['Sound'];

    } elseif($_POST['Sound'] && $_POST['Other']){

        $Sound = $_POST['Sound'];
        $Other = $_POST['OtherThing'];
        $withTool = $Sound.$Other;

    } elseif($_POST['Projector']){

        $withTool = $_POST['Projector'];

    } elseif($_POST['Sound']){

        $withTool = $_POST['Sound'];

    }

}
$withTool = "-";
$timeStart = $_POST['timeStart'];
$timeEnd = $_POST['timeEnd'];


$numberUse = $_POST['numberUse'];


$dateWrite = $_POST['dateWrite'];
$dateWriteSplite = explode("-",$dateWrite);
$monthWrite = $monthArr[$dateWriteSplite[1]];
$yearWrite = $dateWriteSplite[0]+543;

$dateStart = $_POST['dateStart'];
$dateStartSplite = explode("-",$dateStart);
$monthStart = $monthArr[$dateStartSplite[1]];
$yearStart = $dateStartSplite[0]+543;

$dateEnd = $_POST['dateEnd'];
$dateEndSplite = explode("-",$dateEnd);
$monthEnd = $monthArr[$dateEndSplite[1]];
$yearEnd = $dateEndSplite[0]+543;

// creat PDF
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

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

$data = "
        <style>
            table {
                border-collapse:collapse;
                width:100%;
            }
            td, th {
                border: 1px solid;
            }
            p {
                padding-left:28px;
            }
        </style>
        <h3 style='text-align:center;font-size: 20px;'>
            แบบฟอร์มขอใช้ห้องปฎิบัติการคอมพิวเตอร์ <br>
            คณะสถาปัตยกรรมศาสตร์ ศิลปะและการออกแบบ
        </h3>
        <p style='font-size: 18px;'>เรียน คณบดีคณะสถาปัตกรรมศาสตร์ ศิลปะและการออกแบบ</p>
        <p style='text-align:right;font-size: 18px;'>วันที่ $dateWriteSplite[2] เดือน $monthWrite พ.ศ.$yearWrite</p>
        <p style='text-align:left;font-size: 18px;'>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ข้าพเจ้า $fullName ตำแหน่ง/รหัสนิสิต $studentID หน่วงงาน/ภาควิชา $department เบอร์โทร $telephone
            มีความประสงค์จะขอใช้ $roomNumber เพื่อใช้ในการ $reasons พร้อมอุปกรณ์การเรียนการสอน $withTool
            ตั้งแต่วันที่ $dateStartSplite[2] เดือน $monthStart พ.ศ. $yearStart  ถึงวันที่ $dateEndSplite[2] เดือน $monthEnd พ.ศ. $yearEnd ระหว่างเวลา $timeStart
            น. ถึง เวลา $timeEnd น. โดยมีผู้เข้าใช้จำนวน $numberUse คน<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ทั้งนี้ข้าพเจ้ายินดีที่จะปฎิบัติตามระเบียบการใช้ห้องปฎิบัติการคอมพิวเตอร์อย่างเคร่งครัด หากเกิดความเสียหายใดๆ ต่อการใช้บริการ
            ข้าพเจ้ายินดีชดใช้ค่าเสียหายตามราคาที่เป็นจริง<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            จึงเรียนมาเพื่อโปรดพิจารณา
        </p>
        <p style='text-align:center;font-size: 18px;'>
            ลงชื่อ..................................................ผู้ขอใช้บริการ<br>
            ($fullName)
        </p>
        <p style='text-align:left;font-size: 18px;'>
            หมายเหตุ:<br>
            1. แจ้งขอใช้ห้องปฏิบัติการคอมพิวเตอร์<u>ล่วงหน้า</u>ก่อนวันใช้งาน 5 วันทำการ แจ้งยกเลิกก่อน 2 วันทำการ<br>
            2. ช่วงเวลาการใช้บริการ วันราชการตั้งแต่ 9:00 - 21:00 น. วันหยุดราชการตั้งแต่ 10:00 - 18:00 น. <u>ยกเว้น</u> วันหยุดนักขัตฤกษ์<br>
            3. หากมีผู้เข้าใช้ร่วมกรุณาแนบเอกสารแสดง ชื่อ-สกุล รหัสนิสิต สาขาวิชา ของผู้เข้าใช้ร่วม<br>
            4. ติดต่อส่งแบบฟอร์มที่ ห้องปฏิบัติการคอมพิวเตอร์ ARL201 คุณชาญานิน อุดพ้วย โทร:0 5596 2456<br>
        </p>
        <table>
            <tr>
                <td width='50%'>
                    <p style='text-align:left;font-size: 18px;'>
                        ความเห็นของ อาจารย์ประจำวิชา/อาจารย์ที่ปรึกษา<br>
                        ลงความเห็น..............................................................................................................................<br>
                        ................................................................................................................................................<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ..................................................<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(.....................................)
                    </p>
                </td>
                <td width='50%'><p style='text-align:left;font-size: 18px;'>
                    ความเห็นของ เจ้าหน้าที่ผู้ดูแลห้องปฏิบัติการคอมพิวเตอร์<br>
                    [   ] สามารถให้บริการได้ [   ] ไม่สามารถให้บริการได้<br>
                    เนื่องจาก.......................................................................................<br></p>
                    <p style='text-align:right;font-size: 18px;'>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ลงชื่อ..................................................<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(.....................................)</p>
                </td>
            </tr>
            <tr>
                <td colspan='2' style='text-align:center;'>
                    <p style='text-align:right;font-size: 18px;'>
                        ผลการอนุมัติ <br>
                        [   ] อนุมัติ [   ] ไม่อนุมัติ <br>
                        ลงชื่อ..................................................<br>
                        (.....................................)</p>
                        คณบดีคณะสถาปัตกรรมศาสตร์ ศิลปะและการออกแบบ
                    </p>
                </td>
            </tr>
        </table>
";

$mpdf->WriteHTML($data);

$mpdf->Output();
?>