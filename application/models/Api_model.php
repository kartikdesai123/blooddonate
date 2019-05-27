<?php

class Api_model extends CI_Model {

    public $datetime, $ip;

    public function __construct() {
        parent::__construct();
    }

    public function curlCall($url,$data,$method,$header = '') {
        
        $headerArr = implode(',', $header);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "postman-token: dac5f6a2-2fcd-2fae-2acf-74c881756b39",
                $headerArr
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response,true);
        }
    }

    public function getApiRecord($method, $url, $data) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://indigo.kcits.in/api/api/GetStops",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "token=0fWbvGEoCuCfnFRIX9sUweQsKUmk1Vct",
            CURLOPT_HTTPHEADER => array(
                "authorization: v4jRRxqgkzWYnLLnsTFPgKBXl8ZDQG6i",
                "cache-control: no-cache",
                "postman-token: 869e9fce-6798-9359-200f-58066e80214f"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function insertRecord($data) {
        $result = false;
        if ($this->db->insert($data ["table"], $data ["insert"]) !== false) {
            $result = $this->db->insert_id();
        }

        return $result;
    }

    /* Inserts Batch Data */

    public function insertBatchRecord($data) {
        $result = false;
        if ($this->db->insert_batch($data ["table"], $data ["insert"]) !== false) {
            $result = $this->db->insert_id();
        }

        return $result;
    }

    public function updateRecords($data) {
        if (isset($data ["where_in"])) {
            foreach ($data ["where_in"] as $k => $v) {
                $this->db->where_in($k, $v);
            }
        }
        $this->db->where($data ["where"])->update($data ["table"], $data ["update"]);
        $result = false;
        if ($this->db->affected_rows() > 0) {
            $result = true;
        }

        return $result;
    }

    public function deleteRecords($data) {
        if (isset($data ["where_in"])) {
            foreach ($data ["where_in"] as $k => $v) {
                $this->db->where_in($k, $v);
            }
        }
        $this->db->where($data ["where"]);
        $this->db->delete($data ["table"]);

        $result = false;
        if ($this->db->affected_rows() > 0) {
            $result = true;
        }

        return $result;
    }

    public function countRecords($data) {
        if (isset($data ["where"])) {
            $this->db->where($data ["where"]);
        }
        if (isset($data ["like"])) {
            $this->db->like($data ["like"] [0], $data ["like"] [1], $data ["like"] [2]);
        }
        if (isset($data ["or_like"])) {
            die("Please Use GROUP query for OR LIKE");
            /* foreach ($data ["or_like"] as $k => $v) {
              $this->db->or_like($v [0], $v [1], $v [2]);
              } */
        }

        if (isset($data ["where_in"])) {
            foreach ($data ["where_in"] as $k => $v) {
                $this->db->where_in($k, $v);
            }
        }

        if (isset($data ["or_where_in"])) {
            die("Please Use GROUP query for OR WHERE IN");
            /* foreach ($data ["or_where_in"] as $k => $v) {
              $this->db->or_where_in($k, $v);
              } */
        }

        if (isset($data ["groupBy"])) {
            $this->db->group_by($data ["groupBy"]);
        }
        $this->db->from($data ["table"]);
        $result = $this->db->get()->num_rows();

        return $result;
    }

    public function selectFromJoin($data, $array = false) {

        $this->db->select($data ["select"]);
        $this->db->from($data ["table"]);
        if (isset($data ["where"])) {
            $this->db->where($data ["where"]);
        }
        if (isset($data ["join"])) {
            foreach ($data ["join"] as $k => $v) {
                if (isset($v [2])) {
                    $this->db->join($k, $v [0], $v [1], $v [2]);
                } else {
                    $this->db->join($k, $v [0], $v [1]);
                }
            }
        }

        if (isset($data ["or_where_in"])) {
            die("Please Use GROUP query for OR WHERE IN");
            /* foreach ($data ["or_where_in"] as $k => $v) {
              $this->db->or_where_in($k, $v);
              } */
        }

        if (isset($data ["where_in"])) {
            foreach ($data ["where_in"] as $k => $v) {
                $this->db->where_in($k, $v);
            }
        }

        if (isset($data ["like"])) {
            $this->db->like($data ["like"] [0], $data ["like"] [1], $data ["like"] [2]);
        }
        if (isset($data ["or_like"])) {
            die("Please Use GROUP query for OR LIKE");
            /* foreach ($data ["or_like"] as $k => $v) {
              $this->db->or_like($v [0], $v [1], $v [2]);
              } */
        }
        if (isset($data ["and_like"])) {
            foreach ($data ["and_like"] as $k => $v) {
                $this->db->like($v [0], $v [1], $v [2]);
            }
        }

        /* Handling GROUPING for Query */
        if (isset($data ["group"])) {
            $this->db->group_start();
            if (isset($data ["group"] ["like"])) {
                $this->db->like($data ["group"] ["like"] [0], $data ["group"] ["like"] [1], $data ["group"] ["like"] [2]);
            }
            if (isset($data ["group"] ["or_like"])) {
                $this->db->or_like($data ["group"] ["or_like"] [0], $data ["group"] ["or_like"] [1], $data ["group"] ["or_like"] [2]);
            }
            $this->db->group_end();
        }

        if (isset($data ["order"])) {
            $this->db->order_by($data ["order"]);
        }

        if (isset($data ["skip"])) {
            $this->db->limit($data ["limit"], $data ["skip"]);
        } elseif (isset($data ["limit"])) {
            $this->db->limit($data ["limit"]);
        }

        if (isset($data ["groupBy"])) {
            $this->db->group_by($data ["groupBy"]);
        }

        if (isset($data ["having"])) {
            $this->db->having($data ["having"]);
        }
        $result = $this->db->get();
        if ($array) {
            $restult = $result->result_array();
        } else {
            $result = $result->result();
        }

        return $result;
    }

    public function inserUpdateData($data) {
        $this->db->where($data ["match"]);
        $q = $this->db->get($data ["table"]);

        if ($q->num_rows() > 0) {
            $this->db->where($data ["match"]);
            $res = $this->db->update($data ["table"], $data ["update"]);
        } else {
            $res = $this->db->insert($data ["table"], $data ["insert"]);
        }

        return $res;
    }

    public function isDuplicate($data) {
        $this->db->where($data ["where"]);
        if (isset($data ["or_group"] ["where"])) {
            $this->db->or_group_start();
            $this->db->where($data ["or_group"] ["where"]);
            $this->db->group_end();
        }

        $count = $this->db->get($data ["table"])->result();
        $result = false;
        if (count($count) > 0) {
            $result = true;
        }

        return $result;
    }

}
