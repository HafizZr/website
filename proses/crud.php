<?php
    require 'panggil.php';

    // proses tambah
    if(!empty($_GET['aksi'] == 'tambah'))
    {
        $nama = strip_tags($_POST['nama']);
        $telepon = strip_tags($_POST['telepon']);
        $email = strip_tags($_POST['email']);
        $alamat = strip_tags($_POST['alamat']);
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        
        $tabel = 'tbl_user';
        # proses insert
        $data[] = array(
            'username'		=>$user,
            'password'		=>md5($pass),
            'nama_pengguna'	=>$nama,
            'telepon'		=>$telepon,
            'email'			=>$email,
            'alamat'		=>$alamat
        );
        $proses->tambah_data($tabel,$data);
        echo '<script>alert("Register Sukses");window.location="../job_list.php"</script>';
    }

        // proses tambah data perusahaan
        if(!empty($_GET['aksi'] == 'tambah_pekerjaan'))
        {
            
            
            $company = strip_tags($_POST['company']);
            $gambar = strip_tags($_POST['gambar']);
            $kota = strip_tags($_POST['kota']);
            $kategori = strip_tags($_POST['kategori']);
            $level = strip_tags($_POST['lvl']);
            $pengalaman = strip_tags($_POST['pengalaman']);
            $deskripsi = strip_tags($_POST['deskripsi']);
            $website = strip_tags($_POST['website']);
            $email = strip_tags($_POST['email']);

            
            
            $tabel = 'job';
            # proses insert
            $data[] = array(
                'Company'		    =>$company,
                'gambar'		    =>$gambar,
                'City'	            =>$kota,
                'Job_Cate'		    =>$kategori,
                'Edu_lvl'			=>$level,
                'exp_year'		    =>$pengalaman,
                'Job_Deskripsi'		=>$deskripsi,
                'website'           =>$website,
                'email'             =>$email,
            );
            $proses->tambah_data($tabel,$data);
            echo '<script>alert("Register Sukses");window.location="../Tambah_Pekerjaan.php"</script>';
        }

    // proses edit
	if(!empty($_GET['aksi'] == 'edit'))
	{
		$nama = strip_tags($_POST['nama']);
		$telepon = strip_tags($_POST['telepon']);
		$email = strip_tags($_POST['email']);
		$alamat = strip_tags($_POST['alamat']);
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);
		
        // jika password tidak diisi
        if($pass == '')
        {
            $data = array(
                'username'		=>$user,
                'nama_pengguna'	=>$nama,
                'telepon'		=>$telepon,
                'email'			=>$email,
                'alamat'		=>$alamat
            );
        }else{

            $data = array(
                'username'		=>$user,
                'password'		=>md5($pass),
                'nama_pengguna'	=>$nama,
                'telepon'		=>$telepon,
                'email'			=>$email,
                'alamat'		=>$alamat
            );
        }
        $tabel = 'tbl_user';
        $where = 'id_login';
        $id = strip_tags($_POST['id_login']);
        $proses->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="../job_list.php"</script>';
    }
    
    // hapus data
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        $tabel = 'tbl_user';
        $where = 'id_login';
        $id = strip_tags($_GET['hapusid']);
        $proses->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../job_list.php"</script>';
    }

    // login
    if(!empty($_GET['aksi'] == 'login'))
    {   
        // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        // panggil fungsi proses_login() yang ada di class prosesCrud()
        $result = $proses->proses_login($user,$pass);
        if($result == 'gagal')
        {
            echo "<script>window.location='../login.php?get=gagal';</script>";
        }else{
            // status yang diberikan 
            session_start();
            $_SESSION['ADMIN'] = $result;
            // status yang diberikan 
            echo "<script>window.location='../homescreen.php';</script>";
        }
    }
?>