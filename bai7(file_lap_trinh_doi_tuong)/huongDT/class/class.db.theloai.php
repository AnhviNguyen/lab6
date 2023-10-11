<?php
    include 'class.db.php';
    class DB_TheLoai extends DB{
        function __construct() {
            parent::__construct();
        }
        /**
        * Lay danh sach the loai
        * @return array $theloai 
        */
        public function get_theloai($id = -1){
            $query = "SELECT * FROM theloai";
            if($id != -1) $query .= " WHERE idTL=$id"; 
            $result = $this->db_query($query);
            $theloai = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $theloai;
        }

        public function them_theloai($name, $sort = 0, $show = 1){
            $query = "INSERT INTO theloai(TenTL, ThuTu, AnHien) VALUES('$name', '$sort', '$show')";
            $result = $this->db_query($query);
            return $result;
        }

        public function sua_theloai($id, $name, $sort, $show){
            $query = "UPDATE theloai SET TenTL='$name', ThuTu='$sort', 
            AnHien='$show' WHERE idTL=$id";
            $result = $this->db_query($query);
            return $result;
        }
        
        function xoa_theloai($id){
            $query = "DELETE FROM theloai WHERE idTL=$id";
            $result = $this->db_query($query);
            return $result;
        }
    }
?>