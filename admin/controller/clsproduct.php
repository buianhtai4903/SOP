<?php 
    include("connect.php");

    class Clsproduct extends ConnectD {

        public function LayCot($sql)
        {
            $link = $this->connect();
            $ketqua = mysqli_query($link,$sql);
            $i = mysqli_num_rows($ketqua);
            $giatri ='';
            if($i>0)
            {
                while($row = mysqli_fetch_array($ketqua))
                {
                    $gt=$row[0];
                    $giatri = $gt;
                }
            }   
            return $giatri;
        }

        public function brand($sql) 
        {
            $link = $this->connect();
            $ketqua = mysqli_query($link,$sql);
            $i = mysqli_num_rows($ketqua);
            if($i>0)
            {
                echo '<select name="id_brand" id="id_brand" class="custom-select" >
                        <option>Chọn thương hiệu</option>';
                while($row = mysqli_fetch_array($ketqua))
                {
                    $id_brand = $row["id_brand"];
                    $name_brand = $row["name_brand"];
                    $country = $row["country"];
                    echo '<option value="'.$id_brand.'">'.$name_brand.'</option>';
                }
                echo '</select>';
            }
        }

        public function category()
        {
            $sql ="SHOW COLUMNS FROM product LIKE 'category'";
            $link = $this->connect();
            $ketqua = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($ketqua);

            $enumList = str_replace("'", "", substr($row['Type'], 5, (strlen($row['Type']) - 6)));
            $categories = explode(",", $enumList);

            echo '<select name="category" id="category" class="custom-select">
            <option>Chọn loại</option>';
  
            foreach ($categories as $category) 
            {
                echo '<option value="'. $category .'">'. $category .'</option>';
            }
            echo '</select>';
        }

        public function xuatproduct($sql)
        {
            $link = $this->connect();
            $ketqua = mysqli_query($link, $sql);
            $i = mysqli_num_rows($ketqua);
            if($i>0)
            {
                while($row = mysqli_fetch_array($ketqua))
                {
                    $id_product = $row['id_product'];
                    $id_brand = $row['id_brand'];
                    $name_brand = $this->LayCot("SELECT name_brand FROM brand WHERE id_brand='$id_brand' limit 1 ");
                    $category = $row['category'];
                    $quantity = $row['quantity'];
                    $sold = $row['sold'];
                    $nameproduct = $row['name_product'];
                    $price = $row['price'];
                    $price_discount = $row['price_discount'];
                    $img_product = $row['img_product'];

                    echo '<tr>
                            <td>'.$id_product.'</td>
                            <td>'.$nameproduct.'</td>
                            <td>'.$name_brand.'</td>
                            <td>'.$category.'</td>
                            <td>'.$quantity.'</td>
                            <td>'.$sold.'</td>
                            <td><img src="../../img/'.$img_product.'"  width="25px"></td>
                            <td>
                                 <form action="" method="post">
                                    <input type="hidden" value="'.$id_product.'" id="id_product" name="id_product">
                                    <input type="submit" name="btn-xoa" id="btn-xoa" value="Xóa" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" style="background-color: red;">
                                    <input type="button" value="Sửa" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" id="btn" style="background-color: green;">
                                </form>
                            </tr>';
                }
            }
        }

        public function listblog($sql)
        {
            $link = $this->connect();
            $ketqua = mysqli_query($link, $sql);
            $i = mysqli_num_rows($ketqua);
            if($i>0)
            {
                while($row = mysqli_fetch_array($ketqua))
                {
                    $id_blog = $row['id_blog'];
                    $tieude_blog = $row['tieude_blog'];
                    $noidung_blog = $row['noidung_blog'];
                    $anh1_blog = $row['anh1_blog'];
                    $anh2_blog = $row['anh2_blog'];
                    $anh3_blog = $row['anh3_blog'];
                    echo '<tr>
                            <td>'.$id_blog.'</td>
                            <td>'.$tieude_blog.'</td>
                            <td>'.$noidung_blog.'</td>
                            <td><img src="../../img/'. $anh1_blog.'"  width="25px"></td>
                            <td>
                                 <form action="" method="post">
                                    <input type="hidden" value="'.$id_blog.'" id="id_blog" name="id_blog">
                                    <input type="submit" name="btn-xoa" id="btn-xoa" value="Xóa bài" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" style="background-color: red;">
                                    <input type="button" value="Sửa" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" id="btn" style="background-color: green;">
                                </form>
                            </tr>';
                }
            }
        }


        public function uploadfile($name, $tmp_name, $folder)
        {
            $new_name = $folder."/".$name;
            if(move_uploaded_file($tmp_name, $new_name))
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        public function ade($sql) 
        {
            $link = $this->connect();
            if($ketqua = mysqli_query($link,$sql))
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        public function layIDnew($sql)
            {
                $link = $this->connect();
                $ketqua = mysqli_query($link, $sql);
                
                if ($ketqua) {

                    $row = mysqli_fetch_assoc($ketqua);
                    return $row['id_product']; // Trả về ID mới nhất
                } else 
                
                    return 0;
                }
            }

?>