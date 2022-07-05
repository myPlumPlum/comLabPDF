<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- start bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- https://icons.getbootstrap.com/ -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@500&display=swap" rel="stylesheet">

    <link rel = "icon" type = "image/png" size="16x16" href = "pic/html.png">
    <link rel="stylesheet" href="style.css">

    <title>แบบฟอร์มขอใช้ห้องปฏิบัติการคอมพิวเตอร์ </title>
</head>
<style>
    * {
        font-size: 100%;
        font-family: 'Sarabun', sans-serif;
        
    }
    body {
        background-color: #EBECF0;
    }
</style>
<body>
    <div class="container mt-5">

        <form action="comLab.php" class="needs-validation offset-md-1" method="POST" novalidate>
            <h1>แบบฟอร์มขอใช้ห้องปฎิบัติการคอมพิวเตอร์ คณะสถาปัตยกรรมศาสตร์ ศิลปะและการออกแบบ</h1>
            <p>กรุณากรอกข้อมูลในช่องให้ถูกต้องและครบถ้วน หลักจากนั้นกดปุ่มจะได้ไฟล์เอกสาร .pdf</p>
            <div class="row mb-2">
                <div class="form-floating col-md-4">
                    <input type="date" name="dateWrite" placeholder="วัน/เดือน/ปี" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">วันที่</label>
                    <div class="invalid-feedback">
                        กรุณากรอกวันที่เขียน <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-4">
                    <input type="text" name="fullName" placeholder="ชื่อจริง-นามสกุล" class="form-control" id="validationSurname" required>
                    <label for="floatingInput">คำนำหน้าชื่อจริง-นามสกุล</label>
                    <div class="invalid-feedback">
                        กรุณากรอกคำนำหน้าชื่อจริง-นามสกุล <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-4">
                    <input type="text" name="studentID" placeholder="ตำแหน่ง/รหัสนิสิต" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">ตำแหน่ง/รหัสนิสิต</label>
                    <div class="invalid-feedback">
                        กรุณากรอกตำแหน่ง/รหัสนิสิต <br><br>
                    </div>
                </div>
            </div>
            
            <div class="row mb-2">
                
                <div class="form-floating col-md-4">
                    <input type="text" name="department" placeholder="หน่วยงาน/ภาควิชา" class="form-control" id="validationSurname" required>
                    <label for="floatingInput">หน่วยงาน/ภาควิชา</label>
                    <div class="invalid-feedback">
                        กรุณากรอกหน่วยงาน/ภาควิชา <br><br>
                    </div>
                </div>

                <div class="form-floating col-md-4">
                    <input type="text" name="telephone" placeholder="เบอร์โทร" class="form-control" id="validationSurname" required>
                    <label for="floatingInput">เบอร์โทร</label>
                    <div class="invalid-feedback">
                        กรุณากรอกเบอร์โทร <br><br>
                    </div>
                </div>

                <div class="form-check-floating col-md-4">
                    <label for="">ประสงค์จะขอใช้ห้องปฏิบัติการคอมพิวเตอร์</label><br>
                    <input type="radio" class="form-check-input" name="roomNumber" value="ARC201" required>
                    <label for="floatingInput">ห้อง ARC201</label><br>

                    <input type="radio" class="form-check-input" name="roomNumber" value="ARL201" required>
                    <label for="floatingInput">ห้อง ARL201</label><br>

                    <div class="invalid-feedback">
                        กรุณาเลือกห้องที่ประสงค์จะขอใช้ <br>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="form-floating col-md-4">
                    <input type="text" name="reasons" placeholder="เหตุผลที่ใช้ห้อง" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">เหตุผลที่ใช้ห้อง</label>
                    <div class="invalid-feedback">
                        กรุณากรอกเหตุผลที่ใช้ห้อง <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-4 justify-content-center">
                    <div class="form-check ">
                        <input type="checkbox" name="Projector" class="form-check-input" id="checkProjector" value="Projector">
                        <label for="checkProjector" class="form-check-label">Projector</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="Sound" class="form-check-input" id="checkSound" value="Sound">
                        <label for="checkSound" class="form-check-label">เครื่องเสียง</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="Other" class="form-check-input" id="checkOther" value="Other">
                        <label for="checkOther" class="form-check-label">อื่นๆ</label>
                    </div>
                </div>
                <div class="form-floating col-md-4">
                    <input type="text" name="OtherThing" placeholder="อื่นๆ โปรดกรอก" class="form-control" id="validationSurname">
                    <label for="floatingInput">อื่นๆ โปรดกรอก</label>
                    <!-- <div class="invalid-feedback">
                        กรุณากรอกรายระเอียด <br><br>
                    </div> -->
                </div>
            </div>

            <div class="row mb-2">
                <div class="form-floating col-md-2">
                    <input type="date" name="dateStart" placeholder="วัน/เดือน/ปี" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">วันที่เริ่มใช้</label>
                    <div class="invalid-feedback">
                        กรุณากรอกวันที่เริ่มใช้ห้อง <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-2">
                    <input type="date" name="dateEnd" placeholder="วัน/เดือน/ปี" class="form-control" id="validationFirstname"  required>
                    <label for="floatingInput">วันที่สิ้นสุดการใช้</label>
                    <div class="invalid-feedback">
                        กรุณากรอกวันที่สิ้นสุดใช้ห้อง <br><br>
                    </div>
                </div>

                
                
                <div class="form-floating col-md-2">
                    <input type="time" name="timeStart" class="form-control" id="validationFirstname"  required>                    
                </div>

                <div class="form-floating col-md-2 text-center">
                    <p style="padding-top:10%;">ถึง</p>
                </div>

                <div class="form-floating col-md-2">
                    <input type="time" name="timeEnd" class="form-control" id="validationFirstname"  required>                    
                </div>
                
            </div>
            <div class="row mb-2">
                <div class="form-floating col-md-2">
                    <input type="text" name="numberUse" placeholder="จำนวนผู้ใช้งาน" class="form-control" id="validationSurname" required>
                    <label for="floatingInput">จำนวนผู้ใช้งาน</label> 
                    <div class="invalid-feedback">
                        กรุณากรอกจำนวนผู้ใช้งาน <br><br>
                    </div>
                </div>
                <div class="form-floating col-md-2">
                    <p style="padding-top:10%;">คน</p>
                </div>
            </div>
            <br>

            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Create PDF</button>
        </form>
    </div>
</body>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
</script> 
</html>