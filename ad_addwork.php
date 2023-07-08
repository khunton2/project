<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Stylesheet -->
    <link href="css/admin.css  " rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"> </script>
</head>

<body>
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <?php require_once 'navbar/navbaradmin.php'; ?>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <?php require_once 'navbar/Header.php' ?>
            <main class="py-6 bg-surface-secondary">
                <div class="card">
                    <div class="container-fluid">
                        <div class="card-body">
                        <div class="card-header pb-0 justify-content-center">
                                    <h5 class="text-center">เพิ่มงาน</h5><br>
                                </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">ชื่องาน</label>
                                    <input type="text" class="form-control" name="w_name" id="" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">รายละเอียด</label>
                                    <input type="text" class="form-control" name="w_desc" id="" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">เบอร์โทรติดต่อ</label>
                                    <input type="text" class="form-control" name="contact" id="" placeholder="">
                                </div>



                                <div class="form-group">
                                    <label for="exampleInputEmail1">แท็ค</label>
                                    <input type="text" class="form-control" name="tag" id="" placeholder="">
                                </div><br>
                                <label for="exampleInputEmail1">ชื่อภาพ</label>
                                <input type="text" name="img_name" required class="form-control" placeholder="ชื่อภาพ"> <br>
                                <font color="red">*อัพโหลดได้เฉพาะ .jpeg , .jpg , .png </font>
                                <input type="file" name="img_file" required class="form-control" accept="image/jpeg, image/png, image/jpg"> <br>
                                <button type="submit" class="btn btn-success">Upload</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">cancal</button>
                            </form>
                        </div>
                    </div>
            </main>

        </div>

    </div>



    </div>
    </div>
    </div>

    </section>
    </main>
    </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>