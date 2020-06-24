<?php

class Model_api extends CI_Model {

    public function with_post($id, $data_string)
    {
        $query_func = "SELECT FUNC_TEST(?,?)";
        $data_array = array('id' => $id, 'data_string' => $data_string );
        $result = $this->db->query($query_func, $data_array);

        if($result !== NULL) {
            return [
                'success'   => true,
                'message'   => 'func test berhasil dipanggil'
            ];
        }
    }
}