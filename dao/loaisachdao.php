<?php include './bean/loaisachbean.php';?>
<?php
class loaisachdao {
    public function getLoaiSach(){
        $arr= array();
        $conn= mysqli_connect("localhost", "root", "", "qlsach");
        mysqli_set_charset($conn, 'UTF8');
        $sql="select * from loaisach";
        $result = $conn->query($sql);
        mysqli_set_charset($conn, 'UTF8');
        if ($conn == null) {
            echo " conn: null";
        }

        if ($result == null) {

            echo " result: null";
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $loaiSach= new loaisachbean($row["MaLoaiSach"], $row["TenLoaiSach"]);
                $arr[]=$loaiSach;   
            }
        }
        mysqli_free_result($result);
        mysqli_close($conn);
        return $arr;
    }
    public function themLoaiSach($tenLoaiSach) {
        $conn= mysqli_connect("localhost", "root", "", "qlsach");
        mysqli_set_charset($conn, 'UTF8');
        $sql="INSERT INTO `loaisach`(`TenLoaiSach`) VALUES ('$tenLoaiSach')";
        $conn->query($sql);
        mysqli_close($conn);
    }
    public function xoaLoaiSach($maLoaiSach)
    {
        $conn= mysqli_connect("localhost", "root", "", "qlsach");
        mysqli_set_charset($conn, 'UTF8');
        $sql="DELETE FROM `loaisach` WHERE MaLoaiSach='$maLoaiSach'";
        $conn->query($sql);
        mysqli_close($conn);
    }
    public function suaLoaiSach ($maLoaiSach,$tenLoaiSach)
    {
        $conn= mysqli_connect("localhost", "root", "", "qlsach");
        mysqli_set_charset($conn, 'UTF8');
        $sql="UPDATE `loaisach` SET `TenLoaiSach`='$tenLoaiSach' WHERE MaLoaiSach='$maLoaiSach'";
        $conn->query($sql);
        mysqli_close($conn);
    }
}
?>