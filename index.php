<html>  
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <link rel="icon" href="dk.png">
        <title>Dewan Demo Delete Multiple Data Animated</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
        <style>
            .removeRow{
                background-color: #FF6347;
                color:#FFFFFF;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-dark bg-primary">
          <a class="navbar-brand text-white" href="index.php">
            Dewan Komputer
          </a>
        </nav>

        <div class="container">
            <div class="table-responsive">  
                <h3 align="center" class="mt-4">Dewan Demo Delete Multiple Data Dengan Animasi</h3><br />
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%"><button type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs">Delete</button></th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th width="25%">Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include 'koneksi.php';
                                $query = "SELECT * FROM tbl_karyawan ORDER BY id DESC";
                                $dewan1 = $db1->prepare($query);
                                $dewan1->execute();
                                $res1 = $dewan1->get_result();
                                while($row = $res1->fetch_assoc()){
                                    echo '<tr>
                                    <td>
                                        <input type="checkbox" class="delete_checkbox" value="'.$row["id"].'" />
                                    </td>
                                    <td>'.$row["nama_lengkap"].'</td>
                                    <td>'.$row["jenkel"].'</td>
                                    <td>'.$row["alamat"].'</td>
                                    <td>'.$row["jabatan"].'</td>
                                    </tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>

        <div class="text-center">© <?php echo date('Y'); ?> Copyright:
            <a href="https://dewankomputer.com/"> Dewan Komputer</a>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>  
            $(document).ready(function(){ 
                $('.delete_checkbox').click(function(){
                    if($(this).is(':checked')){
                        $(this).closest('tr').addClass('removeRow');
                    } else {
                        $(this).closest('tr').removeClass('removeRow');
                    }
                });

                $('#delete_all').click(function(){
                    var checkbox = $('.delete_checkbox:checked');
                    if(checkbox.length > 0) {
                        var checkbox_value = [];
                        $(checkbox).each(function(){
                            checkbox_value.push($(this).val());
                        });

                        $.ajax({
                            url:"delete.php",
                            method:"POST",
                            data:{checkbox_value:checkbox_value},
                            success:function()
                            {
                                $('.removeRow').fadeOut(1500);
                            }
                        });
                    } else {
                        alert("Pilih minimal satu data");
                    }
                });
            });  
        </script>
    </body>  
</html> 

